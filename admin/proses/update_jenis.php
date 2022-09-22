<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $jenis = $_POST['jenis'];
    $cek = mysqli_query($koneksi,"SELECT id_jenis FROM tbl_jenis");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_jenis'],$id)){
            $id = $a['id_jenis'];
        }
    }
    $query = mysqli_query($koneksi,"UPDATE tbl_jenis SET nama_jenis ='$jenis' WHERE id_jenis = '$id'");
    if($query){
        $p = password_hash('data-jenis',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
    }
}