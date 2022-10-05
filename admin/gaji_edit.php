<?php require('atas.php'); $idgaji = $_GET['idgaji'];
  $query = mysqli_query($kon, "SELECT * FROM gaji INNER JOIN user ON gaji.id = user.id INNER JOIN jabatan ON jabatan.idjabatan = gaji.idjabatan WHERE idgaji = '$idgaji'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="gaji.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
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
                                <label>Nama Karyawan</label>
                                <select name="id" class="form-control" required>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM user WHERE level = 'Karyawan' ORDER BY nama ASC");
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[id]'>$haikal[nama]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Jabatan Saat Ini</label>
                              <input type="text" class="form-control" value="<?= $data['jabatannya'] ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Tunjangan</label>
                              <input type="hidden" name="gajinya" value="<?= $data['gajinya'] ?>">
                              <input type="number" class="form-control" value="<?= $data['tunjangan'] ?>" name="tunjangan">
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
    $tgl  = $_REQUEST['tgl'];
    $id  = $_REQUEST['id'];
    $ket       = $_REQUEST['ket'];
    $tunjangan = $_REQUEST['tunjangan'];
    $total     = $_REQUEST['gajinya']+$tunjangan;

    $ubah = mysqli_query($kon,"UPDATE gaji SET id = '$id', tgl = '$tgl', total = '$total', tunjangan = '$tunjangan' WHERE idgaji = '$idgaji'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='gaji.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='gaji.php';</script> <?php
    }
  }
?>