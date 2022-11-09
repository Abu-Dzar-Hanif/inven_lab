<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $tujuan = $_POST['tujuan'];
    $tipe = $_POST['tipe'];
    $query = mysqli_query($koneksi,"INSERT INTO tbl_tujuan(tujuan,tipe) VALUES('$tujuan','$tipe')");
    if($query){
        $p = password_hash('data-tujuan',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}