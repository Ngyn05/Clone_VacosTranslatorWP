import sys
import os
import json
import re
import time
import subprocess
from bs4 import BeautifulSoup
from deep_translator import GoogleTranslator

sys.stdout.reconfigure(encoding='utf-8')
translator = GoogleTranslator(source='auto', target='vi')

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

def parse_and_translate_file(filepath):
    log_print(f"-> Đang xử lý file: {filepath}")
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        html = f.read()

    soup = BeautifulSoup(html, 'html.parser')
    
    h1 = soup.find('h1', class_=re.compile('entry-title')) or soup.find('h1')
    title_en = h1.get_text(strip=True) if h1 else ''
    title_vi = translate_batch([title_en])[0] if title_en else ''
    
    # URL meta
    og_url = soup.find('meta', property='og:url')
    article_url = og_url['content'] if og_url and 'content' in og_url.attrs else ''
    
    if not article_url:
        canonical = soup.find('link', rel='canonical')
        article_url = canonical['href'] if canonical and 'href' in canonical.attrs else ''
        
    path_parts = [p for p in article_url.strip('/').split('/') if p] if article_url else []
    slug = path_parts[-1] if path_parts else 'post-' + str(int(time.time()))
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
                    
    log_print(f"   [✓] Tiêu đề Tiếng Việt: {title_vi}")
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
        'original_url': article_url
    }

def main():
    steps_dir = r"C:\Users\hnguy\.gemini\antigravity-ide\brain\a49fdd43-a19a-4902-938e-bad9d364ef50\.system_generated\steps"
    step_folders = [os.path.join(steps_dir, f, 'content.md') for f in os.listdir(steps_dir) if os.path.exists(os.path.join(steps_dir, f, 'content.md'))]
    
    log_print(f"Tìm thấy {len(step_folders)} file content để import & dịch Tiếng Việt...")
    
    json_path = os.path.join(os.path.dirname(__file__), 'translated_posts.json')
    translated_data = []
    
    php_bin = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\php.exe"
    ext_dir = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\ext"
    php_script = os.path.join(os.path.dirname(__file__), 'save_translated_post.php')
    
    for idx, filepath in enumerate(step_folders, 1):
        log_print(f"\n[{idx}/{len(step_folders)}]")
        post_info = parse_and_translate_file(filepath)
        if post_info and post_info['slug']:
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
            log_print(f"   [+] Kết quả lưu WP CSDL: {res.stdout.strip()}")

if __name__ == '__main__':
    main()
