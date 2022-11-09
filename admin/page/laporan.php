<!-- DataTales Example -->
<div class="card shadow mb-4">
    <?php
    if (!isset($_POST['proses'])) {
    ?>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi barang</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="j">Jenis Transaksi</label>
                        <select name="j" class="form-control" id="j">
                            <option value="1">Barang Masuk</option>
                            <option value="2">Barang Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tgl1">Dari Tgl</label>
                        <input type="text" name="tgl1" id="tgl1" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tgl2">Sampai Tgl</label>
                        <div class="input-group">
                            <input type="text" name="tgl2" id="tgl2" class="form-control" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"
                                    name="proses">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    }elseif (isset($_POST['proses'])) {
    ?>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Barang <?= $_POST['j'] == 1 ? 'Masuk' : 'Keluar'?> Dari
            <?= date('d M Y', strtotime($_POST['tgl1']))?> s/d <?= date('d M Y', strtotime($_POST['tgl2']))?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id Barang <?= $_POST['j'] == 1 ? 'Masuk' : 'Keluar'?></th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tgl <?= $_POST['j'] == 1 ? 'Masuk' : 'Keluar'?></th>
                        <th>Keterangan</th>
                        <th>User Input</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($_POST['j'] == 1){
                        $query = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang_masuk = tbl_transaksi.id_transaksi JOIN tbl_barang ON tbl_barang_masuk.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_transaksi.user = tbl_admin.id_admin WHERE tgl_transaksi BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
                    }elseif ($_POST['j'] == 2) {
                        $query = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi JOIN tbl_barang_keluar ON tbl_barang_keluar.id_barang_keluar = tbl_transaksi.id_transaksi JOIN tbl_barang ON tbl_barang_keluar.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_transaksi.user = tbl_admin.id_admin WHERE tgl_transaksi BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
                    }
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $_POST['j'] == 1 ? $a['id_barang_masuk'] : $a['id_barang_keluar']?></td>
                        <td><?= $a['id_barang']?></td>
                        <td><?= $a['nama_barang']?> (<?= $a['nama_brand']?>)</td>
                        <td><?= $_POST['j'] == 1 ? $a['jumlah_masuk'] : $a['jumlah_keluar']?></td>
                        <td><?= $a['tgl_transaksi']?></td>
                        <td><?= $a['keterangan']?></td>
                        <td><?= $a['nama']?></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="4">Total</td>
                        <?php
                        if($_POST['j'] ==1){
                            $sm = mysqli_query($koneksi,"SELECT SUM(total_item) AS tl FROM tbl_transaksi WHERE tgl_transaksi BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' AND tipe='M'");
                            $sum = mysqli_fetch_array($sm);
                        }elseif ($_POST['j'] ==2) {
                            $sm = mysqli_query($koneksi,"SELECT SUM(total_item) AS tl FROM tbl_transaksi WHERE tgl_transaksi BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' AND tipe='K'");
                            $sum = mysqli_fetch_array($sm);
                        }
                        ?>
                        <td><?= $sum['tl']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a target="_blank"
            href="admin/proses/export_csv.php?j=<?= $_POST['j']?>&t1=<?= $_POST['tgl1']?>&t2=<?=$_POST['tgl2']?>"
            class="btn btn-success"><i class="fas fa-file-csv"></i>Export CSV</a>
        <?php
        if($_POST['j'] == 1){
        ?>
        <a target="_blank" href="admin/proses/report_bm.php?t1=<?= $_POST['tgl1']?>&t2=<?=$_POST['tgl2']?>"
            class="btn btn-danger"><i class="fas fa-file-pdf"></i>Export PDF</a>
        <?php }else{?>
        <a target="_blank" href="admin/proses/report_bk.php?t1=<?= $_POST['tgl1']?>&t2=<?=$_POST['tgl2']?>"
            class="btn btn-danger"><i class="fas fa-file-pdf"></i>Export PDF</a>
        <?php }?>
    </div>
    <?php }?>
</div>