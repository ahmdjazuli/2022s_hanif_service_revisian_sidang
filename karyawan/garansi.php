<?php require('atas.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Garansi</h1>
            </div>
        </div>
        <?php if(isset($_GET['nota'])){ ?>
            <div class="alert alert-success">
                Klik pada No.Transaksi untuk <a href="transaksi.php" class="alert-link">Mencetak Nota</a>.
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No.Transaksi </th>
                                        <th>Barang</th>
                                        <th>Pelanggan</th>
                                        <th>Kerusakan Awal</th>
                                        <th>Kerusakan Baru</th>
                                        <th>Garansi</th>
                                        <th>Status</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM dataservice WHERE kerusakanbaru != '' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y',strtotime($data['tgl'])) ?></td>
                                                    <td><a href="../report/cetaknota.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a></a>
                                                    </td>
                                                    <td><?= $data['barang'] ?></td>
                                                    <td><?= $data['namap'] ?></td>
                                                    <td><?= $data['kerusakan'] ?></td>
                                                    <td><?= $data['kerusakanbaru'] ?></td>
                                                    <td><?php
                                                        $tgl1 = new dateTime($data['garansi']);
                                                        $tgl2 = new dateTime($data['tgl']);
                                                        $tgl3 = new dateTime(date('Y-m-d'));
                                                        $e = $tgl2->diff($tgl1)->days + 1;
                                                        $d = $tgl3->diff($tgl1)->days + 1;
                                                        if(date('Y-m-d')<$data['garansi']){
                                                            $sisa = 'Sisa <i>'.$d.' hari</i>';
                                                        }else if(date('Y-m-d')>$data['garansi']){
                                                            $sisa = '<b class="text-danger">Tidak Berlaku</b>';
                                                        }
                                                        echo date('d/m/Y',strtotime($data['garansi'])).' <br><b>('.$e." hari)</b><br>".$sisa; 
                                                    ?>
                                                    </td>
                                                    <td><?php 
$ohh = $data['notransaksi'];
$gini = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$ohh' ORDER BY waktu DESC");
$lah = mysqli_fetch_array($gini);
if($lah['ket']=='Selesai' AND $data['kondisibrg'] == 'Masih Rusak'){ ?>
    <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Proses</a>
<?php }else if($lah['ket']=='Selesai' AND $data['kondisibrg'] == 'Baik'){ ?>
    <a target="_blank" class="btn btn-info btn-sm" href="https://wa.me/?phone=<?= $data['telpp'] ?>&text=Halo, <?= $data['namap'] ?>.%20Kami%20dari%20HanifKomputer%20memberitahukan%20bahwa%0A%0AGaransi%20Service%20Anda%20pada%20_No.Transaksi%20:%20<?= $data['notransaksi'] ?>%20telah%20*SELESAI*.">Selesai</a>
<?php }else{ ?>
    <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Proses</a><?php
} ?></td>
                                                    <td>
                                                    <a href="garansi_edit.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
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
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php');
if (isset($_GET['notransaksi'])) {
    $ubah = mysqli_query($kon,"UPDATE dataservice SET kerusakanbaru = '' WHERE notransaksi = '$_REQUEST[notransaksi]'");
    if($ubah){
        ?> <script>alert("Berhasil Dihapus");window.location='garansi.php';</script> <?php
    }else{
        ?> <script>alert("Gagal Dihapus");window.location='garansi.php';</script> <?php
    }
    
} ?>
