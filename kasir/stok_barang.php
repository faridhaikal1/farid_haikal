<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stock Barang</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

<h2>STOCK PRODUK</h2>
<button onclick="location.href='dashboard.php'"><i class="fas fa-arrow-left"></i>Dashboard</button>
<button class="tambah-produk" onclick="location.href='tambah_produk.php'"><i class="fas fa-plus"></i>Tambah Produk</button>

<table border="1">
  <tr>
    <th>NO</th>
    <th>NAMA PRODUK</th>
    <th>HARGA</th>
    <th>STOCK</th>
    <th>AKSI</th>
  </tr>
  
  <?php
    session_start();
    include 'config.php';
    $sql = "SELECT ProdukID, NamaProduk, Harga, Stok FROM produk";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["ProdukID"] . "</td>";
            echo "<td>" . $row["NamaProduk"] . "</td>";
            echo "<td>" . $row["Harga"] . "</td>";
            echo "<td>" . $row["Stok"] . "</td>";
            echo "<td>";
            echo "<a href='edit_produk.php?id=" . $row["ProdukID"] . "' title='Edit'><i class='fas fa-edit'></i></a>&nbsp;|&nbsp;";
            echo "<a href='hapus_produk.php?id=" . $row["ProdukID"] . "' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 hasil</td></tr>";
    }
 
    mysqli_close($conn);
   ?>
 </table>

</body>
</html>
