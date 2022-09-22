<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $brand = $_POST['brand'];
    $query = mysqli_query($koneksi,"INSERT INTO tbl_brand(nama_brand) VALUES('$brand')");
    if($query){
        $p = password_hash('data-brand',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}