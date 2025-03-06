<?php
include 'koneksi.php';
include 'header.php';
session_start();

// Pastikan hanya admin yang dapat mengakses halaman ini
if ($_SESSION['role'] !== 'admin') {
    // Redirect ke halaman lain jika pengguna bukan admin
    echo "<script>alert('Hanya admin yang boleh mengakses halaman ini!'); window.location.href='../index.php';</script>";
    exit;
}

// Query untuk mendapatkan semua pengguna dari database
$query = "SELECT * FROM users_";
$result = mysqli_query($koneksi, $query);

// Inisialisasi array untuk menyimpan data pengguna
$users = [];

// Ambil data pengguna dan simpan ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Tutup koneksi database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <style>
        /* Mengatur gaya umum untuk keseluruhan halaman */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.data {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 8px;
}

/* Gaya untuk judul */
h1 {
    text-align: center;
    color: #333;
}

/* Gaya untuk tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

/* Gaya untuk baris tabel */
tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

/* Gaya untuk link "Edit User" */
a {
    text-decoration: none;
    color: #3498db;
}

a:hover {
    text-decoration: underline;
}

/* Gaya untuk input tersembunyi */
input[type="hidden"] {
    display: none;
}

    </style>
</head>
<body>
    <div class="data">
    <h1>Daftar Pengguna</h1><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Password</th>
                <th>Peran</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><a href="admin.php?id=<?php echo $user['id']; ?>">Edit User</a></td>
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
</body>
</html>
