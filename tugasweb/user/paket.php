<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Perawatan</title>
    <link rel="stylesheet" href="../css/paket.css">
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            margin: 0;
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }

        .table {
            position: relative;
        }

        .recommended-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #ff8a00, #e52e71);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16);
            z-index: 2;
            animation: pulse 2s infinite;
        }

        .recommended-badge::after {
            content: "";
            position: absolute;
            top: 50%;
            left: -8px;
            width: 0;
            height: 0;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-right: 8px solid #e52e71;
            transform: translateY(-50%);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .carousel-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        .carousel-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 2rem;
            font-weight: 600;
        }

        .carousel-wrapper {
            position: relative;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 30px;
            padding: 30px;
            cursor: grab;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }

        .carousel::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .carousel:active {
            cursor: grabbing;
        }

        .carousel .table {
            flex: 0 0 auto;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            padding: 25px;
            width: 320px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            position: relative;
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .carousel .table:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        /* Navigation buttons */
        .carousel-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #333;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .carousel-nav-btn:hover {
            background: #f0f0f0;
            transform: translateY(-50%) scale(1.05);
        }

        .carousel-nav-btn.prev {
            left: -25px;
        }

        .carousel-nav-btn.next {
            right: -25px;
        }

        .carousel-nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: translateY(-50%);
        }

        .carousel-nav-btn:disabled:hover {
            transform: translateY(-50%);
            background: white;
        }

        .price-section {
            margin-bottom: 20px;
            text-align: center;
        }

        .price-area {
            display: inline-block;
            position: relative;
        }

        .inner-area {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text {
            font-size: 1.2rem;
            margin-right: 5px;
            color: #555;
        }

        .price {
            font-size: 2.2rem;
            font-weight: 700;
            color: #333;
        }

        .package-name {
            text-align: center;
            margin-bottom: 20px;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .package-name h3 {
            color: #333;
            font-size: 1.5rem;
            margin: 0;
            padding: 0 10px;
            word-break: break-word;
        }

        ul.features {
            padding-left: 0;
            list-style: none;
            margin-bottom: 30px;
            min-height: 200px;
            max-height: 300px;
            overflow-y: auto;
        }

        ul.features li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
            flex-wrap: wrap;
        }

        .list-name {
            color: #555;
            font-size: 0.95rem;
            flex: 1;
            width: 100%;
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            padding-right: 10px;
            word-break: break-word;
        }

        .btn {
            text-align: center;
        }

        .btn button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn button:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .package-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Sahabat Kecantikan</a>
        <div class="navbar-nav">
            <a href="Home2.php">Home</a>
            <a href="konsultasi1.php">Konsultasi</a>
            <a href="paket.php">Paket perawatan</a>
        </div>
        <div class="navbar-login">
            <a href="../index.php">Logout</a>
        </div>
    </nav>
  
    <div class="carousel-container"> 
        <div class="carousel-wrapper">
            <!-- Tombol navigasi yang disederhanakan -->
            <button class="carousel-nav-btn prev" id="prevBtn" aria-label="Previous">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="carousel" id="carousel">
                <?php
                // Koneksi ke database
                include '../koneksi/koneksi.php';

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                function formatRupiah($angka) {
                    return "Rp. " . number_format($angka, 0, ',', '.');
                }

                // Query untuk mengambil data paket perawatan
                $sql = "SELECT * FROM isipaket";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        $count++;
                        // Hanya tampilkan badge "Recommended" pada paket pertama
                        $isRecommended = ($count === 1) ? '<div class="recommended-badge">Recommended</div>' : '';
                        echo "
                        <div class='table'>
                            $isRecommended
                            <img src='../uploads/{$row['image']}' alt='Gambar Paket' class='package-image'>
                            <div class='price-section'>
                                <div class='price-area'>
                                    <div class='inner-area'>
                                        <span style='font-size: 1rem; margin-right: 5px;color: #333;'>Rp.</span><span class='price'>". number_format($row['price'], 0, ',', '.') ."</span>
                                    </div>
                                </div>
                            </div>
                            <div class='package-name'><h3>{$row['name']}</h3></div>
                            <ul class='features'>";
                        // Pecah fitur berdasarkan baris baru dan tampilkan
                    $features = explode("\n", $row['features']);
            foreach ($features as $feature) {
             $trimmedFeature = trim($feature);
            if (!empty($trimmedFeature)) {
            echo "
            <li>
                <span class='list-name'>".htmlspecialchars($trimmedFeature)."</span>
                <span class='icon check'><i class='fas fa-check'></i></span>
            </li>";
                 }
            }
            echo "</ul>
                            <div class='btn'><button onclick=\"window.location.href='pembayaran.php?id={$row['id']}'\">Pesan</button></div>
                        </div>";
                    }
                } else {
                    echo "<p class='no-data-message'>Tidak ada data paket perawatan yang tersedia.</p>";
                }

                $conn->close();
                ?>
            </div>
            
            <button class="carousel-nav-btn next" id="nextBtn" aria-label="Next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            // Atur scroll smooth
            const scrollAmount = 350;
            
            // Fungsi untuk mengecek posisi scroll dan mengupdate status tombol
            function updateNavButtons() {
                prevBtn.disabled = carousel.scrollLeft <= 0;
                nextBtn.disabled = carousel.scrollLeft >= (carousel.scrollWidth - carousel.clientWidth);
            }
            
            // Inisialisasi status tombol
            updateNavButtons();
            
            // Navigation buttons
            prevBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            
            nextBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
            
            // Update tombol saat scroll
            carousel.addEventListener('scroll', updateNavButtons);
            
            // Fungsi untuk menggulirkan carousel saat scroll mouse
            let isDown = false;
            let startX;
            let scrollLeft;
            
            carousel.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - carousel.offsetLeft;
                scrollLeft = carousel.scrollLeft;
                carousel.style.cursor = 'grabbing';
            });
            
            carousel.addEventListener('mouseleave', () => {
                isDown = false;
                carousel.style.cursor = 'grab';
            });
            
            carousel.addEventListener('mouseup', () => {
                isDown = false;
                carousel.style.cursor = 'grab';
            });
            
            carousel.addEventListener('mousemove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.pageX - carousel.offsetLeft;
                const walk = (x - startX) * 2; // Scroll cepat
                carousel.scrollLeft = scrollLeft - walk;
            });
            
            // Touch support untuk mobile
            carousel.addEventListener('touchstart', (e) => {
                isDown = true;
                startX = e.touches[0].pageX - carousel.offsetLeft;
                scrollLeft = carousel.scrollLeft;
            }, {passive: true});
            
            carousel.addEventListener('touchend', () => {
                isDown = false;
            }, {passive: true});
            
            carousel.addEventListener('touchmove', (e) => {
                if(!isDown) return;
                const x = e.touches[0].pageX - carousel.offsetLeft;
                const walk = (x - startX) * 2;
                carousel.scrollLeft = scrollLeft - walk;
            }, {passive: false});
        });
    </script>
</body>
</html>