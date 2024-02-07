<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #9cadce;
    }

    #register-box {
        width: 50%;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: calc(100% - 20px);
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        display: block;
        width: 50%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        margin: 0 auto;
    }
</style>
</head>
<body>

<div id="register-box">
  <h2>REGISTRASI</h2>
  <form action="register_process.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="text" name="nama_panjang" placeholder="Nama Panjang" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <label for="level">ROLE:</label>
    <select name="level" id="level">
      <option value="admin">Admin</option>
      <option value="petugas">Petugas</option>
    </select><br>
    <input type="submit" value="DAFTAR">
  </form>
</div>

</body>
</html>
