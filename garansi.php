<?php require('header.php');?>
	</div>
  <div class="collection_text">Data Garansi Anda</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No.Transaksi </th>
                                    <th>Barang</th>
                                    <th>Kerusakan Awal</th>
                                    <th>Kerusakan Baru</th>
                                    <th>Garansi</th>
                                    <th>Status</th>
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
                                                    <td>
                                                    <?php 
                                                        $ohh = $data['notransaksi'];
                                                        $gini = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$ohh' ORDER BY waktu DESC");
                                                        $lah = mysqli_fetch_array($gini);
                                                        if($lah['ket']=='Selesai'){ ?>
                                                            <a target="_blank" class="btn btn-info btn-sm" href="https://wa.me/?phone=<?= $data['telpp'] ?>&text=Halo, <?= $data['namap'] ?>.%20Kami%20dari%20TwincomBanjarbaru%20memberitahukan%20bahwa%0A%0AGaransi%20Service%20Anda%20pada%20_No.Transaksi%20:%20<?= $data['notransaksi'] ?>_%20dengan%20biaya%20Rp.%20<?= number_format($data['biaya'],0,'.','.') ?>%20telah%20*SELESAI*.">Berhasil</a>
                                                        <?php }else{ ?>
                                                            <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Proses</a><?php
                                                        } ?></td>
                                                </tr>
                                        <?php } ?>
                                </tbody>
                        </table>
                    </div>
                                
                </div>
                <!-- /.panel-body -->
            </div>
    	</div>
    </div>



      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script> 
   </body>
</html>
