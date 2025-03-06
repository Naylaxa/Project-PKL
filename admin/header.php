<?php include 'koneksi.php'; 
include '../asset/login.php' ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SISTEM INFORMASI LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <style>
        .down{
    display: none;
}
ul li:hover .down{
    cursor: pointer;
    width: 180px;
    border-radius: 5px;
    transition: .5s all;
    position: absolute;
    padding:10px;
    top: 100%;
    display: block;
    background-color: #292929;
}
a {
    color: white;
}
    </style>
</head>
<body style="background: #f0f0f0">
    <nav class="navbar navbar-inverse" style="border-radius: 0px">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" ariarexpanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LAUNDRY</a>
            </div>
            <div class="collapse navbar-collapse" id= "bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
                    <li><a href="pelanggan.php"><i class="glyphicon glyphicon-user"></i>Users</a></li>
                    <li><a href="transaksi.php"><i class="glyphicon glyphicon-random"></i>Transaksi</a></li>
                    <li><a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i>Laporan</a></li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Halo!</p></li>
                </ul>
            </div>
        </div>
    </nav>