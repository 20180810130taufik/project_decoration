<?php
    $title = 'Booking';
    require 'functions.php';
    require '../layout/layout_header.php';
    $query = 'SELECT booking.*, users.nama_user, paket.nama_paket FROM booking INNER JOIN users ON users.id_user = booking.id_user INNER JOIN paket ON paket.id_paket = booking.id_paket';
    $data = getdata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Booking</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Booking</a></li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="tambah_booking.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered thead-dark" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Paket</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Acara</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $booking): ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $booking['nama_user'] ?></td>
                                        <td><?= $booking['nama_paket'] ?></td>
                                        <td><?= $booking['alamat'] ?></td>
                                        <td><?= $booking['tgl_acara'] ?></td>
                                        <td align="center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="edit_booking.php?id=<?= $booking['id_booking']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                              <a href="hapus_booking.php?id=<?= $booking['id_booking']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                          </div>
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
  require '../layout/layout_footer.php';
?>