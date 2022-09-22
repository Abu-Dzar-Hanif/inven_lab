<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $brand = $_POST['brand'];
    $cek = mysqli_query($koneksi,"SELECT id_brand FROM tbl_brand");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_brand'],$id)){
            $id = $a['id_brand'];
        }
    }
    $query = mysqli_query($koneksi,"UPDATE tbl_brand SET nama_brand ='$brand' WHERE id_brand = '$id'");
    if($query){
        $p = password_hash('data-brand',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
    }
}