<?php
require 'koneksi.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tbl_users (email, username, password)
            VALUES ('$email', '$username', '$password')";

if (mysqli_query($conn, $query_sql)) {
    echo "
    <div id='message' style='position:fixed; top:10px; left:50%; transform:translateX(-50%); background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; z-index: 1000;'>
        Data berhasil disimpan
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
            window.location.href = 'daftar.html';
        }, 1000); // Menghilang setelah 3 detik
    </script>
    ";
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
?>