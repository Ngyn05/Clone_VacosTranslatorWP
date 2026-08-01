$files = @(
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
)

$css = @"
<style>
#et-main-area {
    background: #f9f9fb !important;
    padding: 30px 0 !important;
}
.et_pb_section {
    max-width: 1000px !important;
    margin: 0 auto !important;
    background: #fff !important;
    padding: 40px !important;
    border-radius: 16px !important;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05) !important;
}
.et_pb_image img, .et_pb_post_content img {
    display: block !important;
    max-width: 100% !important;
    height: auto !important;
    border-radius: 12px !important;
    margin: 20px auto !important;
}
picture {
    display: block !important;
}
source {
    display: none !important;
}
</style>
"@

foreach ($f in $files) {
    if (Test-Path $f) {
        $c = [System.IO.File]::ReadAllText($f, [System.Text.Encoding]::UTF8)
        
        # Remove empty or broken source tags inside picture
        $c = $c -replace '<source[^>]+>', ''
        
        # Insert custom style if not present
        if (-not ($c.Contains('<style>'))) {
            $c = $c.Replace('get_header();', "get_header();`n?>`n" + $css + "`n<?php")
        }
        
        [System.IO.File]::WriteAllText($f, $c, [System.Text.Encoding]::UTF8)
        Write-Host "Cleaned and styled: $f"
    }
}
