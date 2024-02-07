<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pelanggan</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #9cadce;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        margin-bottom: 20px;
    }

    button i {
        margin-right: 5px;
    }

    .tambah-produk {
        background-color: #28a745;
        margin-left: 20px;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    td:last-child {
        text-align: center;
    }

    .fas {
        font-size: 18px;
    }

    .fas.fa-edit {
        color: #007bff;
        margin-right: 5px;
    }

    .fas.fa-trash-alt {
        color: red;
    }
</style>
</head>
<body>

<h2>DATA PELANGGAN</h2>
<button onclick="location.href='dashboard.php'"><i class="fas fa-arrow-left"></i>Dashboard</button>
<button class="tambah-produk" onclick="location.href='tambah_pelanggan.php'"><i class="fas fa-plus"></i>Tambah Pelanggan</button>

<table>
    <tr>
        <th>Pelanggan ID</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
    </tr>
    <?php
    // Koneksi ke database (ganti dengan informasi koneksi Anda)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kasir";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data pelanggan dari database
    $sql = "SELECT PelangganID, NamaPelanggan, Alamat, NomorTelepon FROM pelanggan";
    $result = $conn->query($sql);

    // Tampilkan data dalam tabel HTML
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["PelangganID"]."</td><td>".$row["NamaPelanggan"]."</td><td>".$row["Alamat"]."</td><td>".$row["NomorTelepon"]."</td></tr>";
        }
    } else {
        echo "0 hasil";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
