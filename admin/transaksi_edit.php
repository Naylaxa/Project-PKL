<?php 
include 'koneksi.php';
include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            max-width: 100%;
            margin-left: 180px;
        }
        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .title h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .title button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .title button a {
            color: #ffffff;
            text-decoration: none;
        }
        .title button:hover {
            background-color: #0056b3;
        }
        .form .cont {
            display: flex;
            flex-direction: column;
        }
        .input {
            margin-bottom: 20px;
        }
        .inputan {
            margin-bottom: 15px;
        }
        .inputan label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .inputan input[type="text"],
        .inputan input[type="decimal"],
        .inputan select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="title">
            <h1>Edit Transaksi</h1>
        </div>
        <?php
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM tr_cuci_kering WHERE id = $id");
        while($data=mysqli_fetch_array($query)){
        ?>
        <form class="cont" action="transaksi_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="input">
                <div class="inputan">
                    <label>Pelanggan</label>
                    <select class="form-control" name="username" required="required">
                        <option value="">- Pilih Pelanggan -</option>
                        <?php
                        $user_query = mysqli_query($koneksi, "SELECT * FROM users_");
                        while($user = mysqli_fetch_array($user_query)){
                            $selected = $user['username'] == $data['nama'] ? 'selected' : '';
                            echo "<option value='".$user['username']."' $selected>".$user['username']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="inputan">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" placeholder="No. HP" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <div class="inputan">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat']; ?>" required>
                </div>
                <div class="inputan">
                    <label>Berat</label>
                    <input type="decimal" placeholder="Berat (Kg)" name="berat" value="<?php echo $data['berat']; ?>" required>
                </div>
                <div class="inputan">
                    <label>Paket</label>
                    <select name="paket_id" required>
                        <option value="">Pilih Paket</option>
                        <option value="1" <?php if($data['paket_id'] == 1) echo 'selected'; ?>>Cuci Kering Reguler</option>
                        <option value="2" <?php if($data['paket_id'] == 2) echo 'selected'; ?>>Cuci Kering Kilat</option>
                        <option value="3" <?php if($data['paket_id'] == 3) echo 'selected'; ?>>Cuci Kering Express</option>
                    </select>
                </div>
                <div class="inputan">
                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option <?php if($data['status']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>
                                    <option <?php if($data['status']=="1"){echo "selected='selected'";} ?> value="1">DI CUCI</option>
                                    <option <?php if($data['status']=="2"){echo "selected='selected'";} ?> value="2">SELESAI</option>
                                </select>
                </div>
                <input type="submit" value="Simpan">
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>
