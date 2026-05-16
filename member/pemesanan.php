<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("location: ../login.php?message=harus_login");
    exit();
}

$id_produk =$_GET['id_produk'];
$query = mysqli_query($connect," SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_assoc($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

  <body class="mt-5">
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary bg-dark px-5" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Brew Society</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <section class="card-container">
      <div class="card" style="width: 550px;">
        <div class="card-body">
          <h4 class="card-title text-center mb-3">Pesanan</h4>
          <p class="card-text">Silahkan isi form pemesanan sebelum  Anda Check Out</p>

          <form action="proses_pemesanan.php" method="post">

            <input type="hidden" name="id_produk" value="<?= $data['id_produk']; ?>">

            <div class="mb-3">
              <label class="form-label ">Nama</label>
              <input type="text" class="form-control" value="<?= $_SESSION['username']; ?>" disabled>
            </div>

            <div class="mb-3">
              <label for="catatan" class="form-label">Catatan (opsional)</label>
              <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
            </div> 

            <div class="border-top border-bottom border-secondary p-2 mb-2 border-opacity-25">
              <div class="row g-3"> 
                <div class="col">
                  <h5><?= $data['nama_produk'] ?></h5>
                  <p>Rp <?= number_format($data['harga'], 0, ',', '.') ?></p>
                </div>

                <div class="col">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="form-label">Metode Pembayaran</label> <br>
              <input class="form-check-input me-2" type="radio" name="pembayaran" id="cashless" value="Cashless/QRIS" checked> 
              <label class="form-check-label" for="cashless">Cashless / QRIS di Kasir</label>
            </div>
          </form>
          <button class="btn btn-primary" type="button"><a href="../login.php"></a>Check Out</button>
        </div>
      </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>