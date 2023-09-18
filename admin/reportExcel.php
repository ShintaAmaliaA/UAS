<?php
include('koneksi.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Tanggal');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Email');
$sheet->setCellValue('D1', 'No HP');
$sheet->setCellValue('E1', 'Jenis Tugas');
$sheet->setCellValue('F1', 'Detail Pesanan');
$sheet->setCellValue('G1', 'Metode Pembayaran');
$sheet->setCellValue('H1', 'Deadline'); // Kolom Deadline Pekerjaan

$query = mysqli_query($koneksi, "SELECT tanggal, nama, email, no_hp, jenis_tugas, detail_pesanan, metode_pembayaran, deadline_pekerjaan FROM pemesanan");
$i = 2;
$no = 1;

while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $row['tanggal']);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['email']);
    $sheet->setCellValue('D'.$i, $row['no_hp']);
    $sheet->setCellValue('E'.$i, $row['jenis_tugas']);
    $sheet->setCellValue('F'.$i, $row['detail_pesanan']);
    $sheet->setCellValue('G'.$i, $row['metode_pembayaran']);
    $sheet->setCellValue('H'.$i, $row['deadline_pekerjaan']); // Mengisi nilai Deadline Pekerjaan
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$i = $i-1;
$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray); // Mengatur gaya seluruh kolom

$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pembelian.xlsx');
?>
