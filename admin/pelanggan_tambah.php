<?php
$title = 'Pelanggan';
require'functions.php';
require'../layout/layout_header.php';

if(isset($_POST['btn-simpan'])){
    $nama     = $_POST['nama_member'];
    $nik     = $_POST['nik']; 
    $no_hp     = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO users (nama_user,no_hp,nik,username,password,role) values ('$nama','$no_hp','$nik','$username','$password','member')";
    
    $execute = execute($conn,$query);
    if($execute == 1){
        echo "<meta http-equiv='refresh' content='0; url=pelanggan.php'>";
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!'); history.go(-1)</script>";
    }
}

?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Pelanggan</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="pelanggan.php">Pelanggan</a></li>
                    <li><a href="#">Tambah Pelanggan</a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Member</label>
                        <input type="text" name="nama_member" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" name="no_hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="text-right">
                        <a href="javascript:void(0)" class="btn btn-danger " onclick="window.history.back();" >Batal</a>
                        <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require'../layout/layout_footer.php';
?> 