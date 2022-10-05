<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM dataservice WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY urut DESC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM dataservice WHERE YEAR(tgl) = '$tahun' ORDER BY urut DESC");
	}

	if(mysqli_num_rows($result)==0){
    ?> <script>alert('Data Tidak Ditemukan');window.location='../admin/service.php'</script> <?php
  }
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: landscape; } </style>
<h2 style="text-align: center;">Laporan Service</h2>
<h4 style="text-align: center;">
	<?php 
		if($bulan AND $tahun){
			echo "Bulan <b>". $namabulan."</b> pada Tahun <b>".$tahun."</b>";
		}else if($tahun AND empty($bulan)){
			echo "Tahun ". $tahun;
		}
	?>
</h4>
<h5 class="text-center">Dicetak pada tanggal : <?= date('Y-m-d') ?></h5>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>No.Transaksi </th>
        <th>No Urut</th>
        <th>Yang Bertugas</th>
        <th>Barang (Merk)</th>
        <th>Jenis</th>
        <th>Nama Pelanggan</th>
        <th>Kerusakan</th>
        <th>Metode</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= date('d/m/Y',strtotime($data['tgl'])) ?></td>
    <td><?= $data['notransaksi'] ?></td>
    <td><?= $data['urut'] ?></td>
    <td><?= $data['bertugas'] ?></td>
    <td><?= $data['barang'].' ('.$data['merk'].')' ?></td>
    <td><?= $data['jenis'] ?></td>
    <td><?= $data['namap'] ?></td>
    <td><?= $data['kerusakan'] ?></td>
    <td><?= $data['metode'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>