<?php require('atas.php'); 
    $inventori= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorimasuk"));
    $rusak= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorirusak"));
    $gaji= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM gaji"));
    $service= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM dataservice"));
    $proses= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM proses"));
    $repair= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorikeluar"));
    $hari = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM dataservice GROUP BY DAY(tgl)"));
    $bulan = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM dataservice GROUP BY MONTH(tgl)"));
?>
<script src="../js/Chart.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Halaman Utama</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $gaji ?></span>
                        <label class="text-muted"><a href="gaji.php">Data Gaji Karyawan</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $inventori ?></span>
                        <label class="text-muted"><a href="inventori.php">Data Inventori Masuk</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-th-list"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $rusak ?></span>
                        <label class="text-muted"><a href="rusak.php">Data Inventori Rusak</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $repair ?></span>
                        <label class="text-muted"><a href="repair.php">Data Inventori Keluar</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-get-pocket"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $service ?></span>
                        <label class="text-muted"><a href="service.php">Data Service</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $proses ?></span>
                        <label class="text-muted"><a href="proses.php">Data Riwayat Service</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-battery-1"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $hari ?></span>
                        <label class="text-muted"><a href="pendapatan2.php">Data Pendapatan Harian</a></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-battery-4"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $bulan ?></span>
                        <label class="text-muted"><a href="pendapatan1.php">Data Pendapatan Bulanan</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?php require('bawah.php');
