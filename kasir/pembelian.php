<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembelian</title>
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

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-customer-link {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            text-decoration: none;
            color: #007bff;
        }

        button[type="submit"],
        .dashboard-button {
            display: block; /* Mengubah tampilan tombol menjadi block */
            width: 150px; /* Mengatur lebar tombol sesuai dengan konten */
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin: 10px auto; /* Mengatur margin secara otomatis untuk pusat secara horizontal */
        }

        button[type="submit"]:hover,
        .dashboard-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<form action="tambah_pembelian.php" method="POST">
    <h2>FORMULIR PEMBELIAN</h2>
    <label for="pelanggan">Pilih Pelanggan:</label><br>
    <select id="pelanggan" name="pelanggan">
        <?php
        include 'config.php';
        $sql = "SELECT PelangganID, NamaPelanggan FROM pelanggan";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['PelangganID'] . "'>" . $row['NamaPelanggan'] . "</option>";
            }
        } else {
            echo "<option value=''>Tidak ada pelanggan</option>";
        }

        mysqli_close($conn);
        ?>
    </select>
    <a href="tambah_pelanggan.php" class="add-customer-link">Tambah Pelanggan Baru</a><br><br>
    
    <button type="submit" class="submit-button">Komfirmasi</button>

    <a href="dashboard.php" class="dashboard-button">Kembali</a>
</form>

</body>
</html>
