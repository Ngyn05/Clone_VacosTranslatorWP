<?php
$url = 'https://vasco-translator.com/articles/news/vasco-expert-how-hotels-overcome-world-cup-language-barriers/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$html = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

echo "HTML length: " . strlen($html) . " | Error: " . $err . "\n";
