<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Panel | BBHack</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>🛡 Kontrol Paneli</h2>
    <h3>Hoş geldin <?php echo $_SESSION['user']; ?>!</h3>
    <p>🌐 Eğitim Seç:</p>
    <a href="modul-sql.html"><button>🧠 SQL Injection</button></a><br>
    <a href="modul-xss.html"><button>🔍 XSS Saldırıları</button></a><br>
    <a href="modul-port.html"><button>📡 Port Taraması</button></a><br>
    <a href="upload.html"><button>📤 Dosya Yükle (Yönetici)</button></a><br>
    <a href="logout.php"><button>Çıkış Yap</button></a>
  </div>
</body>
</html>
