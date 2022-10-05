<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Restore/Pemulihan Database</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Upload File SQL</label>
                                <input class="form-control" type="file" name="filesql" required>
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
    $namafile       = $_FILES['filesql']['tmp_name'];
    $namasql        = $_FILES['filesql']['name'];
    $lokasi         = "../css/".$_FILES['filesql']['name'];
    $cekformat      = array('sql');
    $x              = explode('.', $namasql);
    $ekstensi       = strtolower(end($x));

    if(in_array($ekstensi, $cekformat) === true){
        move_uploaded_file($namafile, '../css/'.$lokasi);

        $conn = mysqli_connect("localhost", "root", "", "db_service");
        $filePath = $lokasi;

        $delete = mysqli_query($conn,"DROP DATABASE db_service");
        $kon = mysqli_connect("localhost", "root", "");
        $create = mysqli_query($kon,"CREATE DATABASE db_service");

        $conn = mysqli_connect("localhost", "root", "", "db_service");

        function restoreMysqlDB($filePath, $conn)
        {
            $sql = '';
            $error = '';
            
            if (file_exists($filePath)) {
                $lines = file($filePath);
                
                foreach ($lines as $line) {
                    
                    // Ignoring comments from the SQL script
                    if (substr($line, 0, 2) == '--' || $line == '') {
                        continue;
                    }
                    
                    $sql .= $line;
                    
                    if (substr(trim($line), - 1, 1) == ';') {

                        $result = mysqli_query($conn, $sql);
                        if (! $result) {
                            $error .= mysqli_error($conn) . "\n";
                        }
                        $sql = '';
                    }
                } // end foreach
                
                if ($error) {
                    ?><script>alert('gagal direstore')</script><?php
                } else {
                    ?><script>alert('berhasil direstore')</script><?php
                }
            } // end if file exists
        }
        restoreMysqlDB($filePath,$conn);
    }else{ 
      ?><script>alert('file format harus .sql')</script><?php
    }
  }
?>