<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $tujuan = $_POST['tujuan'];
    $tipe = $_POST['tipe'];
    $cek = mysqli_query($koneksi,"SELECT id_tujuan FROM tbl_tujuan");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_tujuan'],$id)){
            $id = $a['id_tujuan'];
        }
    }
    $query = mysqli_query($koneksi,"UPDATE tbl_tujuan SET tujuan ='$tujuan',tipe='$tipe' WHERE id_tujuan = '$id'");
    if($query){
        $p = password_hash('data-tujuan',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
    }
}