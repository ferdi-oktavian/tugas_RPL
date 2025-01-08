<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultasi 1</title>
  <link rel="stylesheet" href="css/konsultasi.css">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">Sahabat Kecantikan</a>
    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="konsultasi1.php">Konsultasi</a>
      <a href="paket.php">Paket perawatan</a>
    </div>
    <!-- Login -->
    <div class="navbar-login">
      <a href="masuk.html">Login</a>
    </div>
  </nav>

  <div class="container">
    <h1>Konsultasi Dokter</h1>
    <form action="konsultasi2.html" method="get">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

      <label for="gender">Jenis Kelamin:</label>
      <select id="gender" name="gender" required>
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
      </select>

      <label for="phone">Nomor Kontak:</label>
      <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon Anda" required>

      <label for="address">Alamat:</label>
      <textarea id="address" name="address" placeholder="Masukkan alamat Anda" required></textarea>

      <label for="complaint">Keluhan:</label>
      <textarea id="complaint" name="complaint" placeholder="Masukkan keluhan Anda" required></textarea>

      <button type="submit">Lanjut</button>
    </form>
  </div>
</body>
</html>
