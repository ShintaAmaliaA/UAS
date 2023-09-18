<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .scroll-table {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body style="background-color: white;">

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
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan elemen canvas
    var ctx = document.createElement('canvas');

    // Menambahkan canvas di posisi yang diinginkan
    var contentDiv = document.getElementsByClassName('w3-container')[0];
    contentDiv.appendChild(ctx);

    // Membuat array warna
    var colors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(50, 205, 50, 0.2)', 'rgba(139, 69, 19, 0.2)', 'rgba(238, 130, 238, 0.2)', 'rgba(0, 255, 255, 0.2)', 'rgba(255, 0, 255, 0.2)', 'rgba(255, 255, 0, 0.2)'];

    // Membuat grafik
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Total Pemesanan',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: colors,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_uas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel pemesanan
$sql = "SELECT MONTHNAME(tanggal) AS month, COUNT(*) AS total FROM pemesanan GROUP BY month";
$result = $conn->query($sql);

// Menampilkan data dalam grafik
$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["month"];
        $data[] = $row["total"];
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<script>
    // Mengupdate data grafik dari PHP
    myChart.data.labels = <?php echo json_encode($labels); ?>;
    myChart.data.datasets[0].data = <?php echo json_encode($data); ?>;
    myChart.update();
</script>

</body>
</html>
