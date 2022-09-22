<?php
require_once('../../setup/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM  tbl_jenis");
$respons = [];
$no = 1;
while ($a = mysqli_fetch_array($query)) {
    $n = $no++;
    $a = [
        'no' => "$n",
        'id_jenis' => $a['id_jenis'],
        'nama_jenis' => $a['nama_jenis']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);