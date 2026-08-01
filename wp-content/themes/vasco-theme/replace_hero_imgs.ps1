# File 1: least spoken language
$f1 = 'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-least-spoken-language-in-the-world.php'
if (Test-Path $f1) {
    $c = [System.IO.File]::ReadAllText($f1, [System.Text.Encoding]::UTF8)
    $c = $c -replace '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body">[\s\S]*?</div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body', '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body"><img src="<?php echo esc_url( VASCO_THEME_URI . "/assets/articles/wp-content/uploads/2024/07/least_spoken_language.webp" ); ?>" style="width:100%; max-height:450px; object-fit:cover; border-radius:16px; margin-bottom:20px; display:block;" /></div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body'
    [System.IO.File]::WriteAllText($f1, $c, [System.Text.Encoding]::UTF8)
}

# File 2: oldest known language
$f2 = 'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-oldest-known-language.php'
if (Test-Path $f2) {
    $c = [System.IO.File]::ReadAllText($f2, [System.Text.Encoding]::UTF8)
    $c = $c -replace '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body">[\s\S]*?</div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body', '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body"><img src="<?php echo esc_url( VASCO_THEME_URI . "/assets/articles/wp-content/uploads/2024/07/oldest_language.webp" ); ?>" style="width:100%; max-height:450px; object-fit:cover; border-radius:16px; margin-bottom:20px; display:block;" /></div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body'
    [System.IO.File]::WriteAllText($f2, $c, [System.Text.Encoding]::UTF8)
}

# File 3: speak more than one language
$f3 = 'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-how-many-people-speak-more-than-one-language.php'
if (Test-Path $f3) {
    $c = [System.IO.File]::ReadAllText($f3, [System.Text.Encoding]::UTF8)
    $c = $c -replace '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body">[\s\S]*?</div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body', '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body"><img src="<?php echo esc_url( VASCO_THEME_URI . "/assets/articles/wp-content/uploads/2024/07/bilingualism.webp" ); ?>" style="width:100%; max-height:450px; object-fit:cover; border-radius:16px; margin-bottom:20px; display:block;" /></div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body'
    [System.IO.File]::WriteAllText($f3, $c, [System.Text.Encoding]::UTF8)
}

# File 4: spanish speaking countries
$f4 = 'c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\page-articles-languages-spanish-speaking-countries.php'
if (Test-Path $f4) {
    $c = [System.IO.File]::ReadAllText($f4, [System.Text.Encoding]::UTF8)
    $c = $c -replace '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body">[\s\S]*?</div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body', '<div class="et_pb_module et_pb_image et_pb_image_0_tb_body"><img src="<?php echo esc_url( VASCO_THEME_URI . "/assets/articles/wp-content/uploads/2024/07/spanish_official_language.webp" ); ?>" style="width:100%; max-height:450px; object-fit:cover; border-radius:16px; margin-bottom:20px; display:block;" /></div><div class="et_pb_module et_pb_text et_pb_text_1_tb_body'
    [System.IO.File]::WriteAllText($f4, $c, [System.Text.Encoding]::UTF8)
}

Write-Host "All 4 hero images replaced successfully!"
