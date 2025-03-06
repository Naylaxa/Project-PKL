<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
mysqli_query($koneksi, "insert into users_ values('', '$username', '$password', '$role')");
echo "<script> alert('User berhasil ditambahkan!');
window.location.href='pelanggan.php';</script>";
?>