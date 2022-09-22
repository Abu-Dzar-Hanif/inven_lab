<?php
require_once('../../setup/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_masuk` JOIN tbl_barang ON tbl_barang_masuk.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_barang_masuk.user = tbl_admin.id_admin ORDER BY tgl_masuk DESC");
$no = 1;
$respons = [];
while ($a = mysqli_fetch_array($query)) {
    $n = $no++;
    $a = [
        'no' => "$n",
        'id_bm' => $a['id_bm'],
        'id_barang_masuk' => $a['id_barang_masuk'],
        'nama_barang' => $a['nama_barang'],
        'jumlah_masuk' => $a['jumlah_masuk'],
        'tgl_masuk' => $a['tgl_masuk'],
        'keterangan' => $a['keterangan'],
        'nama_brand' => $a['nama_brand'],
        'nama' => $a['nama'],
    ];
    array_push($respons, $a);
}
echo json_encode($respons);