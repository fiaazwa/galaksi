<?php include('header.php') ?>
<style type="text/css">
    body {
        background-image: url("assets/Tampilan Login/bacround login/sing in.jpg") !important;
        background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
    }
</style>

<?php

include 'config.php';
$errors = array();
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? trim($_POST['jenis_kelamin']) : '';
$tpq_id = isset($_POST['tpq_id']) ? trim($_POST['tpq_id']) : '';
$domisili = isset($_POST['domisili']) ? trim($_POST['domisili']) : '';
$password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
$password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';

if ($_POST) :
    // Validasi
    if (!$username) {
        $errors[] = 'Username tidak boleh kosong';
    }
    if (!$password1) {
        $errors[] = 'Password tidak boleh kosong';
    }

    if ($password1 != $password2) {
        $errors[] = 'Password harus sama';
    }
    $password1 = sha1($password1);

    if (empty($errors)) :
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        $cek = mysqli_num_rows($query);

        if ($cek > 0) {
            echo 'Username sudah pernah di daftar';
        } else {
            $insert = mysqli_query($koneksi, "INSERT INTO user (id,username,password,role,email,phone,jenis_kelamin,tpq_id,domisili) VALUES(NULL,'$username','$password1','user','$email','$phone','$jenis_kelamin','$tpq_id','$domisili')");
            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
            $data = mysqli_fetch_array($query);
            if ($insert) {
                redirect_to("login.php");
            } else {
                $errors[] = 'Terjadi Kesalahan';
            }
        }

    endif;

endif;
?>

<div style="margin: 100px 0;">
    <div class="mx-auto w-50 p-5 text-center" style="background-color: #bfe5d6;border-radius: 20px;border-bottom: 6px solid #a5b4ae;border-right: 6px solid #a5b4ae;">
        <h3 class="mb-5">Selamat Datang</h3>

        <form method="post">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
              <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
              <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" name="phone" placeholder="Nomor hp/wa">
              <label for="floatingInput">Nomor hp/wa</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jenis_kelamin">
                <option value="" selected>Buka Untuk Memilih</option>
                <option>Pria</option>
                <option>Wanita</option>
              </select>
              <label for="floatingSelect">Pilih Jenis Kelamin</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="tpq_id" required>
                <option value="" selected>Buka Untuk Memilih</option>
                <?php
                $q2 = mysqli_query($koneksi,"SELECT * FROM tpq");     
                while($data = mysqli_fetch_array($q2)){
                $no++;
                ?>
                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                <?php } ?>
              </select>
              <label for="floatingSelect">Nama TPQ</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="domisili">
                <option value="" selected>Buka Untuk Memilih</option>
                <option>Kota Sorong</option>
                <option>Kab. Raja Ampat</option>
                <option>Kab. Sorong</option>
                <option>Kab. Fak-Fak</option>
                <option>Kab. Manokwari</option>
                <option>Kab. Sorong Selatan</option>
                <option>Kab. Tambrauw</option>
                <option>Kab. Manokwari Selatan</option>
                <option>Kab. Bintuni</option>
              </select>
              <label for="floatingSelect">Domisili</label>
            </div>

            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password1" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <div class="small text-start">
                Password harus berisi huruf besar <br>
                Password harus berisi huruf kecil <br>
                Password harus berisi angka <br>
                Password harus berisi karakter <br>
            </div>
            <progress max="100" value="0" id="meter"></progress>
            <div class="textbox text-center"></div>

            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword2" name="password2" placeholder="Password">
              <label for="floatingPassword2">Konfirmasi Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-sm text-white border px-4 mt-5" style="border-radius: 10px;font-size: 12px;">Daftar</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    var code = document.getElementById("password");

var strengthbar = document.getElementById("meter");
// var display = document.getElementsByClassName("textbox")[0];

code.addEventListener("keyup", function() {
  checkpassword(code.value);
});


function checkpassword(password) {
  var strength = 0;
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[$@#&!]+/)) {
    strength += 1;

  }

  // if (password.length < 6) {
  //   display.innerHTML = "Minimal harus 6 huruf";
  // }

  // if (password.length > 12) {
  //   display.innerHTML = "maximum number of characters is 12";
  // }

  switch (strength) {
    case 0:
      strengthbar.value = 0;
      break;

    case 1:
      strengthbar.value = 25;
      break;

    case 2:
      strengthbar.value = 50;
      break;

    case 3:
      strengthbar.value = 75;
      break;

    case 4:
      strengthbar.value = 100;
      break;
  }
}
</script>

<?php include('footer.php') ?>