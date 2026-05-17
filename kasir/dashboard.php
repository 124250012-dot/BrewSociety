<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || $_SESSION['role'] !== 'kasir') {
    header("location: ../login.php?message=harus_login");
    exit();
}

$query = "SELECT 
          pesanan.id_pesanan,
          user.username AS nama_pelanggan,
          produk.nama_produk,
          produk.image,
          pesanan.jumlah,
          pesanan.total_harga,
          pesanan.catatan,
          pesanan.metode_pembayaran,
          pesanan.status_pesanan,
          pesanan.tanggal_pesanan
          FROM pesanan
          INNER JOIN produk ON pesanan.id_produk = produk.id_produk
          INNER JOIN user ON pesanan.id_user = user.id_user
          ORDER BY pesanan.tanggal_pesanan DESC";

$tampil_pesanan = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kasir - Brew Society</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg fixed-top bg-dark px-5" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Brew Society (Kasir Panel)</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item"><a class="nav-link active" href="dashboard.php">Kelola Pesanan</a></li>
            <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container my-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-12">
          
          <h2 class="fw-bold text-dark mb-4" style="border-left: 5px solid #bc9494; padding-left: 15px;">Daftar Pesanan Masuk</h2>

          <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 style="min-width: 800px;">
                  <thead class="table-dark">
                    <tr>
                      <th class="ps-4 py-3">Pelanggan</th>
                      <th>Menu Pesanan</th>
                      <th>Catatan</th>
                      <th>Total Bayar</th>
                      <th>Status</th>
                      <th class="pe-4 text-center">Aksi Konfirmasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(mysqli_num_rows($tampil_pesanan) > 0):
                      while($row = mysqli_fetch_assoc($tampil_pesanan)): 
                    ?>
                      <tr>
                        <td class="ps-4">
                          <span class="fw-bold text-dark d-block"><?= htmlspecialchars($row['nama_pelanggan']); ?></span>
                          <span class="text-secondary small"><?= date('d M, H:i', strtotime($row['tanggal_pesanan'])); ?> WIB</span>
                        </td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="<?= $row['image']; ?>" alt="" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover; margin-right: 12px;">
                            <div>
                              <span class="fw-semibold d-block"><?= $row['nama_produk']; ?></span>
                              <span class="badge bg-secondary small"><?= $row['jumlah']; ?>x</span>
                            </div>
                          </div>
                        </td>

                        <td class="text-muted small"><?= empty($row['catatan']) ? '-' : htmlspecialchars($row['catatan']); ?></td>
                        
                        <td class="fw-bold text-success">Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        
                        <td>
                          <?php if($row['status_pesanan'] == 'menunggu'): ?>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5">Menunggu Pembayaran</span>
                          <?php elseif($row['status_pesanan'] == 'diproses'): ?>
                            <span class="badge bg-info text-dark rounded-pill px-3 py-1.5">Sedang Dibuat</span>
                          <?php else: ?>
                            <span class="badge bg-success rounded-pill px-3 py-1.5">Selesai</span>
                          <?php endif; ?>
                        </td>
                        
                        <td class="pe-4 text-center">
                          <?php if($row['status_pesanan'] == 'menunggu'): ?>
                            <a href="ubah_status.php?id=<?= $row['id_pesanan']; ?>&status=diproses" class="btn btn-sm btn-info fw-semibold text-dark">Proses</a>
                          <?php elseif($row['status_pesanan'] == 'diproses'): ?>
                            <a href="ubah_status.php?id=<?= $row['id_pesanan']; ?>&status=selesai" class="btn btn-sm btn-success fw-semibold">Selesai</a>
                          <?php else: ?>
                            <span class="text-muted small"><i class="bi bi-check-circle-fill text-success"></i> Sudah Selesai</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php 
                      endwhile; 
                    else: 
                    ?>
                      <tr>
                        <td colspan="6" class="text-center py-5 text-muted">Belum ada pesanan masuk dari pelanggan.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>

    <footer class="bg-dark text-white text-center py-2 w-100" data-bs-theme="dark">
        <div class="container">
          <p>&copy; 2026 Brew Society. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>