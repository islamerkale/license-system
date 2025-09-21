<?php
// license_register.php - GitHub Pages için
header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

// GitHub Pages'te veritabanı olmadığı için kayıt işlemi yapamayız
// Bu sadece mock (sahte) bir response

$licenseKey = $_POST['license_key'] ?? '';
$restaurantName = $_POST['restaurant_name'] ?? '';

if (!empty($licenseKey) && !empty($restaurantName)) {
    // Burada normalde veritabanına kayıt yapılır
    // Şimdilik sadece başarılı mesajı dön
    echo 'SUCCESS';
    
    // Örnek: Dosyaya kaydet (GitHub Pages'te çalışmaz)
    // file_put_contents('licenses.txt', "$licenseKey,$restaurantName\n", FILE_APPEND);
} else {
    http_response_code(400);
    echo 'MISSING_DATA';
}
?>
