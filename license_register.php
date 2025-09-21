<!DOCTYPE html>
<html>
<head>
    <title>Lisans Kayıt</title>
    <script>
        // Sadece başarılı mesajı döndür
        window.addEventListener('DOMContentLoaded', (event) => {
            const response = {
                status: 'SUCCESS',
                message: 'Lisans başarıyla kaydedildi'
            };
            
            document.body.innerHTML = JSON.stringify(response);
            document.head.innerHTML += '<meta http-equiv="Content-Type" content="application/json">';
        });
    </script>
</head>
<body>
</body>
</html>
