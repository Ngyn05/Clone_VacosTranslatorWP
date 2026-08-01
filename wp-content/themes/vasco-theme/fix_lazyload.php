<?php
$files = [
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    // Replace data-lazy-src with standard src
    // Example pattern: src="data:image/svg+xml..." data-lazy-src="REAL_URL"
    $content = preg_replace_callback('/<img[^>]+>/i', function($matches) {
        $img = $matches[0];
        if (preg_match('/data-lazy-src=["\']([^"\']+)["\']/i', $img, $lazyMatch)) {
            $realSrc = $lazyMatch[1];
            // Remove src="data:image/svg..."
            $img = preg_replace('/src=["\']data:image\/svg[^"\']+["\']/i', '', $img);
            // Replace data-lazy-src with src
            $img = preg_replace('/data-lazy-src=["\'][^"\']+["\']/i', 'src="' . $realSrc . '"', $img);
            // Remove data-lazy-srcset
            $img = preg_replace('/data-lazy-srcset=["\'][^"\']+["\']/i', '', $img);
            // Remove data-lazy-sizes
            $img = preg_replace('/data-lazy-sizes=["\'][^"\']+["\']/i', '', $img);
        }
        return $img;
    }, $content);

    // Clean broken translation links like <a href="..">ngôn ngữ</a>
    $content = str_replace('<a href="..">ngôn ngữ</a>', 'ngôn ngữ', $content);
    $content = str_replace('<a href="..">Ngôn ngữ</a>', 'Ngôn ngữ', $content);

    file_put_contents($file, $content);
    echo "Fixed: " . basename($file) . "\n";
}
