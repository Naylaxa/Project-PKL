<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_ (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "<script> alert('User registered successfully!'); window.location.href='../index.php';</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Code 23000 is for duplicate entry
            echo "<script> alert('Username already taken.');
            window.location.href='../index.php';</script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
