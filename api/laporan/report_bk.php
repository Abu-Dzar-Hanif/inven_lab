<?php
require_once('../../setup/koneksi.php');
require_once("../../dompdf/autoload.inc.php");
$d1 = date('d-m-Y',strtotime($_GET['t1']));
$d2 = date('d-m-Y',strtotime($_GET['t2']));
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM `tbl_barang_keluar` JOIN tbl_barang ON tbl_barang_keluar.barang = tbl_barang.id_barang JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand JOIN tbl_admin ON tbl_barang_keluar.user = tbl_admin.id_admin WHERE tgl_keluar BETWEEN '$_GET[t1]' AND '$_GET[t2]'");
$html = '<center><h3>Laporan Barang Keluar<br>Periode '.$d1.' s/d '.$d2.'</h3></center>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Nama Barang</th>
 <th>Jumlah Keluar </th>
 <th>Tgl Keluar</th>
 <th>Keterangan</th>
 <th>User Input</th>
 </tr>';
$no = 1;
while ($a = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$a['nama_barang']." (".$a['nama_brand'].")"."</td>
<td>".$a['jumlah_keluar']."</td>
<td>".$a['tgl_keluar']."</td>
<td>".$a['keterangan']."</td>
<td>".$a['nama']."</td>
</tr>";
$no++;
}
$html .= "

</html>";
$html .= '
<link type="text/css" href="pdf.css" rel="stylesheet" />';
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_barang_keluar.pdf');
?>