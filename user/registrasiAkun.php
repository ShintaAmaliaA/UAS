<?php
//atur koneksi ke database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_uas";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

//atur variabel
$err        = "";
$username   = "";
$name       = "";
$phone      = "";
$address    = "";
$email      = "";
$jenis_kelamin = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Validasi input (misalnya, pastikan semua field diisi)
    if (empty($username) || empty($password) || empty($name) || empty($phone) || empty($address) || empty($email) || empty($jenis_kelamin)) {
        $err .= "<li>Silakan lengkapi semua field.</li>";
    } else {
        // Periksa apakah username sudah digunakan
        $sql = "SELECT * FROM login WHERE username = '$username'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $err .= "<li>Username <b>$username</b> sudah digunakan.</li>";
        }

        if (empty($err)) {
            // Jika tidak ada kesalahan, lakukan proses registrasi

            // Enkripsi password sebelum disimpan ke database
            $hashedPassword = md5($password);

            // Simpan username, password, nama, no hp, alamat, email, dan jenis kelamin ke tabel login
            $sql = "INSERT INTO datapelanggan (username, password, name, phone, address, email, jenis_kelamin) VALUES ('$username', '$hashedPassword', '$name', '$phone', '$address', '$email', '$jenis_kelamin')";
            mysqli_query($koneksi, $sql);

            // Redirect ke halaman login setelah registrasi berhasil
            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background-image: url('img/bg2.png'); background-size: cover;">
    <div class="container my-4">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Registrasi Akun</div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <?php if ($err) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <ul><?php echo $err ?></ul>
                        </div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" action="" method="post" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="Username">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-name" type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="Nama">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input id="login-phone" type="text" class="form-control" name="phone" value="<?php echo $phone ?>" placeholder="No HP">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input id="login-address" type="text" class="form-control" name="address" value="<?php echo $address ?>" placeholder="Alamat">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="login-email" type="text" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <select id="login-jenis_kelamin" class="form-control" name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
                            </select>
                        </div>
                        <hr>
                        <div class="text">
                            <a href="login.php">Kembali</a>
                        </div> 
                        <div class="form-group" style="margin-top:10px;">
                            <div class="col-sm-4">
                                <input type="submit" name="register" class="btn btn-primary btn-block" value="Registrasi">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
