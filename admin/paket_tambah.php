<?php
require'functions.php';
require'../layout/layout_header.php';
$title = 'Paket';

if(isset($_POST['btn-simpan'])){
    $nama   = $_POST['nama_paket'];
    $harga   = $_POST['harga'];
    $fasilitas   = $_POST['fasilitas'];

    $query = "INSERT INTO paket (nama_paket, harga, fasilitas) VALUES ('$nama','$harga','$fasilitas')";
    
    $execute = execute($conn,$query);
    if($execute == 1){
        echo "<meta http-equiv='refresh' content='0; url=paket.php'>";
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
    }else{
        echo "<script>alert('Data gagal ditambahkan!'); history.go(-1)</script>";
    }
}
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="paket.php"><?= $title ?></a></li>
                    <li><a href="#">Tambah <?= $title ?></a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <textarea name="fasilitas" class="form-control" rows="7">
                            </textarea>
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