<?php
function translate_text_php($text, $target_lang = 'vi') {
    if (empty(trim($text))) return $text;
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=" . $target_lang . "&dt=t&q=" . urlencode($text);
    
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
        ],
        'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
    ];
    
    $res = @file_get_contents($url, false, stream_context_create($opts));
    if ($res) {
        $json = json_decode($res, true);
        if (isset($json[0]) && is_array($json[0])) {
            $translated = '';
            foreach ($json[0] as $sentence) {
                if (isset($sentence[0])) {
                    $translated .= $sentence[0];
                }
            }
            return $translated ?: $text;
        }
    }
    return $text;
}

$sample_text = "How Do Translation Earbuds Work? From Technology to Real-World Performance";
echo "Original: " . $sample_text . "\n";
echo "Translated: " . translate_text_php($sample_text) . "\n";
