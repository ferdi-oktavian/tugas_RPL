<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika user belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../masuk.php");
    exit();
}

// Cek akses berdasarkan role
$currentFolder = basename(dirname($_SERVER['PHP_SELF']));

if ($currentFolder === 'admin' && $_SESSION['role'] !== 'admin') {
    // Jika user bukan admin tapi mencoba masuk ke folder admin
    header("Location: admin/arikel/index.php");
    exit();
} elseif ($currentFolder === 'user' && $_SESSION['role'] !== 'user') {
    // Jika admin mencoba masuk ke folder user
    header("Location: index.php");
    exit();
}
?>
