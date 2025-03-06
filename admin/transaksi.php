<?php include 'header.php'; ?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    margin: auto;
    overflow: hidden;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    margin-bottom: 20px;
}

.panel {
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
    background-color: #f5f5f5;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.panel-heading h4 {
    margin: 0;
}

.panel-body {
    padding: 15px;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.btn-info:hover {
    background-color: #31b0d5;
    border-color: #269abc;
}

.title {
    margin-bottom: 20px;
}

.title h2 {
    margin: 0;
    font-size: 24px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

.label-proses, .label-dicuci, .label-selesai {
    display: inline-block;
    padding: 4px 8px;
    font-size: 12px;
    border-radius: 4px;
    color: #fff;
}

.label-proses {
    background-color: #f0ad4e;
}

.label-dicuci {
    background-color: #5bc0de;
}

.label-selesai {
    background-color: #5cb85c;
}

.harga {
    font-weight: bold;
}

.opsi a {
    color: #337ab7;
    text-decoration: none;
}

.opsi a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 10px;
    }

    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}

</style>
<div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h4>Data Transaksi Laundry</h4>
            </div>
            <div class="panel-body">
                <a href="transaksi_tambah.php" class="btn btn-sm btn-info pull-right">Transaksi Baru</a>
                <br><br>
                <div class="title">
            <h2>Cek Order - Cuci Kering</h2>
        </div>
        <br><br>
        <table border="1">
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
                <th>OPSI</th>
            </tr>
            <?php
                $query = "SELECT * FROM tr_cuci_kering;
                ";

                $data = mysqli_query($koneksi, $query);
                if (!$data) {
                    die("Query Error: " . mysqli_error($koneksi));
                }

                $no = 1;
                while ($d = mysqli_fetch_array($data)) { ?>
            <tr>
                <td><h4><?php echo $no++; ?></h4></td>
                <td><?php echo $d['tgl_masuk']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
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
                <td><?php echo $d['waktu']; ?> Jam</td>
                <td><?php echo $d['berat']; ?></td>
                <td><?php echo $d['tgl_keluar']; ?></td>
                <td class="harga"><?php echo "Rp. " . number_format($d['total_bayar']) . " ,-"; ?></td>
                <td>
                    <?php
                        if ($d['status'] == "0") {
                            echo "<div class='label-proses'>PROSES</div>";
                        } else if ($d['status'] == "1") {
                            echo "<div class='label-dicuci'>DICUCI</div>";
                        } else if ($d['status'] == "2") {
                            echo "<div class='label-selesai'>SELESAI</div>";
                        }
                    ?>
                </td>
                <td class="opsi">
                    <!-- <a href="bahan/cuci_kering/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a> -->
                    <a href="transaksi_edit.php?id=<?php echo $d['id']; ?>">Edit</a> || <a href="transaksi_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php
                } ?>
        </table>
        <br><br><br><br>
        <div class="title">
            <h2>Cek Order - Cuci Komplit</h2>
        </div>
        <br><br>
        <table border="1">
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
                <th>OPSI</th>
            </tr>
            <?php
                // Query untuk mengambil data transaksi hanya untuk pengguna yang sedang login
                $data = mysqli_query($koneksi,"SELECT * FROM tr_cuci_komplit;
                ");
                $no = 1;
                while($d = mysqli_fetch_array($data)) { ?>
            <tr>
                <td><h4><?php echo $no++; ?></h4></td>
                <td><?php echo $d['tgl_masuk']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <!-- <td><?php echo $d['paket_id']; ?></td> -->
                <td>
                <?php
                        if($d['paket_id'] == "1"){
                            echo "<div class='label-proses'>Cuci Komplit Reguler</div>";
                        } else if($d['paket_id'] == "2"){
                            echo "<div class='label-dicuci'>Cuci Komplit Kilat</div>";
                        } else if($d['paket_id'] == "3"){
                            echo "<div class='label-selesai'>Cuci Komplit Express</div>";
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
                <td class="opsi">
                    <!-- <a href="bahan/cuci_komplit/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a> -->
                    <a href="tr_ck_edit.php?id=<?php echo $d['id']; ?>">Edit</a> || <a href="tr_ck_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php
                } ?>
        </table>
        <br><br><br><br>
        <div class="title">
            <h2>Cek Order - Cuci Satuan</h2>
        </div>
        <br><br>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Paket</th>
                <th>Waktu Kerja</th>
                <th>Jumlah</th>
                <th>tgl. Selesai</th>
                <th>Harga</th>
                <th>Status</th>
                <th>OPSI</th>
            </tr>
            <?php
                $query = "SELECT * FROM tr_cuci_satuan;
                ";

                $data = mysqli_query($koneksi, $query);
                if (!$data) {
                    die("Query Error: " . mysqli_error($koneksi));
                }

                $no = 1;
                while ($d = mysqli_fetch_array($data)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tgl_masuk']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <!-- <td><?php echo $d['paket_id']; ?></td> -->
                <td>
                <?php
                        if($d['paket_id'] == "1"){
                            echo "<div class='label-selesai'>Jaket Kulit</div>";
                        } else if($d['paket_id'] == "2"){
                            echo "<div class='label-selesai'>Jaket Non Kulit</div>";
                        } else if($d['paket_id'] == "3"){
                            echo "<div class='label-selesai'>Boneka Kecil</div>";
                        }else if($d['paket_id'] == "4"){
                            echo "<div class='label-selesai'>Boneka Sedang</div>";
                        }else if($d['paket_id'] == "5"){
                            echo "<div class='label-selesai'>Boneka Besar</div>";
                        }else if($d['paket_id'] == "6"){
                            echo "<div class='label-selesai'>Sejadah</div>";
                        }else if($d['paket_id'] == "7"){
                            echo "<div class='label-selesai'>Selimut</div>";
                        }
                    ?>
                </td>
                <td><?php echo $d['waktu']; ?> Jam</td>
                <td><?php echo $d['jumlah']; ?></td>
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
                <td class="opsi">
                    <!-- <a href="bahan/cuci_satuan/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a> -->
                    <a href="tr_cs_edit.php?id=<?php echo $d['id']; ?>">Edit</a> || <a href="tr_cs_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php
                } ?>
        </table>
            </div>
        </div>
</div>
<?php include 'footer.php'; ?>
