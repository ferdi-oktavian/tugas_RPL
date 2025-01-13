<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $url = $_POST['url'];

    // Validasi dan proses file gambar
    $uploadDir = '../../img/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Cek tipe file yang diizinkan
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Simpan path gambar ke database
            $imagePath = 'img/' . basename($_FILES['image']['name']);
            $sql = "INSERT INTO images (name, image, url) VALUES ('$name', '$imagePath', '$url')";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h2>Tambah Artikel</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Judul Artikel</label>
            <input type="text" id="name" name="name" required>
            
            <label for="url">URL Artikel</label>
            <input type="url" id="url" name="url" placeholder="https://contoh.com" required>
            
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" required>
            
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</body>
</html>
