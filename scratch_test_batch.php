<?php
function translate_batch_php($texts, $target_lang = 'vi') {
    if (empty($texts)) return [];
    
    $clean_texts = array_map('trim', $texts);
    $valid_texts = array_filter($clean_texts, function($t) {
        return !empty($t) && strlen($t) > 1 && !is_numeric($t) && strpos($t, 'http') !== 0;
    });

    if (empty($valid_texts)) return $texts;

    $delimiter = "\n---DIV---\n";
    $joined = implode($delimiter, $valid_texts);

    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=" . $target_lang . "&dt=t&q=" . urlencode($joined);

    $opts = [
        'http' => [
            'method'  => 'GET',
            'header'  => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
            'timeout' => 15
        ],
        'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
    ];

    $res = @file_get_contents($url, false, stream_context_create($opts));
    if ($res) {
        $json = json_decode($res, true);
        if (isset($json[0]) && is_array($json[0])) {
            $translated_str = '';
            foreach ($json[0] as $sentence) {
                if (isset($sentence[0])) {
                    $translated_str .= $sentence[0];
                }
            }
            $translated_parts = explode("---DIV---", $translated_str);
            $map = [];
            $i = 0;
            foreach ($valid_texts as $orig) {
                if (isset($translated_parts[$i])) {
                    $map[$orig] = trim($translated_parts[$i]);
                } else {
                    $map[$orig] = $orig;
                }
                $i++;
            }
            $result = [];
            foreach ($texts as $t) {
                $result[] = isset($map[trim($t)]) ? $map[trim($t)] : $t;
            }
            return $result;
        }
    }
    return $texts;
}

$sample = ["How Do Translation Earbuds Work?", "From Technology to Real-World Performance", "Best Time to Visit Japan"];
$res = translate_batch_php($sample);
print_r($res);
