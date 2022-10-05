<?php 
require "../kon.php"; error_reporting(0);
	$hari = $_REQUEST['hari'];
	if($hari){
		$query = mysqli_query($kon, "SELECT * FROM `proses` WHERE DATE(waktu) = '$hari' GROUP BY DATE(waktu) ORDER BY waktu ASC");
	}

  if(mysqli_num_rows($query)==0){
    ?> <script>alert('Data Tidak Ditemukan');window.location='../admin/pendapatan2.php'</script> <?php
  }
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Pendapatan Harian</h2>
<h5 class="text-center">Dicetak pada tanggal : <?= date('Y-m-d') ?></h5>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Total Pendapatan dari Service</th>
      </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($query) ) :
  $service = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(biaya) as total FROM proses WHERE DATE(waktu) = '$hari'"));
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= tgl_indo($hari) ?></td>
    <td>Rp. <?= number_format($service['total'],0,'.','.') ?></td>
</tr>
<?php $total+=$bersih; ?>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>