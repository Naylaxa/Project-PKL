<?php include 'header.php'; ?>
<style>
    /* Styles for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    vertical-align: middle;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Custom labels for package types */
.label-proses {
    background-color: #ffc107;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    display: inline-block;
}

.label-dicuci {
    background-color: #17a2b8;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    display: inline-block;
}

.label-selesai {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    display: inline-block;
}

/* Custom price formatting */
.harga {
    font-weight: bold;
    color: #333;
}

/* Custom styles for action button */
.opso a.btn {
    display: inline-block;
    padding: 5px 10px;
    color: #007bff;
    text-decoration: none;
    border-radius: 3px;
    border: 1px solid #007bff;
    background-color: transparent;
}

.opso a.btn img {
    vertical-align: middle;
}

.opso a.btn:hover {
    background-color: #007bff;
    color: white;
}

/* Responsive styles */
@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    table th, table td {
        white-space: nowrap;
    }
}

</style>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>
        <div class="panel-body">

            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <br/>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <br/>
                            <input type="date" name="tgl_sampai" class="form-control">
                            <br/>
                        </td>
                        <td>
                            <br/>
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>

                </table>
            </form>

        </div>
    </div>
    <br/>
    <?php
    if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
        ?>
        <div class="panel">
            <div class="panel-heading">
                <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="panel-body">
                <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
                <br/>
                <br/>
                <table>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Paket</th>
                <th>Waktu Kerja</th>
                <th>Berat (Kg)</th>
                <th>tgl. Selesai</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
            <?php
                // Query untuk mengambil data transaksi hanya untuk pengguna yang sedang login
$user_id = $_SESSION['user_id'];
                $data = mysqli_query($koneksi, "SELECT * FROM tr_cuci_kering");
                $no = 1;
                while($d = mysqli_fetch_array($data)) { ?>
            <tr>
                <td><h4><?php echo $no++; ?></h4></td>
                <td><?php echo $d['tgl_masuk']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td>
                <?php
                        if($d['paket_id'] == "1"){
                            echo "<div class='label-proses'>Cuci Kering Reguler</div>";
                        } else if($d['paket_id'] == "2"){
                            echo "<div class='label-dicuci'>Cuci Kering Kilat</div>";
                        } else if($d['paket_id'] == "3"){
                            echo "<div class='label-selesai'>Cuci Kering Express</div>";
                        }
                    ?>
                </td>
                <td><?php echo $d['waktu']; ?> Jam</td>
                <td><?php echo $d['berat']; ?></td>
                <td><?php echo $d['tgl_keluar']; ?></td>
                <td class="harga"><?php echo "Rp. " . number_format($d['total_bayar']) . " ,-"; ?></td>
                <td>
                    <?php
                        if($d['status'] == "0"){
                            echo "<div class='label-proses'>PROSES</div>";
                        } else if($d['status'] == "1"){
                            echo "<div class='label-dicuci'>DICUCI</div>";
                        } else if($d['status'] == "2"){
                            echo "<div class='label-selesai'>SELESAI</div>";
                        }
                    ?>
                </td>
            </tr>
            <?php
                } ?>
        </table>
            </div>
        </div>
        <?php } ?>
</div>
<?php include 'footer.php'; ?>
