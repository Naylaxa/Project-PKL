<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
      src="https://kit.fontawesome.com/fd3a1b43b6.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./css/header1.css" />
  </head>
  <body>
  
    <?php
    include '../asset/koneksi.php';
    ?>
     <?php
    // session_start();
    // if($_SESSION['status']!="login"){
    //     echo "<script>alert('Anda belum login!')</script>";
    // }
    ?>
    <div class="header">
        <div class="top">
          <div class="nama">
          </div>
          <div class="text">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i> | <a href="../asset/logout.php"><img src="img/logout.png" width="22px">Logout</a>
          </div>
        </div>
        <nav>
          <div class="logo">
            <h1>TOP</h1>
            <h4>Laundry</h4>
          </div>
          <ul>
            <li><a href="../" class="nav-link">Home</a></li>
            <li><a href="../index.php #about" class="nav-link">About</a></li>
            <li><a href="../index.php #service" class="nav-link">Service</a></li>
            <li><a href="../index.php #contact" class="nav-link">Contact</a></li>
            <li>
                <a href="" class="nav-link">Pesan</a>
                <div class="down">
                    <ul>
                        <li><a href="index.php">Cek Pesanan</a></li>
                        <li><a href="ts_tambah.php">Pesan Laundry</a></li>
                    </ul>
                </div>
            </li>
          </ul>
        </nav>
    </div>

