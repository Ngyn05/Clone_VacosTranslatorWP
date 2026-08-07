import sys
import os
import json
import re
import time
import requests
import subprocess
from bs4 import BeautifulSoup
from deep_translator import GoogleTranslator

sys.stdout.reconfigure(encoding='utf-8')
translator = GoogleTranslator(source='auto', target='vi')

HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
}

def log_print(msg):
    print(msg, flush=True)

def translate_batch(text_list):
    cleaned_list = [t.strip() for t in text_list]
    valid_texts = [t for t in cleaned_list if t and len(t) > 1 and not t.isdigit() and not t.startswith('http')]
    
    if not valid_texts:
        return text_list

    delimiter = " ||| "
    max_chunk_len = 3000
    chunks = []
    current_chunk = []
    current_len = 0
    
    for text in valid_texts:
        if current_len + len(text) + len(delimiter) > max_chunk_len:
            chunks.append(current_chunk)
            current_chunk = [text]
            current_len = len(text)
        else:
            current_chunk.append(text)
            current_len += len(text) + len(delimiter)
            
    if current_chunk:
        chunks.append(current_chunk)
        
    translated_map = {}
    for chunk in chunks:
        joined_chunk = delimiter.join(chunk)
        try:
            res = translator.translate(joined_chunk)
            parts = res.split("|||")
            for orig, trans in zip(chunk, parts):
                translated_map[orig] = trans.strip()
        except Exception as e:
            log_print(f"      [!] Lỗi dịch batch: {e}")
            for item in chunk:
                try:
                    translated_map[item] = translator.translate(item)
                except:
                    translated_map[item] = item

    return [translated_map.get(t.strip(), t) for t in text_list]

def translate_html_content(soup_content):
    target_tags = ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'li', 'td', 'th', 'blockquote', 'figcaption']
    elements = []
    original_texts = []
    
    for tag in soup_content.find_all(target_tags):
        if any(child.name in target_tags for child in tag.find_all(recursive=False)):
            continue
        text = tag.get_text().strip()
        if text and len(text) > 1 and not text.isdigit():
            elements.append(tag)
            original_texts.append(text)
            
    if not elements:
        return str(soup_content)
        
    translated_texts = translate_batch(original_texts)
    
    for tag, trans in zip(elements, translated_texts):
        tag.string = trans
        
    return str(soup_content)

def fetch_and_parse_article(url):
    log_print(f"-> Đang tải & dịch bài viết: {url}")
    
    html = ""
    for attempt in range(3):
        try:
            resp = requests.get(url, headers=HEADERS, timeout=10, verify=False)
            if resp.status_code == 200:
                html = resp.text
                break
        except Exception as e:
            log_print(f"   [!] Thử lại lượt {attempt+1}... ({e})")
            time.sleep(1)
            
    if not html:
        log_print("   [X] Không tải được trang bài viết.")
        return None

    try:
        soup = BeautifulSoup(html, 'html.parser')
        
        h1 = soup.find('h1', class_=re.compile('entry-title')) or soup.find('h1')
        title_en = h1.get_text(strip=True) if h1 else ''
        title_vi = translate_batch([title_en])[0] if title_en else ''
        
        path_parts = [p for p in url.strip('/').split('/') if p]
        slug = path_parts[-1]
        cat_slug = path_parts[-2] if len(path_parts) >= 2 and path_parts[-2] != 'articles' else 'Blog'
        
        author_meta = soup.find('meta', property='article:author') or soup.find('meta', attrs={'name': 'author'})
        author_name = author_meta['content'] if author_meta and 'content' in author_meta.attrs else 'Vasco Team'
        
        date_meta = soup.find('meta', property='article:published_time')
        post_date = date_meta['content'] if date_meta and 'content' in date_meta.attrs else ''
        
        og_img = soup.find('meta', property='og:image')
        featured_img = og_img['content'] if og_img and 'content' in og_img.attrs else ''
        
        content_div = soup.find('div', class_=re.compile('entry-content')) or soup.find('article') or soup.find('body')
        if not content_div:
            return None

        for s in content_div.find_all(['script', 'style', 'iframe', 'noscript', 'header', 'footer']):
            s.decompose()
            
        for img in content_div.find_all('img'):
            real_src = ''
            for attr in ['data-src', 'data-rocket-src', 'data-lazy-src', 'src']:
                val = img.get(attr)
                if val and not val.startswith('data:image'):
                    real_src = val
                    break
            if real_src:
                img['src'] = real_src
                for a in ['data-src', 'data-rocket-src', 'srcset', 'sizes']:
                    if img.has_attr(a):
                        del img[a]
                        
        log_print(f"   [✓] Đã dịch tiêu đề: {title_vi}")
        content_vi = translate_html_content(content_div)
        
        return {
            'slug': slug,
            'title_vi': title_vi,
            'title_en': title_en,
            'category': cat_slug.capitalize(),
            'author': author_name,
            'post_date': post_date,
            'featured_img': featured_img,
            'content_html': content_vi,
            'original_url': url
        }
    except Exception as e:
        log_print(f"   [X] Lỗi bóc tách/dịch bài viết {url}: {e}")
        return None

