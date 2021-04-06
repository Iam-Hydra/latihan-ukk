<?php

require 'admin.php';
$query = "SELECT transaksi.*, member.nama_member, detail_transaksi.total_harga, outlet.nama_outlet FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi INNER JOIN outlet ON outlet.id_outlet = transaksi.outlet_id";



$data = ambildata($conn,$query);
setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Cetak |E-Laundry</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/toast/css/jquery.toast.css" rel="stylesheet">
	<link href="../assets/css/my.css" rel="stylesheet">
	<link href="../assets/datatables/datatables.min.css" rel="stylesheet">
	
	<!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ac90a6a951.js" crossorigin="anonymous"></script>

<div class="main container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Cetak Laporan 
      <h5>Petugas : <?= $_SESSION['nama_user'];?></h5>
      <h5>Jabatan : <?= $_SESSION['role'];?></h5>
      <h5>Jabatan : <?= strftime('%d %B %Y')?></h5>
    </div>
  </div><!--/.row-->
  
  
  <div class="row">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>kode</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Pemabayaran</th>
                  <th>Total Harga</th>
                  <th>Outlet</th>
                </tr>
              </thead>
              <tbody>
                <?php if($data != 0): ?>
                <?php $no=1; foreach($data as $transaksi): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($transaksi['kode_invoice']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_member']); ?></td>
                    <td><?= htmlspecialchars($transaksi['status']); ?></td>
                    <td><?= htmlspecialchars($transaksi['status_bayar']); ?></td>
                    <td><?= 'Rp. '.htmlspecialchars($transaksi['total_harga']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_outlet']); ?></td>
                  </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
<?php require 'footer.php'; ?>


<script>
  window.print();
</script>