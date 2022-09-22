<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_barang FROM tbl_barang");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_barang'],$id)){
            $id = $a['id_barang'];
        }
    }
    $ci = mysqli_query($koneksi,"SELECT barang FROM tbl_barang_masuk WHERE barang = '$id'");
    $di = mysqli_num_rows($ci);
    $co = mysqli_query($koneksi,"SELECT barang FROM tbl_barang_keluar WHERE barang = '$id'");
    $do = mysqli_num_rows($co);
    if ($di >= 1 || $do >= 1) {
        echo "<script>window.alert('Gagal Hapus!!!, Barang ini sudah terhubung ke Transaksi Masuk atau Keluar');
                window.location=(history.back())</script>";
    }elseif($di == 0 || $do == 0){
        $query = mysqli_query($koneksi,"DELETE FROM tbl_barang WHERE id_barang = '$id'");
        if($query){
            $delStok = mysqli_query($koneksi,"DELETE FROM tbl_stok WHERE barang = '$id'");
            $p = password_hash('data-barang',PASSWORD_DEFAULT);
            header("location: ../../index.php?p=$p");
        }

    }
}