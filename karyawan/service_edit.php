<?php require('atas.php'); $notransaksi = $_GET['notransaksi'];
  $query = mysqli_query($kon, "SELECT * FROM dataservice WHERE notransaksi = '$notransaksi'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="service.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                             <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input class="form-control" type="date" value="<?= $data['tgl'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Pelanggan dan Barang yang Diservice</label>
                                <input class="form-control" value="<?= $data['namap'].' - '.$data['barang'].' ('.$data['jenis'].')' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kerusakan</label>
                                <input class="form-control" value="<?= $data['kerusakan'] ?>" name="kerusakan" required>
                            </div>
                            <div class="form-group">
                                <label>Kondisi Barang</label>
                                <select name="kondisibrg" class="form-control" required>
                                    <option value="Baik">Baik</option>
                                    <option value="Masih Rusak">Masih Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Garansi</label>
                                <input class="form-control" name="garansi" type="date" value="<?= $data['garansi'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>No. Urut</label>
                                <input class="form-control" name="urut" value="<?= $data['urut'] ?>" required>
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
    $kondisibrg = $_REQUEST['kondisibrg'];
    $garansi  = $_REQUEST['garansi'];
    $kerusakan = $_REQUEST['kerusakan'];
    $urut = $_REQUEST['urut'];

    $ubah = mysqli_query($kon,"UPDATE dataservice SET kondisibrg = '$kondisibrg', garansi = '$garansi', kerusakan = '$kerusakan', urut = '$urut' WHERE notransaksi = '$notransaksi'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='service.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='service.php';</script> <?php
    }
  }
?>
