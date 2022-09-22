<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Stok Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Brand</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_stok` JOIN tbl_barang ON tbl_stok.barang=tbl_barang.id_barang JOIN tbl_jenis ON tbl_barang.jenis=tbl_jenis.id_jenis JOIN tbl_brand ON tbl_barang.brand=tbl_brand.id_brand");
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $a['nama_barang']?></td>
                        <td><?= $a['nama_jenis']?></td>
                        <td><?= $a['nama_brand']?></td>
                        <td><?= $a['stok']?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <a target="_blank" href="admin/proses/stokcsv.php" class="btn btn-success"><i class="fas fa-file-csv"></i>Export
            CSV</a>
        <a target="_blank" href="admin/proses/report_stok.php" class="btn btn-danger"><i
                class="fas fa-file-pdf"></i>Export
            PDF</a>
    </div>
</div>