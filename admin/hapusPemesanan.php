<?php
// Memeriksa apakah parameter id tersedia dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    session_start();

    include 'koneksi.php';

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk menghapus data pemesanan berdasarkan id
    $sql = "DELETE FROM pemesanan WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data pemesanan berhasil dihapus.";
        header("refresh:1; url=dataPemesanan.php");
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup koneksi ke database
    $conn->close();
} else {
    echo "ID tidak tersedia.";
}
?>
