<?php
require_once('../../setup/koneksi.php');
$query = mysqli_query($koneksi,"SELECT MAX(id_barang) AS max_code FROM tbl_barang");
$data = mysqli_fetch_array($query);
$a = $data['max_code'];
$urut = (int)substr($a,2,3);
$urut++;
$id = "BR".sprintf("%03s",$urut);
$nama = $_POST['nama'];
$brand = $_POST['brand'];
$jenis = $_POST['jenis'];
header('Content-Type: text/xml');
$qin = mysqli_query($koneksi,"INSERT INTO tbl_barang(id_barang,nama_barang,jenis,brand) VALUES('$id','$nama','$jenis','$brand')");
if($qin){
    $qs = mysqli_query($koneksi,"INSERT INTO tbl_stok(barang,stok) VALUES('$id',0)");
    if($qs){
        $respons = [
            'success' => 1,
            'message' => "berhasil simpan"
        ];
        echo json_encode($respons);
    }else{
        $respons = [
            'success' => 0,
            'message' => "gagal simpan"
        ];
        echo json_encode($respons);
    }
}