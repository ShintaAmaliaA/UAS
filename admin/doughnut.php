<!DOCTYPE html>
<html>
<title>admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    var canvas = document.createElement('canvas');
    canvas.width = 500; // Mengatur lebar canvas
    canvas.height = 500; // Mengatur tinggi canvas

    // Menambahkan canvas di posisi yang diinginkan
    var contentDiv = document.getElementsByClassName('w3-container')[0];
    contentDiv.appendChild(canvas);

    // Membuat grafik
    var ctx = canvas.getContext('2d');

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

    // Query untuk mengambil data dari tabel data_pesanan
    $sql = "SELECT metode_pembayaran, COUNT(*) AS total FROM pemesanan GROUP BY metode_pembayaran";
    $result = $conn->query($sql);

    // Menampilkan data dalam grafik
    $labels = [];
    $data = [];
    $backgroundColor = [];
    $borderColor = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row["metode_pembayaran"];
            $data[] = $row["total"];
            // Generate warna acak untuk setiap data
            $backgroundColor[] = "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.2)";
            $borderColor[] = "rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)";
        }
    }

    // Menutup koneksi ke database
    $conn->close();
    ?>

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Joki Tugas',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderColor: <?php echo json_encode($borderColor); ?>,
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, // Menonaktifkan responsivitas
            maintainAspectRatio: false, // Menonaktifkan aspek rasio
            legend: {
                display: true,
                position: 'bottom'
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            }
        }
    });
</script>

</body>
</html>
