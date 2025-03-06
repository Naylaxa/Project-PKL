<?php include 'header.php'; ?>

<?php
include 'koneksi.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    echo "<script> alert('Anda harus login terlebih dahulu sebelum mengakses halaman ini!');
    window.location.href='../index.php';</script>";
    exit();
}
    

// Ambil ID pengguna yang sedang login dari sesi
$user_id = $_SESSION['user_id'];
?>

<link rel="stylesheet" href="../.asset/css/style1.css" />
<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px">SELAMAT DATANG DI <b>TOP LAUNDRY</b></h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi,"select * from users_");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah User
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-retweet"></i>
                                <span class="pull-right">

                                    <?php
                                    $proses = mysqli_query($koneksi,"select * from tr_cuci_kering where status='0'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Di Proses
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-info-sign"></i>
                                <span class="pull-right">

                                    <?php
                                    $proses = mysqli_query($koneksi,"select * from tr_cuci_kering where status='1'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Siap Ambil
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">

                                    <?php
                                    $proses = mysqli_query($koneksi,"select * from tr_cuci_kering where status='2'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Selesai
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

