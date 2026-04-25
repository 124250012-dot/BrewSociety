<?php
include 'koneksi.php';

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row['password'])){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        header("location: dashboard.php");
    } else {
        header("location: login.php?message=login_gagal");
    }
} else {
    header("location: login.php?message=login_gagal");
}

?>