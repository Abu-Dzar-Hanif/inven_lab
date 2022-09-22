<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_jenis FROM tbl_jenis");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_jenis'],$id)){
        $id = $a['id_jenis'];
    }
}
$query = mysqli_query($koneksi,"SELECT * FROM tbl_jenis WHERE id_jenis='$id'");
$b = mysqli_fetch_array($query); 
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Jenis Barang</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_jenis.php?i=<?= password_hash($b['id_jenis'],PASSWORD_DEFAULT)?>"
            method="post">
            <div class="form-group">
                <label for="jenis">Jenis Barang</label>
                <input type="text" name="jenis" class="form-control" id="jenis" value="<?= $b['nama_jenis']?>">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>