<?php
    include '../asset/koneksi.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/invoice.css">
</head>
<body>
    <?php include 'asset/header.php';?>
    <div class="in">
    <?php
            $id = $_GET['id'];
            $transaksi = mysqli_query($koneksi,"select * from transaksi,users where transaksi_id='$id' and transaksi_pelanggan=id");
            while($t=mysqli_fetch_array($transaksi)){
                ?>
        <div class="container">
            <div class="box">
                <div class="hd">
                    <h1>Invoice - <?php echo $t['transaksi_id']; ?></h1>
                    <div class="status">
                        <?php
                            if($t['transaksi_status']=="0"){
                                echo "<div class='label'><h2 class='proses'>PROSES</h2></div>";
                            }else if($t['transaksi_status']=="1"){
                                echo "<div class='label'><h2 class='dicuci'>DI CUCI</h2></div>";
                            }else if($t['transaksi_status']=="2"){
                                echo "<div class='label'><h2 class='selesai'>SELESAI</h2></div>";
                            }
                            ?>
                            <div class="cetak">
                                <a href="ts_cetak.php?id=<?php echo $id; ?>"><div class="imgf"><img src="img/printer.png" width="30px" alt=""></div></a>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="data">
                    <div class="dt">
                        <h3>Pelanggan,</h3>
                        <p><?php echo $t['username']; ?></p>
                    </div>
                    <div class="dt">
                        <h3>Date,</h3>
                        <p>Tgl Mulai. <?php echo $t['transaksi_tgl']; ?></p>
                        <p>Tgl Selesai. <?php echo $t['transaksi_tgl_selesai']; ?></p>
                    </div>
                    <div class="dt">
                        <h3>Berat,</h3>
                        <h1><?php echo $t['transaksi_berat']; ?> kg</h1>
                    </div>
                    <div class="dt">
                        <h3>Harga,</h3>
                        <h1><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></h1>
                    </div>
                </div>
                <div class="tbl">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pakaian</th>
                            <th>Jumlah</th>
                        </tr>
                        <?php
                            $id = $t['transaksi_id'];
                            $pakaian = mysqli_query($koneksi,"select * from pakaian where pakaian_transaksi='$id'");

                            while($p=mysqli_fetch_array($pakaian)){
                            ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $p['pakaian_jenis']; ?></td>
                            <td><?php echo $p['pakaian_jumlah']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php } ?>
                    <div class="foot">
                        <h3>*SALAM BERSIH, SALAM SEHAT*</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'asset/footer.php';?>
    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>
</html>