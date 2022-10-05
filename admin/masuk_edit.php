<?php require('atas.php'); $idinventorimasuk = $_GET['idinventorimasuk'];
  $query = mysqli_query($kon, "SELECT * FROM inventorimasuk INNER JOIN inventori ON inventorimasuk.idinventori = inventori.idinventori WHERE idinventorimasuk = '$idinventorimasuk'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="masuk.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="form-control" type="date" name="tgl" value="<?= $data['tgl'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="idinventori" value="<?= $data['namainven'].' - '.$data['merk'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" name="ket" value="<?= $data['ket'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" min="0" name="jumlah" value="<?= $data['jumlah'] ?>" required>
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
    $tgl       = $_REQUEST['tgl'];
    $idinventori    = $_REQUEST['idinventori'];
    $ket            = $_REQUEST['ket'];
    $jumlah         = $_REQUEST['jumlah'];
    $stok           = $_REQUEST['stok'];

    $ubah = mysqli_query($kon,"UPDATE inventorimasuk SET ket = '$ket', tgl = '$tgl', jumlah = '$jumlah' WHERE idinventorimasuk = '$idinventorimasuk'");
    ?> <script>alert("Berhasil Diubah");window.location='masuk.php';</script> <?php
  }
?>