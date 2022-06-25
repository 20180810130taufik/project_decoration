<?php
require'functions.php';
require'../layout/layout_header.php';
$title = 'Transaksi ';

$que = "SELECT * FROM booking";
$booking = getdata($conn,$que);

$q = "SELECT * FROM paket";
$paket = getdata($conn,$q);

if(isset($_POST['btn-simpan'])){
    $id_booking   = $_POST['id_booking'];
    $waktu_bayar   = $_POST['waktu_bayar'];

    $query = "INSERT INTO transaksi (id_booking, waktu_pembayaran) VALUES ('$id_booking', '$waktu_bayar')";
    
    $execute = execute($conn,$query);
    if($execute == 1){
        echo "<meta http-equiv='refresh' content='0; url=transaksi.php'>";
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
                    <li><a href="outlet.php"><?= $title ?></a></li>
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
                            <label>Booking</label>
                            <select name="id_booking" class="form-control">
                                <option>--Pilih--</option>
                                <?php foreach ($booking as $bkg): ?>
                                    <option value="<?= $bkg['id_booking'] ?>">
                                <?php 
                                    $sql = "SELECT booking.*, users.nama_user, paket.harga FROM booking INNER JOIN users ON users.id_user = booking.id_user INNER JOIN paket ON paket.id_paket = booking.id_paket WHERE id_booking = '".$bkg['id_booking']."'";
                                    $book = get_by_id($conn,$sql);
                                    echo "".$book['nama_user']." - Tanggal: ".$book['tgl_acara']."";
                                ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Waktu Pembayaran</label>
                            <input type="datetime-local" name="waktu_bayar" class="form-control">
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
 
