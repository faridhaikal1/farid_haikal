<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Petugas</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM petugas WHERE id_petugas=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>
<form action="proses_edit_petugas.php" method="post">
<h2>EDIT PETUGAS</h2>
  <input type="hidden" name="id" value="<?php echo $row['id_petugas']; ?>">
  <label for="nama_petugas">Nama Petugas:</label><br>
  <input type="text" id="nama_petugas" name="nama_petugas" value="<?php echo $row['nama_petugas']; ?>"><br>
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>
  <label for="level">Level:</label><br>
  <select id="level" name="level">
    <option value="admin" <?php if ($row['level'] == 'admin') echo 'selected'; ?>>Admin</option>
    <option value="user" <?php if ($row['level'] == 'user') echo 'selected'; ?>>Petugas</option>
  </select><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
<?php
    } else {
        echo "Petugas tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}
mysqli_close($conn);
?>

</body>
</html>