<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="rusak_input.php" style="color: white; text-decoration: none">+Data Inventori Rusak</a></button></h1>
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
                                        <th>Tanggal</th>
                                        <th>Nama (Merk)</th>
                                        <th>Karyawan yang Melaporkan</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM inventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori INNER JOIN user ON inventorirusak.id = user.id ORDER BY namainven ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y',strtotime($data['tglrusak'])); ?></td>
                                                    <td><?= $data['namainven'].' ('.$data['merk'].')'; ?></td>
                                                    <td><?= $data['nama'].' ('.$data['tugas'].')'; ?></td>
                                                    <td><?= $data['ket'] ?></td>
                                                    <td><?= $data['jumlah'] ?></td>
                                                    <td>
                                                        <a href="rusak_edit.php?idinventorirusak=<?php echo $data['idinventorirusak']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                        <a href="delete.php?idinventorirusak=<?php echo $data['idinventorirusak'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
