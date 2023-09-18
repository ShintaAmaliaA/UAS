<?php
session_start();

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JokiInKamu||Mulai dari 50k</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE81JT3GXWE0ngsV7Zt27NXFoaoApmYm811uXoPkF03wJ8ERdknLPHO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
<form action="simpan.php" method="POST">
    <section class="content " style="margin-right:20%; margin-left:20%;">
    <h2 class="text-center" style="margin:30px;">Form Pemesanan</h2>
        <div class="box">
            <table class="table-data" border="0">
                <p>Tanggal : <?php echo date('d F Y'); ?></p>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>
                        <input type="text" name="nama" maxlength="100">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" maxlength="100">
                    </td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>
                        <input type="int" name="noHp" maxlength="200">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Tugas</td>
                    <td>
                        <select name="jenis_tugas" maxlength="100">
                            <option value="b_indonesia">Pilih Jenis Tugas</option>                           
                            <option value="b_inggris">Bahasa Indonesia| Kelas 7</option>
                            <option value="matematika">Matematika | Kelas 7</option>
                            <option value="ipa/ips">IPA/IPS | Kelas 7</option>
                            <option value="b_inggris">Bahasa Inggris | Kelas 7</option>
                            <option value="b_indonesia">Bahasa Indonesia| Kelas 8</option>
                            <option value="matematika">Matematika | Kelas 8</option>
                            <option value="ipa/ips">IPA/IPS | Kelas 8</option>
                            <option value="b_inggris">Bahasa Inggris | Kelas 8</option>
                            <option value="b_indonesia">Bahasa Indonesia| Kelas 9</option>
                            <option value="matematika">Matematika | Kelas 9</option>
                            <option value="ipa/ips">IPA/IPS | Kelas 9</option>
                            <option value="b_inggris">Bahasa Inggris | Kelas 9</option>
                        </select>
                    </td>
                </tr>   
                <tr>
                    <td>Detail Pesanan</td>
                    <td>
                        <input type="text" name="detail" >
                    </td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="radio-inline">
                          <input type="radio" name="metode_pembayaran" value="Transfer" required>
                          <img src="img/bca.jpg" alt="bca" style="width: 20%; margin: 5px;"> BCA
                        </label>
                        <br>
                        <label class="radio-inline">
                          <input type="radio" name="metode_pembayaran" value="Transfer" required>
                          <img src="img/bri.jpg" alt="bri" style="width: 20%; margin: 5px;"> BNI
                        </label>
                        <br>
                        <label class="radio-inline">
                          <input type="radio" name="metode_pembayaran" value="ewllet" required>
                          <img src="img/shopee.jpg" alt="Shopee" style="width: 20%; margin: 5px;"> ShopeePay
                        </label>
                        <br>
                        <label class="radio-inline">
                          <input type="radio" name="metode_pembayaran" value="ewllet" required>
                          <img src="img/ovo.jpg" alt="OVO" style="width: 20%; margin: 5px;"> OVO
                        </label>
                        <br>
                        <label class="radio-inline">
                          <input type="radio" name="metode_pembayaran" value="ewllet" required>
                          <img src="img/dana.jpg" alt="Dana" style="width: 20%; margin: 5px;"> Dana
                        </label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>Deadline Pekerjaan</td>
                    <td>
                        <input type="datetime-local" name="deadline" min="<?php echo date('Y-m-d\TH:i'); ?>">
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" onclick="tampilkanPesan()">KIRIM</button>
        <br>
        <br>
        <div class="text"><a href="login.php">Kembali</a></div> 
        <script>
        function tampilkanPesan() {
          var konfirmasi = confirm("Apakah Data yang Dimasukkan Sudah Benar?");
          if (konfirmasi) {
            alert("Data berhasil disimpan.");
          } else {
            alert("Silakan periksa kembali data Anda.");
          }
        }
        </script>
    </section>
</form>
</body>
</html>
