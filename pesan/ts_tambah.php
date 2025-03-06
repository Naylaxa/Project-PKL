<?php 
include 'asset/header.php';
include '../asset/koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script> alert('Anda harus log in untuk mengakses halaman ini!');
    window.location.href='../index.php';</script>";
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script
        src="https://kit.fontawesome.com/fd3a1b43b6.js"
        crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="css/tambah.css">
    </head>
    <body>

    <div class="box">
    <div class="container">
        <div class="title">
            <h2>Halo <?php echo $username; ?></h2>
        </div>
        <div class="container-tambah">
            <div class="input-tambah">
                <div class="kanan">
                    <div class="jenis">
                        <h2>Jenis Order</h2>
                    </div>
                    <div class="pakaian">
                        <div class="tipe">
                            <a href="bahan/cuci_komplit/index.php" class="paket">
                                <img src="img/komplit.png" alt="cuci komplit" width="140px" height="140px">
                                <h4>Paket Cuci Komplit</h4>
                            </a>
                        </div>
                        <div class="tipe">
                            <a href="bahan/cuci_kering/index.php" class="paket">
                                <img src="img/dry.png" alt="cuci komplit" width="140px" height="140px">
                                <h4>Paket Dry Cleaning</h4>
                            </a>
                        </div>
                        <div class="tipe">
                            <a href="bahan/cuci_satuan/index.php" class="paket">
                                <img src="img/satuan.png" alt="cuci komplit" width="140px" height="140px">
                                <h4>Paket Cuci Satuan</h4>
                            </a>
                        </div>
                    </div>
            </div>
            <!-- <div class="btn">
                <button type="submit" name="submit">Kirim</button>
            </div> -->
        </div>
    </div>
    </div>
    <?php 
include 'asset/footer.php';
?>
    </body>
</html>
