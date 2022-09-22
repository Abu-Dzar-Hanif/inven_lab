<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $password = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $cek = mysqli_query($koneksi,"SELECT id_user FROM tbl_user");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_user'],$id)){
            $id = $a['id_user'];
        }
    }
    $query = mysqli_query($koneksi,"UPDATE tbl_user SET password = '$password' WHERE id_user = '$id'");
    if($query){
        echo "<script>window.alert('Password berhasil dibuah ,anda akan logout');
                window.location=('../../logout.php')</script>";
    }
}