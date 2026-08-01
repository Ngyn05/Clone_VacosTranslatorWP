New-Item -ItemType Directory -Force -Path "c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\assets\img\contactus" | Out-Null

$flagBase = "https://vasco-translator.com/themes/vasco-theme/img/flags/"
$flagDir = "c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\assets\img\flags\"
$flags = @("pl","jp","cz","dk","fi","fr","hu","it","ro","sk","es","se","cn")

foreach ($f in $flags) {
    $url = $flagBase + $f + ".svg"
    $out = $flagDir + $f + ".svg"
    try {
        Invoke-WebRequest -Uri $url -OutFile $out -UseBasicParsing -TimeoutSec 15
        Write-Host "OK flag: $f"
    } catch {
        Write-Host "FAIL flag: $f - $_"
    }
}

$iconBase = "https://vasco-translator.com/themes/vasco-theme/img/contactus/"
$iconDir = "c:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme\assets\img\contactus\"
$icons = @("marketing","media","career")

foreach ($ic in $icons) {
    $url = $iconBase + $ic + ".svg"
    $out = $iconDir + $ic + ".svg"
    try {
        Invoke-WebRequest -Uri $url -OutFile $out -UseBasicParsing -TimeoutSec 15
        Write-Host "OK icon: $ic"
    } catch {
        Write-Host "FAIL icon: $ic - $_"
    }
}

Write-Host "=== DONE ==="
