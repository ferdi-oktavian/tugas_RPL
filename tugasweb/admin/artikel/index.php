<?php
include '../sidebar.php';
include '../../koneksi/koneksi.php';

// Ambil data dari tabel images
$sql = "SELECT * FROM images";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Artikel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="content">
        <h2>Kelola Artikel</h2>
        <a href="tambah.php" class="btn">Tambah Artikel</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td><img src='../../" . $row['image'] . "' width='100'></td>";
            echo "<td>
                <a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada artikel ditemukan</td></tr>";
    }
    ?>
</tbody>

        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>