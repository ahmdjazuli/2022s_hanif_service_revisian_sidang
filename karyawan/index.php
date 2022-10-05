<?php require('atas.php'); 
    $rusak= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorirusak"));
    $gaji= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM gaji WHERE id = '$memori[id]'"));
    $transaksi= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM dataservice"));
    $repair= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorikeluar"));
    $rusak= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorirusak"));
?>

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
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $repair ?></span>
                        <label class="text-muted">Data Inventori Keluar</label>
                    </div>
                    <div class="options">
                        <a href="repair.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $gaji ?></span>
                        <label class="text-muted">Data Gaji Anda</label>
                    </div>
                    <div class="options">
                        <a href="gaji.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
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
                        <label class="text-muted">Data Inventori Rusak</label>
                    </div>
                    <div class="options">
                        <a href="rusak.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-get-pocket"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $transaksi ?></span>
                        <label class="text-muted">Data Service</label>
                    </div>
                    <div class="options">
                        <a href="service.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php require('data.php') ?>