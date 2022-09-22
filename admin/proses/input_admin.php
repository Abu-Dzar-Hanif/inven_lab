<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $query = mysqli_query($koneksi,"SELECT MAX(id_admin) AS max_code FROM tbl_admin");
    $data = mysqli_fetch_array($query);
    $a = $data['max_code'];
    $urut = (int)substr($a,3,3);
    $urut++;
    $id = "ADM".sprintf("%03s",$urut);
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $level = $_POST['level'];
    $query = mysqli_query($koneksi,"INSERT INTO tbl_admin(id_admin,nama) VALUES('$id','$nama')");
    if($query){
        $user = mysqli_query($koneksi,"INSERT INTO tbl_user(id_user,username,password,level) VALUES('$id','$username','$password','$level')");
        $p = password_hash('data-admin',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}