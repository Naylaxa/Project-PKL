<?php
    $koneksi = mysqli_connect("localhost", "root", "", "laundry");
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    } 

$host = 'localhost'; // atau nama host lain yang Anda gunakan
$db = 'laundry'; // nama database Anda
$user = 'root'; // username database Anda
$pass = ''; // password database Anda, kosong jika default

try {
    // Membuat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Mengatur mode error PDO ke exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
