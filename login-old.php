<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Document</title>
</head>

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
                redirect_to("admin-page/dashboard.php");
            } else {
                $errors[] = 'Username atau password salah!';
            }
        } else {
            $errors[] = 'Username atau password salah!';
        }

    endif;

endif;
?>

<body>
    <section>
        <div class="container justify-content-center mt-5 pt-5">
          <div class="row ">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto ">
              <div class="card mt-5 form-log" style=" background-color: #02022C;">
                <div class="card-header pb-0 text-left ">
                  <h3 class="fw-bold text-white mt-4">Welcome back</h3>
                  <p class="mb-0 text-white">Enter your email and password to log in</p>
                </div>
                <hr style="color: white;">
                <div class="card-body text-white">
                  <form role="form" action="login.php" method="post">
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <hr style="color: white;">
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-login text-white" style="padding: 5px 136px;  border: 1px solid;"><a href="#" class="text-decoration-none text-white">Log in</a></button>
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1 text-white">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="#" class="font-weight-bold text-decoration-none">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html> 