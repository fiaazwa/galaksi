<?php 
include('header.php');
?>

<style type="text/css">
    body {
        background-color: white !important;
    }

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.img {
  opacity: 1;
  display: block;
  width: 100%; 
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.cont:hover .img {
  opacity: 0.3;
}

.cont:hover .middle {
  opacity: 1;
}

.text {
  font-size: 18px;
}
</style>

<div class="bg-white my-5 text-center">
    <h3 class="mb-5">Daftar Lomba</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="cont" style="position: relative;">
                    <img src="assets/Adzan.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 7 tahun remaja max. 15 tahun</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cont" style="position: relative;">
                    <img src="assets/Ceramah.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Paud/TK max. 8 tahun Anak-anak max.12 tahun Remaja max. 15 tahun</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cont" style="position: relative;">
                    <img src="assets/Cerdas Cermat.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 12 tahun remaja max. 15 tahun</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Cerita Islam.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 13 tahun</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Do'a Harian.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 8 tahun</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Peraktek Sholat.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 10</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Tahfidzul.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Surat-surat pendek untuk anak-anak max 9 tahun. <br> 1 Juz + Tilawah max 12 5 juz + Tilawah max. 15 tahun</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Tartil.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Anak-anak Max. 11 tahun ibu-ibu & bapak-bapak (sudah menikah)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="cont" style="position: relative;">
                    <img src="assets/Mewarnai.jpg" class="img-fluid img">
                    <div class="middle">
                        <div class="text">Paud/TK Max. 7 tahun anak-anak max. 10 tahun</div>
                    </div>
                </div>
            </div>
        </div>

        <a href="daftar.php" class="btn btn-primary border text-dark w-25">Daftar Lomba</a>
    </div>
</div>
        

<?php include('footer.php') ?>