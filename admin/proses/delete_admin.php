<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $id = $_GET['i'];
    $cek = mysqli_query($koneksi,"SELECT id_admin FROM tbl_admin");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_admin'],$id)){
            $id = $a['id_admin'];
        }
    }
    $query = mysqli_query($koneksi,"DELETE FROM tbl_admin WHERE id_admin = '$id'");
    if($query){
        $del = mysqli_query($koneksi,"DELETE FROM tbl_user WHERE id_user = '$id'");
        $p = password_hash('data-admin',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}