<?php require('atas.php') ?>
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
                                <input class="form-control" name="tgl" type="date" value="<?= date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="idinventori" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventori]'>$haikal[namainven] - $haikal[merk]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" name="jumlah" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input class="form-control" type="number" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="ket" required></textarea>
                            </div>
                            
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
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
    $harga         = $_REQUEST['harga'];
    $total         = $jumlah * $harga;

    $tambah = mysqli_query($kon,"INSERT INTO inventorimasuk(tgl,idinventori,ket,jumlah,harga,total) VALUES ('$tgl','$idinventori','$ket','$jumlah','$harga','$total')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='masuk.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='masuk_input.php';</script> <?php
    }
  }
?>