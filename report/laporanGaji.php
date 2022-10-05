<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM gaji INNER JOIN user ON gaji.id = user.id INNER JOIN jabatan ON jabatan.idjabatan = gaji.idjabatan WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM gaji INNER JOIN user ON gaji.id = user.id INNER JOIN jabatan ON jabatan.idjabatan = gaji.idjabatan WHERE YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}

	if(mysqli_num_rows($result)==0){
    ?> <script>alert('Data Tidak Ditemukan');window.location='../admin/gaji.php'</script> <?php
  }
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: landscape; } </style>
<h2 style="text-align: center;">Laporan Gaji Karyawan</h2>
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
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Gaji (Rp)</th>
        <th>Tunjangan (Rp)</th>
        <th>Total (Rp)</th>
        <th>Keterangan</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= tgl_indo($data['tgl']) ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['jabatannya'] ?></td>
    <td><?= number_format($data['gajinya'],0,'.','.') ?></td>
    <td><?= number_format($data['tunjangan'],0,'.','.') ?></td>
    <td><?= number_format($data['total'],0,'.','.') ?></td>
    <td><?= $data['ket'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>