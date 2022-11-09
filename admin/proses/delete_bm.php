<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_transaksi FROM tbl_transaksi");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_transaksi'],$id)){
            $id = $a['id_transaksi'];
        }
    }
    $get = mysqli_query($koneksi,"SELECT * FROM tbl_barang_masuk WHERE id_barang_masuk='$id'");
    while ($d = mysqli_fetch_array($get)) {
        $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$d[barang]'");
        $x = mysqli_fetch_array($qstok);
        $stok = $x['stok'] - $d['jumlah_masuk'];
        $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$d[barang]'");
    }
    $query = mysqli_query($koneksi,"DELETE FROM tbl_barang_masuk WHERE id_barang_masuk = '$id'");
    $query = mysqli_query($koneksi,"DELETE FROM tbl_transaksi WHERE id_transaksi = '$id'");
    if($query){
        $p = password_hash('data-barang-masuk',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}