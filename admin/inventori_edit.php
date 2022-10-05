<?php require('atas.php'); $idinventori = $_GET['idinventori'];
  $query = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="inventori.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="namainven" value="<?= $data['namainven'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input class="form-control" name="merk" value="<?= $data['merk'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                                    <option value="Obeng">Obeng</option>
                                    <option value="CCTV">CCTV</option>
                                    <option value="Tang">Tang</option>
                                    <option value="Solder">Solder</option>
                                    <option value="Multimeter Analog dan Digital">Multimeter Analog dan Digital</option>
                                    <option value="Etalase">Etalase</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bahan</label>
                                <select name="bahan" class="form-control" required>
                                    <option value="<?= $data['bahan'] ?>"><?= $data['bahan'] ?></option>
                                    <option value="Stainless Steel + Plastik">Stainless Steel + Plastik</option>
                                    <option value="Stainless Steel">Stainless Steel</option>
                                    <option value="Plastik">Plastik</option>
                                    <option value="Aluminium">Aluminium</option>
                                    <option value="Besi">Besi</option>
                                </select>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Ubah</button>
                            <button type="reset" class="btn btn-outline btn-default"><i class="fa fa-refresh"></i> Ulangi</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
<?php
  if (isset($_POST['simpan'])) {
    $namainven  = $_REQUEST['namainven'];
    $merk       = $_REQUEST['merk'];
    $jenis      = $_REQUEST['jenis'];
    $bahan      = $_REQUEST['bahan'];

    $ubah = mysqli_query($kon,"UPDATE inventori SET jenis = '$jenis', bahan = '$bahan', merk = '$merk', namainven = '$namainven'WHERE idinventori = '$idinventori'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='inventori.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='inventori.php';</script> <?php
    }
  }
?>