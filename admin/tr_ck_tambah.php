<?php 
include 'koneksi.php';
include 'header.php';

// session_start();
// if (!isset($_SESSION['user_id'])) {
//     echo "<script> alert('Anda harus log in untuk mengakses halaman ini!');
//     window.location.href='../index.php';</script>";
//     exit();
// }

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            /* display: flex; */
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
            <h1>Cuci Komplit</h1>
        </div>
        <form class="cont" action="tr_ck_aksi.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="input">
                <div class="inputan">
                    <label>Pelanggan</label>
                    <select class="form-control" name="username" required="required">
                        <option value="">- Pilih Pelanggan -</option>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM users_");
                        while($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['username']."'>".$d['username']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="inputan">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" placeholder="No. HP" required>
                </div>
                <div class="inputan">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" required>
                </div>
                <div class="inputan">
                    <label>Berat</label>
                    <input type="decimal" placeholder="Berat (Kg)" name="berat" required>
                </div>
                <div class="inputan">
                    <label>Paket</label>
                    <select name="paket_id" required>
                        <option value="">Pilih Paket</option>
                        <option value="1">Cuci Komplit Reguler</option>
                        <option value="2">Cuci Komplit Kilat</option>
                        <option value="3">Cuci Komplit Express</option>
                    </select>
                </div>
                <input type="hidden" id="user_id" name="user_id">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>
    <?php
    //  include '../asset/footer.php'; 
     ?>
</body>
</html>
