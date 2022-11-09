<?php
if(isset($_GET['p'])){
    $page = $_GET['p'];
    switch ($page) {
        case password_verify('home',$page):
            include('admin/page/home.php');
            break;
        case password_verify('data-jenis',$page):
            include('admin/page/data_jenis.php');
            break;
        case password_verify('tambah-jenis',$page):
            include('admin/page/tambah_jenis.php');
            break;
        case password_verify('edit-jenis',$page):
            include('admin/page/edit_jenis.php');
            break;
        case password_verify('data-brand',$page):
            include('admin/page/data_brand.php');
            break;
        case password_verify('tambah-brand',$page):
            include('admin/page/tambah_brand.php');
            break;
        case password_verify('edit-brand',$page):
            include('admin/page/edit_brand.php');
            break;
        case password_verify('data-barang',$page):
            include('admin/page/data_barang.php');
            break;
        case password_verify('tambah-barang',$page):
            include('admin/page/tambah_barang.php');
            break;
        case password_verify('edit-barang',$page):
            include('admin/page/edit_barang.php');
            break;
        case password_verify('data-barang-masuk',$page):
            include('admin/page/data_barang_masuk.php');
            break;
        case password_verify('data-tujuan',$page):
            include('admin/page/data_tujuan.php');
            break;
        case password_verify('tambah-tujuan',$page):
            include('admin/page/tambah_tujuan.php');
            break;
        case password_verify('edit-tujuan',$page):
            include('admin/page/edit_tujuan.php');
            break;
        case password_verify('detail-transaksi-masuk',$page):
            include('admin/page/detail_brmasuk.php');
            break;
        case password_verify('tambah-barang-masuk',$page):
            include('admin/page/tambah_brmasuk.php');
            break;
        case password_verify('data-admin',$page):
            include('admin/page/data_admin.php');
            break;
        case password_verify('tambah-admin',$page):
            include('admin/page/tambah_admin.php');
            break;
        case password_verify('edit-admin',$page):
            include('admin/page/edit_admin.php');
            break;
        case password_verify('data-barang-keluar',$page):
            include('admin/page/data_barang_keluar.php');
            break;
        case password_verify('detail-transaksi-keluar',$page):
            include('admin/page/detail_brkeluar.php');
            break;
        case password_verify('tambah-barang-keluar',$page):
            include('admin/page/tambah_brkeluar.php');
            break;
        case password_verify('data-stok',$page):
            include('admin/page/data_stok.php');
            break;
        case password_verify('laporan',$page):
            include('admin/page/laporan.php');
            break;
        case password_verify('profil',$page):
            include('admin/page/profil.php');
            break;
        case password_verify('edit-password',$page):
            include('admin/page/edit_password.php');
            break;
        default:
            include('admin/nf.php');
            break;
    }
}else{
    include('admin/page/home.php');
}
?>