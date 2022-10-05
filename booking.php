<?php require('header.php'); $id = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
  $data = mysqli_fetch_array($query); ?>
</div>
    	<div class="container"><br><br><br><br><br>
            <form action="" method="POST">
    	    <div class="row">
    	    <h1 class="new_text text-center"><strong>+Booking Service</strong></h1>
	    		<div class="col-md-5">
                    <div class="email_box">
	    			<div class="input_main">
                       <div class="container">
                        <h2 class="text-white text-center">Profil Pelanggan</h2>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama" value="<?= $data['nama'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="alamat" value="<?= $data['alamat'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="tel" name="telp" value="<?= $data['telp'] ?>" readonly>
                        </div>
                       </div>                  
                    </div>
                    </div>
	    		</div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="email_box">
                    <div class="input_main">
                       <div class="container">
                        <div class="form-group">
                            <input class="form-control" type="text" name="barang" placeholder="Barang" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="merk" placeholder="Merk" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="jenis" class="email-bt" required>
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
                            <input class="form-control" type="text" name="kerusakan" placeholder="Kerusakan" required>
                        </div>
                        <div class="form-group">
                            <label>Metode</label>
                            <select name="metode" class="email-bt" required>
                                <option value="Booking (Langsung ke Tempat)">Booking (Langsung ke Tempat)</option>
                                <option value="Booking (Teknisi yang ke Rumah Anda)">Booking (Teknisi yang ke Rumah Anda)</option>
                            </select>
                        </div>
                       </div> 
                       <div class="send_btn">
                        <button class="main_bt" name="simpan" type="submit">Booking</button>
                       </div>                   
                    </div>
                    </div>
                </div>
	    	</div>
                </form>
    </div>

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
   </body>
</html>
<?php
  if (isset($_POST['simpan'])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $kerusakan   = $_REQUEST['kerusakan'];
    $notransaksi = date('Ymds');
    $nama        = $_REQUEST['nama'];
    $merk        = $_REQUEST['merk'];
    $barang      = $_REQUEST['barang'];
    $telp        = $_REQUEST['telp'];
    $alamat      = $_REQUEST['alamat'];
    $jenis       = $_REQUEST['jenis'];
    $tgl         = date('Y-m-d');

    $tambah = mysqli_query($kon,"INSERT INTO dataservice(notransaksi,tgl,kerusakan,metode,merk,telpp,alamatp,jenis,barang,namap) VALUES ('$notransaksi','$tgl','$kerusakan','$metode','$merk','$telp','$alamat','$jenis','$barang','$nama')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='service.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='booking.php?id=<?= $id ?>';</script> <?php
    }
  }
?>