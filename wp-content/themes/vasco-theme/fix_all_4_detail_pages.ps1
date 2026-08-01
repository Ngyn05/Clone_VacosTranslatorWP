$files = @(
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
)

$customCss = @"
<style>
#et-main-area {
    background: #f8f9fa !important;
    padding: 40px 0 !important;
}
.article-detail-container {
    max-width: 960px !important;
    margin: 0 auto !important;
    background: #ffffff !important;
    padding: 40px 50px !important;
    border-radius: 20px !important;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06) !important;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
}
.article-breadcrumbs {
    font-size: 14px !important;
    color: #6c757d !important;
    margin-bottom: 20px !important;
}
.article-breadcrumbs a {
    color: #000000 !important;
    text-decoration: none !important;
    font-weight: 500 !important;
}
.article-breadcrumbs a:hover {
    text-decoration: underline !important;
}
.article-title-h1 {
    font-size: 36px !important;
    line-height: 1.3 !important;
    font-weight: 700 !important;
    color: #111111 !important;
    margin: 15px 0 20px 0 !important;
}
.article-meta-info {
    display: flex !important;
    align-items: center !important;
    gap: 15px !important;
    font-size: 14px !important;
    color: #6c757d !important;
    margin-bottom: 25px !important;
}
.article-hero-img {
    width: 100% !important;
    max-height: 480px !important;
    object-fit: cover !important;
    border-radius: 16px !important;
    margin-bottom: 30px !important;
    display: block !important;
}
.et_pb_post_content p, .et_pb_post_content li {
    font-size: 16px !important;
    line-height: 1.7 !important;
    color: #333333 !important;
    margin-bottom: 18px !important;
}
.et_pb_post_content img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 12px !important;
    margin: 25px auto !important;
    display: block !important;
}
.faq-section {
    background: #f8f9fa !important;
    padding: 30px !important;
    border-radius: 12px !important;
    margin-top: 30px !important;
}
.faq-section h3 {
    font-size: 22px !important;
    font-weight: 700 !important;
    margin-bottom: 15px !important;
}
.faq-section h4 {
    font-size: 16px !important;
    font-weight: 600 !important;
    margin-top: 15px !important;
    color: #000000 !important;
}
</style>
"@

foreach ($f in $files) {
    if (-not (Test-Path $f)) { continue }
    $c = [System.IO.File]::ReadAllText($f, [System.Text.Encoding]::UTF8)

    # Remove existing style tags
    $c = $c -replace '<style>[\s\S]*?</style>', ''

    # Insert CSS after get_header();
    if (-not ($c.Contains($customCss))) {
        $c = $c -replace 'get_header\(\);', ("get_header();`n" + $customCss)
    }

    # Clean merged words
    $c = $c -replace '<a href="\.\.">ngôn ngữ</a>', 'ngôn ngữ'
    $c = $c -replace '<a href="\.\.">Ngôn ngữ</a>', 'Ngôn ngữ'
    $c = $c -replace '<a href="..">ngôn ngữ</a>', 'ngôn ngữ'
    $c = $c -replace '<a href="..">Ngôn ngữ</a>', 'Ngôn ngữ'

    [System.IO.File]::WriteAllText($f, $c, [System.Text.Encoding]::UTF8)
    Write-Host "Re-applied cleanly: $f"
}
