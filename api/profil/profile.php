<?php
require_once('../../setup/koneksi.php');
$id = $_GET['id'];
$p = mysqli_query($koneksi,"SELECT * FROM tbl_admin JOIN tbl_user ON tbl_user.id_user = tbl_admin.id_admin JOIN tbl_level ON tbl_level.id_level = tbl_user.level WHERE id_admin ='$id'");
$respons = [];
$data = mysqli_fetch_array($p);
$a = [
    'id_admin' => $data['id_admin'],
    'nama' => $data['nama'],
    'username' => $data['username'],
    'password' => $data['password'],
    'lvl' => $data['lvl']
];
array_push($respons, $a);
echo json_encode($respons);
?>