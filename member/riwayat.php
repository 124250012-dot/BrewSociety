<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("location: ../login.php?message=harus_login");
    exit();
}
$id_user_login = $_SESSION['id_user'];

// INNER JOIN disini untuk ngambil data pesanan + detail produknya
$query = "SELECT 
            pesanan.id_pesanan,
            produk.nama_produk,
            produk.image,
            pesanan.jumlah,
            pesanan.total_harga,
            pesanan.metode_pembayaran,
            pesanan.status_pesanan,
            pesanan.tanggal_pesanan
            FROM pesanan
            INNER JOIN produk ON pesanan.id_produk = produk.id_produk
            WHERE pesanan.id_user = '$id_user_login'
            ORDER BY pesanan.tanggal_pesanan DESC";

$tampil_riwayat = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg fixed-top bg-dark px-5" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Brew Society</a>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="riwayat.php">Riwayat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container mb-5" style="margin-top: 100px;">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark" style="border-left: 5px solid #bc9494; padding-left: 15px;">Riwayat Pesanan Anda</h2>
        <a href="dashboard.php" class="btn btn-outline-dark btn-sm">← Kembali Menu</a>
      </div>

      <?php if(isset($_GET['message']) && $_GET['message'] == 'pesanan_berhasil'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pesanan Anda berhasil dikirim. Silakan lakukan pembayaran di kasir.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-dark">
                <tr>
                  <th class="ps-4">Tanggal & Waktu</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Total Bayar</th>
                  <th>Metode</th>
                  <th class="pe-4 text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                
                <?php 
                // ngecek apakah user udah punya riwayat transaksi
                if(mysqli_num_rows($tampil_riwayat) > 0):
                  while($row = mysqli_fetch_assoc($tampil_riwayat)): 
                ?>
                  <tr>
                    <td class="ps-4 text-secondary small">
                      <?= date('d M Y, H:i', strtotime($row['tanggal_pesanan'])); ?> WIB
                    </td>
                    
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="<?= $row['image']; ?>" alt="" class="rounded" style="width: 45px; height: 45px; object-fit: cover; margin-right: 12px;">
                        <span class="fw-semibold text-dark"><?= $row['nama_produk']; ?></span>
                      </div>
                    </td>
                    
                    <td><span class="badge bg-secondary text-light"><?= $row['jumlah']; ?>x</span></td>
                    
                    <td class="fw-bold text-success">
                      Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?>
                    </td>
                    
                    <td class="small text-muted"><?= $row['metode_pembayaran']; ?></td>
                    
                    <td class="pe-4 text-center">
                      <?php if($row['status_pesanan'] == 'menunggu'): ?>
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu Konfirmasi</span>
                      <?php elseif($row['status_pesanan'] == 'diproses'): ?>
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill">Sedang Dibuat</span>
                      <?php else: ?>
                        <span class="badge bg-success px-3 py-2 rounded-pill">Selesai</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php 
                  endwhile; 
                else: 
                ?>
                  <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                      <p class="mb-2 fs-5">Belum ada riwayat pesanan.</p>
                      <a href="dashboard.php" class="btn btn-sm btn-primary">Pesan Kopi Sekarang</a>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>