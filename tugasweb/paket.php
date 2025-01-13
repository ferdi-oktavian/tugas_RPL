<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Perawatan</title>
    <link rel="stylesheet" href="css/paket.css">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            margin: 0;
            font-family: "Poppins", sans-serif;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 20px;
            padding: 20px 40px;
            cursor: grab;
            
        }

        .carousel:active {
            cursor: grabbing;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .carousel .table {
            flex: 0 0 auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative;
            background-color: rgb(129, 213, 202);
        }


        .price-section {
            margin-bottom: 20px;
        }

        ul.features {
            padding-left: 0;
        }

        ul.features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">Sahabat Kecantikan</a>
    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="paket.php">Paket perawatan</a>
    </div>
    <div class="navbar-login">
      <a href="masuk.php">Login</a>
    </div>
  </nav>
  

  <div class="carousel" id="carousel">
    <?php
    // Koneksi ke database
    include 'koneksi/koneksi.php';

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data paket perawatan
    $sql = "SELECT * FROM isipaket";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $isRecommended = $row['rekomendasi'] === 'Ya' ? '<div class="ribbon"><span>Rekomen</span></div>' : '';
            echo "
            <div class='table'>
              $isRecommended
              <div class='price-section'>
                <div class='price-area'>
                  <div class='inner-area'>
                    <span class='text'>Rp</span>
                    <span class='price'>{$row['price']}</span>
                  </div>
                </div>
              </div>
              <div class='package-name'><h3>{$row['name']}</h3></div>
              <ul class='features'>";

            // Pecah fitur berdasarkan koma dan tampilkan
            $features = explode(',', $row['features']);
            foreach ($features as $feature) {
                echo "<li><span class='list-name'>$feature</span><span class='icon check'><i class='fas fa-check'></i></span></li>";
            }

            echo "</ul>
            </div>";
        }
    } else {
        echo "<p>Tidak ada data paket perawatan yang tersedia.</p>";
    }

    $conn->close();
    ?>
  </div>

  <script>
    const carousel = document.getElementById('carousel');

    // Fungsi untuk menggulirkan carousel saat scroll
    carousel.addEventListener('wheel', (e) => {
        // Cegah scroll halaman
        e.preventDefault();
        
        if (e.deltaY > 0) {
            // Scroll ke kanan jika scroll ke bawah
            carousel.scrollBy({ left: 300, behavior: 'smooth' });
        } else {
            // Scroll ke kiri jika scroll ke atas
            carousel.scrollBy({ left: -300, behavior: 'smooth' });
        }
    });
  </script>

</body>
</html>
