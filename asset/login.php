<?php
require 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debug: Output username and password received
    echo "Received username: $username<br>";
    echo "Received password: $password<br>";

    // Query untuk mendapatkan data user berdasarkan username
    $sql = "SELECT * FROM users_ WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug: Output user data if found
        if ($user) {
            echo "User found in the database.<br>";
            echo "Stored hashed password: " . $user['password'] . "<br>";
            echo "User role: " . $user['role'] . "<br>";
        } else {
            echo "No user found with that username.<br>";
        }

        // Cek apakah user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Debug: Password verification successful
            echo "Password verification successful.<br>";

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../pesan/ts_tambah.php");
            }
            exit();
        } else {
            echo "Password verification failed.<br>";
            echo "<script>alert('Invalid username or password.'); window.location.href='../index.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

