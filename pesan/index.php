<?php 
include 'asset/header.php';
include '../asset/koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script> alert('Anda harus log in untuk mengakses halaman ini!');
    window.location.href='../index.php';</script>";
    exit();
}

// Ambil ID pengguna yang sedang login dari sesi
$user_id = $_SESSION['user_id'];

?>

<link rel="stylesheet" href="css/style1.css">
<div class="container">
    <div class="container-tabel">
        <div class="title">
            <h2>Cek Order - Cuci Kering</h2>
        </div>
        <br><br>
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
                <th>OPSI</th>
            </tr>
            <?php
                $query = "SELECT tr_cuci_kering.*, users_.username AS nama
                FROM tr_cuci_kering
                INNER JOIN users_
                ON tr_cuci_kering.user_id = users_.id
                WHERE users_.id = $user_id;
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
                    <a href="bahan/cuci_kering/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a>
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
                <th>OPSI</th>
            </tr>
            <?php
                // Query untuk mengambil data transaksi hanya untuk pengguna yang sedang login
                $data = mysqli_query($koneksi,"SELECT tr_cuci_komplit.*, users_.username AS nama
                FROM tr_cuci_komplit
                INNER JOIN users_
                ON tr_cuci_komplit.user_id = users_.id
                WHERE users_.id = $user_id;
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
                    <a href="bahan/cuci_komplit/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a>
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
        <table>
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
                $query = "SELECT tr_cuci_satuan.*, users_.username AS nama
                FROM tr_cuci_satuan
                INNER JOIN users_
                ON tr_cuci_satuan.user_id = users_.id
                WHERE users_.id = $user_id;
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
                    <a href="bahan/cuci_satuan/ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn"><img src="img/eye.png" width="40px"></a>
                </td>
            </tr>
            <?php
                } ?>
        </table>
    </div>
</div>
<?php include 'asset/footer.php'; ?>
</body>
</html>
