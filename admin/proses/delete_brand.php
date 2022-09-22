<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_brand FROM tbl_brand");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_brand'],$id)){
            $id = $a['id_brand'];
        }
    }
    $c = mysqli_query($koneksi,"SELECT brand FROM tbl_barang WHERE brand = '$id'");
    $d = mysqli_num_rows($c);
    if ($d >= 1) {
        echo "<script>window.alert('Gagal Hapus!!!, Brand ini sudah terhubung ke table barang');
        window.location=(history.back())</script>";
    }elseif($d == 0){
        $query = mysqli_query($koneksi,"DELETE FROM tbl_brand WHERE id_brand = '$id'");
        if($query){
            $p = password_hash('data-brand',PASSWORD_DEFAULT);
            header("location: ../../index.php?p=$p");
        }
    }
}