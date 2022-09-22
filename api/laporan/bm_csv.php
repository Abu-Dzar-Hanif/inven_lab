<?php 
require_once('../../setup/koneksi.php');
$d1 = date('d-m-Y',strtotime($_GET['t1']));
$d2 = date('d-m-Y',strtotime($_GET['t2']));
$d = date('m.y',strtotime($_GET['t1']));
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_masuk` JOIN tbl_barang ON tbl_barang_masuk.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_barang_masuk.user = tbl_admin.id_admin WHERE tgl_masuk BETWEEN '$_GET[t1]' AND '$_GET[t2]'");
$data = [];
if (mysqli_num_rows($query) > 0) {
  $no =1;
  while ($row = mysqli_fetch_array($query)) {
    $s = $row['nama_barang']." "."($row[nama_brand])";
    $a = [
      'no' => $no++,
      'nama_barang'=>  $s,
      'jumlah_masuk'=> $row['jumlah_masuk'],
      'tgl_masuk'=> $row['tgl_masuk'],
      'keterangan'=> $row['keterangan'],
      'nama'=> $row['nama']
    ];
      array_push($data, $a);
  }
}

header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=laporan_barang_masuk_$d.csv");
$output = fopen('php://output', 'w');
fputcsv($output, array("Laporan Barang Masuk periode $d1 s/d $d2"));
fputcsv($output, array('No', 'Nama Barang', 'Jumlah Masuk', 'Tgl Masuk','Keterangan','User Input'));
if (count($data) > 0) {
  foreach ($data as $row) {
      fputcsv($output, $row);
  }
}

?>