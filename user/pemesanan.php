<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>JokiInKamu||Mulai dari 50k</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
<form action="simpan.php" method="POST">
  <section class="Pemesanan">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h2 class="text-center" style="margin-top:5px;">Form Pemesanan</h2>
          <form>
          <div class="form-group">
            <label for="jenis-layanan">Jenis Layanan:</label>
            <select class="form-control" id="jenis-layanan" required>
              <option value="">Pilih Jenis Layanan</option>
              <option value="joki-tugas">Joki Tugas</option>
            </select>
          </div>
            <div class="form-group" id="submenu-tugas" style="display: none;">
              <label for="jenis-tugas">Jenis Tugas:</label>
              <select class="form-control" id="jenis-tugas" required>
                <option value="">Pilih Jenis Tugas</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
                <option value="kuliah">Kuliah</option>
                <option value="makalah">Makalah/Jurnal/Laporan</option>
              </select>
            </div>

            <!-- submenu tugas SMP -->
            <div class="form-group" id="submenu-tugas-smp" style="display: none;">
              <label for="jenis-tugas-smp">Jenis Tugas SMP:</label>
              <select class="form-control" id="jenis-tugas-smp" required>
                <option value="">Pilih Jenis Tugas SMP</option>
                <option value="matematika">Matematika</option>
                <option value="bahasa-indonesia">Bahasa Indonesia</option>
                <option value="ipa-ips">IPA/IPS</option>
              </select>
            </div>

            <!-- submenu tugas SMA -->
            <div class="form-group" id="submenu-tugas-sma" style="display: none;">
              <label for="jenis-tugas-sma">Jenis Tugas SMA:</label>
              <select class="form-control" id="jenis-tugas-sma" required>
                <option value="">Pilih Jenis Tugas SMA</option>
                <option value="matematika">Matematika</option>
                <option value="bahasa-indonesia">Bahasa Indonesia</option>
                <option value="ipa-ips">IPA/IPS</option>
              </select>
            </div>

            <!-- submenu tugas Kuliah -->
            <div class="form-group" id="submenu-tugas-kuliah" style="display: none;">
              <label for="jenis-tugas-kuliah">Jenis Tugas Kuliah:</label>
              <select class="form-control" id="jenis-tugas-kuliah" required>
                <option value="">Pilih Jenis Tugas Kuliah</option>
                <option value="matematika">Matematika</option>
                <option value="bahasa-indonesia">Bahasa Indonesia</option>
                <option value="ipa-ips">IPA/IPS</option>
              </select>
            </div>

            <!-- submenu tugas makalah -->
            <div class="form-group" id="submenu-tugas-makalah" style="display: none;">
              <label for="jenis-tugas-makalah">Jenis Tugas Makalah/Jurnal/Laporan:</label>
              <select class="form-control" id="jenis-tugas-makalah" required>
                <option value="">Pilih Jenis Tugas Makalah/Jurnal/Skripsi</option>
                <option value="matematika">Makalah</option>
                <option value="bahasa-indonesia">Jurnal</option>
                <option value="ipa-ips">Laporan</option>
              </select>
            </div>

            <script>
              // Menampilkan atau menyembunyikan submenu tugas berdasarkan jenis layanan yang dipilih
              document.getElementById('jenis-layanan').addEventListener('change', function() {
                var submenuTugas = document.getElementById('submenu-tugas');
                if (this.value === 'joki-tugas') {
                  submenuTugas.style.display = 'block';
                } else {
                  submenuTugas.style.display = 'none';
                }
              });
              
              // Menampilkan atau menyembunyikan submenu tugas SMP, SMA, Kuliah, atau Makalah berdasarkan jenis tugas yang dipilih
              document.getElementById('jenis-tugas').addEventListener('change', function() {
                var submenuTugasSMP = document.getElementById('submenu-tugas-smp');
                var submenuTugasSMA = document.getElementById('submenu-tugas-sma');
                var submenuTugasKuliah = document.getElementById('submenu-tugas-kuliah');
                var submenuTugasMakalah = document.getElementById('submenu-tugas-makalah');
                
                if (this.value === 'smp') {
                  submenuTugasSMP.style.display = 'block';
                  submenuTugasSMA.style.display = 'none';
                  submenuTugasKuliah.style.display = 'none';
                  submenuTugasMakalah.style.display = 'none';
                } else if (this.value === 'sma') {
                  submenuTugasSMP.style.display = 'none';
                  submenuTugasSMA.style.display = 'block';
                  submenuTugasKuliah.style.display = 'none';
                  submenuTugasMakalah.style.display = 'none';
                } else if (this.value === 'kuliah') {
                  submenuTugasSMP.style.display = 'none';
                  submenuTugasSMA.style.display = 'none';
                  submenuTugasKuliah.style.display = 'block';
                  submenuTugasMakalah.style.display = 'none';
                } else if (this.value === 'makalah') {
                  submenuTugasSMP.style.display = 'none';
                  submenuTugasSMA.style.display = 'none';
                  submenuTugasKuliah.style.display = 'none';
                  submenuTugasMakalah.style.display = 'block';
                } else {
                  submenuTugasSMP.style.display = 'none';
                  submenuTugasSMA.style.display = 'none';
                  submenuTugasKuliah.style.display = 'none';
                  submenuTugasMakalah.style.display = 'none';
                }
              });
            </script>
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="form-group">
              <label for="telepon">Nomor Telepon:</label>
              <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon Anda" required>
            </div>
            <div class="from-group">
              <tr>
                <td><label for="file_pdf" style="color: #000000;">Upload File PDF:</label></td>
                <td>
                  <input type="file" id="file_pdf" name="file_pdf" accept=".pdf" required>
                  <p id="pdf-note" style="color: #000000; margin-top: 5px;"></p>
                </td>
              </tr>
            <div class="form-group">
              <label for="detail-pesanan">Detail Pesanan:</label>
              <textarea class="form-control" id="detail-pesanan" rows="5" placeholder="Masukkan Detail Pesanan Anda" required></textarea>
            </div>
              <script>

                // Menampilkan nama file setelah dipilih pada input file PDF
                $('#file_pdf').change(function() {
                  var fileName = $(this).val().split('\\').pop();
                  $('#pdf-note').text('File terpilih: ' + fileName);
                });
              </script>
            </div>
            <div class="form-group">
            <label for="metode-pembayaran">Metode Pembayaran:</label>
                <label class="radio-inline">
                  <input type="radio" name="metode-pembayaran" value="transfer" required>
                  <img src="img/bca.jpg" alt="bca" style="width: 10%; margin: 5px;"> BCA
                </label>
                <label class="radio-inline">
                  <input type="radio" name="metode-pembayaran" value="transfer" required>
                  <img src="img/bri.jpg" alt="bri" style="width: 10%; margin: 5px;"> BNI
                </label>
                <label class="radio-inline">
                  <input type="radio" name="metode-pembayaran" value="cash" required>
                  <img src="img/shopee.jpg" alt="Shopee" style="width: 10%; margin: 5px;"> ShopeePay
                </label>
                <br>
                <label class="radio-inline">
                  <input type="radio" name="metode-pembayaran" value="ewallet" required>
                  <img src="img/ovo.jpg" alt="OVO" style="width: 10%; margin: 5px;"> OVO
                </label>
                <label class="radio-inline">
                  <input type="radio" name="metode-pembayaran" value="ewallet" required>
                  <img src="img/dana.jpg" alt="Dana" style="width: 10%; margin: 5px;"> Dana
                </label>
            </div>
            <button type="submit" class="btn btn-primary" onclick="tampilkanPesan()">SUBMIT</button>
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
            <script>
  function tampilkanPesan() {
    var konfirmasi = confirm("Apakah Data yang Dimasukkan Sudah Benar?");
    if (konfirmasi) {
      // Kirim data ke simpan.php menggunakan AJAX
      $.ajax({
        type: 'POST',
        url: 'simpan.php',
        data: {
          jenis_layanan: $('#jenis-layanan').val(),
          jenis_tugas: $('#jenis-tugas').val(),
          jenis_tugas_smp: $('#jenis-tugas-smp').val(),
          jenis_tugas_sma: $('#jenis-tugas-sma').val(),
          jenis_tugas_kuliah: $('#jenis-tugas-kuliah').val(),
          jenis_tugas_makalah: $('#jenis-tugas-makalah').val(),
          nama: $('#nama').val(),
          email: $('#email').val(),
          telepon: $('#telepon').val(),
          file_pdf: $('#file_pdf').val(),
          detail_pesanan: $('#detail-pesanan').val(),
          metode_pembayaran: $('input[name="metode-pembayaran"]:checked').val()
        },
        success: function(response) {
          alert("Data berhasil disimpan.");
          // Mengosongkan formulir setelah data berhasil disimpan
          $('#jenis-layanan').val('');
          $('#jenis-tugas').val('');
          $('#jenis-tugas-smp').val('');
          $('#jenis-tugas-sma').val('');
          $('#jenis-tugas-kuliah').val('');
          $('#jenis-tugas-makalah').val('');
          $('#nama').val('');
          $('#email').val('');
          $('#telepon').val('');
          $('#file_pdf').val('');
          $('#detail-pesanan').val('');
          $('input[name="metode-pembayaran"]').prop('checked', false);
        },
        error: function() {
          alert("Terjadi kesalahan saat menyimpan data. Silakan coba lagi.");
        }
      });
    } else {
      alert("Silakan periksa kembali data Anda.");
    }
  }
</script>

        </div>
      </div>
    </div>
  </section>
</form>
</body>
</html>
