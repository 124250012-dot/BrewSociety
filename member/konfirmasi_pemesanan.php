<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("location: ../login.php?message=harus_login");
    exit();
}

$id_produk = $_POST['id_produk'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$catatan = $_POST['catatan'];
$pembayaran = $_POST['pembayaran'];

$total_harga = $harga * $jumlah;

$query_produk = mysqli_query($connect, "SELECT nama_produk FROM produk WHERE id_produk = '$id_produk'"); //untuk ngambil nama produk
$produk = mysqli_fetch_assoc($query_produk);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> </head>
<body>
    <section class="card-container">
        <div class="card p-3" style="width: 500px; min-height: auto;">
            <div class="card-body">
                <h4 class="card-title text-center fw-bold mb-4">Konfirmasi Pesanan</h4>
                <p class="text-center text-muted">Apakah Anda yakin ingin melakukan pemesanan berikut?</p>
                
                <div class="bg-light p-3 rounded mb-4">
                    <table class="table table-borderless table-sm mb-0">
                        <tr>
                            <td class="text-muted">Menu:</td>
                            <td class="fw-bold text-end"><?= $produk['nama_produk']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Jumlah:</td>
                            <td class="fw-bold text-end"><?= $jumlah; ?>x</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Catatan:</td>
                            <td class="text-end text-secondary"><?= empty($catatan) ? '-' : $catatan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Metode:</td>
                            <td class="text-end"><?= $pembayaran; ?></td>
                        </tr>
                        <tr class="border-top">
                            <td class="fw-bold pt-2">Total Bayar:</td>
                            <td class="fw-bold text-end text-success fs-5 pt-2">Rp <?= number_format($total_harga, 0, ',', '.'); ?></td>
                        </tr>
                    </table>
                </div>

                <form action="proses_pemesanan.php" method="post">
                    <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">
                    <input type="hidden" name="jumlah" value="<?= $jumlah; ?>">
                    <input type="hidden" name="catatan" value="<?= $catatan; ?>">
                    <input type="hidden" name="pembayaran" value="<?= $pembayaran; ?>">
                    <input type="hidden" name="total_harga" value="<?= $total_harga; ?>">

                    <div class="row g-2">
                        <div class="col-6">
                            <a href="dashboard.php" class="btn btn-secondary w-100 fw-semibold">Batal</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100 fw-bold">Ya, Pesan Sekarang</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</body>
</html>