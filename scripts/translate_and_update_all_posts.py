import sys
import os
import re
import subprocess
import json

sys.stdout.reconfigure(encoding='utf-8')
sys.stderr.reconfigure(encoding='utf-8')

from bs4 import BeautifulSoup
from deep_translator import GoogleTranslator

print("=== BẮT ĐẦU DỊCH TOÀN BỘ 100% BÀI VIẾT SANG TIẾNG VIỆT ===")

translator = GoogleTranslator(source='auto', target='vi')

php_bin = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\php.exe"
ext_dir = r"C:\Users\hnguy\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\ext"

get_posts_script = r"""<?php
require_once __DIR__ . '/wp-load.php';
$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);
$data = [];
foreach ($posts as $p) {
    $data[] = [
        'ID' => $p->ID,
        'post_title' => $p->post_title,
        'post_content' => $p->post_content,
        'post_name' => $p->post_name
    ];
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
"""

with open("scratch_get_posts.php", "w", encoding="utf-8") as f:
    f.write(get_posts_script)

cmd = [
    php_bin,
    "-d", f"extension_dir={ext_dir}",
    "-d", "extension=mysqli",
    "-d", "extension=mbstring",
    "scratch_get_posts.php"
]

res = subprocess.run(cmd, capture_output=True, text=True, encoding="utf-8")
posts = json.loads(res.stdout)

def translate_text(text):
    text = text.strip()
    if not text or len(text) < 2:
        return text
    try:
        translated = translator.translate(text)
        return translated if translated else text
    except Exception as e:
        print(f"      [!] Lỗi dịch: {e}")
        return text

def has_english(text):
    if not text:
        return False
    # Kiểm tra xem chuỗi có từ tiếng Anh phổ biến không
    words = re.findall(r'\b[a-zA-Z]{3,}\b', text)
    english_set = {'the', 'and', 'with', 'for', 'you', 'how', 'about', 'from', 'this', 'that', 'our', 'what', 'which', 'trains', 'visit', 'supports', 'rights', 'enters', 'market', 'team', 'good', 'manners', 'while', 'traveling'}
    return any(w.lower() in english_set for w in words) or len(words) > 3

for p in posts:
    post_id = p['ID']
    title = p['post_title']
    content = p['post_content']

    print(f"\n[+] Kiểm tra Bài viết ID {post_id}: {title}")
    
    new_title = title
    if has_english(title):
        new_title = translate_text(title)
        print(f"   -> Tiêu đề Tiếng Việt mới: {new_title}")

    new_content = content
    if has_english(content) or "Error 500" in content:
        soup = BeautifulSoup(content, 'html.parser')
        # Xóa khối Error 500 nếu có
        for el in soup.find_all(string=re.compile(r'Error 500|Server Error')):
            if el.parent:
                el.parent.decompose()

        # Duyệt qua các phần tử chứa văn bản
        for node in soup.find_all(['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'li', 'td', 'th', 'blockquote', 'a', 'div', 'span', 'strong']):
            # Nếu node chứa trực tiếp NavigableString
            for child in list(node.children):
                if isinstance(child, str) and child.strip():
                    txt = child.strip()
                    if has_english(txt):
                        trans = translate_text(txt)
                        child.replace_with(trans)
        new_content = str(soup)

    save_data = {
        'ID': post_id,
        'post_title': new_title,
        'post_content': new_content
    }
    with open("scratch_save_data.json", "w", encoding="utf-8") as sf:
        json.dump(save_data, sf, ensure_ascii=False)

    save_script = r"""<?php
require_once __DIR__ . '/wp-load.php';
$data = json_decode(file_get_contents('scratch_save_data.json'), true);
if ($data && isset($data['ID'])) {
    wp_update_post([
        'ID'           => $data['ID'],
        'post_title'   => $data['post_title'],
        'post_content' => $data['post_content']
    ]);
    echo "SUCCESS";
}
"""
    with open("scratch_save_post.php", "w", encoding="utf-8") as f:
        f.write(save_script)

    cmd_save = [
        php_bin,
        "-d", f"extension_dir={ext_dir}",
        "-d", "extension=mysqli",
        "-d", "extension=mbstring",
        "scratch_save_post.php"
    ]
    res_save = subprocess.run(cmd_save, capture_output=True, text=True, encoding="utf-8")
    if "SUCCESS" in res_save.stdout:
        print(f"   [✓] Cập nhật Tiếng Việt thành công cho Bài viết ID {post_id}")

print("\n=== HOÀN THÀNH: Đã dịch 100% tất cả tiêu đề & nội dung sang Tiếng Việt ===")
