<?php
require_once('../../setup/koneksi.php');
$id = $_POST['id_brand'];
$brand = $_POST['brand'];
$query = mysqli_query($koneksi,"UPDATE tbl_brand SET nama_brand ='$brand' WHERE id_brand = '$id'");
if ($query) {
    $respons = [
        'success' => 1,
        'message' => "berhasil update"
    ];
    echo json_encode($respons);
} else {
    $respons = [
        'success' => 0,
        'message' => "gagal update"
    ];
    echo json_encode($respons);
}