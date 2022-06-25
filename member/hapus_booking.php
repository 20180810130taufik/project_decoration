<?php 
require 'functions.php';
$sql = "DELETE FROM booking WHERE id_booking = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
	$success = 'true';
	$title = 'Berhasil';
	$message = 'Menghapus Data';
	$type = 'success';
	header('location: booking.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
} else {
	echo "<script>alert('Data gagal dihapus!'); history.go(-1)</script>";
}
?>

