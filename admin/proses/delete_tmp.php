<?php
require_once('../../setup/koneksi.php');
$id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_tmp FROM tmp");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_tmp'],$id)){
            $id = $a['id_tmp'];
        }
    }
    $query = mysqli_query($koneksi,"DELETE FROM tmp WHERE id_tmp = '$id'");
    if($query){
        if($_GET['j'] == 2){
            $p = password_hash('tambah-barang-keluar',PASSWORD_DEFAULT);
        }else{
            $p = password_hash('tambah-barang-masuk',PASSWORD_DEFAULT);
        }
        header("location: ../../index.php?p=$p");
}