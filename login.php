<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

   <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary bg-dark px-5" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Brew Society</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <section class="login-container">
      <div class="card" style="width: 30rem;">
      <div class="card-body" style="width: 100%;">
        <h3 class="card-title text-center">Login</h3>
    
        <?php if(isset($_GET['message'])) : 
        if($_GET['message'] == "login_gagal") : ?>
            <div class="alert alert-danger" role="alert">
                Login Gagal! Pastikan username dan password benar.
            </div>
        <?php elseif ($_GET['message'] == "login_berhasil") : ?>
            <div class="alert alert-danger" role="alert">
                Login berhasil!
            </div>
             <?php endif;
        endif; ?>


        <form action="proses_login.php" method="post">
    
            <div class="mb-3">
                <label class="form-label d-block">Pilih Role</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="member" name="role" value="member">
                    <label class="form-check-label" for="member">Member</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="kasir" name="role" value="kasir">
                    <label class="form-check-label" for="kasir">Kasir</label>
                </div>
            </div>
    
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
    
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
    
            <div class="mt-3 text-center">
                <small>Belum memiliki akun? <a href="registrasi.php" class="text-decoration-none">Registrasi di sini</a></small>
            </div>
        </form>
      </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>