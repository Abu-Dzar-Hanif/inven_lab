<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_brand FROM tbl_brand");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_brand'],$id)){
        $id = $a['id_brand'];
    }
}
$query = mysqli_query($koneksi,"SELECT * FROM tbl_brand WHERE id_brand='$id'");
$b = mysqli_fetch_array($query); 
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Brand Barang</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_brand.php?i=<?= password_hash($b['id_brand'],PASSWORD_DEFAULT)?>"
            method="post">
            <div class="form-group">
                <label for="brand">brand Barang</label>
                <input type="text" name="brand" class="form-control" id="brand" value="<?= $b['nama_brand']?>">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>