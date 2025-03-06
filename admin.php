<?php
session_start();

// Tentukan username admin
$admin_username = 'admin';

// Periksa apakah pengguna adalah admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== $admin_username) {
    // Jika pengguna bukan admin, redirect ke halaman lain atau tampilkan pesan kesalahan
    header("Location: user.php");
    exit;
}

// Halaman admin
echo "Selamat datang, " . $_SESSION['username'] . "! Anda sekarang berada di halaman admin.";
?>