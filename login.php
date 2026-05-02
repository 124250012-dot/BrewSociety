<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-login">
    <div class="login-card">
            <h1>Login</h1>
                <?php
                    if(isset($_GET['message'])) {
    if($_GET['message'] == "login_gagal") {
        echo "<script>alert('Login gagal. Username atau password salah.');</script>"; 
    } elseif ($_GET['message'] == "logout") {
        echo "<script>alert('Anda telah berhasil logout.');</script>";
    } elseif ($_GET['message'] == "belum_login") {
        echo "<script>alert('Anda harus login terlebih dahulu untuk mengakses halaman admin.');</script>";
    } elseif ($_GET['message'] == "login_berhasil") {
        echo "<script>alert('Login berhasil!');</script>";
    }
                    }
                ?>

            <form action="proses_login.php" method="post">
             <label>Role</label><br>

             <input type="radio" id="member" name="role" value="member">
             <label for="member">Member</label>
        
              <input type="radio" id="kasir" name="role" value="kasir">
              <label for="kasir">Kasir</label> <br> <br>
        
             <label>Username</label>
             <input type="text" id="username" name="username" required><br><br>

             <label>Password</label>
             <input type="password" id="password" name="password" required><br><br>

             <input type="submit" value="Login"> <br> <br>

             <a href="registrasi.php">Belum memiliki akun? Registrasi di sini</a>
         
            </form>
      </div>
    </div>
</body>
</html>
