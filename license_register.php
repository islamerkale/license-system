<?php
// license_register.php (Sizin sunucunuzda çalışacak)
header('Content-Type: text/plain');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}

$licenseKey = $_POST['license_key'] ?? '';
$restaurantName = $_POST['restaurant_name'] ?? '';
$email = $_POST['email'] ?? '';
$expiryDate = $_POST['expiry_date'] ?? date('Y-m-d', strtotime('+1 year'));

if (empty($licenseKey) || empty($restaurantName)) {
    http_response_code(400);
    echo 'Missing parameters';
    exit;
}

// Veritabanına bağlan ve lisansı kaydet
try {
    $pdo = new PDO('mysql:host=localhost;dbname=your_license_db', 'db_user', 'db_pass');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("INSERT INTO licenses (license_key, restaurant_name, email, expiry_date, status, created_at) 
                          VALUES (?, ?, ?, ?, 'active', NOW())");
    $stmt->execute([$licenseKey, $restaurantName, $email, $expiryDate]);
    
    echo 'SUCCESS';
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Database error: ' . $e->getMessage();
}
?>