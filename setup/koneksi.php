<?php
$koneksi = mysqli_connect('localhost','root','','inven_lab');
if($koneksi != true){
    echo "gagal";
}