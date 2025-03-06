<?php
include "../asset/koneksi.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script> alert('Anda harus log in untuk mengakses halaman ini!');
    window.location.href='../index.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; // Mengambil ID pengguna yang sedang login
$nama = $_POST['username'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$berat = $_POST['berat'];
$tgl_masuk = date('Y-m-d H:i:s');
$paket_id = $_POST['paket_id'];
$status = 0; // Status default

// Mengambil tarif dan waktu dari database berdasarkan paket yang dipilih
$query_paket = mysqli_query($koneksi, "SELECT tarif, waktu FROM cuci_komplit WHERE id = $paket_id");
if (!$query_paket) {
    die("Query paket gagal: " . mysqli_error($koneksi));
}
$row_paket = mysqli_fetch_assoc($query_paket);
if (!$row_paket) {
    echo "<script>alert('Paket tidak valid!'); window.location.href='tr_ck_tambah.php';</script>";
    exit();
}
$tarif = $row_paket['tarif'];
$waktu = $row_paket['waktu'];
$harga = $berat * $tarif;

// Hitung tanggal keluar berdasarkan waktu kerja (waktu dalam jam:menit:detik)
$tgl_keluar = date('c H:i:s', strtotime("$tgl_masuk + $waktu hours"));
$total_bayar = $harga;

// Menyimpan data transaksi ke dalam database
$query_transaksi = "INSERT INTO tr_cuci_komplit 
                    VALUES ('', '$user_id', '$nama', '$no_hp', '$alamat', '$paket_id', '$waktu', '$berat', '$tarif', '$tgl_masuk', '$tgl_keluar', '$total_bayar', '$status')";
if (!mysqli_query($koneksi, $query_transaksi)) {
    die("Query transaksi gagal: " . mysqli_error($koneksi));
}

// Menutup koneksi database
mysqli_close($koneksi);

// Redirect ke halaman index setelah selesai
header("location:transaksi.php");
exit();
?>
