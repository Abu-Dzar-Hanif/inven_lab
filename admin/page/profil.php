<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Anda</h6>
    </div>
    <div class="card-body">
        <?php
                $p = mysqli_query($koneksi,"SELECT * FROM tbl_admin JOIN tbl_user ON tbl_user.id_user = tbl_admin.id_admin JOIN tbl_level ON tbl_level.id_level = tbl_user.level WHERE id_admin ='$_SESSION[id]'");
                $data = mysqli_fetch_array($p);
                ?>
        <table>
            <tr>
                <th>ID</th>
                <th>:</th>
                <td><?= $data['id_admin']; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?= $data['nama']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <th>:</th>
                <td><?= $data['username']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <th>:</th>
                <td><?= $data['password']; ?></td>
            </tr>
            <tr>
                <th>Level</th>
                <th>:</th>
                <td><?= $data['lvl']; ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="index.php?p=<?= password_hash('edit-password',PASSWORD_DEFAULT)?>"
            class="btn btn-warning btn-sm my-2">Ubah Password</a>
    </div>
</div>