<?php
require_once('../../setup/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['i'];
    $nama = $_POST['nama'];
    $brand = $_POST['brand'];
    $jenis = $_POST['jenis'];
    $cek = mysqli_query($koneksi,"SELECT id_barang,foto FROM tbl_barang");
    while ($a = mysqli_fetch_array($cek)) {
        if(password_verify($a['id_barang'],$id)){
            $id = $a['id_barang'];
            $f = $a['foto'];
        }
    }
    if ($_FILES['foto']['name'] == "") {
        $query = mysqli_query($koneksi,"UPDATE tbl_barang SET nama_barang = '$nama', jenis = '$jenis', brand = '$brand' WHERE id_barang = '$id'");
        if($query){
            $p = password_hash('data-barang',PASSWORD_DEFAULT);
            header("location: ../../index.php?p=$p");
        }
    }elseif ($_FILES['foto']['name'] !="") {
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
                unlink('../img/' . $f);
                move_uploaded_file($_FILES['foto']['tmp_name'], $Path);
                $query = mysqli_query($koneksi,"UPDATE tbl_barang SET nama_barang = '$nama', foto = '$img', jenis = '$jenis', brand = '$brand' WHERE id_barang = '$id'");
                if($query){
                    $p = password_hash('data-barang',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
                }
            }else{
                $p = password_hash('data-barang',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
            }
        }
    }
}