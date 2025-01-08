<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultasi 2</title>
  <link rel="stylesheet" href="css/konsultasi.css" />
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
      <a href="masuk.php">Login</a>
    </div>
  </nav>
  <div class="container">
    <h1>Konsultasi Dokter</h1>
    <form action="selesai.php" method="post">
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
        <option value="dr2">Dr. Richard Le, Sp,KK</option>
        <option value="dr3">Dr. Nur Putri Nuzul Iryani Sp.D.V.E</option>
        <option value="dr4">Dr. Siska, Sp.KK</option>
      </select>

      <button type="submit">Selesai</button>
    </form>
  </div>
</body>
</html>
