<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Admin</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/input_admin.php" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="password">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="">Pilih Level</option>
                    <?php
                    $ql = mysqli_query($koneksi,"SELECT * FROM tbl_level");
                    while ($l = mysqli_fetch_array($ql)) {
                    ?>
                    <option value="<?= $l['id_level']?>"><?= $l['lvl']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>