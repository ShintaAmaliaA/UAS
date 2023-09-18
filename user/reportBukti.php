<?php
include 'koneksi.php';
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Generate konten bukti Pemesanan
    $content = '<h2 style="text-align: center; margin: 10px;"><span style="color: #66CDAA;">JOKI</span> IN <span style="color: #66CDAA;">KAMU</span></h2>';
    $content .= "<h3 style='text-align: center;'>Bukti Pemesanan</h3>";
    $content .= '<hr style="border-top: 1px dashed #000; margin: 20px 0;">';
    $content .= "<table style='margin: 0 auto;'>";
    $content .= "<tr><td>Tanggal</td><td>: " . $row['tanggal'] . "</td></tr>";
    $content .= "<tr><td>Nama Lengkap</td><td>: " . $row['nama'] . "</td></tr>";
    $content .= "<tr><td>Email</td><td>: " . $row['email'] . "</td></tr>";
    $content .= "<tr><td>No HP</td><td>: " . $row['no_hp'] . "</td></tr>";
    $content .= "<tr><td>Jenis Tugas</td><td>: " . $row['jenis_tugas'] . "</td></tr>";
    $content .= "<tr><td>Detail Pesanan</td><td>: " . $row['detail_pesanan'] . "</td></tr>";
    $content .= "<tr><td>Metode Pembayaran</td><td>: " . $row['metode_pembayaran'] . "</td></tr>";
    $content .= "<tr><td>Deadline Pekerjaan</td><td>: " . $row['deadline_pekerjaan'] . "</td></tr>"; // Tambahkan baris untuk menampilkan deadline_pekerjaan
    $content .= "</table>";

    // Load konten ke Dompdf
    $dompdf->loadHtml($content);

    // Proses rendering PDF
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Menghasilkan file PDF untuk diunduh
    $filename = 'bukti_pemesanan_' . date('YmdHis') . '.pdf';
    $dompdf->stream($filename, array('Attachment' => true));
} else {
    echo "Data pemesanan tidak ditemukan.";
}

mysqli_close($koneksi);
?>
