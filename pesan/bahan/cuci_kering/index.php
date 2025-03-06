<?php 
include '../asset/koneksi.php';
include '../asset/header.php';

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <div class="title">
            <h1>Cuci Kering</h1>
        </div>
            <a href="../../ts_tambah.php"><img src="img/back.png" width="40"></a>
        <form class="cont" action="tambah.php" method="post">
        <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
            <div class="input">
                <div class="inputan">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" readonly>
                </div>
                <div class="inputan">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" placeholder="No. Hp" required>
                </div>
                <div class="inputan">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="alamat" required>
                </div>
                <div class="inputan">
                    <label>Berat</label>
                    <input type="decimal" placeholder="Berat (Kg)" name="berat" required>
                </div>
                <div class="inputan">
                    <label>Paket</label>
                    <select name="paket_id">
                        <option>Pilih Paket</option>
                        <option value="1">Cuci Kering Reguler</option>
                        <option value="2">Cuci Kering Kilat</option>
                        <option value="3">Cuci Kering Express</option>
                    </select>
                </div>
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>
<?php 
include '../asset/footer.php';
?>
</body>
</html>