<?php
require_once('../../setup/koneksi.php');
$id = $_POST['id_barang'];
$nama = $_POST['nama'];
$brand = $_POST['brand'];
$jenis = $_POST['jenis'];
$query = mysqli_query($koneksi,"UPDATE tbl_barang SET nama_barang = '$nama', jenis = '$jenis', brand = '$brand' WHERE id_barang = '$id'");
if($query){
    $respons = [
        'success' => 1,
        'message' => "berhasil update"
    ];
    echo json_encode($respons);
}else{
    $respons = [
        'success' => 0,
        'message' => "gagal update"
    ];
    echo json_encode($respons);
}