<?php
include '../../koneksi/koneksi.php';

function cleanPrice($price) {
    return preg_replace('/[^0-9]/', '', $price);
}

$id = $_GET['id'];
$sql = "SELECT * FROM isipaket WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = cleanPrice($_POST['price']);
    $features = $_POST['features'];
    $rekomendasi = $_POST['rekomendasi'];
    
    // Handle image upload if a new one is provided
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        
        // Validasi gambar
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        
        if (!in_array($imageFileType, $allowedTypes)) {
            $errors[] = "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        } elseif ($_FILES['image']['size'] > 5000000) {
            $errors[] = "Ukuran file terlalu besar. Maksimal 5MB.";
        } else {
            $uploadDir = '../../uploads/';
            $targetFile = $uploadDir . basename($image);
            
            if (move_uploaded_file($tmpName, $targetFile)) {
                // Delete old image if exists
                if (!empty($row['image']) && file_exists($uploadDir . $row['image'])) {
                    unlink($uploadDir . $row['image']);
                }
                $imageUpdate = ", image = '$image'";
            } else {
                $errors[] = "Gagal mengupload gambar. Silakan coba lagi.";
            }
        }
    } else {
        $imageUpdate = "";
    }
    
    // Validasi
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Nama paket harus diisi";
    }
    
    if (!is_numeric($price)) {
        $errors[] = "Harga harus berupa angka";
    } elseif ($price <= 0) {
        $errors[] = "Harga harus lebih besar dari 0";
    }
    
    if (empty($features)) {
        $errors[] = "Fitur paket harus diisi";
    }
    
    if (empty($rekomendasi)) {
        $errors[] = "Rekomendasi harus dipilih";
    }
    
    // Jika tidak ada error, proses data
    if (empty($errors)) {
        $sql = "UPDATE isipaket SET 
                name = '$name', 
                price = '$price', 
                features = '$features', 
                rekomendasi = '$rekomendasi'
                $imageUpdate
                WHERE id = $id";
        
        $stmt = $conn->prepare($sql);
        
        if ($conn->query($sql)) {
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Database error: " . $conn->error;
        }
    }
    
    if (!empty($errors)) {
        $error = implode("<br>", $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --success: #4cc9f0;
            --danger: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .content {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: var(--primary);
            font-weight: 600;
        }

        .alert {
            padding: 12px 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border-left: 4px solid #f87171;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
        }

        input[type="text"],
        textarea,
        select {
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: var(--transition);
            width: 100%;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .file-input {
            position: relative;
        }

        .file-input input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
        }

        .file-input label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 1px dashed #d1d5db;
            border-radius: var(--border-radius);
            background-color: #f9fafb;
            cursor: pointer;
            transition: var(--transition);
        }

        .file-input label:hover {
            border-color: var(--primary);
            background-color: #f0f4ff;
        }

        .file-input .file-name {
            margin-left: 10px;
            font-size: 13px;
            color: #6b7280;
        }

        .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 12px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 10px;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .price-container {
            position: relative;
        }

        .price-container::before {
            content: 'Rp';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 14px;
        }

        #price {
            padding-left: 45px;
        }

        .current-image {
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .current-image img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }

        .current-image span {
            font-size: 13px;
            color: #6b7280;
        }

        @media (max-width: 640px) {
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Edit Paket</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Paket</label>
                <input type="text" id="name" name="name" required 
                       value="<?php echo htmlspecialchars($row['name']); ?>" 
                       placeholder="Masukkan nama paket">
            </div>
            
            <div class="form-group">
                <label for="price">Harga</label>
                <div class="price-container">
                    <input type="text" id="price" name="price" required 
                           value="<?php echo number_format($row['price'], 0, ',', '.'); ?>"
                           oninput="formatCurrency(this)" placeholder="Masukkan harga">
                </div>
            </div>
            
            <div class="form-group">
                <label for="features">Fitur (Pisahkan dengan baris baru/enter)</label>
                <textarea id="features" name="features" required 
                          placeholder="Masukkan fitur-fitur paket, setiap fitur dipisahkan dengan enter"><?php echo htmlspecialchars($row['features']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="rekomendasi">Rekomendasi</label>
                <select id="rekomendasi" name="rekomendasi" required>
                    <option value="Ya" <?php echo $row['rekomendasi'] === 'Ya' ? 'selected' : ''; ?>>Ya</option>
                    <option value="Tidak" <?php echo $row['rekomendasi'] === 'Tidak' ? 'selected' : ''; ?>>Tidak</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Upload Gambar Baru (Opsional)</label>
                <div class="file-input">
                    <label for="image">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                        <span class="file-name">Pilih file gambar baru</span>
                    </label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                
                <?php if (!empty($row['image'])): ?>
                <div class="current-image">
                    <img src="../../uploads/<?php echo htmlspecialchars($row['image']); ?>" 
                         alt="Current Image">
                    <span>Gambar saat ini</span>
                </div>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn">Simpan Perubahan</button>
        </form>
    </div>

    <script>
        function formatCurrency(input) {
            let value = input.value.replace(/\D/g, '');
            if(value.length > 0) {
                input.value = parseInt(value, 10).toLocaleString('id-ID');
            }
        }

        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = this.files[0] ? this.files[0].name : 'Pilih file gambar baru';
            document.querySelector('.file-name').textContent = fileName;
        });
    </script>
</body>
</html>