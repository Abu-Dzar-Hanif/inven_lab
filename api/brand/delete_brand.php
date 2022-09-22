<?php
require_once('../../setup/koneksi.php');
$id = $_POST['id_brand'];
$c = mysqli_query($koneksi,"SELECT brand FROM tbl_barang WHERE brand = '$id'");
$d = mysqli_num_rows($c);
if ($d >= 1) {
    $respons = [
        'success' => 0,
        'message' => "Gagal Hapus!!!, Brand ini sudah terhubung ke table barang"
    ];
    echo json_encode($respons);
}elseif($d == 0){
    $query = mysqli_query($koneksi,"DELETE FROM tbl_brand WHERE id_brand = '$id'");
    if($query){
        $respons = [
            'success' => 1,
            'message' => "berhasil update"
        ];
        echo json_encode($respons);
    }
}