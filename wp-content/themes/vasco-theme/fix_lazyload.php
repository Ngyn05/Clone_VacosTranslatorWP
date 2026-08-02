<?php
$dir = __DIR__;
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

$count = 0;
foreach ($files as $fileInfo) {
    if ($fileInfo->isDir()) continue;
    if ($fileInfo->getExtension() !== 'php') continue;

    $filePath = $fileInfo->getPathname();
    $content = file_get_contents($filePath);

    if (strpos($content, 'data-lazy-src') !== false || strpos($content, 'data-src=') !== false) {
        // Replace data-lazy-src and data-src with src
        $content = preg_replace_callback('/<img[^>]+>/i', function($matches) {
            $img = $matches[0];
            if (preg_match('/data-lazy-src=["\']([^"\']+)["\']/i', $img, $lazyMatch)) {
                $realSrc = $lazyMatch[1];
                $img = preg_replace('/src=["\']data:image\/svg[^"\']+["\']/i', '', $img);
                $img = preg_replace('/data-lazy-src=["\'][^"\']+["\']/i', 'src="' . $realSrc . '"', $img);
                $img = preg_replace('/data-lazy-srcset=["\'][^"\']+["\']/i', '', $img);
                $img = preg_replace('/data-lazy-sizes=["\'][^"\']+["\']/i', '', $img);
            }
            return $img;
        }, $content);

        file_put_contents($filePath, $content);
        $count++;
        echo "Fixed: " . basename($filePath) . "\n";
    }
}

echo "Finished fixing $count files.\n";

