<?php
require_once('../../setup/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM  tbl_brand");
$no = 1;
$respons = [];
while ($a = mysqli_fetch_array($query)) {
    $n = $no++;
    $a = [
        'no' => "$n",
        'id_brand' => $a['id_brand'],
        'nama_brand' => $a['nama_brand']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);