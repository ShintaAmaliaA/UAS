<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE81JT3GXWE0ngsV7Zt27NXFoaoApmYm811uXoPkF03wJ8ERdknLPHO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Detail Pemesanan</h2>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Jenis Tugas</th>
                    <th>Detail Pesanan</th>
                    <th>Metode Pembayaran</th>
                    <th>Deadline Pekerjaan</th>
                </tr>
                <?php
                include 'koneksi.php';
                $koneksi = mysqli_connect($host, $user, $password, $database);
                if (!$koneksi) {
                    die("Koneksi database gagal: " . mysqli_connect_error());
                }
                $query = "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($koneksi, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <tr>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['no_hp']; ?></td>
                        <td><?php echo $row['jenis_tugas']; ?></td>
                        <td><?php echo $row['detail_pesanan']; ?></td>
                        <td><?php echo $row['metode_pembayaran']; ?></td>
                        <td><?php echo $row['deadline_pekerjaan']; ?></td> 
                    </tr>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td colspan="9">Belum ada data pemesanan.</td>
                    </tr>
                    <?php
                }
                mysqli_close($koneksi);
                ?>
            </table>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="text-center mt-4">
                    <a href="reportBukti.php" class="btn btn-primary">Unduh Bukti Pendaftaran</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
