<?php
session_start();

include 'koneksi.php';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $tanggal = date('Y-m-d');
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];
    $jenis_tugas = $_POST['jenis_tugas'];
    $detail = $_POST['detail'];
    $metodePembayaran = $_POST['metode_pembayaran'];
    $deadlinePekerjaan = $_POST['deadline'];

    // Simpan data ke database
    $sql = "INSERT INTO pemesanan (tanggal, nama, email, no_hp, jenis_tugas, detail_pesanan, metode_pembayaran, deadline_pekerjaan) 
            VALUES ('$tanggal', '$nama', '$email', '$noHp', '$jenis_tugas', '$detail', '$metodePembayaran', '$deadlinePekerjaan')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan.";
        // Mengarahkan ke halaman selanjutnya setelah 1 detik
        header("refresh:1; url=cetakBukti.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>
