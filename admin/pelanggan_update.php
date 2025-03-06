<?php
include 'koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
mysqli_query($koneksi, "UPDATE users_ SET username='$username', password='$password', role='$role' WHERE id='$id'");
echo "<script> alert('User berhasil diedit!');
window.location.href='pelanggan.php';</script>";
?>
