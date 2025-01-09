<?php
// tambah.php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $features = $_POST['features'];
    $rekomendasi = $_POST['rekomendasi'];

    $sql = "INSERT INTO isipaket (name, price, features, rekomendasi) VALUES ('$name', '$price', '$features', '$rekomendasi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h2>Tambah Paket</h2>
        <form action="" method="POST">
            <label for="name">Nama Paket</label>
            <input type="text" id="name" name="name" required>

            <label for="price">Harga</label>
            <input type="text" id="price" name="price" required>

            <label for="features">Fitur</label>
            <textarea id="features" name="features" required></textarea>

            <label for="rekomendasi">Rekomendasi</label>
            <select id="rekomendasi" name="rekomendasi">
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</body>
</html>