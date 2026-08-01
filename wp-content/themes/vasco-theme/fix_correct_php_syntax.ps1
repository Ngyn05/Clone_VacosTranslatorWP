$files = @(
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php',
    'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
)

$styleBlock = @"
?>
<style>
#et-main-area {
    background: #f4f5f7 !important;
    padding: 40px 15px !important;
}
.et_pb_section_0_tb_body, .et_pb_section_1_tb_body {
    max-width: 920px !important;
    margin: 0 auto 24px auto !important;
    background: #ffffff !important;
    padding: 35px 45px !important;
    border-radius: 16px !important;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04) !important;
}
.et_pb_section_0_tb_body {
    padding-bottom: 10px !important;
}
.et_pb_code_inner {
    font-size: 14px !important;
    color: #6c757d !important;
    margin-bottom: 15px !important;
}
.et_pb_code_inner a {
    color: #111111 !important;
    text-decoration: none !important;
    font-weight: 500 !important;
}
.et_pb_text_inner h1 {
    font-size: 34px !important;
    line-height: 1.3 !important;
    font-weight: 700 !important;
    color: #111111 !important;
    margin: 10px 0 !important;
}
.et_pb_image_0_tb_body img {
    width: 100% !important;
    max-height: 480px !important;
    object-fit: cover !important;
    border-radius: 16px !important;
    margin-bottom: 25px !important;
    display: block !important;
}
.et_pb_post_content p, .et_pb_post_content li {
    font-size: 16px !important;
    line-height: 1.75 !important;
    color: #2c3e50 !important;
    margin-bottom: 18px !important;
}
.et_pb_post_content img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 12px !important;
    margin: 25px auto !important;
    display: block !important;
}
</style>
<?php
"@

foreach ($f in $files) {
    if (-not (Test-Path $f)) { continue }
    $c = [System.IO.File]::ReadAllText($f, [System.Text.Encoding]::UTF8)

    # Clean lazyload attributes
    $c = $c -replace 'src="data:image/svg\+xml[^"]+"', ''
    $c = $c -replace 'data-lazy-src=', 'src='
    $c = $c -replace 'data-lazy-srcset="[^"]+"', ''
    $c = $c -replace 'data-lazy-sizes="[^"]+"', ''

    # Clean merged words
    $c = $c -replace '<a href="\.\.">ngôn ngữ</a>', 'ngôn ngữ'
    $c = $c -replace '<a href="\.\.">Ngôn ngữ</a>', 'Ngôn ngữ'
    $c = $c -replace '<a href="..">ngôn ngữ</a>', 'ngôn ngữ'
    $c = $c -replace '<a href="..">Ngôn ngữ</a>', 'Ngôn ngữ'

    # Inject style correctly closing and re-opening php tag
    $c = $c.Replace('get_header();', "get_header();`n" + $styleBlock)

    [System.IO.File]::WriteAllText($f, $c, [System.Text.Encoding]::UTF8)
    Write-Host "Fixed with valid PHP syntax: $f"
}
