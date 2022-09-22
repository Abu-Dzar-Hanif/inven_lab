<?php
require_once('../../setup/koneksi.php');
date_default_timezone_set('asia/jakarta');
if($_POST['ket'] == '' || $_POST['barang'] == '' || $_POST['jumlah']  == '' || $_POST['jumlah'] == 0){
    $respons = [
        'success' => 0,
        'message' => "Data Input tidak boleh kosong !!"
    ];
    echo json_encode($respons);
}else{
    $query = mysqli_query($koneksi,"SELECT MAX(id_barang_masuk) AS max_code FROM tbl_barang_masuk");
    $data = mysqli_fetch_array($query);
    $a = $data['max_code'];
    $urut = (int)substr($a,2,3);
    $urut++;
    $id = "BM".sprintf("%03s",$urut);
    $br = $_POST['barang'];
    $jm = $_POST['jumlah'];
    $tgl = date('Y-m-d');
    $ket = $_POST['ket'];
    $adm = $_POST['id'];
    $in = mysqli_query($koneksi,"INSERT INTO tbl_barang_masuk(id_barang_masuk,barang,jumlah_masuk,tgl_masuk,keterangan,user) VALUES('$id','$br','$jm','$tgl','$ket','$adm')");
    if($in){
        $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$br'");
        $x = mysqli_fetch_array($qstok);
        $stok = $x['stok'] + $jm;
        $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$br'");
        if($ups){
            $respons = [
                'success' => 1,
                'message' => "Berhasil Input Barang Masuk"
            ];
            echo json_encode($respons);
        }
    }else{
        $respons = [
            'success' => 0,
            'message' => "Gagal!!"
        ];
        echo json_encode($respons);
    }
}