<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-regis">
        <div class="regis-card">
            <h1>Registrasi</h1>
            <form action="proses_registrasi.php" method="post">
              <label>Username</label>
              <input type="text" id="username" name="username" required><br><br>

              <label>Password</label>
              <input type="password" id="password" name="password" required><br><br>

              <label>Confirm Password</label>
              <input type="password" id="confirm_password" name="confirm_password" required><br><br>

              <input type="submit" value="Register"> <br><br>

              <a href="login.php">Sudah memiliki akun? Login di sini</a>
            </form>
        </div>
    </div>
</body>
</html>