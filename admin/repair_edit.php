<?php require('atas.php'); $idinventorikeluar = $_GET['idinventorikeluar'];
  $query = mysqli_query($kon, "SELECT * FROM inventorikeluar INNER JOIN  inventori ON inventorikeluar.idinventori = inventori.idinventori INNER JOIN user ON inventorikeluar.id = user.id WHERE idinventorikeluar = '$idinventorikeluar'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="repair.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="idinventori" value="<?= $data['namainven'].' - '.$data['merk'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input class="form-control" type="date" name="tglkeluar" value="<?= $data['tglkeluar'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" name="catatan" value="<?= $data['catatan'] ?>" required>
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
    $tglkeluar = $_REQUEST['tglkeluar'];
    $catatan   = $_REQUEST['catatan'];

    $ubah = mysqli_query($kon,"UPDATE inventorikeluar SET catatan = '$catatan', tglkeluar = '$tglkeluar' WHERE idinventorikeluar = '$idinventorikeluar'");
    ?> <script>alert("Berhasil Diubah");window.location='repair.php';</script> <?php
  }
?>