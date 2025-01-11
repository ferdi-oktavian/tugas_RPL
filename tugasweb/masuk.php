<?php
session_start();
include('koneksi/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data user
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Validasi jika user ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin/artikel/index.php");
            } else {
                header("Location: user/Home2.php");
            }
            exit();
        } else {
            $error_message = "Username atau password salah.";
        }
    } else {
        $error_message = "Username atau password salah.";
    }
    $stmt->close();
    $conn->close();
}
?>
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
      <form action="" method="POST">
        <h1>Masuk</h1>
        <?php if (!empty($error_message)): ?>
          <div class="error-message">
            <p><?php echo $error_message; ?></p>
          </div>
        <?php endif; ?>
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
        <button type="submit" name="masuk" class="btn">Login</button>
        <div class="register-link">
          <p>Belum Punya Akun? <a href="daftar.php">Daftar Disini!</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
