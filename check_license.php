<?php
// check_license.php (Sizin sunucunuzda çalışacak)
header('Content-Type: text/plain');

if (empty($_GET['license_key'])) {
    http_response_code(400);
    echo 'INVALID';
    exit;
}

$licenseKey = $_GET['license_key'];

// Burada veritabanı bağlantısı yapılacak
$pdo = new PDO('mysql:host=localhost;dbname=your_license_db', 'db_user', 'db_pass');
$stmt = $pdo->prepare("SELECT expiry_date FROM licenses WHERE license_key = ? AND status = 'active'");
$stmt->execute([$licenseKey]);
$license = $stmt->fetch();

if ($license) {
    if (strtotime($license['expiry_date']) > time()) {
        echo 'VALID';
    } else {
        echo 'EXPIRED';
    }
} else {
    http_response_code(404);
    echo 'INVALID';
}
?>