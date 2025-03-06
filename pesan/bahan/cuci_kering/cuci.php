<?php 
include '../asset/header.php';
include '../asset/koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script> alert('Anda harus log in untuk mengakses halaman ini!');
    window.location.href='../index.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Debug: Pastikan $user_id terisi
// echo "User ID: " . $user_id;

?>

<link rel="stylesheet" href="css/style1.css">
<div class="container">
    <div class="container-tabel">
        <div class="title">
            <h2>Cek Order</h2>
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
                            echo "<div class='label-selesai_'>SELESAI</div>";
                        }
                    ?>
                </td>
                <td class="opsi">
                    <a href="ts_invoice.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn eye tampilEye"><img src="img/eyee.png" width="40px"></a>
                    <a href="ts_bukti.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn print tampilPrint"><img src="img/printer.png" width="34px"></a>
                </td>
            </tr>
            <?php   
                } ?>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var labelsSelesai = document.querySelectorAll('.label-selesai_');
        labelsSelesai.forEach(function(label) {
            var row = label.closest('tr');
            var printButton = row.querySelector('.tampilPrint');
            printButton.style.display = 'block';
            var eyeButton = row.querySelector('.tampilEye');
            eyeButton.style.display = 'none';
        });
    });
</script>
<?php include '../asset/footer.php'; ?>
</body>
</html>
