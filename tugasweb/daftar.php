<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="daftar.php" method="POST">
            <h1>Daftar</h1>
            <div class="input-box">
                <input type="email" name = "email" class="input-field" placeholder="email" autocomplete="off" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" name = "username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name = "password" placeholder="password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <a href = "masuk.html">
            <button type="submit" name = "daftar" class="btn">Register</button>
        </a>

            <div class="register-link">
                <p>have an account ? <a href="masuk.html">Login</a></p>
            </div>
        </form>
    </div>    
</body>
</html>

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