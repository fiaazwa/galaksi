<?php include('header.php') ?>

      <div class="container">
          <h6 class="text-dark mt-4 pt-4 fs-5" style="margin-left: 20px;">Edit Data Peserta</h6>

          <div class="mt-3" style="border: 1px solid green; border-radius: 5px;">
            <?php 
            require_once('config.php');
            $id = (isset($_GET['id'])) ? trim($_GET['id']) : '';
            $get = mysqli_query($koneksi,"SELECT * FROM calon_peserta WHERE id='$id'");
            while($d = mysqli_fetch_array($get)){
            ?>
            <form class="p-3 mb-3 mt-1 w-100" action="updatepeserta.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 text-dark fw-normal">
                    <label for="inputKoderule" class="form-label">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control" style="border-radius: 10px;
                    border: 1px solid #D78D1E;" value="<?php echo $d['nama']; ?>">                
                </div>

                <div class="form-floating mb-3">
                  <input type="date" class="form-control" name="tgl_lahir" id="floatingInput" placeholder="Tanggal Lahir" value="<?php echo $d['tgl_lahir']; ?>">
                  <label for="floatingInput">Tanggal Lahir</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="lomba">
                    <option value="" selected>Buka Untuk Memilih</option>
                    <option <?= $d['lomba']=="Tartil Quran (Putri)"?"selected":""; ?> >Tartil Quran (Putri)</option>
                    <option <?= $d['lomba']=="Tartil Quran (Putra)"?"selected":""; ?> >Tartil Quran (Putra)</option>
                    <option <?= $d['lomba']=="Tahfidz Quran (Putri)"?"selected":""; ?> >Tahfidz Quran (Putri)</option>
                    <option <?= $d['lomba']=="Tahfidz Quran (Putra)"?"selected":""; ?> >Tahfidz Quran (Putra)</option>
                    <option <?= $d['lomba']=="Cerdas Cermat (Putri)"?"selected":""; ?> >Cerdas Cermat (Putri)</option>
                    <option <?= $d['lomba']=="Cerdas Cermat (Putra)"?"selected":""; ?> >Cerdas Cermat (Putra)</option>
                    <option <?= $d['lomba']=="Cerita Islam (Putri)"?"selected":""; ?> >Cerita Islam (Putri)</option>
                    <option <?= $d['lomba']=="Cerita Islam (Putra)"?"selected":""; ?> >Cerita Islam (Putra)</option>
                    <option <?= $d['lomba']=="Doa Harian (Putri)"?"selected":""; ?> >Doa Harian (Putri)</option>
                    <option <?= $d['lomba']=="Doa Harian (Putra)"?"selected":""; ?> >Doa Harian (Putra)</option>
                    <option <?= $d['lomba']=="Ceramah (Putri)"?"selected":""; ?> >Ceramah (Putri)</option>
                    <option <?= $d['lomba']=="Ceramah (Putra)"?"selected":""; ?> >Ceramah (Putra)</option>
                    <option <?= $d['lomba']=="Prakter Sholat (Putri)"?"selected":""; ?> >Prakter Sholat (Putri)</option>
                    <option <?= $d['lomba']=="Prakter Sholat (Putra)"?"selected":""; ?> >Prakter Sholat (Putra)</option>
                    <option <?= $d['lomba']=="Adzan (Putra)"?"selected":""; ?> >Adzan (Putra)</option>
                    <option <?= $d['lomba']=="Mewarnai"?"selected":""; ?> >Mewarnai</option>
                  </select>
                  <label for="floatingSelect">Pilih Lomba</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori">
                    <option value="" selected>Buka Untuk Memilih</option>
                    <option <?= $d['kategori']=="Anak"?"selected":"" ?>>Anak</option>
                    <option <?= $d['kategori']=="Remaja"?"selected":"" ?>>Remaja</option>
                    <option <?= $d['kategori']=="Dewasa"?"selected":"" ?>>Dewasa</option>
                  </select>
                  <label for="floatingSelect">Kategori Umur</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="domisili">
                    <option value="" selected>Buka Untuk Memilih</option>
                    <option <?= $d['domisili']=="Kota Sorong"?"selected":"" ?>>Kota Sorong</option>
                    <option <?= $d['domisili']=="Kab. Raja Ampat"?"selected":"" ?>>Kab. Raja Ampat</option>
                    <option <?= $d['domisili']=="Kab. Sorong"?"selected":"" ?>>Kab. Sorong</option>
                    <option <?= $d['domisili']=="Kab. Fak-Fak"?"selected":"" ?>>Kab. Fak-Fak</option>
                    <option <?= $d['domisili']=="Kab. Manokwari"?"selected":"" ?>>Kab. Manokwari</option>
                    <option <?= $d['domisili']=="Kab. Sorong Selatan"?"selected":"" ?>>Kab. Sorong Selatan</option>
                    <option <?= $d['domisili']=="Kab. Tambrauw"?"selected":"" ?>>Kab. Tambrauw</option>
                    <option <?= $d['domisili']=="Kab. Manokwari Selatan"?"selected":"" ?>>Kab. Manokwari Selatan</option>
                    <option <?= $d['domisili']=="Kab. Bintuni"?"selected":"" ?>>Kab. Bintuni</option>
                  </select>
                  <label for="floatingSelect">Domisili</label>
                </div>

                <div class="mb-3 text-start">
                  <label for="formFile1">Pas Foto 3x4</label>
                  <input class="form-control" type="file" name="pas_poto" id="formFile">
                </div>

                <div class="mb-3 text-start">
                  <label for="formFile1">Akte Kelahiran</label>
                  <input class="form-control" type="file" name="akte" id="formFile">
                </div>

                <div class="mb-3 text-start">
                  <label for="formFile1">Kartu Keluarga</label>
                  <input class="form-control" type="file" name="kk" id="formFile">
                </div>

                <button type="submit" class="btn btn-primary border text-white w-100"><a href="#" class="text-decoration-none text-white">Simpan</a>
                </button>
            </form>
            <?php } ?>
        </div>
        </div>