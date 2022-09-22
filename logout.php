<?php
require('setup/koneksi.php');
session_start();
if(isset($_SESSION['level'])){
    session_destroy();
    header('location: index.php');
}