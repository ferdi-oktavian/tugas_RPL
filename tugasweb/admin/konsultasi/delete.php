<?php
include '../../koneksi/koneksi.php'; // Koneksi ke database

// Periksa apakah parameter ID telah dikirim
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengamankan ID dengan mengubahnya menjadi integer

    // Query untuk menghapus data
    $sql = "DELETE FROM konsultasi WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data: {$stmt->error}');
            window.location.href = 'index.php';
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('ID tidak ditemukan!');
        window.location.href = 'index.php';
    </script>";
}

$conn->close();
?>
