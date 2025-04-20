<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }
        
        .payment-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .payment-header h1 {
            color: #28a745;
            margin-bottom: 10px;
        }
        
        .payment-details {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .package-info, .payment-methods {
            flex: 1;
            min-width: 300px;
        }
        
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .info-box h3 {
            margin-top: 0;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .info-item strong {
            color: #555;
        }
        
        .payment-methods .method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .payment-methods .method:hover {
            border-color: #28a745;
            background: #f1f9f1;
        }
        
        .payment-methods .method.selected {
            border-color: #28a745;
            background: #f1f9f1;
        }
        
        .payment-methods .method img {
            width: 50px;
            margin-right: 15px;
        }
        
        .btn-confirm {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 25px;
            font-size: 1rem;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .btn-confirm:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Navbar (same as before) -->
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
    
    <div class="payment-container">
        <div class="payment-header">
            <h1>Pembayaran</h1>
            <p>Lengkapi proses pembayaran untuk memesan paket perawatan</p>
        </div>
        
        <?php
        include '../koneksi/koneksi.php';
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM isipaket WHERE id = $id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '
                <div class="payment-details">
                    <div class="package-info">
                        <div class="info-box">
                            <h3>Detail Paket</h3>
                            <div class="info-item">
                                <span>Nama Paket:</span>
                                <strong>'.$row['name'].'</strong>
                            </div>
                            <div class="info-item">
                                <span>Harga:</span>
                                <strong>Rp '.number_format($row['price'], 0, ',', '.').'</strong>
                            </div>
                        </div>
                        
                        <div class="info-box">
                            <h3>Fitur Paket</h3>';
                            
                            $features = explode(',', $row['features']);
                            foreach ($features as $feature) {
                                echo '<div class="info-item">
                                    <span><i class="fas fa-check" style="color:#28a745; margin-right:5px;"></i> '.trim($feature).'</span>
                                </div>';
                            }
                            
                        echo '</div>
                    </div>
                    
                    <div class="payment-methods">
                        <h3>Metode Pembayaran</h3>
                        <div class="method selected">
                            <img src="bank.png" alt="Bank Transfer">
                            <div>
                                <h4>Transfer Bank</h4>
                                <p>BCA, Mandiri, BRI, BNI</p>
                            </div>
                        </div>
                        <div class="method">
                            <img src="emoneey.jpg" alt="E-Wallet">
                            <div>
                                <h4>E-Wallet</h4>
                                <p>OVO, Gopay, Dana, LinkAja</p>
                            </div>
                        </div>
                        <div class="method">
                            <img src="qris.jpg" alt="QRIS">
                            <div>
                                <h4>QRIS</h4>
                                <p>Bayar dengan QR Code</p>
                            </div>
                        </div>
                        
                        <button class="btn-confirm">Konfirmasi Pembayaran</button>
                    </div>
                </div>';
            } else {
                echo '<p>Paket tidak ditemukan</p>';
            }
        } else {
            echo '<p>ID Paket tidak valid</p>';
        }
        
        $conn->close();
        ?>
    </div>
    
    <script>
        // Select payment method
        const methods = document.querySelectorAll('.method');
        methods.forEach(method => {
            method.addEventListener('click', () => {
                methods.forEach(m => m.classList.remove('selected'));
                method.classList.add('selected');
            });
        });
        
        // Confirm payment button
        document.querySelector('.btn-confirm').addEventListener('click', () => {
            alert('Pembayaran berhasil diproses! Kami akan mengirimkan detail pembayaran ke email Anda.');
            window.location.href = 'Home2.php';
        });
    </script>
</body>
</html>