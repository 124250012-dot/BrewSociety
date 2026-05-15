<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("location: ../login.php?message=harus_login");
    exit();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brew Society</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rouge+Script&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
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
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#about">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">Riwayat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>


    <section class="dashboard-carousel mt-5">
    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="https://imgcdn.espos.id/@espos/images/2024/09/ilustrasi-kopi.jpg?quality=60" class="d-block w-100" alt="bestseller">
          <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.5); border-radius: 10px;">
              <h5>Welcome to Brew Society</h5>
              <p>Discover the finest coffee blends and brewing techniques with us.</p>
          </div>       
    </div>

    <div class="carousel-item">
      <img src="Rekomendasi-1.png" class="d-block w-100" alt="bestseller 1">
    </div>
    <div class="carousel-item">
      <img src="Rekomendasi-2.png" class="d-block w-100" alt="bestseller 2">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<main class="container mb-5">
      <?php
      $queryKategori = "SELECT DISTINCT kategori FROM produk";
      $datakategori = $connect->query($queryKategori);

      while($kategori = $datakategori->fetch_object()): ?>
        
        <h2 class="category-title mt-5"><?= $kategori->kategori; ?></h2>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
          <?php
          $queryProduk = "SELECT * FROM produk WHERE kategori = '" . $kategori->kategori . "'";
          $produk = $connect->query($queryProduk);
          while($data = $produk->fetch_object()): ?>
            
            <div class="col">
              <div class="card h-100 product-card w-100">
                <img src="<?= $data->image; ?>" class="card-img-top product-img" alt="<?= $data->nama_produk; ?>">
                <div class="card-body d-flex flex-column text-center">
                  <h5 class="card-title fs-6"><?= $data->nama_produk;?></h5>
                  <p class="card-text fw-bold text-success">Rp <?= number_format($data->harga, 0, ',', '.');?></p>
                  <a href="#" class="btn btn-dark mt-auto" style="width: 10rem;">Pesan</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endwhile; ?>
    </main>

    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
