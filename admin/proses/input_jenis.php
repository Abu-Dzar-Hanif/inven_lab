<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $jenis = $_POST['jenis'];
    $query = mysqli_query($koneksi,"INSERT INTO tbl_jenis(nama_jenis) VALUES('$jenis')");
    if($query){
        $p = password_hash('data-jenis',PASSWORD_DEFAULT);
        header("location: ../../index.php?p=$p");
}
}