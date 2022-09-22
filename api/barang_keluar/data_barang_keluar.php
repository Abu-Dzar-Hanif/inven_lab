<?php
require_once('../../setup/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_keluar` JOIN tbl_barang ON tbl_barang_keluar.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_barang_keluar.user = tbl_admin.id_admin WHERE tgl_keluar ORDER BY tgl_keluar DESC");
$no = 1;
$respons = [];
while ($a = mysqli_fetch_array($query)) {
    $n = $no++;
    $a = [
        'no' => "$n",
        'id_bk' => $a['id_bk'],
        'id_barang_keluar' => $a['id_barang_keluar'],
        'nama_barang' => $a['nama_barang'],
        'jumlah_keluar' => $a['jumlah_keluar'],
        'tgl_keluar' => $a['tgl_keluar'],
        'keterangan' => $a['keterangan'],
        'nama_brand' => $a['nama_brand'],
        'nama' => $a['nama']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);