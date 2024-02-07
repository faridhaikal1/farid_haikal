<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #9cadce;
    }

    #login-box {
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
    input[type="submit"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .login-button {
      background-color: #007bff;
      color: #fff; 
      width: 150px;
    }

    p.error-message {
        color: red;
        margin-bottom: 20px;
    }

    p.register-link {
        text-align: center;
        margin-top: 20px;
    }

    p.register-link a {
        color: #007bff;
        text-decoration: none;
    }
</style>
</head>
<body>

<div id="login-box">
  <h2>LOGIN</h2>
  <?php if(isset($_GET['error'])) { ?>
    <p class="error-message"><?php echo $_GET['error']; ?></p>
  <?php } ?>
  <form action="login_process.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="MASUK" class="login-button">
  </form>

</body>
</html>
