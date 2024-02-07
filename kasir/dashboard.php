<?php
// Mulai sesi
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ...
}

// Misalnya, Anda menggunakan PDO untuk terhubung ke database
try {
    $dbh = new PDO('mysql:host=localhost;dbname=kasir', 'root', '');
    // Ganti nama_database, username, dan password dengan yang sesuai
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// Query untuk mengambil total pelanggan
$total_pelanggan_query = $dbh->prepare("SELECT COUNT(*) as total_pelanggan FROM pelanggan");
$total_pelanggan_query->execute();
$result_pelanggan = $total_pelanggan_query->fetch(PDO::FETCH_ASSOC);

// Query untuk mengambil total petugas
$total_petugas_query = $dbh->prepare("SELECT COUNT(*) as total_petugas FROM petugas");
$total_petugas_query->execute();
$result_petugas = $total_petugas_query->fetch(PDO::FETCH_ASSOC);

// Query untuk mengambil total produk
$total_produk_query = $dbh->prepare("SELECT COUNT(*) as total_produk FROM produk");
$total_produk_query->execute();
$result_produk = $total_produk_query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #9cadce;
}

#header {
    background-color: #343a40;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

#menu-container {
    background-color: #343a40;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

#menu {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

#menu a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    flex: 1;
}

.stats-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.stats-item {
    text-align: center;
    margin: 0 20px;
}

.stats-item i {
    font-size: 36px;
}

.stats-item h3 {
    margin-top: 10px;
}

.stats-item p {
    margin: 5px 0;
}

.logout {
    float: right;
    margin-right: 20px;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
}

.logout:hover {
    color: #ccc;
}

</style>
</head>
<body>

<div id="header">
    <div id="welcome">
        <h2>KASIRKITA</h2>
    </div>
</div>

<div id="menu-container">
    <div id="menu">
        <a href="pembelian.php">PEMBELIAN</a>
        <a href="stok_barang.php">STOCK PRODUK</a>
        <a href="detail_penjualan.php">DETAIL PENJUALAN</a>
        <a href="pelanggan.php">DATA PELANGGAN</a>
        <?php
        if(isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
            echo '<a href="registrasi.php">REGISTRASI</a>';
        } 
        ?>
        <a href="logout.php" class="logout">LOGOUT</a>
    </div>
</div>

<div class="stats-container">
    <div class="stats-item">
        <i class="fas fa-users"></i>
        <h3>DATA PELANGGAN</h3>
        <p>TOTAL: <?php echo $result_pelanggan['total_pelanggan']; ?></p>
    </div>

    <div class="stats-item">
        <i class="fas fa-user-tie"></i>
        <h3>DATA PETUGAS</h3>
        <p>TOTAL: <?php echo $result_petugas['total_petugas']; ?></p>
    </div>

    <div class="stats-item">
        <i class="fas fa-box"></i>
        <h3>STOCK PRODUK</h3>
        <p>TOTAL: <?php echo $result_produk['total_produk']; ?></p>
    </div>
</div>

</body>
</html>
