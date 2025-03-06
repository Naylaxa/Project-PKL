<?php
include "../asset/koneksi.php";

$id = $_POST['id'];
$username = $_POST['username'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$berat = $_POST['jumlah'];
$paket_id = $_POST['paket_id'];
$status = $_POST['status'];

// Mengambil tarif dan waktu dari database berdasarkan paket yang dipilih
$query_paket = mysqli_query($koneksi, "SELECT tarif, waktu FROM cuci_satuan WHERE id = $paket_id");
if (!$query_paket) {
    die("Query paket gagal: " . mysqli_error($koneksi));
}
$row_paket = mysqli_fetch_assoc($query_paket);
if (!$row_paket) {
    echo "<script>alert('Paket tidak valid!'); window.location.href='tr_cs_edit.php?id=$id';</script>";
    exit();
}
$tarif = $row_paket['tarif'];
$waktu = $row_paket['waktu'];
$harga = $berat * $tarif;

// Hitung tanggal keluar berdasarkan waktu kerja (waktu dalam jam)
$tgl_masuk = $data['tgl_masuk'];
$tgl_keluar = date('Y-m-d H:i:s', strtotime("$tgl_masuk + $waktu hours"));
$total_bayar = $harga;

// Menyimpan data transaksi ke dalam database
$query_update = "UPDATE tr_cuci_satuan SET nama='$username', no_hp='$no_hp', alamat='$alamat', paket_id='$paket_id', waktu='$waktu', jumlah='$berat', tarif='$tarif', tgl_keluar='$tgl_keluar', total_bayar='$total_bayar', status='$status' WHERE id='$id'";
if (!mysqli_query($koneksi, $query_update)) {
    die("Query update gagal: " . mysqli_error($koneksi));
}

echo "<script>alert('Data transaksi berhasil diupdate!'); window.location.href='transaksi.php';</script>";
?>
