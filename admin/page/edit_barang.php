<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_barang FROM tbl_barang");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_barang'],$id)){
        $id = $a['id_barang'];
    }
}
$query = mysqli_query($koneksi,"SELECT * FROM tbl_barang WHERE id_barang='$id'");
$b = mysqli_fetch_array($query); 
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_barang.php?i=<?= password_hash($b['id_barang'],PASSWORD_DEFAULT)?>"
            method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" value="<?= $b['nama_barang']?>" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="">foto</label>
                <img src="admin/img/<?= $b['foto']?>" id="img_ori" alt="" width="50%">
                <img id="imgv" alt="" width="50%" class="my-1">
                <input type="file" name="foto" id="foto" class="form-control" onChange="previewImg();hide();">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Barang</label>
                <select name="jenis" id="jenis" class="form-control">
                    <option value="">Pilih Jenis</option>
                    <?php
                    $qj = mysqli_query($koneksi,"SELECT * FROM tbl_jenis");
                    while ($j = mysqli_fetch_array($qj)) {
                    ?>
                    <option value="<?= $j['id_jenis']?>" <?= $b['jenis'] == $j['id_jenis'] ? 'selected' : '' ?>>
                        <?= $j['nama_jenis']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand Barang</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">Pilih Brand</option>
                    <?php
                    $qb = mysqli_query($koneksi,"SELECT * FROM tbl_brand");
                    while ($c = mysqli_fetch_array($qb)) {
                    ?>
                    <option value="<?= $c['id_brand']?>" <?= $b['brand'] == $c['id_brand'] ? 'selected' : ''?>>
                        <?= $c['nama_brand']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>