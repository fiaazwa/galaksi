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
$password = isset($_POST['username']) ? trim($_POST['password']) : '';

if ($_POST) :
    // Validasi
    if (!$username) {
        $errors[] = 'Username tidak boleh kosong';
    }
    if (!$password) {
        $errors[] = 'Password tidak boleh kosong';
    }

    if (empty($errors)) :
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

        if ($cek > 0) {
            $hashed_password = sha1($password);
            if ($data['password'] === $hashed_password) {
                $_SESSION["user_id"] = $data["id"];
                $_SESSION["username"] = $data["username"];
                $_SESSION["role"] = $data["role"];

                redirect_to("index.php");
            } else {
                $errors[] = 'Username atau password salah!';
            }
        } else {
            $errors[] = 'Username atau password salah!';
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

            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-sm text-white border px-4 mt-5" style="border-radius: 10px;font-size: 12px;">Masuk</button>
        </form>
    </div>
</div>

<?php include('footer.php') ?>