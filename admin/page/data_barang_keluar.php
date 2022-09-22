<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php?p=<?= password_hash('tambah-barang-keluar',PASSWORD_DEFAULT)?>"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang keluar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tgl keluar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_keluar` JOIN tbl_barang ON tbl_barang_keluar.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand");
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $a['nama_barang']?> (<?= $a['nama_brand']?>)</td>
                        <td><?= $a['jumlah_keluar']?></td>
                        <td><?= $a['tgl_keluar']?></td>
                        <td><?= $a['keterangan']?></td>
                        <td>
                            <?php
                            if($_SESSION['level'] ==  1){
                            ?>
                            <div class="row ml-0">
                                <form
                                    action="admin/proses/delete_bk.php?i=<?= password_hash($a['id_bk'],PASSWORD_DEFAULT)?>"
                                    method="post">
                                    <button type="submit" class="btn btn-sm btn-danger mx-2"
                                        onclick="return confirm('PERINGATANA!! menghapus data ini akan mengembalikan stok seperti sebelum barang ini di input, Yakin Hapus??')"
                                        name="submit">Hapus</button>
                                </form>
                            </div>
                            <?php }?>
                        </td>
                    </tr>

                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>