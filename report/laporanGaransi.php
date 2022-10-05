<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM dataservice WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM dataservice WHERE YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}

	if(mysqli_num_rows($result)==0){
    ?> <script>alert('Data Tidak Ditemukan');window.location='../admin/gaji.php'</script> <?php
  }
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: landscape; } </style>
<h2 style="text-align: center;">Laporan Garansi</h2>
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
        <th>Barang</th>
        <th>Nama Pelanggan</th>
        <th>Kerusakan Awal</th>
        <th>Kerusakan Baru</th>
        <th>Garansi</th>
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
    <td><?= $data['barang'] ?></td>
    <td><?= $data['namap'] ?></td>
    <td><?= $data['kerusakan'] ?></td>
    <td><?= $data['kerusakanbaru'] ?></td>
    <td><?php
        $tgl1 = new dateTime($data['garansi']);
        $tgl2 = new dateTime($data['tgl']);
        $e = $tgl2->diff($tgl1)->days + 1;
        echo date('d/m/Y',strtotime($data['garansi'])).' <br><b>('.$e." hari)</b>"; 
    ?>
    </td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>