<?php require('atas.php') ?>
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
                                <label>Tanggal Keluar</label>
                                <input class="form-control" name="tglkeluar" type="date" value="<?= date('Y-m-d')?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="idinventori" class="form-control" onchange='ubah(this.value)' required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                    $a    = "var maxStok = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventori]'>$haikal[namainven] - $haikal[merk]</option>";
                                        $a .= "maxStok['" . $haikal['idinventori'] . "'] = {maxStok:'" . addslashes($haikal['jumlah'])."'};\n";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" id="maxStok" name="jumlah" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="catatan" required></textarea>
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
    $tglkeluar   = $_REQUEST['tglkeluar'];
    $idinventori = $_REQUEST['idinventori'];
    $catatan     = $_REQUEST['catatan'];
    $jumlah      = $_REQUEST['jumlah'];

    $tambah = mysqli_query($kon,"INSERT INTO inventorikeluar (tglkeluar,idinventori,catatan,jumlah,id) VALUES ('$tglkeluar','$idinventori','$catatan','$jumlah','$memori[id]')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='repair.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='repair_input.php';</script> <?php
    }
  }
?>

<script>   
  <?php echo $a; ?>
  function ubah(id){  
      document.getElementById('maxStok').max = maxStok[id].maxStok; 
  };   
</script> 