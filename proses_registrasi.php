<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password !== $confirm_password){
    header("location: registrasi.php?message=konfirmasi_gagal");
    exit();
}

$query = "INSERT INTO user (role, username, password) 
VALUES ('member', '$username', '$password')";
$result = mysqli_query($connect, $query);

if($result){
    header("location: registrasi.php?message=register_berhasil");
} else {
    header("location: registrasi.php?message=register_gagal");
}
?>