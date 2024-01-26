<?php 
include('header.php');

if (@$_SESSION['role']) {
  include('config.php');
  $id = $_SESSION['user_id'];
  $query = mysqli_query($koneksi,"SELECT * FROM user where id=$id"); 
  while($data = mysqli_fetch_array($query)){
    // $data['nama'] == "" || 
    if ($data['email'] == "" || $data['phone'] == "" || $data['jenis_kelamin'] == "" || $data['tpq_id'] == "" || $data['domisili'] == "") {
      redirect_to('lengkapi-user.php');
    }
  }
}

?>
<style type="text/css">
  * {
  box-sizing: border-box;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: lightblue;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
  margin-bottom: 25px;
}

/* Container around content */
.container2 {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.image1::after {
  content: '';
  padding: 10px 40px;
  position: absolute;
  width: 60px;
  height: 90px;
  background-image: url("assets/Book.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 2px solid lightgreen;
  top: 15px;
  z-index: 1;
}

.image3::after {
  content: '';
  padding: 10px 40px;
  position: absolute;
  width: 60px;
  height: 90px;
  background-image: url("assets/Date range.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 2px solid lightgreen;
  top: 15px;
  z-index: 1;
}

.image2::after {
  content: '';
  padding: 10px 40px;
  position: absolute;
  width: 60px;
  height: 90px;
  right: -40px;
  background-image: url("assets/icon _groups_.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 2px solid lightgreen;
  top: 15px;
  z-index: 1;
}

.image4::after {
  content: '';
  padding: 10px 40px;
  position: absolute;
  width: 60px;
  height: 90px;
  right: -40px;
  background-image: url("assets/icon _close_.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 2px solid lightgreen;
  top: 15px;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 30px;
  width: 0;
  z-index: 1;
  right: 50px;
  border: medium solid lightblue;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent lightblue;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 35px;
  width: 0;
  z-index: 1;
  left: 50px;
  border: medium solid lightblue;
  border-width: 10px 10px 10px 0;
  border-color: transparent lightblue transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -45px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
/* Place the timelime to the left */
  .timeline::after {
    left: 31px;
  }

/* Full-width containers */
  .container2 {
    width: 100%;
    padding-left: 70px;
    padding-right: 25px;
  }

/* Make sure that all arrows are pointing leftwards */
  .container2::before {
    left: 60px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

/* Make sure all circles are at the same spot */
  .left::after, .right::after {
    left: 15px;
  }

/* Make all right containers behave like the left ones */
  .right {
    left: 0%;
  }
}

</style>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/Rectangle 81-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/Rectangle 82.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/Rectangle 81.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>

  <section class="bg-white">
    <div class="container py-5 text-center">
        <h5>TENTANG</h5>
        <h5>GEBYAR LOMBA, AKSI & KREATIFITAS SANTRI IV</h5>
        <div class="row">
            <div class="col">
                <img src="assets/icon _psychology_.jpg" class="img-fluid" style="height: 250px;">
                <h6>Mengembangkan Kreatifitas Santri</h6>
            </div>
            <div class="col">
                <img src="assets/Services.jpg" class="img-fluid" style="height: 250px;">
                <h6>Mengembangkan Minat & Bakat Santri</h6>
            </div>
            <div class="col">
                <img src="assets/icon _school_.jpg" class="img-fluid" style="height: 250px;">
                <h6>Menjadi wadah Bagi Santri untuk Mengembangkan Bakatnya</h6>
            </div>
        </div>
    </div>
  </section>

  <section class="bg-white my-5">
    <div class="container pt-4 text-center">
      <h5>LINIMASI PROGRAM</h5>

      <div class="timeline">
        <div class="container2 image1 right">
          <div class="content">
            <!-- <h2>2016</h2> -->
            <div class="text-start border p-2 shadow">
              <p>1 - 14 Januari 2023 <br> Pendaftaran</p>
            </div>
          </div>
        </div>
        <div class="container2 image2 left">
          <div class="content pb-5">
            <!-- <h2>2017</h2> -->
            <div class="text-end border p-2 shadow">
              <p>22 Januari 2023 <br> Technical Meeting</p>
            </div>
          </div>
        </div>
        <div class="container2 image3 right">
          <div class="content">
            <!-- <h2>2016</h2> -->
            <div class="text-start border p-2 shadow">
              <p>26 - 28 Januari 2023 <br> Pembukaan & Pelaksanaan Lomba</p>
            </div>
          </div>
        </div>
        <div class="container2 image4 left">
          <div class="content pb-5">
            <!-- <h2>2017</h2> -->
            <div class="text-end border p-2 shadow">
              <p>29 Januari 2023 <br> Penutupan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white mt-5">
    <div class="container pt-4 text-center">
      <h5>SPONSOR</h5>

      <div class="row justify-content-center py-5">
        <div class="col-md-2">
          <img src="assets/BRI.jpg" class="img-fluid">
        </div>
        <div class="col-md-2">
          <img src="assets/BSI.jpg" class="img-fluid">
        </div>
        <div class="col-md-2">
          <img src="assets/Ramayana.jpg" class="img-fluid">
        </div>
        <div class="col-md-2">
          <img src="assets/RRI.jpg" class="img-fluid">
        </div>
        <div class="col-md-2">
          <img src="assets/Toho Kom.jpg" class="img-fluid">
        </div>
        <div class="col-md-2">
          <img src="assets/Wong Solo.jpg" class="img-fluid">
        </div>
        <div class="col-md-2 mt-5">
          <img src="assets/Bank Muamalat.jpg" class="img-fluid">
        </div>
        <div class="col-md-2 mt-5">
          <img src="assets/Tupperware.jpg" class="img-fluid">
        </div>
        <div class="col-md-2 mt-5">
          <img src="assets/BAZNAS.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </section>


<?php include('footer.php') ?>