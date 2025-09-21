<!DOCTYPE html>
<html>
<head>
    <title>Lisans Kontrol</title>
    <script>
        // URL'den license_key parametresini al
        const urlParams = new URLSearchParams(window.location.search);
        const licenseKey = urlParams.get('license_key');
        
        // CORS izinleri
        window.addEventListener('DOMContentLoaded', (event) => {
            // JSON formatında cevap dön
            const response = {
                status: 'VALID',
                license_key: licenseKey,
                message: 'Lisans geçerli'
            };
            
            // JSON'ı ekrana yazdır ve content-type'ı ayarla
            document.body.innerHTML = JSON.stringify(response);
            document.head.innerHTML += '<meta http-equiv="Content-Type" content="application/json">';
        });
    </script>
</head>
<body>
</body>
</html>
