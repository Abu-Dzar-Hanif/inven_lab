<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_jenis FROM tbl_jenis");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_jenis'],$id)){
            $id = $a['id_jenis'];
        }
    }
    $c = mysqli_query($koneksi,"SELECT jenis FROM tbl_barang WHERE jenis = '$id'");
    $d = mysqli_num_rows($c);
    if ($d >= 1) {
        echo "<script>window.alert('Gagal Hapus!!!, jenis ini sudah terhubung ke table barang');
                window.location=(history.back())</script>";
    }elseif($d == 0){
        $query = mysqli_query($koneksi,"DELETE FROM tbl_jenis WHERE id_jenis = '$id'");
        if($query){
            $p = password_hash('data-jenis',PASSWORD_DEFAULT);
            header("location: ../../index.php?p=$p");
        }

    }
}