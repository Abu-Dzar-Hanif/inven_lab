<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php?p=<?= password_hash('tambah-barang',PASSWORD_DEFAULT)?>"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Brand</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang` JOIN tbl_jenis ON tbl_barang.jenis = tbl_jenis.id_jenis JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand");
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $a['id_barang']?></td>
                        <td>
                            <img src="admin/img/<?= $a['foto']?>" width="100px" alt="">
                        </td>
                        <td><?= $a['nama_barang']?></td>
                        <td><?= $a['nama_jenis']?></td>
                        <td><?= $a['nama_brand']?></td>
                        <td>
                            <div class="row ml-0">
                                <a href="index.php?p=<?= password_hash('edit-barang',PASSWORD_DEFAULT)?>&i=<?= password_hash($a['id_barang'],PASSWORD_DEFAULT)?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <?php
                                if($_SESSION['level'] == 1){
                                ?>
                                <form
                                    action="admin/proses/delete_barang.php?i=<?= password_hash($a['id_barang'],PASSWORD_DEFAULT)?>"
                                    method="post">
                                    <button type="submit" class="btn btn-sm btn-danger mx-2"
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