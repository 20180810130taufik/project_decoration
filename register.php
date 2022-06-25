<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<!--===============================================================================================-->
</head>
<?php
include "koneksi.php";

if(isset($_POST['register'])){
    $nama     = $_POST['nama'];
    $nik     = $_POST['nik']; 
    $no_hp     = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO users (nama_user,no_hp,nik,username,password,role) values ('$nama','$no_hp','$nik','$username','$password','member')";
    
    $execute = mysqli_query($conn,$query);
    if($execute){
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        echo "<script>alert('Registrasi Berhasil!');</script>";
    } else {
        echo "<script>alert('Registrasi Gagal!'); history.go(-1)</script>";
    }
}
?>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						WE DECORATION
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" >
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">NIK</span>
						<input class="input100" type="text" name="nik" placeholder="Masukkan NIK">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nama Lengkap</span>
						<input class="input100" type="text" name="nama" placeholder="Masukkan nama lengkap" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nomor Telepon</span>
						<input class="input100" type="number" name="no_hp" placeholder="Masukkan nomor telepon" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Masukkan username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Masukkan password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register" type="submit"> 
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/bootstrap/js/popper.js"></script>  -->
	<!-- <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/select2/select2.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>  -->
	<!-- <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>
</html>