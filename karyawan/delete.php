<?php
	error_reporting(0);
	require_once("../kon.php");
	?> <script>alert('Berhasil Dihapus');</script> <?php
	// user
	if (isset($_GET['id'])) {
		mysqli_query($kon, "DELETE FROM user WHERE id='$_REQUEST[id]'");
		?> <script>window.location='user.php';</script> <?php
	// inventori
	}else if (isset($_GET['idinventori'])) {
		mysqli_query($kon, "DELETE FROM inventori WHERE idinventori='$_REQUEST[idinventori]'");
		?> <script>window.location='inventori.php';</script> <?php
	// rusak
	}else if (isset($_GET['idinventorirusak'])) {
		mysqli_query($kon, "DELETE FROM inventorirusak WHERE idinventorirusak='$_REQUEST[idinventorirusak]'");
		?> <script>window.location='rusak.php';</script> <?php
	// biaya
	}else if (isset($_GET['idbiaya'])) {
		mysqli_query($kon, "DELETE FROM biaya WHERE idbiaya='$_REQUEST[idbiaya]'");
		?> <script>window.location='biaya.php';</script> <?php
	// masuk
	}else if (isset($_GET['idinventorimasuk'])) {
		mysqli_query($kon, "DELETE FROM inventorimasuk WHERE idinventorimasuk='$_REQUEST[idinventorimasuk]'");
		?> <script>window.location='masuk.php';</script> <?php
	// jenis
	}else if (isset($_GET['idjenis'])) {
		mysqli_query($kon, "DELETE FROM jenis WHERE idjenis='$_REQUEST[idjenis]'");
		?> <script>window.location='jenis.php';</script> <?php
	// gaji
	}else if (isset($_GET['idgaji'])) {
		mysqli_query($kon, "DELETE FROM gaji WHERE idgaji='$_REQUEST[idgaji]'");
		?> <script>window.location='gaji.php';</script> <?php
	// service
	}else if (isset($_GET['notransaksi'])) {
		mysqli_query($kon, "DELETE FROM dataservice WHERE notransaksi='$_REQUEST[notransaksi]'");
		?> <script>window.location='service.php';</script> <?php
	// repair
	}else if (isset($_GET['idinventorikeluar'])) {
		mysqli_query($kon, "DELETE FROM inventorikeluar WHERE idinventorikeluar='$_REQUEST[idinventorikeluar]'");
		?> <script>window.location='repair.php';</script> <?php
	}
?>