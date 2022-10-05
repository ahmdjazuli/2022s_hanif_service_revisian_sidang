<?php require('atas.php'); $idproses = $_GET['idproses'];
  $query = mysqli_query($kon, "SELECT * FROM proses WHERE idproses = '$idproses'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="proses.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>No Transaksi</label>
                                <input class="form-control" type="text" value="<?= $data['notransaksi'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Waktu Transaksi</label>
                               <input type="datetime-local" name="waktu" class="form-control" value="<?php echo date('Y-m-d\TH:i',strtotime($data['waktu'])) ?>">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" name="ket" value="<?= $data['ket'] ?>" required>
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
    $waktu   = $_REQUEST['waktu'];
    $ket    = $_REQUEST['ket'];

    $ubah = mysqli_query($kon,"UPDATE proses SET waktu = '$waktu', ket = '$ket' WHERE idproses = '$idproses'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='proses.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='proses.php';</script> <?php
    }
  }
?>