def get_target_urls():
    urls = []
    try:
        resp = requests.get("https://vasco-translator.com/articles/post-sitemap.xml", headers=HEADERS, timeout=8, verify=False)
        if resp.status_code == 200:
            urls = re.findall(r'<loc>(https://[^<]+)</loc>', resp.text)
    except Exception as e:
        log_print(f"Lỗi đọc sitemap: {e}")
        
    if not urls:
        urls = [
            'https://vasco-translator.com/articles/news/vasco-expert-how-hotels-overcome-world-cup-language-barriers/',
            'https://vasco-translator.com/articles/vasco/how-do-translation-earbuds-work/',
            'https://vasco-translator.com/articles/travel/best-time-to-visit-japan/',
            'https://vasco-translator.com/articles/languages/exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic/',
            'https://vasco-translator.com/articles/languages/thank-you-in-different-languages/',
            'https://vasco-translator.com/articles/travel/top-10-best-christmas-markets-in-europe/',
            'https://vasco-translator.com/articles/travel/spooky-travel-destinations/',
            'https://vasco-translator.com/articles/travel/fall-travel-ideas-hoa-hoa-season/',
            'https://vasco-translator.com/articles/languages/languages-of-star-trek-klingon-vs-vulcan/'
        ]
    return urls

def main():
    import urllib3
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    
    urls = get_target_urls()
    log_print(f"=== BẮT ĐẦU DỊCH VÀ IMPORT {len(urls)} BÀI VIẾT ===")
    
    json_path = os.path.join(os.path.dirname(__file__), 'translated_posts.json')
    translated_data = []
    
    php_bin = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\php.exe"
    ext_dir = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\ext"
    php_script = os.path.join(os.path.dirname(__file__), 'save_translated_post.php')
    
    for idx, url in enumerate(urls, 1):
        log_print(f"\n[{idx}/{len(urls)}]")
        post_info = fetch_and_parse_article(url)
        if post_info:
            translated_data.append(post_info)
            with open(json_path, 'w', encoding='utf-8') as f:
                json.dump(translated_data, f, ensure_ascii=False, indent=2)
                
            cmd = [
                php_bin,
                "-d", f"extension_dir={ext_dir}",
                "-d", "extension=mysqli",
                "-d", "extension=curl",
                "-d", "extension=mbstring",
                "-d", "extension=openssl",
                "-d", "extension=gd",
                php_script,
                post_info['slug']
            ]
            res = subprocess.run(cmd, capture_output=True, text=True, encoding='utf-8', errors='ignore')
            log_print(f"   [+] Kết quả lưu WP DB: {res.stdout.strip()}")

if __name__ == '__main__':
    main()
