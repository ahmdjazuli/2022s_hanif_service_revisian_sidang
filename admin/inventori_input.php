<?php require('atas.php') ?>
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
                                <input class="form-control" type="text" name="namainven" required>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input class="form-control" type="text" name="merk" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="Obeng">Obeng</option>
                                    <option value="CCTV">CCTV</option>
                                    <option value="Tang">Tang</option>
                                    <option value="Solder">Solder</option>
                                    <option value="Multimeter Analog dan Digital">Multimeter Analog dan Digital</option>
                                    <option value="Etalase">Etalase</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Motherboard">Motherboard</option>
                                    <option value="Keyboard">Keyboard</option>
                                    <option value="Mouse">Mouse</option>
                                    <option value="Processor">Processor</option>
                                    <option value="DLL">DLL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bahan</label>
                                <select name="bahan" class="form-control" required>
                                    <option value="Stainless Steel + Plastik">Stainless Steel + Plastik</option>
                                    <option value="Stainless Steel">Stainless Steel</option>
                                    <option value="Plastik">Plastik</option>
                                    <option value="Aluminium">Aluminium</option>
                                    <option value="Besi">Besi</option>
                                </select>
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
    $merk       = $_REQUEST['merk'];
    $namainven  = $_REQUEST['namainven'];
    $jenis      = $_REQUEST['jenis'];
    $bahan      = $_REQUEST['bahan'];

    $tambah = mysqli_query($kon,"INSERT INTO inventori(merk,namainven,stok,jenis,bahan) VALUES ('$merk','$namainven',0,'$jenis','$bahan')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='inventori.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='inventori_input.php';</script> <?php
    }
  }
?>