<?php
include('koneksi/koneksi.php');

$username = 'ferdy';
$password = password_hash('ferdy123', PASSWORD_DEFAULT);
$role = 'admin';

$stmt = $conn->prepare("INSERT INTO users (username, password, role, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
$stmt->bind_param("sss", $username, $password, $role);

if ($stmt->execute()) {
    echo "Admin berhasil dibuat.";
    header("location : masuk.php");
} else {
    echo "Gagal membuat admin: " . $conn->error;
}

$stmt->close();
$conn->close();
?>