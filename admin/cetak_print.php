<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI FAMILY LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>
    <?php
    // session_start();
    // if($_SESSION['status']!="login"){
    //     header("location:../index.php?pesan=belum_login");
    // }
    ?>

    <?php
    include 'koneksi.php';
    ?>
    <div class="container">

        <center><h2>FAMILY LAUNDRY</h2></center>
        <br/>
        <br/>
        <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){

            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
            ?>
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Paket</th>
                    <th>Pelanggan</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Tarif</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi,"select * from users_,tr_cuci_kering where nama=username and date(tgl_masuk) > '$dari' and date(tgl_keluar) < '$sampai' order by user_id desc");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>INVOICE-<?php echo $d['id']; ?></td>
                        <td><?php echo $d['tgl_masuk']; ?></td>
                        <td>
                <?php
                        if ($d['paket_id'] == "1") {
                            echo "<div class='label-proses'>Cuci Kering Reguler</div>";
                        } else if ($d['paket_id'] == "2") {
                            echo "<div class='label-dicuci'>Cuci Kering Kilat</div>";
                        } else if ($d['paket_id'] == "3") {
                            echo "<div class='label-selesai'>Cuci Kering Express</div>";
                        }
                    ?>
                </td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['no_hp']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['tarif']; ?></td>
                        <td><?php echo $d['berat']; ?></td>
                        <td><?php echo $d['tgl_keluar']; ?></td>
                        <td><?php echo "Rp. ".number_format($d['total_bayar']) ." ,-"; ?></td>
                        <td>
                            <?php
                            if($d['status']=="0"){
                                echo "<div class='label label-warning'>PROSES</div>";
                            }else if($d['status']=="1"){
                                echo "<div class='label label-info'>DICUCI</div>";
                            }else if($d['status']=="2"){
                                echo "<div class='label label-success'>SELESAI</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php } ?>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
    </html>
