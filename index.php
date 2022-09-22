<?php
require_once('setup/koneksi.php');
session_start();
if (empty($_SESSION['level'])) {
    if(isset($_GET['p'])){
        $page = $_GET['p'];
        switch ($page) {
            case password_verify('login',$page):
                include('login.php');
                break;
            case password_verify('lupa',$page):
                include('lupa.php');
                break;
            default:
                include('admin/nf.php');
                break;
        }
    }else{
        include('home.php');
    }
    
}elseif ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
    include('template.php');
}