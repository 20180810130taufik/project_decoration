<?php
require'functions.php';
require'../layout/layout_header.php';
$title = 'Booking ';
$id = $_GET['id'];

$que = "SELECT * FROM users";
$user = getdata($conn,$que);

$q = "SELECT * FROM paket";
$paket = getdata($conn,$q);

$id_paket = $_GET['id'];
$queryedit = "SELECT * FROM booking WHERE id_booking = '$id'";
$edit = get_by_id($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    $id_paket   = $_POST['id_paket'];
    $alamat   = $_POST['alamat'];
    $tgl_acara   = $_POST['tgl_acara'];

    $query = "UPDATE booking SET id_paket = '$id_paket', alamat = '$alamat', tgl_acara = '$tgl_acara' WHERE id_booking = '$id'";
    
    $execute = execute($conn,$query);
    if($execute == 1){
        echo "<meta http-equiv='refresh' content='0; url=booking.php'>";
        echo "<script>alert('Data berhasil diperbarui!');</script>";
    }else{
        echo "<script>alert('Data gagal diperbarui!'); history.go(-1)</script>";
    }
}
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="booking.php"><?= $title ?></a></li>
                    <li><a href="#">Edit <?= $title ?></a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Nama Member</label>
                            <?php foreach ($user as $data): 
                                if ($data['id_user'] == $edit['id_user']): ?>
                                <input type="text" name="nama_user" class="form-control" required readonly 
                                value='<?=$data['nama_user']; ?>'>
                            <?php endif; endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Paket</label>
                            <select name="id_paket" class="form-control">
                                <option>--Pilih Paket--</option>
                                <?php foreach ($paket as $pkt): ?>
                                <?php if ($pkt['id_paket'] == $edit['id_paket']): ?>
                                    <option value="<?= $pkt['id_paket'] ?>" selected><?= $pkt['nama_paket']; ?></option>
                                <?php endif ?>
                                    <option value="<?= $pkt['id_paket'] ?>"><?php echo "".$pkt['nama_paket']. " - Rp ".$pkt['harga'].""; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?=$edit['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Acara</label>
                            <input type="date" name="tgl_acara" class="form-control" required value="<?=$edit['tgl_acara']?>">
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