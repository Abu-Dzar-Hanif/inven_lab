<?php
require_once('../../setup/koneksi.php');
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_keluar` JOIN tbl_barang ON tbl_barang_keluar.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_barang_keluar.user = tbl_admin.id_admin WHERE tgl_keluar BETWEEN '$tgl1' AND '$tgl2'");
$no = 1;
$respons = [];
while ($a = mysqli_fetch_array($query)) {
    $n = $no++;
    $a = [
        'no' => "$n",
        'nama_barang' => $a['nama_barang'],
        'nama_brand' => $a['nama_brand'],
        'jumlah_keluar' => $a['jumlah_keluar'],
        'tgl_keluar' => $a['tgl_keluar'],
        'keterangan' => $a['keterangan'],
        'nama' => $a['nama']
    ];
    array_push($respons, $a);                    
}
echo json_encode($respons);