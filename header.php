<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Galaksi</title>

    <style type="text/css">
      .btn-primary {
        background-color: #a4daaa;
      }

      .btn-white:hover {
        background-color: blue !important;
        color: white !important;
      }

      .carousel-indicators button {
        border-radius: 100%;
        margin-left: 10px !important;
        padding: 2px !important;
        width: 10px !important;
        height: 10px !important;
      }

      .img-blur {
        /* Add the blur effect */
        filter: blur(10px);
        -webkit-filter: blur(8px);
        
        /* Full height */
        
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
</head>
<body style="background-color: #dbf0e8;">
 <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-scroll sticky-top shadow-0 border-bottom" style="background-color: #a4dac5;">
      <div class="container">
        <h1 class="mb-3"><a class="navbar-brand text-dark" href="#"> <img src="assets/logo.png" class="img-fluid" style="width:40px;height: 40px;"> GALAKSI</a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="background-color: #a4dac5;" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item ms-4 my-auto">
              <a class="nav-link text-dark" style="font-size: 14px;" href="index.php">BERANDA</a>
            </li>
            <?php if (@$_SESSION['role'] != "admin") { ?>
            <li class="nav-item  ms-4 my-auto">
              <a class="nav-link text-dark" style="font-size: 14px;" href="<?= !@$_SESSION['username']?'daftar-lomba.php':'formulir.php' ?>">DAFTAR LOMBA</a>
            </li>
            <?php } ?>

            <?php if (@$_SESSION['role'] == "admin") { ?>
            <li class="nav-item  ms-4 my-auto">
              <a class="nav-link text-dark" style="font-size: 14px;" href="tpq.php">Input TPQ</a>
            </li>
            <?php } ?>
            <?php if (@$_SESSION['username']) { ?>
            <li class="nav-item  ms-4 my-auto">
              <a class="nav-link text-dark" style="font-size: 14px;" href="<?= $_SESSION['role'] == "admin"?"peserta.php":"list-peserta.php" ?>">PESERTA</a>
            </li>
            <?php } ?>
            <?php if (!@$_SESSION['username']) { ?>
            <li class="nav-item ms-4 my-auto">
              <a class="btn btn-primary btn-sm text-white border px-4" style="border-radius: 10px;font-size: 12px;" href="login.php">Masuk</a>
            </li>
            <li class="nav-item ms-4 my-auto">
              <a class="btn btn-white border bg-white btn-sm px-4" style="color: #a4dac5;border-radius: 10px;font-size: 12px;" href="daftar.php">Daftar</a>
            </li>
            <?php } else { ?>
            <li class="nav-item ms-4 my-auto dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                include 'config.php';
                $idxx = $_SESSION['user_id'];
                $get33 = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$idxx'");
                while($x = mysqli_fetch_array($get33)){
                  if ($x['profil']) {
                    ?>
                  
                <img src="<?= $x['profil'] ?>" class="img-fluid rounded-circle" style="height: 40px;width: 40px;">
                <?php } else { ?>
                  <img src="assets/default.png" class="img-fluid" style="height: 40px;width: 40px;">
              <?php }} ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                <!-- <li><hr class="dropdown-divider"></li> -->
                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
              </ul>
            </li>

            <?php } ?>
          </ul>
        </div>
      </div>
  </nav>
  <!-- Navbar -->