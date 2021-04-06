<?php

$title = 'Laporan';
require 'admin.php';
require 'header.php';
$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'Dibayar' GROUP BY detail_transaksi.paket_id");

?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="index.php">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </div><!--/.row-->
  
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?= $title; ?></h1>
    </div>
  </div><!--/.row-->
  <div class="panel panel-container">
    <div class="row" style="padding: 0 15px 20px 15px;">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="col-md-6">
          <a href="#" class="btn btn-orange box-title"><i class="fa fa-print fa-fw"></i>Cetak Laporan</a>
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-container">

  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <div class="panel panel-container">
        <div style="padding: 0 30px 30px 30px;">
          <h3 style="padding: 0 0 20px 0;">Laporan Penjualan Paket</h3>
          <div class="table-responsive">
            <table class="table table-bordered thead-dark" id="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Paket</th>
                  <th>Jumlah Transaksi</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Hasil</th>
                </tr>
              </thead>
              <tbody>
                <?php if($penjualan != 0): ?>
                <?php $no=1; foreach($penjualan as $transaksi): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($transaksi['nama_paket']); ?></td>
                  <td><?= htmlspecialchars($transaksi['jumlah_paket']); ?></td>
                  <td><?= htmlspecialchars($transaksi['tgl_pembayaran']); ?></td>
                  <td><?= 'Rp. '.htmlspecialchars($transaksi['total']); ?></td>                                    
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require 'footer.php'; ?>