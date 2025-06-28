<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == "bbhack" && $password == "1545053131") {
    $_SESSION['user'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "🚫 Hatalı kullanıcı adı veya şifre!";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Giriş | BBHack</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>🔐 Giriş Paneli</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
      <input type="password" name="password" placeholder="Şifre" required><br>
      <button type="submit">Giriş</button>
    </form>
    <a href="index.html">← Anasayfa</a>
  </div>
</body>
</html>
