<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php?p=<?= password_hash('tambah-barang-masuk',PASSWORD_DEFAULT)?>"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Barang Masuk</th>
                        <th>Tujuan Transaksi</th>
                        <th>Total</th>
                        <th>Tgl Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi inner JOIN tbl_tujuan ON tbl_transaksi.jenis_transaksi = tbl_tujuan.id_tujuan WHERE tbl_transaksi.tipe='M'");
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $a['id_transaksi']?></td>
                        <td><?= $a['tujuan']?></td>
                        <td><?= $a['total_item']?></td>
                        <td><?= $a['tgl_transaksi']?></td>
                        <td>
                            <div class="row ml-0">
                                <a href="index.php?p=<?= password_hash('detail-transaksi-masuk',PASSWORD_DEFAULT)?>&i=<?= password_hash($a['id_transaksi'],PASSWORD_DEFAULT)?>"
                                    class="btn btn-sm btn-warning">Detail</a>
                                <?php
                                if($_SESSION['level'] ==  1){
                                ?>
                                <form
                                    action="admin/proses/delete_bm.php?i=<?= password_hash($a['id_transaksi'],PASSWORD_DEFAULT)?>"
                                    method="post">
                                    <button type="submit" class="btn btn-sm btn-danger mx-2"
                                        onclick="return confirm('PERINGATANA!! menghapus data ini akan mengembalikan stok seperti sebelum barang ini di input, Yakin Hapus??')"
                                        name="submit">Hapus</button>
                                </form>
                                <?php }?>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>