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