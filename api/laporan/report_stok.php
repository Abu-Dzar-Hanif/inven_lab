<?php
require_once('../../setup/koneksi.php');
require_once("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_stok` JOIN tbl_barang ON tbl_stok.barang=tbl_barang.id_barang JOIN tbl_jenis ON tbl_barang.jenis=tbl_jenis.id_jenis JOIN tbl_brand ON tbl_barang.brand=tbl_brand.id_brand");
$html = '<center><h3>Laporan Stok Barang</h3></center>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Nama Barang</th>
    <th>Jenis</th>
    <th>Brand</th>
    <th>Stok</th>
 </tr>';
$no = 1;
while ($a = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$a['nama_barang']."</td>
 <td>".$a['nama_jenis']."</td>
 <td>".$a['nama_brand']."</td>
 <td>".$a['stok']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$html .= '<link type="text/css" href="pdf.css" rel="stylesheet" />';
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_stok.pdf');
?>