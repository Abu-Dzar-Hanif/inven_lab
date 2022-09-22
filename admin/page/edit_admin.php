<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_admin FROM tbl_admin");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_admin'],$id)){
        $id = $a['id_admin'];
    }
}
$query = mysqli_query($koneksi,"SELECT * FROM tbl_admin JOIN tbl_user ON tbl_user.id_user = tbl_admin.id_admin WHERE id_admin='$id'");
$b = mysqli_fetch_array($query); 
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_admin.php?i=<?= password_hash($b['id_admin'],PASSWORD_DEFAULT)?>"
            method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= $b['nama']?>" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?= $b['username']?>" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="">Pilih Level</option>
                    <option value="1" <?= $b['level'] == 1 ? 'selected' : ''?>>super admin</option>
                    <option value="2" <?= $b['level'] == 2 ? 'selected' : ''?>>admin</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>