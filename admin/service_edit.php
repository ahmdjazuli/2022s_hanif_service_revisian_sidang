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
                                <label>Tanggal</label>
                                <input class="form-control" type="date" name="tgl" value="<?= $data['tgl'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>No. Transaksi</label>
                                <input class="form-control" value="<?= $data['notransaksi'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input class="form-control" value="<?= $data['namap'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Barang</label>
                                <input class="form-control" name="barang" value="<?= $data['barang'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input class="form-control" type="text" name="merk" value="<?= $data['merk'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="PC">PC</option>
                                    <option value="Motherboard">Motherboard</option>
                                    <option value="CCTV">CCTV</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="Mechanical Keyboard">Mechanical Keyboard</option>
                                    <option value="Keyboard Biasa">Keyboard Biasa</option>
                                    <option value="Notebook">Notebook</option>
                                    <option value="Netbook">Netbook</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kerusakan</label>
                                <input class="form-control" name="kerusakan" value="<?= $data['kerusakan'] ?>" required>
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
    $merk      = $_REQUEST['merk'];
    $tgl       = $_REQUEST['tgl'];
    $kerusakan = $_REQUEST['kerusakan'];
    $jenis     = $_REQUEST['jenis'];
    $barang    = $_REQUEST['barang'];
    $urut      = $_REQUEST['urut'];

    $ubah = mysqli_query($kon,"UPDATE dataservice SET merk = '$merk', tgl = '$tgl', kerusakan = '$kerusakan', jenis = '$jenis', barang = '$barang', urut = '$urut' WHERE notransaksi = '$notransaksi'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='service.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='service.php';</script> <?php
    }
  }
?>