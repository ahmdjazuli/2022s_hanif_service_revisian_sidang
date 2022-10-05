<?php require('atas.php') ?>
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
                                <input class="form-control" type="date" name="tgl" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>No. Urut</label>
                                <input class="form-control" type="number" name="urut" required>
                            </div>
                            <div class="form-group">
                                <label>Barang</label>
                                <input class="form-control" type="text" name="barang" required>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input class="form-control" type="text" name="merk" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control" required>
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
                                <label>Nama Pelanggan</label>
                                <select onchange='ubah(this.value)' class="form-control" required>
                                    <option>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM user WHERE level = 'Pelanggan' ORDER BY nama ASC");
                                    $a    = "var nama = new Array();\n;";
                                    $b    = "var alamat = new Array();\n;";
                                    $c    = "var telp = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[id]'>$haikal[nama]</option>";
                                        $a .= "nama['" . $haikal['id'] . "'] = {nama:'" . addslashes($haikal['nama'])."'};\n";
                                        $b .= "alamat['" . $haikal['id'] . "'] = {alamat:'" . addslashes($haikal['alamat'])."'};\n";
                                        $c .= "telp['" . $haikal['id'] . "'] = {telp:'" . addslashes($haikal['telp'])."'};\n";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Teknisi</label>
                                <select class="form-control" required name="bertugas">
                                    <option>Pilih</option>
                                  <?php
                                    $joko = mysqli_query($kon, "SELECT * FROM user WHERE tugas = 'Service' ORDER BY nama ASC");
                                      while($ridwan = mysqli_fetch_array($joko)) {
                                        echo "<option value='$ridwan[nama]'>$ridwan[nama]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kerusakan</label>
                                <input class="form-control" type="text" name="kerusakan" required>
                                <input class="form-control" type="hidden" name="nama" id="nama" required>
                                <input class="form-control" type="hidden" name="alamat" id="alamat" required>
                                <input class="form-control" type="hidden" name="telp" id="telp" required>
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
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $tgl         = $_REQUEST['tgl'];
    $kerusakan   = $_REQUEST['kerusakan'];
    $merk = $_REQUEST['merk'];
    $nama        = $_REQUEST['nama'];
    $alamat      = $_REQUEST['alamat'];
    $telp        = $_REQUEST['telp'];
    $barang      = $_REQUEST['barang'];
    $jenis       = $_REQUEST['jenis'];
    $urut        = $_REQUEST['urut'];
    $bertugas    = $_REQUEST['bertugas'];
    $notransaksi = date('Ymds');

    $tambah = mysqli_query($kon,"INSERT INTO dataservice(tgl,kerusakan,merk,namap,alamatp,telpp,notransaksi,barang,jenis,metode,urut,bertugas) VALUES ('$tgl','$kerusakan','$merk','$nama','$alamat','$telp','$notransaksi','$barang','$jenis','Langsung','$urut','$bertugas')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='service.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='service_input.php';</script> <?php
    }
  }
?>
<script>   
        <?php echo $a;echo $b;echo $c; ?>
            function ubah(id){  
            document.getElementById('nama').value = nama[id].nama; 
            document.getElementById('alamat').value = alamat[id].alamat; 
            document.getElementById('telp').value = telp[id].telp; 
        }; 
    </script>