<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM users where username='$username' AND password = '$password'";
$row = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);

session_start();
if($cek > 0){
    if($data['role'] == 'admin'){
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        header('location:admin');
    }else if($data['role'] == 'member'){
        $_SESSION['role'] = 'member';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama_user'];
        header('location:member');
    }
} else{
    $msg = 'Username Atau Password Salah';
    header('location:index.php?msg='.$msg);
}
?>