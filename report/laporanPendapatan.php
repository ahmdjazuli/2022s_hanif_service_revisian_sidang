<?php 
require "../kon.php"; error_reporting(0);
	$tahun = $_REQUEST['tahun'];
  $bulan = $_REQUEST['bulan'];
	if($tahun AND $bulan){
		$query = mysqli_query($kon, "SELECT MONTH(waktu) as bulan, YEAR(waktu) as tahun, SUM(biaya) as total FROM proses WHERE YEAR(waktu) = '$tahun' AND MONTH(waktu) = '$bulan'");
	}else if($tahun AND empty($bulan)){
    $query = mysqli_query($kon, "SELECT SUM(biaya) as total, MONTH(waktu) as bulan, YEAR(waktu) as tahun FROM `proses` WHERE YEAR(waktu) = '$tahun' GROUP BY bulan ORDER BY waktu ASC");
  }
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Pendapatan</h2>
<h5 class="text-center">Dicetak pada tanggal : <?= date('Y-m-d') ?></h5>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Periode</th>
        <th>Total Pendapatan dari Service</th>
      </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($query) ) :
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?php 
      if($data['bulan'] == 6){echo 'Juni'.' - '. $data['tahun']; }
      else if($data['bulan'] == 7){echo 'Juli'.' - '. $data['tahun']; }
      else if($data['bulan'] == 8){echo 'Agustus'.' - '. $data['tahun']; }
      else if($data['bulan'] == 9){echo 'September'.' - '. $data['tahun']; }
      else if($data['bulan'] == 10){echo 'Oktober'.' - '. $data['tahun']; }
      else if($data['bulan'] == 11){echo 'November'.' - '. $data['tahun']; }
      else if($data['bulan'] == 12){echo 'Desember'.' - '. $data['tahun']; }
      else if($data['bulan'] == 1){echo 'Januari'.' - '. $data['tahun']; }
      else if($data['bulan'] == 2){echo 'Februari'.' - '. $data['tahun']; }
      else if($data['bulan'] == 3){echo 'Maret'.' - '. $data['tahun']; }
      else if($data['bulan'] == 4){echo 'April'.' - '. $data['tahun']; }
      else if($data['bulan'] == 5){echo 'Mei'.' - '. $data['tahun']; }
    ?></td>
    <td>Rp. <?= number_format($data['total'],0,'.','.') ?></td>
</tr>
<?php $total+=$data['total']; ?>
<?php endwhile; ?>
<?php if($tahun AND empty($bulan)){ ?>
  <tr class="text-center">
    <td colspan="2"><b>Total Pendapatan Tahun <?= $tahun ?></b></td>
    <td><b>Rp. <?= number_format($total,0,'.','.') ?></b></td>
  </tr>
<?php } ?>
  </table>
</div>	
<?php require('zzz.php') ?>