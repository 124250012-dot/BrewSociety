<?php
session_start();
include 'koneksi.php';

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if ($role == 'kasir') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['status'] = 'login';
        header("location: kasir/dashboard.php?message=login_berhasil");
        exit();
    } else if ($role == 'member') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['status'] = 'login';
        header("location: member/dashboard.php?message=login_berhasil");
    }
} else {
    header("location: login.php?message=login_gagal");
}
?>