$files = @(
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
)

foreach ($f in $files) {
    if (Test-Path $f) {
        $c = [System.IO.File]::ReadAllText($f, [System.Text.Encoding]::UTF8)
        $c = $c -replace 'src="data:image/svg\+xml[^"]+"', ''
        $c = $c -replace 'data-lazy-src=', 'src='
        $c = $c -replace 'data-lazy-srcset="[^"]+"', ''
        $c = $c -replace 'data-lazy-sizes="[^"]+"', ''
        $c = $c -replace '<a href="\.\.">ngôn ngữ</a>', 'ngôn ngữ'
        $c = $c -replace '<a href="\.\.">Ngôn ngữ</a>', 'Ngôn ngữ'
        [System.IO.File]::WriteAllText($f, $c, [System.Text.Encoding]::UTF8)
        Write-Host "Fixed: $f"
    }
}
