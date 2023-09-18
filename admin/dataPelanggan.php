<?php
//atur koneksi ke database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_uas";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

// Cek koneksi database
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Query untuk mengambil data pelanggan
$sql = "SELECT * FROM datapelanggan";
$result = mysqli_query($koneksi, $sql);

// Mengambil data pelanggan dalam bentuk array
$datapelanggan = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Membebaskan hasil query
mysqli_free_result($result);

// Menutup koneksi database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

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


    <div class="w3-container" style="margin-left:20%">
        <h2>Data Pelanggan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datapelanggan as $index => $pelanggan) { ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo $pelanggan['username']; ?></td>
                        <td><?php echo $pelanggan['name']; ?></td>
                        <td><?php echo $pelanggan['phone']; ?></td>
                        <td><?php echo $pelanggan['address']; ?></td>
                        <td><?php echo $pelanggan['email']; ?></td>
                        <td><?php echo $pelanggan['jenis_kelamin']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
