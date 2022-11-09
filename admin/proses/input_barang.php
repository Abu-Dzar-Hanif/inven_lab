<?php
require_once('../../setup/koneksi.php');
if(isset($_POST['submit'])){
    $query = mysqli_query($koneksi,"SELECT MAX(id_barang) AS max_code FROM tbl_barang");
    $data = mysqli_fetch_array($query);
    $a = $data['max_code'];
    $urut = (int)substr($a,2,3);
    $urut++;
    $id = "BR".sprintf("%03s",$urut);
    $nama = $_POST['nama'];
    $brand = $_POST['brand'];
    $jenis = $_POST['jenis'];
    $rand = rand();
    $ekstensi =  ['png','jpg','jpeg'];
    $filename = str_replace(" ","",$_FILES['foto']['name']);
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $img = $rand.$filename;
    $Path = "../img/" . $img;
    if(!in_array($ext,$ekstensi)){
        $p = password_hash('data-barang',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
    }else{
        if($ukuran < 1044070){
            move_uploaded_file($_FILES['foto']['tmp_name'], $Path);
            $qin = mysqli_query($koneksi,"INSERT INTO tbl_barang(id_barang,nama_barang,foto,jenis,brand) VALUES('$id','$nama','$img','$jenis','$brand')");
            if($qin){
                $qs = mysqli_query($koneksi,"INSERT INTO tbl_stok(barang,stok) VALUES('$id',0)");
                if($qs){
                    $p = password_hash('data-barang',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
                }
            }
        }else{
            $p = password_hash('data-barang',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
        }
    }
}