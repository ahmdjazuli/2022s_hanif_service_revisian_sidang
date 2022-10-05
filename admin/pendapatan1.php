<?php require('atas.php'); error_reporting(0); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm" style="margin:0 auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cetak</h4>
            </div>
            <div class="modal-body">
                <form action="../report/laporanPendapatan.php" target="_blank" method="post">
                <label>Bulan</label>
                <select name="bulan" class="form-control">
                  <option value="">Pilih</option>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT MONTH(waktu) as bulan FROM `proses` ORDER BY bulan ASC");
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
                        } ?><option value="<?= $baris[bulan] ?>"><?= $namabulan; ?></option> 
                      }
                    <?php } ?>
                </select><br>
                <label>Tahun</label>
                <select name="tahun" class="form-control" required>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM proses ORDER BY tahun ASC");
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
                <h1 class="page-header"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Data Pendapatan Bulanan (Rp) </button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Total Pendapatan dari Service</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT SUM(biaya) as total, MONTH(waktu) as bulan, YEAR(waktu) as tahun FROM `proses` GROUP BY bulan ORDER BY waktu ASC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr>
                          <td><?= $no++ ?></td> 
                          <td><?php 
                            if($data['bulan'] == 6){echo 'Juni'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 7){echo 'Juli'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 8){echo 'Agustus'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 9){echo 'September'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 10){echo 'Oktober'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 11){echo 'November'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 12){echo 'Desember'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 1){echo 'Januari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 2){echo 'Februari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 3){echo 'Maret'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 4){echo 'April'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 5){echo 'Mei'.' - '. $data['tahun']; }
                          ?></td>
                          <td>Rp. <?= number_format($data['total'],0,'.','.') ?></td>
                        <?php 
                      }
                    ?>
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
