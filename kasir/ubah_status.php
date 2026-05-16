<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || $_SESSION['role'] !== 'kasir') {
    header("location: ../login.php?message=harus_login");
    exit();
}

if (isset($_GET['id']) && isset($_GET['status'])) { // Tangkap parameter ID pesanan dan target status baru dari URL
    $id_pesanan   = $_GET['id'];
    $status_baru  = $_GET['status'];

    $query_update = "UPDATE pesanan SET status_pesanan = '$status_baru' WHERE id_pesanan = '$id_pesanan'"; //untuk memperbarui status pesanan

    if (mysqli_query($connect, $query_update)) {
        header("location: dashboard.php?message=status_diperbarui");
        exit();
    } else {
        header("location: dashboard.php?message=gagal_perbarui");
        exit();
    }
} else {
    header("location: dashboard.php");
    exit();
}
?>