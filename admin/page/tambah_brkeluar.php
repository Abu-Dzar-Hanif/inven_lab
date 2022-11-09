<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/input_tmp.php" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <select name="nama" class="form-control" id="">
                            <option value="">Pilih Barang</option>
                            <?php
                        $br = mysqli_query($koneksi,"SELECT * FROM tbl_stok JOIN tbl_barang ON tbl_stok.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand WHERE stok!=0");
                        while ($a = mysqli_fetch_array($br)) {
                        ?>
                            <option value="<?= $a['id_barang']?>"><?= $a['nama_barang']?> (<?= $a['nama_brand']?>)
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="jum">Jumlah Barang Keluar</label>
                        <div class="input-group">
                            <input type="number" name="jum" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"
                                    name="tambah">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="j" class="form-control" value="2" hidden>
            </div>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM tmp JOIN tbl_barang ON tmp.kode_br=tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand WHERE tmp.jenis=2 AND user = '$_SESSION[id]'");
            $no = 1;
            $cek = mysqli_num_rows($query);
            if($cek > 0){
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td>
                                <?= $a['id_barang']?>
                            </td>
                            <td>
                                <?= $a['nama_barang']?> (<?= $a['nama_brand']?>)
                            </td>
                            <td>
                                <?= $a['jumlah']?>
                            </td>
                            <td>
                                <a href="admin/proses/delete_tmp.php?i=<?= password_hash($a['id_tmp'],PASSWORD_DEFAULT)?>&&j=2"
                                    class="btn btn-sm btn-danger mx-2" name="delete"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <select name="tujuan" id="" class="form-control">
                    <option value="">Tujuan Transaksi</option>
                    <?php
                    $qt = mysqli_query($koneksi,"SELECT id_tujuan, tujuan FROM tbl_tujuan WHERE tipe = 'K'");
                    while ($t = mysqli_fetch_array($qt)) {
                    ?>
                    <option value="<?= $t['id_tujuan']?>"><?= $t['tujuan']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="ket" class="form-control" placeholder="keterangan">
            </div>
            <?php }?>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>