<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Petugas</title>
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

    .button, .button1 {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        margin-right: 10px;
    }

    .button1 {
        background-color: #28a745;
    }

    table {
        width: 80%;
        margin: 20px auto;
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

    .edit-button, .delete-button {
        text-decoration: none;
        color: inherit;
        margin-right: 5px;
    }

    .edit-button:hover, .delete-button:hover {
        color: red;
    }
</style>
</head>
<body>

<h2>DATA PETUGAS</h2>
<a href="dashboard.php" class="button"><i class="fas fa-arrow-left"></i> Kembali</a>
<a href="registrasi.php" class="button1"><i class="fas fa-user-plus"></i> Tambah Petugas</a>

<table>
  <thead>
    <tr>
      <th>NO</th>
      <th>NAMA PETUGAS</th>
      <th>USERNAME</th>
      <th>ROLE</th>
      <th>AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'config.php';
    $sql = "SELECT * FROM petugas";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_petugas'] . "</td>";
            echo "<td>" . $row['nama_petugas'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['level'] . "</td>";
            echo "<td>";
            echo "<a href='edit_petugas.php?id=" . $row['id_petugas'] . "' class='edit-button'><i class='fas fa-edit'></i></a>&nbsp;|&nbsp;";
            echo "<a href='hapus_petugas.php?id=" . $row['id_petugas'] . "' class='delete-button'><i class='fas fa-trash-alt'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data petugas.</td></tr>";
    }
    mysqli_close($conn);
    ?>
  </tbody>
</table>

</body>
</html>
