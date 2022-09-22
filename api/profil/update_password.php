<?php
require_once('../../setup/koneksi.php');
$id = $_POST['id'];
$password = password_hash($_POST['pass'],PASSWORD_DEFAULT);
$query = mysqli_query($koneksi,"UPDATE tbl_user SET password = '$password' WHERE id_user = '$id'");
if($query){
    $respons = [
        'success' => 1,
        'message' => "Password berhasil diubah ,Silahkan Anda logout dan login kembali"
    ];
    echo json_encode($respons);
}else {
    $respons = [
        'success' => 0,
        'message' => "gagal update"
    ];
    echo json_encode($respons);
}