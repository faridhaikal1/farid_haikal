<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nama_panjang = $_POST['nama_panjang'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = ($_POST['level'] == 'admin') ? 2 : 1;

    $query = "INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama_panjang', '$username', '$password', '$level')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Registrasi gagal. Silakan coba lagi.";
    }
}
?>