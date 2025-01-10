<?php
include '../sidebar.php';
include '../../koneksi/koneksi.php';

$sql = "SELECT * FROM isipaket";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Paket</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="content">
        <h2>Kelola Paket</h2>
        <a href="tambah.php" class="btn">Tambah Paket</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Fitur</th>
                    <th>Rekomendasi</th>
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
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['features'] . "</td>";
            echo "<td>" . $row['rekomendasi'] . "</td>";
            echo "<td>
                <a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada paket ditemukan</td></tr>";
    }
    ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
