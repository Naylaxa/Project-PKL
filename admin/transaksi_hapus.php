<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tr_cuci_kering WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: transaksi.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID transaksi tidak tersedia.";
}
?>
