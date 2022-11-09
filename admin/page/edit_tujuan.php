<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_tujuan FROM tbl_tujuan");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_tujuan'],$id)){
        $id = $a['id_tujuan'];
    }
}
$query = mysqli_query($koneksi,"SELECT * FROM tbl_tujuan WHERE id_tujuan='$id'");
$b = mysqli_fetch_array($query); 
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Tujuan Transaksi</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_tujuan.php?i=<?= password_hash($b['id_tujuan'],PASSWORD_DEFAULT)?>"
            method="post">
            <div class="form-group">
                <label for="tujuan">Tujuan Transaksi</label>
                <input type="text" name="tujuan" class="form-control" id="tujuan" value="<?= $b['tujuan']?>">
            </div>
            <div class="form-group">
                <label for="tipe">Tipe Transaksi</label>
                <select name="tipe" id="" class="form-control">
                    <option value="M" <?= $b['tujuan'] == 'M' ? 'selected' : ''?>>Masuk</option>
                    <option value="K" <?= $b['tujuan'] == 'K' ? 'selected' : ''?>>Keluar</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>