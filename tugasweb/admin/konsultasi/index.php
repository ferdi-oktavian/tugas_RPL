<?php
include '../sidebar.php'; // Sidebar admin
include '../../koneksi/koneksi.php'; // Koneksi ke database

// Ambil data dari tabel konsultasi
$sql = "SELECT * FROM konsultasi"; // Ubah 'konsultasi' sesuai dengan nama tabel Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Konsultasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="content">
        <h2>Data Konsultasi</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Kontak</th>
                    <th>Alamat</th>
                    <th>Keluhan</th>
                    <th>Spesialis</th>
                    <th>Dokter</th>
                    <th>Tanggal Pengunjungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php
    if ($result->num_rows > 0) {
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['complaint']) . "</td>";
            echo "<td>" . htmlspecialchars($row['specialist']) . "</td>";
            echo "<td>" . htmlspecialchars($row['doctor']) . "</td>";
            echo "<td>" . htmlspecialchars($row['visit_date']) . "</td>";
            echo "<td>
                <a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='11'>Tidak ada data konsultasi ditemukan</td></tr>";
    }
    ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
