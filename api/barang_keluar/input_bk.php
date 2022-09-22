<?php
require_once('../../setup/koneksi.php');
date_default_timezone_set('asia/jakarta');
if($_POST['ket'] == ''){
    $respons = [
        'success' => 0,
        'message' => "Data Input tidak boleh kosong !!"
    ];
    echo json_encode($respons);
}else{
    $query = mysqli_query($koneksi,"SELECT MAX(id_barang_keluar) AS max_code FROM tbl_barang_keluar");
    $data = mysqli_fetch_array($query);
    $a = $data['max_code'];
    $urut = (int)substr($a,2,3);
    $urut++;
    $id = "BK".sprintf("%03s",$urut);
    $br = $_POST['barang'];
    $jm = $_POST['jumlah'];
    $tgl = date('Y-m-d');
    $ket = $_POST['ket'];
    $adm = $_POST['id'];
    $cek = mysqli_query($koneksi,"SELECT stok FROM tbl_stok WHERE barang = '$br'");
    $s = mysqli_fetch_array($cek);
    if($s['stok'] < $jm){
        $respons = [
            'success' => 0,
            'message' => "Stok tidak cukup !!"
        ];
        echo json_encode($respons);
    }else{
        $in = mysqli_query($koneksi,"INSERT INTO tbl_barang_keluar(id_barang_keluar,barang,jumlah_keluar,tgl_keluar,keterangan,user) VALUES('$id','$br','$jm','$tgl','$ket','$adm')");
        if($in){
            $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$br'");
            $x = mysqli_fetch_array($qstok);
            $stok = $x['stok'] - $jm;
            $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$br'");
            if($ups){
                $respons = [
                    'success' => 1,
                    'message' => "Berhasil Input Barang keluar"
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
}