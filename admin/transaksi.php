<?php
$title = 'Transaksi';
require 'functions.php';
require '../layout/layout_header.php';
$query = "SELECT transaksi.*,booking.id_user FROM transaksi INNER JOIN booking ON booking.id_booking = transaksi.id_booking ";
$data = getdata($conn,$query);
?> 
<div class="container-fluid">
  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Data Master <?= $title ?></h4> </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="#">Transaksi</a></li>
        </ol>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
          <div class="row">
            <div class="col-md-6">
              <a href="transaksi_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered thead-dark" id="table">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Nama Pelanggan</th>
                  <th>Waktu Pembayaran</th>
                  <th width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $transaksi): ?>
                  <tr>
                    <td></td>
                    <td>
                      <?php 
                        $que = "SELECT * FROM users WHERE id_user = '".$transaksi['id_user']."'";
                        $usr = get_by_id($conn,$que);
                        echo $usr['nama_user']; ?></td>
                    <td><?= $transaksi['waktu_pembayaran'] ?></td>
                    <td align="center">
                      <a href="transaksi_detail.php?id=<?= $transaksi['id_booking']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success btn-block">Detail</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">

    </div>
  </div>
  <?php
    require'../layout/layout_footer.php';
  ?>