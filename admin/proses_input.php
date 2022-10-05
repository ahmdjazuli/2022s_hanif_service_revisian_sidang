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
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>No. Transaksi - Pelanggan</label>
                                <input class="form-control" type="text" value="<?= $data['notransaksi'].' - '.$data['namap'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Yang Bertugas</label>
                                <input class="form-control" type="text" value="<?= $memori['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kerusakan</label>
                                <input class="form-control" type="text" value="<?= $data['kerusakan']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input class="form-control" type="datetime-local" name="waktu" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" type="text" name="ket" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis" class="form-control" required>
                                    <option value="Service">Service</option>
                                    <option value="Sparepart">Sparepart</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Biaya</label>
                                <input class="form-control" type="number" name="biaya" required>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
                            <button type="reset" class="btn btn-outline btn-default"><i class="fa fa-refresh"></i> Ulangi</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Riwayat Service</b></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu (WITA)</th>
                                        <th>Yang Bertugas</th>
                                        <th>Keterangan</th>
                                        <th>Jenis</th>
                                        <th>Biaya</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; $proses = mysqli_query($kon, "SELECT * FROM proses INNER JOIN user ON proses.id = user.id WHERE notransaksi = '$notransaksi' ORDER BY waktu ASC");
                                    while($data = mysqli_fetch_array($proses)){ ?>
                                        <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= date('d/m/Y,H:i',strtotime($data['waktu'])) ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['ket'] ?></td>
                                                <td><?= $data['jenis'] ?></td>
                                                <td><?= $data['biaya'] ?></td>
                                                <td>
                                                    <a href="proses_input.php?idproses=<?php echo $data['idproses'] ?>&notransaksi=<?= $notransaksi ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                    <?php } ?>
                                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
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
    $waktu = $_REQUEST['waktu'];
    $ket   = $_REQUEST['ket'];
    $biaya = $_REQUEST['biaya'];
    $jenis = $_REQUEST['jenis'];

    $tambah = mysqli_query($kon,"INSERT INTO proses(waktu,ket,notransaksi,biaya,id,jenis) VALUES ('$waktu','$ket','$notransaksi','$biaya','$memori[id]','$jenis')");
    if($tambah){
      ?> <script>window.location='proses_input.php?notransaksi=<?=$notransaksi?>';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='proses_input.php?notransaksi=<?=$notransaksi?>';</script> <?php
    }
  }

  if (isset($_GET['idproses'])) {
        mysqli_query($kon, "DELETE FROM proses WHERE idproses='$_REQUEST[idproses]'");
        echo ("<meta http-equiv='refresh' content='1'>");
        ?><script>window.location='proses_input.php?notransaksi=<?= $notransaksi ?>'</script><?php
    }
?>