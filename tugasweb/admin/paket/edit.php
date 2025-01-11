<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM isipaket WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $features = $_POST['features'];
    $rekomendasi = $_POST['rekomendasi'];

    $sql = "UPDATE isipaket SET name = '$name', price = '$price', features = '$features', rekomendasi = '$rekomendasi' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
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
    <title>Edit Paket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h2>Edit Paket</h2>
        <form action="" method="POST">
            <label for="name">Nama Paket</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>

            <label for="price">Harga</label>
            <input type="text" id="price" name="price" value="<?= $row['price'] ?>" required>

            <label for="features">Fitur</label>
            <textarea id="features" name="features" required><?= $row['features'] ?></textarea>

            <label for="rekomendasi">Rekomendasi</label>
            <select id="rekomendasi" name="rekomendasi">
                <option value="Ya" <?= $row['rekomendasi'] === 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $row['rekomendasi'] === 'Tidak' ? 'selected' : '' ?>>Tidak</option>
            </select>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>
