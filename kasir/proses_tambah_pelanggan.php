<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NamaPelanggan = $_POST["NamaPelanggan"];
    $Alamat = $_POST["Alamat"];
    $NomorTelepon = $_POST["NomorTelepon"];

    // Perbaiki kueri INSERT untuk tidak menyertakan nilai untuk kolom PelangganID
    $sql = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$NamaPelanggan', '$Alamat', '$NomorTelepon')";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: tambah_pelanggan.php");
}
?>
