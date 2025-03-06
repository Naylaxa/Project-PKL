<?php
    include 'asset/koneksi.php';
// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui formulir
    $nama1 = $_POST['nama1'];
    $hp1 = $_POST['hp1'];
    $alamat1 = $_POST['alamat1'];
    $nama2 = $_POST['nama2'];
    $hp2 = $_POST['hp2'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO contact (nama1, hp1, alamat1, nama2, hp2, pesan)
    VALUES ('$nama1', '$hp1', '$alamat1', '$nama2', '$hp2', '$pesan')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script> alert('Data berhasil disimpan dalam database. Terima kasih!');
        window.location.href='index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Menutup koneksi
$conn->close();
?>
