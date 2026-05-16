<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // ngecek apakah request method adalah POST, klo bukan maka redirect ke dashboard. tujuan fungsi ini sebagai keamanan juga agar tidak sembarang orang bisa mengakses halaman ini dari kolom url
    $id_produk   = $_POST['id_produk'];
    $id_user     = $_SESSION['id_user'];
    $jumlah      = $_POST['jumlah'];
    $catatan     = $_POST['catatan'];
    $pembayaran  = $_POST['pembayaran'];
    $total_harga = $_POST['total_harga'];

    $query = "INSERT INTO pesanan (id_produk, id_user, catatan, jumlah, total_harga, metode_pembayaran, status_pesanan) 
              VALUES ('$id_produk', '$id_user', '$catatan', '$jumlah', '$total_harga', '$pembayaran', 'menunggu')";

    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Pesanan berhasil dibuat!'); window.location.href = 'riwayat.php';</script>";
        exit();
    } else {
        echo "<script>alert('Pesanan gagal dibuat!'); window.location.href = 'dashboard.php';</script>";
        exit();
    }
} else {
    header("location: dashboard.php");
    exit();
}
?>