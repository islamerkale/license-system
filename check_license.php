<?php
// check_license.php - GitHub Pages için
header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// GitHub Pages PHP çalıştırmaz, bu yüzden mock (sahte) response dönecek
// Gerçek sistemde bu veritabanından kontrol edilecek

$licenseKey = $_GET['license_key'] ?? '';

// Mock lisans kontrolü - HER ZAMAN VALID dön (şimdilik)
if (!empty($licenseKey)) {
    echo 'VALID';
    
    // Gerçek sistem için örnek kod:
    /*
    $validLicenses = [
        'abc123licensekey',
        'def456anotherkey'
    ];
    
    if (in_array($licenseKey, $validLicenses)) {
        echo 'VALID';
    } else {
        http_response_code(404);
        echo 'INVALID';
    }
    */
} else {
    http_response_code(400);
    echo 'INVALID';
}
?>
