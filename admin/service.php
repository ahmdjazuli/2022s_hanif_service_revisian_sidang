<?php require('atas.php'); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm" style="margin:0 auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cetak</h4>
            </div>
            <div class="modal-body">
                <form action="../report/laporanService.php" target="_blank" method="post">
                <label>Bulan</label>
                <select name="bulan" class="form-control">
                  <option value="">Pilih</option>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT MONTH(tgl) as bulan FROM dataservice ORDER BY bulan ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                    $bulan = $baris['bulan']; 
                      if($bulan == 1){ $namabulan = "Januari";
                        }else if($bulan == 2){ $namabulan = "Februari";
                        }else if($bulan == 3){ $namabulan = "Maret";
                        }else if($bulan == 4){ $namabulan = "April";
                        }else if($bulan == 5){ $namabulan = "Mei";
                        }else if($bulan == 6){ $namabulan = "Juni";
                        }else if($bulan == 7){ $namabulan = "Juli";
                        }else if($bulan == 8){ $namabulan = "Agustus";
                        }else if($bulan == 9){ $namabulan = "September";
                        }else if($bulan == 10){ $namabulan = "Oktober";
                        }else if($bulan == 11){ $namabulan = "November";
                        }else if($bulan == 12){ $namabulan = "Desember";
                        } ?><option value="<?= $baris['bulan'] ?>"><?= $namabulan; ?></option> 
                      }
                    <?php } ?>
                </select><br>
                <label>Tahun</label>
                <select name="tahun" class="form-control" required>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM dataservice ORDER BY tahun ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                        ?><option value="<?= $baris['tahun'] ?>"><?= $baris['tahun']; ?></option> 
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="service_input.php" style="color: white; text-decoration: none">+Data Service</a></button>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Cetak </button></h1>
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
                                        <th>No Urut</th>
                                        <th>Yang Bertugas</th>
                                        <th>Barang (Merk)</th>
                                        <th>Jenis</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Kerusakan</th>
                                        <th>Metode</th>
                                        <th>Garansi</th>
                                        <th>Status</th>
                                        <th>Biaya</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM dataservice ORDER BY urut DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y',strtotime($data['tgl'])) ?></td>
                                                    <td><a href="../report/cetaknota.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a></a>
                                                    </td>
                                                    <td><?= $data['urut'] ?></td>
                                                    <td><?= $data['bertugas'] ?></td>
                                                    <td><?= $data['barang'].' ('.$data['merk'].')' ?></td>
                                                    <td><?= $data['jenis'] ?></td>
                                                    <td><?= $data['namap'] ?></td>
                                                    <td><?= $data['kerusakan'] ?></td>
                                                    <td><?= $data['metode'] ?></td>
                                                    <td><?php
                                                        if($data['garansi'] != '0000-00-00'){
                                                            $tgl1 = new dateTime($data['garansi']);
                                                            $tgl2 = new dateTime($data['tgl']);
                                                            $tgl3 = new dateTime(date('Y-m-d'));
                                                            $e = $tgl2->diff($tgl1)->days + 1;
                                                            $d = $tgl3->diff($tgl1)->days + 1;
                                                            if(date('Y-m-d')<$data['garansi']){
                                                                $sisa = "<a class='btn btn-primary btn-sm' href='garansi_input.php?notransaksi=$data[notransaksi]'>Sisa <i>".$d." hari</i></a>";
                                                            }else if(date('Y-m-d')>$data['garansi']){
                                                                $sisa = '<b class="text-danger">Tidak Berlaku</b>';
                                                            }echo date('d/m/Y',strtotime($data['garansi'])).' <br><b>('.$e." hari)</b><br>".$sisa; 
                                                        }else{
                                                            echo 'Belum Diisi';
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        $ohh = $data['notransaksi'];
                                                        $gini = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$ohh' ORDER BY waktu DESC");
                                                        $lah = mysqli_fetch_array($gini);
                                                        if($lah['ket']=='Selesai'){ ?>
                                                            <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Riwayat Service</a>
                                                            <a target="_blank" class="btn btn-info btn-sm" href="https://wa.me/?phone=<?= $data['telpp'] ?>&text=Halo, <?= $data['namap'] ?>.%20Kami%20dari%20HanifKomputer%20memberitahukan%20bahwa%0A%0AService%20Anda%20pada%20_No.Transaksi%20:%20<?= $data['notransaksi'] ?>%20telah%20*SELESAI*.">Selesai</a>
                                                        <?php }else{ ?>
                                                            <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Riwayat Service</a><?php
                                                        } ?></td>
                                                    <td><?php
                                                    $kuku = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$data[notransaksi]'");
                                                    $total = 0;
                                                    while ($row = mysqli_fetch_array($kuku)) {
                                                        $total += $row['biaya'];
                                                    }; echo number_format($total,0,'.','.');
                                                    ?></td>
                                                    <td>
                                                    <a href="service_edit.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a><a href="delete.php?notransaksi=<?php echo $data['notransaksi'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
<?php require('bawah.php') ?>
