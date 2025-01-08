<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="wrapper">
      <form action="masuk.php" method="POST">
        <h1>Masuk</h1>
        <div class="input-box">
          <input type="text" name="username" placeholder="username" required />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input
            type="password"
            name="password"
            placeholder="password"
            required
          />
          <i class="bx bxs-lock-alt"></i>
        </div>

        <a href="Home2.html">
          <button type="submit" name="masuk" class="btn">Login</button>
        </a>

        <div class="register-link">
          <p>Don't have an account ? <a href="daftar.html">Register</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
<?php 
require 'koneksi.php';
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM tbl_users
        WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: index.html");
} else {
    echo "
    <div id='message' style='position:fixed; top:10px; left:50%; transform:translateX(-50%); background-color: 
rgb(207, 27, 27); color: white; padding: 10px 20px; border-radius: 5px; z-index: 1000;'>
        Username atau password anda salah. silahkan coba login ulang. 
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
            window.location.href = 'masuk.html';
        }, 2500); // Menghilang setelah 3 detik
    </script>
    ";
    
}
?>