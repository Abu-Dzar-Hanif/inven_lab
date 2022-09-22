<?php
require_once('../../setup/koneksi.php');
date_default_timezone_set('asia/jakarta');
session_start();
if (isset($_POST['tambah'])) {
    if ($_POST['j'] == '1') {
        if ($_POST['nama'] == '' || $_POST['jumlah']  == '' || $_POST['jumlah'] == 0){
            echo "<script>window.alert('Data tidak boleh kosong !!');
                window.location=(history.back())</script>";
        }else {
            $qt = mysqli_query($koneksi,"INSERT INTO tmp(kode_br,jumlah,jenis) VALUES('$_POST[nama]','$_POST[jumlah]',1)");
                $p = password_hash('tambah-barang-masuk',PASSWORD_DEFAULT);
                header("location: ../../index.php?p=$p");
        }
    }elseif ($_POST['j'] == '2') {
        if ($_POST['nama'] == '' || $_POST['jumlah']  == '' || $_POST['jumlah'] == 0){
            echo "<script>window.alert('Data tidak boleh kosong !!');
            window.location=(history.back())</script>";
        }else{
            $cek = mysqli_query($koneksi,"SELECT stok FROM tbl_stok WHERE barang = '$_POST[nama]'");
            $s = mysqli_fetch_array($cek);
            if($s['stok'] < $_POST['jumlah']){
                echo "<script>window.alert('Stok tidak cukup !!');
                window.location=(history.back())</script>";
            }else{
                $qt = mysqli_query($koneksi,"INSERT INTO tmp(kode_br,jumlah,jenis) VALUES('$_POST[nama]','$_POST[jumlah]',2)");
                $p = password_hash('tambah-barang-keluar',PASSWORD_DEFAULT);
                header("location: ../../index.php?p=$p");
            }
        }
    }
}elseif (isset($_POST['simpan'])) {
    if ($_POST['j'] == '1') {
        if($_POST['ket'] == ''){
            echo "<script>window.alert('Keterangan tidak boleh kosong !!');
            window.location=(history.back())</script>";
        }else{
            $qs = mysqli_query($koneksi,"SELECT * FROM tmp WHERE jenis = 1");
            $query = mysqli_query($koneksi,"SELECT MAX(id_barang_masuk) AS max_code FROM tbl_barang_masuk");
            $data = mysqli_fetch_array($query);
            $a = $data['max_code'];
            $urut = (int)substr($a,2,3);
            $urut++;
            $id = "BM".sprintf("%03s",$urut);
            $tgl = date('Y-m-d');
            while ($c = mysqli_fetch_array($qs)) {
                mysqli_query($koneksi,"INSERT INTO tbl_barang_masuk(id_barang_masuk,barang,jumlah_masuk,tgl_masuk,keterangan,user) VALUES('$id','$c[kode_br]','$c[jumlah]','$tgl','$_POST[ket]','$_SESSION[id]')");
                $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$c[kode_br]'");
                $x = mysqli_fetch_array($qstok);
                $stok = $x['stok'] + $c['jumlah'];
                $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$c[kode_br]'");
            }
            mysqli_query($koneksi,"DELETE FROM tmp WHERE jenis = 1");
            $p = password_hash('data-barang-masuk',PASSWORD_DEFAULT);
            header("location: ../../index.php?p=$p");
        }
    }elseif ($_POST['j'] == '2') {
        if($_POST['ket'] == ''){
            echo "<script>window.alert('Keterangan tidak boleh kosong !!');
            window.location=(history.back())</script>";
        }else{
            $qs = mysqli_query($koneksi,"SELECT * FROM tmp WHERE jenis = 2");
            $query = mysqli_query($koneksi,"SELECT MAX(id_barang_keluar) AS max_code FROM tbl_barang_keluar");
            $data = mysqli_fetch_array($query);
            $a = $data['max_code'];
            $urut = (int)substr($a,2,3);
            $urut++;
            $id = "BK".sprintf("%03s",$urut);
            $tgl = date('Y-m-d');
            while ($c = mysqli_fetch_array($qs)) {
                $sm = mysqli_query($koneksi,"SELECT SUM(jumlah) AS sm FROM tmp WHERE kode_br = '$c[kode_br]' AND jenis = 2");
                $m = mysqli_fetch_array($sm);
                $cek = mysqli_query($koneksi,"SELECT stok FROM tbl_stok WHERE barang = '$c[kode_br]'");
                $s = mysqli_fetch_array($cek);
                if($s['stok'] < $m['sm']){
                    echo "<script>window.alert('Stok tidak cukup !!');
                    window.location=(history.back())</script>";
                }else{
                    mysqli_query($koneksi,"INSERT INTO tbl_barang_keluar(id_barang_keluar,barang,jumlah_keluar,tgl_keluar,keterangan,user) VALUES('$id','$c[kode_br]','$c[jumlah]','$tgl','$_POST[ket]','$_SESSION[id]')");
                    $qstok = mysqli_query($koneksi,"SELECT * FROM tbl_stok WHERE barang ='$c[kode_br]'");
                    $x = mysqli_fetch_array($qstok);
                    $stok = $x['stok'] - $c['jumlah'];
                    $ups = mysqli_query($koneksi,"UPDATE tbl_stok SET stok ='$stok' WHERE barang = '$c[kode_br]'");
                    mysqli_query($koneksi,"DELETE FROM tmp WHERE jenis = 2");
                    $p = password_hash('data-barang-keluar',PASSWORD_DEFAULT);
                    header("location: ../../index.php?p=$p");
                }
            }
        }
    }
}
?>