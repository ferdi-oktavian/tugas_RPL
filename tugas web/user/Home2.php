<?php
include '../koneksi/koneksi.php';

// SQL query to get data from the images table
$sql = "SELECT id, name, image FROM images";
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
        <a href="#home">Home</a>
        <a href="konsultasi1.php">Konsultasi</a>
        <a href="paket.php">Paket perawatan</a>
      </div>
      <!-- Login -->
      <div class="navbar-login">
        <a href="index.php">Logout</a>
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
        <!-- Menampilkan artikel -->
        <?php
        if ($result->num_rows > 0) {
            // Output each image record
            while($row = $result->fetch_assoc()) {
                // Sanitize the image path to prevent XSS
                $imagePath = htmlspecialchars($row["image"]);
                $name = htmlspecialchars($row["name"]);

                echo '<div class="card">';
                echo '<img src="' . $imagePath . '" alt="' . $name . '" style="width: 100%; height: auto;" />'; 
                echo '<h3>' . $name . '</h3>';
                echo '</div>';
            }
        } else {
            echo "<p>No images found.</p>";
        }
        ?>
      </section>
    </div>
    <!-- Artikel Section End -->
  </body>
</html>

<?php
// Close the database connection
$conn->close();
?>
