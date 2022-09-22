<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_bm FROM tbl_barang_masuk");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_bm'],$id)){
            $id = $a['id_bm'];
        }
    }
    $get = mysqli_query($koneksi,"SELECT * FROM tbl_barang_masuk WHERE id_bm='$id'");
    $d = mysqli_fetch_array($get);
    var_dump($d);
    $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$d[barang]'");
    $x = mysqli_fetch_array($qstok);
    var_dump($x);
    $stok = $x['stok'] - $d['jumlah_masuk'];
    $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$d[barang]'");
    $query = mysqli_query($koneksi,"DELETE FROM tbl_barang_masuk WHERE id_bm = '$id'");
    if($query){
        $p = password_hash('data-barang-masuk',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}