<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
require '../koneksi/koneksi.php';
// Proses penyimpanan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $complaint = $conn->real_escape_string($_POST['complaint']);
    $specialist = $conn->real_escape_string($_POST['specialist']);
    $doctor = $conn->real_escape_string($_POST['doctor']);
    $visit_date = $conn->real_escape_string($_POST['visit_date']);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO konsultasi (name, email, gender, phone, address, complaint, specialist, doctor, visit_date)
            VALUES ('$name', '$email', '$gender', '$phone', '$address', '$complaint', '$specialist', '$doctor', '$visit_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Formulir berhasil disimpan! Anda akan segera diarahkan ke halaman selesai.</p>";
        header("Location: selesai.php"); // Redirect ke halaman selesai
        exit();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
?>