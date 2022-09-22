<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $nama = $_POST['nama'];
    $brand = $_POST['brand'];
    $jenis = $_POST['jenis'];
    $cek = mysqli_query($koneksi,"SELECT id_barang FROM tbl_barang");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_barang'],$id)){
            $id = $a['id_barang'];
        }
    }
    $query = mysqli_query($koneksi,"UPDATE tbl_barang SET nama_barang = '$nama', jenis = '$jenis', brand = '$brand' WHERE id_barang = '$id'");
    if($query){
        $p = password_hash('data-barang',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
    }
}