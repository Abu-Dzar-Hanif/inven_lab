<?php
require('setup/koneksi.php');
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $pass = mysqli_real_escape_string($koneksi,$_POST['pass']);
    $get_usr = mysqli_query($koneksi,"SELECT password FROM tbl_user WHERE username='$username'");
    $get_pass = mysqli_fetch_array($get_usr);
    $num_usr = mysqli_num_rows($get_usr);
    if($num_usr == 1){
        if(password_verify($pass,$get_pass['password'])){
            $pass = $get_pass['password'];
        }else{
            echo "<script>window.alert('Username atau Password anda salah.');
                window.location=(history.back())</script>";
        }
        // var_dump($pass);die;
        $usr = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username' AND password='$pass'");
        $cekusr = mysqli_num_rows($usr);
        $user = mysqli_fetch_array($usr);
        // var_dump($cekusr);die;
        if($cekusr == 1){
            $qadm = mysqli_query($koneksi,"SELECT * FROM tbl_user JOIN tbl_admin ON tbl_user.id_user = tbl_admin.id_admin WHERE id_user = '$user[id_user]'");
            $adm = mysqli_fetch_array($qadm);
            session_start();
            $_SESSION['nama'] = $adm['nama'];
            $_SESSION['level'] = $adm['level'];
            $_SESSION['id'] = $adm['id_admin'];
            header('location: index.php'); 
        }
    }else{
        echo "<script>window.alert('Username tidak ada.');
                window.location=(history.back())</script>";
    }
    
}else{
    header('location: index.php');
}