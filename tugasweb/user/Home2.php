<?php
include '../koneksi/koneksi.php';

// SQL query to get data from the images table
$sql = "SELECT id, name, image, url FROM images"; // Tambahkan kolom 'url'
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sahabat Sehat</title>

    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap"
      rel="stylesheet"
    />
    <!-- Icon -->
    <script src="https://code.iconify.design/iconify-icon/2.2.0/iconify-icon.min.js"></script>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">Sahabat Kecantikan</a>
      <div class="navbar-nav">
        <a href="Home2.php">Home</a>
        <a href="konsultasi1.php">Konsultasi</a>
        <a href="paket.php">Paket perawatan</a>
      </div>
      <!-- Login -->
      <div class="navbar-login">
        <a href="../index.php">Logout</a>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Home Section Start-->
    <div>
      <section class="hero" id="home">
        <img src="../img/img3.png" alt="Hero Image" />
        <div>
          <h1>Konsultasi <span>Kecantikan</span> Dengan Tepat Dan Akurat</h1>
          <p>
            Kami berkomitmen membantu Anda memahami, merawat, dan meningkatkan
            kesehatan kulit serta kecantikan Anda melalui sistem informasi yang handal.
          </p>
        </div>
      </section>

      <!-- Content Section -->
      <section class="content" id="home">
        <div class="card">
          <iconify-icon
            icon="weui:location-outlined"
            width="80"
            height="80"
          ></iconify-icon>
          <h3>Lokasi klinik</h3>
          <p>
            Website ini menawarkan informasi lengkap dan terhubung dengan 10+ klinik yang ada di Indonesia.
          </p>
        </div>
        <div class="card">
          <iconify-icon
            icon="healthicons:doctor-male-outline"
            width="80"
            height="80"
          ></iconify-icon>
          <h3>Dokter</h3>
          <p>
            Website ini menawarkan informasi lengkap dan terhubung dengan 20+ dokter kecantikan yang ada di klinik SahabatCantik.
          </p>
        </div>
        <div class="card">
          <iconify-icon
            icon="majesticons:note-text-plus-line"
            width="80"
            height="80"
          ></iconify-icon>
          <h3>Informasi</h3>
          <p>
            Website ini menyediakan informasi terkait berbagai jenis perawatan kecantikan yang direkomendasikan oleh dokter.
          </p>
        </div>
      </section>
    </div>
    <!-- Hero Section End -->

    <!-- Artikel Section Start -->
    <div>
      <h2 style="text-align: center; margin-bottom: 30px;">Artikel Perawatan Kecantikan</h2>
      <!-- Menambahkan judul artikel yang berada di atas -->
      <section class="articles">
        <div class="card-wrapper">
          <?php
          if ($result->num_rows > 0) {
              // Output each image record
              $counter = 0;
              while ($row = $result->fetch_assoc()) {
                  if ($counter == 10) break; // Stop after 10 items
                  echo '<div class="card">';
                  echo '<a href="' . htmlspecialchars($row["url"]) . '" target="_blank" rel="noopener noreferrer">'; // Link ke URL
                  echo '<img src="../' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '" />';
                  echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
                  echo '</a>'; // Penutup link
                  echo '</div>';
                  $counter++;
              }
          } else {
              echo "<p>No articles found.</p>";
          }
          ?>
        </div>
      </section>
    </div>
    <!-- Artikel Section End -->
    <footer>
  <div class="social-icons">
    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
      <iconify-icon icon="mdi:facebook" width="24" height="24"></iconify-icon>
    </a>
    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
      <iconify-icon icon="mdi:twitter" width="24" height="24"></iconify-icon>
    </a>
    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
      <iconify-icon icon="mdi:instagram" width="24" height="24"></iconify-icon>
    </a>
  </div>
  <p>
    &copy; 2025 Sahabat Cantik. All Rights Reserved. | 
    <a href="privacy-policy.html">Privacy Policy</a> | 
    <a href="terms.html">Terms of Service</a>
  </p>
</footer>
  </body>
</html>

<?php
// Close the database connection
$conn->close();
?>

