<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultasi 1</title>
  <link rel="stylesheet" href="css/konsultasi.css" />
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--bg);
      color: #010101;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #2e7d32;
      font-weight: 600;
    }
    label {
      font-weight: 600;
      margin-top: 10px;
      display: block;
    }
    input, textarea, select, button {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #d4d4d4;
      border-radius: 5px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
    }
    button {
      background-color: #2e7d32;
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 20px;
      font-size: 16px;
      font-weight: 600;
    }
    button:hover {
      background-color: #1b5e20;
    }
  </style>
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

      <label for="date">Jam/Waktu Ketemu:</label>
      <input type="datetime-local" id="date" name="date" required>

      <label for="complaint">Keluhan:</label>
      <textarea id="complaint" name="complaint" placeholder="Masukkan keluhan Anda" required></textarea>

      <button type="submit">Lanjut</button>
    </form>
  </div>

  <!-- Script to Set Minimum Date and Time -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.getElementById('date');
      const now = new Date();

      // Format tanggal dan waktu untuk input
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
      const day = String(now.getDate()).padStart(2, '0');
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');

      // Set nilai minimal ke tanggal dan waktu saat ini
      dateInput.min = `${year}-${month}-${day}T${hours}:${minutes}`;
    });
  </script>
</body>
</html>
