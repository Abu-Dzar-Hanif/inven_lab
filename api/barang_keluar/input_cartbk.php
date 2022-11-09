<?php
require_once('../../setup/koneksi.php');
if($_POST['barang'] == '' || $_POST['jumlah'] == "0"){
    $respons = [
        'success' => 0,
        'message' => "Data Input tidak boleh kosong !!"
    ];
    echo json_encode($respons);
}else{
    $br = $_POST['barang'];
    $jm = $_POST['jumlah'];
    $adm = $_POST['id'];
    $in = mysqli_query($koneksi,"INSERT INTO tmp(kode_br,jumlah,jenis,user) VALUES('$br','$jm','2','$adm')");
    if($in){
        $respons = [
            'success' => 1,
            'message' => "Berhasil Input Keranjang Barang Keluar"
        ];
        echo json_encode($respons);
    }else{
        $respons = [
            'success' => 0,
            'message' => "Gagal!!"
        ];
        echo json_encode($respons);
    }
}