<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .scroll-container {
            overflow-x: auto;
        }
        
        .scroll-table {
            max-height: 400px;
            overflow-y: auto;
        }
        
        /* Tambahkan CSS berikut */
        .w3-responsive th, .w3-responsive td {
            white-space: nowrap;
        }
    </style>
</head>
<body style="background-color: #66CDAA;">

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    <h1 style="margin: 10px"><b><span style="color: #66CDAA;">JOKI</span> IN <span
                style="color: #66CDAA;"> KAMU</span></b></h1>
    <h3 class="w3-bar-item" style="background-color: black;"><span style="color: white">Menu</span></h3>
    <a href="dataPemesanan.php" class="w3-bar-item w3-button"><i class="fas fa-database"></i> Data Pemesanan</a>
    <a href="dataPelanggan.php" class="w3-bar-item w3-button"><i class="fas fa-address-card"></i> Data Pelanggan</a>
    <a href="grafikBulan.php" class="w3-bar-item w3-button"><i class="fas fa-chart-bar"></i> Grafik Bulan</a>
    <a href="grafikPie.php" class="w3-bar-item w3-button"><i class="fas fa-chart-pie"></i> Grafik Pembelian</a>
    <a href="doughnut.php" class="w3-bar-item w3-button"><i class="fas fa-life-ring"></i> Metode Pembayaran</a>
    <a href="logout.php" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Content -->
<div class="w3-container" style="margin-left:20%">
    <h2>Data Pembelian</h2>
    <div class="scroll-container">
        <div class="scroll-table">
            <div class="w3-responsive">
                <table class="w3-table-all">
                    <tr class="w3-light-grey">
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Jenis Tugas</th>
                        <th>Detail Pesanan</th>
                        <th>Metode Pembayaran</th>
                        <th>Deadline</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
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

                    // Query untuk menampilkan data pemesanan
                    $sql = "SELECT id, tanggal, nama, email, no_hp, jenis_tugas, detail_pesanan, metode_pembayaran, deadline_pekerjaan FROM pemesanan";

                    $result = $conn->query($sql);

                    // Memeriksa apakah terdapat data yang dihasilkan dari query
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["tanggal"] . "</td>
                                    <td>" . $row["nama"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["no_hp"] . "</td>
                                    <td>" . $row["jenis_tugas"] . "</td>
                                    <td>" . $row["detail_pesanan"] . "</td>
                                    <td>" . $row["metode_pembayaran"] . "</td>
                                    <td>" . $row["deadline_pekerjaan"] . "</td>
                                    <td>
                                        <a href='hapusPemesanan.php?id=" . $row["id"] . "' class='w3-button w3-red'><i class='fas fa-trash'></i> Hapus</a>
                                        <a href='ubahPemesanan.php?id=" . $row["id"] . "' class='w3-button w3-blue'><i class='fas fa-edit'></i> Ubah</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada data pemesanan.</td></tr>";
                    }

                    // Menutup koneksi ke database
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px; margin-bottom: 50px;">
        <a href="reportExcel.php" class="w3-button w3-blue"><i class="fas fa-file-excel"></i> Download Report Excel</a>
        <a href="reportPdf.php" class="w3-button w3-red"><i class="fas fa-file-pdf"></i> Download Report PDF</a>
    </div>
</div>

</body>
</html>
