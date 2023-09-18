<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from pemesanan");
$html = '<center><h3>Data Pemesanan</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
    <th>Tanggal</th>
    <th>Nama</th>
    <th>Email</th>
    <th>No HP</th>
    <th>Jenis Tugas</th>
    <th>Detail Pesanan</th>
    <th>Metode Pembayaran</th>
    <th>Deadline</th>
</tr>';
$no = 1;

while($row = mysqli_fetch_array($query))
{
   $html .= "<tr>
    <td>".$row['tanggal']."</td>
    <td>".$row['nama']."</td>
    <td>".$row['email']."</td>
    <td>".$row['no_hp']."</td>
    <td>".$row['jenis_tugas']."</td>
    <td>".$row['detail_pesanan']."</td>
    <td>".$row['metode_pembayaran']."</td>
    <td>".$row['deadline_pekerjaan']."</td> 
   </tr>";
}

$html .= "</table></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('laporan_Data_Pesanan.pdf');
?>
