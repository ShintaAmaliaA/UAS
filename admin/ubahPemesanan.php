<?php
// Memeriksa apakah parameter id tersedia dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Konfigurasi koneksi ke database
    $servername = "localhost"; // Ganti sesuai dengan server Anda
    $username = "root"; // Ganti sesuai dengan username database Anda
    $password = ""; // Ganti sesuai dengan password database Anda
    $dbname = "db_uas"; // Ganti sesuai dengan nama database Anda

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data pemesanan berdasarkan id
    $sql = "SELECT * FROM pemesanan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Ambil data pemesanan
        $tanggal = $row['tanggal'];
        $nama = $row['nama'];
        $email = $row['email'];
        $no_hp = $row['no_hp'];
        $jenis_tugas = $row['jenis_tugas'];
        $detail_pesanan = $row['detail_pesanan'];
        $metode_pembayaran = $row['metode_pembayaran'];
        $deadline_pekerjaan = $row['deadline_pekerjaan'];
    } else {
        echo "Data pemesanan tidak ditemukan.";
        exit;
    }

    // Menghandle form submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirim melalui form
        $tanggal = $_POST['tanggal'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $jenis_tugas = $_POST['jenis_tugas'];
        $detail_pesanan = $_POST['detail_pesanan'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $deadline_pekerjaan = $_POST['deadline_pekerjaan'];

        // Query untuk mengupdate data pemesanan
        $sql = "UPDATE pemesanan SET tanggal = '$tanggal', nama = '$nama', email = '$email', no_hp = '$no_hp', jenis_tugas = '$jenis_tugas', detail_pesanan = '$detail_pesanan', metode_pembayaran = '$metode_pembayaran', deadline_pekerjaan = '$deadline_pekerjaan' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Data pemesanan berhasil diperbarui.";
        } else {
            echo "Error: " . $conn->error;
        }

        // Menutup koneksi ke database
        $conn->close();
    }
} else {
    echo "ID tidak tersedia.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Pemesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="w3-container container">
    <h2>Ubah Pemesanan</h2>

    <form method="post" action="">
        <label for="tanggal">Tanggal:</label>
        <input type="text" name="tanggal" value="<?php echo $tanggal; ?>"><br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" value="<?php echo $no_hp; ?>"><br><br>

        <label for="jenis_tugas">Jenis Tugas:</label>
        <input type="text" name="jenis_tugas" value="<?php echo $jenis_tugas; ?>"><br><br>

        <label for="detail_pesanan">Detail Pesanan:</label>
        <textarea name="detail_pesanan"><?php echo $detail_pesanan; ?></textarea><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <input type="text" name="metode_pembayaran" value="<?php echo $metode_pembayaran; ?>"><br><br>

        <label for="deadline_pekerjaan">Deadline:</label>
        <input type="text" name="deadline_pekerjaan" value="<?php echo $deadline_pekerjaan; ?>"><br><br>

        <input type="submit" value="Simpan">
    </form>
</div>

</body>
</html>
