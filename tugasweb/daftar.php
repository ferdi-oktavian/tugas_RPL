<?php
include('koneksi/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $role = 'user'; // Role default untuk register

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // Username sudah ada
        $error_message = "Username sudah digunakan. Silakan pilih username lain.";
    } else {
        // Tambahkan user ke database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
        
        if ($stmt->execute()) {
            header("Location: masuk.php");
            exit();
        } else {
            $error_message = "Terjadi kesalahan saat mendaftarkan akun. Silakan coba lagi.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Daftar</h1>
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="email" autocomplete="off" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>have an account ? <a href="masuk.php">Login</a></p>
            </div>
        </form>
    </div>    
</body>
</html>
