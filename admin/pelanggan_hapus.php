<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from users_ where id='$id'");
echo "<script> alert('User telah dihapus!');
window.location.href='pelanggan.php';</script>";
?>