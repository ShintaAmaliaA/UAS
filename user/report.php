<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from tb_siswa");
$html = '<center><h3>Daftar Nama siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
    <th>NO</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>alamat</th>
</tr>';
$no = 1;

while($row = mysqli_fetch_array($query))
{
   $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama']."</td>
    <td>".$row['kelas']."</td>
    <td>".$row['alamat']."</td>
   </tr>";
   $no++;
}

$html .= "</table></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('laporan_siswa.pdf');
?>
