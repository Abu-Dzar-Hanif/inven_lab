<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/input_barang.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <img id="imgv" alt="" width="50%" class="my-1">
                <input type="file" name="foto" id="foto" class="form-control" onChange="previewImg();">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Barang</label>
                <select name="jenis" id="jenis" class="form-control">
                    <option value="">Pilih Jenis</option>
                    <?php
                    $qj = mysqli_query($koneksi,"SELECT * FROM tbl_jenis");
                    while ($j = mysqli_fetch_array($qj)) {
                    ?>
                    <option value="<?= $j['id_jenis']?>"><?= $j['nama_jenis']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand Barang</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">Pilih Brand</option>
                    <?php
                    $qb = mysqli_query($koneksi,"SELECT * FROM tbl_brand");
                    while ($b = mysqli_fetch_array($qb)) {
                    ?>
                    <option value="<?= $b['id_brand']?>"><?= $b['nama_brand']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>