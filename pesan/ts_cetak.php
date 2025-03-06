<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cetak.css">
</head>
<body>
    <?php
    include '../asset/koneksi.php';
    ?>
    <div class="page" size="A4">
    <?php
        $id = $_GET['id'];
        $transaksi = mysqli_query($koneksi,"select * from transaksi,users where transaksi_id='$id' and transaksi_pelanggan=id");
        while($t=mysqli_fetch_array($transaksi)){
    ?>
        <div class="header">
            <div class="logo">
                <h1>TOP</h1>
                <h4>Laundry</h4>
            </div>
            <div class="inv">
                <h1>Invoice - <?php echo $t['transaksi_id']; ?></h1>
                <p>Tgl. <?php echo $t['transaksi_tgl']; ?></p>
            </div>
        </div>
        <hr>
        <div class="data-cust">
            <div class="cust">
                <div class="data">
                    <h3>Customer,</h3>
                    <h1><?php echo $t['username']; ?></h1>
                </div>
            </div>
            <div class="info">
                <div class="data">
                    <h3>Metode,</h3>
                    <h1>Cuci Kering</h1>
                </div>
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
                        $no = 1;
                        $id = $t['transaksi_id'];
                        $pakaian = mysqli_query($koneksi,"select * from pakaian where pakaian_transaksi='$id'");
        
                        while($p=mysqli_fetch_array($pakaian)){
                    ?>
                                
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $p['pakaian_jenis']; ?></td>
                    <td><?php echo $p['pakaian_jumlah']; ?></td>>
                </tr>
                <?php } ?>
                <div class="total">
                    <div class="ket">
                        <div class="txt">
                            <h3>Berat</h3>
                        </div>
                        <div class="nilai">
                            <h3><?php echo $t['transaksi_berat']; ?> kg</h3>
                        </div>
                    </div>
                    <div class="ket">
                        <div class="txt">
                            <h3>Grand Total</h3>
                        </div>
                        <div class="nilai">
                            <h3><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></h3>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </table>
        </div>
        <div class="foot">
            <h3>*SALAM BERSIH, SALAM SEHAT*</h3>
        </div>
    </div>
    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>
</html>