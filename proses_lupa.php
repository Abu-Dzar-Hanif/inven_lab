<?php
require_once('setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($koneksi,$_POST['id']);
    $pass = mysqli_real_escape_string($koneksi,password_hash($_POST['pass'],PASSWORD_DEFAULT));
    $usr = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE id_user='$id'");
    $cekusr = mysqli_num_rows($usr);
    if($cekusr ==1 ){
        $query = mysqli_query($koneksi,"UPDATE tbl_user SET password ='$pass' WHERE id_user = '$id'");
        if($query){
            $p = password_hash('login',PASSWORD_DEFAULT);
            echo "<script>window.alert('Password berhasil dibuah ,Silahkan Login');
                window.location=('index.php?p=$p')</script>";
        }
    }else{
        echo "<script>window.alert('Username tidak ada.');
                window.location=(history.back())</script>";
    }
}