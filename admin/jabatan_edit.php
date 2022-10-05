<?php require('atas.php'); $idjabatan = $_GET['idjabatan'];
  $query = mysqli_query($kon, "SELECT * FROM jabatan WHERE idjabatan = '$idjabatan'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="jabatan.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                            <label>Nama Jabatan</label>
                            <select name="jabatannya" class="form-control" required>
                              <option value="<?= $data['jabatannya'] ?>"><?= $data['jabatannya'] ?></option>
                              <option value="Admin Pemula">Admin Pemula</option>
                              <option value="Admin Berpengalaman">Admin Berpengalaman</option>
                              <option value="Teknisi Pemula">Teknisi Pemula</option>
                              <option value="Teknisi Berpengalaman">Teknisi Berpengalaman</option>
                            </select>
                            </div>
                            <div class="form-group">
                              <label>Gaji</label>
                              <input type="number" class="form-control" value="<?= $data['gaji'] ?>" name="gaji" required>
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
    $jabatannya = $_REQUEST['jabatannya'];
    $gaji       = $_REQUEST['gaji'];

    $ubah = mysqli_query($kon,"UPDATE jabatan SET jabatannya = '$jabatannya', gaji = '$gaji' WHERE idjabatan = '$idjabatan'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='jabatan.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='jabatan.php';</script> <?php
    }
  }
?>