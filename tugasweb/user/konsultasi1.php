<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultasi 1</title>
  <link rel="stylesheet" href="../css/konsultasi.css">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">Sahabat Kecantikan</a>
    <div class="navbar-nav">
      <a href="Home2.php">Home</a>
      <a href="konsultasi.php">Konsultasi</a>
      <a href="paket.php">Paket perawatan</a>
    </div>
    <div class="navbar-login">
      <a href="../index.php">Logout</a>
    </div>
  </nav>

  <!-- Form Konsultasi -->
  <div class="container">
    <h1>Konsultasi Dokter Kulit</h1>
    <form action="konsulkonek.php" method="POST">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Masukkan email aktif Anda" required>

      <label for="gender">Jenis Kelamin:</label>
      <select id="gender" name="gender" required>
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
      </select>

      <label for="phone">Nomor Kontak:</label>
      <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon/WA Anda contoh: 081562395782" required>

      <label for="address">Alamat:</label>
      <textarea id="address" name="address" placeholder="Masukkan alamat lengkap tempat tinggal Anda" required></textarea>

      <label for="complaint">Keluhan:</label>
      <textarea id="complaint" name="complaint" placeholder="Ceritakan masalah kulit Anda" required></textarea>

      <h2>Pemilihan Spesialis dan Dokter</h2>
      <label for="specialist">Spesialis:</label>
      <select id="specialist" name="specialist" required>
        <option value="internal">Chemical peeling</option>
        <option value="cardiology">Laser resurfacing therapy</option>
        <option value="neurology">Dermabrasi</option>
        <option value="pediatrics">Suntik botox</option>
        <option value="dermatology">Dermal filler</option>
      </select>

      <label for="doctor">Dokter:</label>
      <select id="doctor" name="doctor" required>
        <option value="dr1">Dr. Willy, Sp.KK</option>
        <option value="dr2">Dr. Richard Le, Sp.KK</option>
        <option value="dr3">Dr. Nur Putri Nuzul Iryani Sp.D.V.E</option>
        <option value="dr4">Dr. Siska, Sp.KK</option>
      </select>

      <label for="visit_date">Tanggal Pengunjungan:</label>
      <input type="date" id="visit_date" name="visit_date" min="<?php echo date('Y-m-d'); ?>" required>

      <button type="submit">Lanjut</button>
    </form>
  </div>

</body>
</html>

