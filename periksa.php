<?php include('header.php') ?>
  
<section style="background-image: url(/Group\ 40.png); height: 595px;">
  <div class="container mt-5 pt-5  text-center">
      <h5 class="fw-normal text-white" style="border-radius: 5px; padding: 10px; background-color: #D78D1E; letter-spacing: 1px;">Pilih Gejala Yang Kamu Alami</h5>
            <?php 
            include 'config.php';
            $get = mysqli_query($koneksi,"SELECT * FROM gejala WHERE id = $_GET[id]");
            $next = mysqli_query($koneksi,"SELECT * FROM gejala WHERE id > $_GET[id] ORDER BY kode LIMIT 1");
            $recordNext=[];
            while($q = mysqli_fetch_array($next)){
              $recordNext = $q;
            }

            while($d = mysqli_fetch_array($get)){
            ?>
          <div class="container" style=" border-radius: 5px; background-color: #0B0334;">
              <h3 class="text-white" style="padding-top: 90px;"><?= $d['nama'] ?></h3>
              <div class="row">
                  <div class="col-12 mb-4 mt-4" style="padding-bottom: 80px;">
                    <form id="form" method="<?= empty($recordNext) ? 'POST' :'GET' ?>" action="<?= empty($recordNext)? 'hasilperiksa.php' :'periksa.php' ?>" style="display: inline-block;">
                      <input type="hidden" name="id" value="<?= @$recordNext['id'] ?>">
                      <input type="hidden" name="nama" value="<?= $_GET['nama'] ?>">
                      <input type="hidden" name="umur" value="<?= $_GET['umur'] ?>">
                      <input type="hidden" name="jenis_kelamin" value="<?= $_GET['jenis_kelamin'] ?>">
                      <input type="hidden" name="no_kk" value="<?= $_GET['no_kk'] ?>">
                      <input type="hidden" name="no_hp" value="<?= $_GET['no_hp'] ?>">
                      <input type="hidden" name="alamat" value="<?= $_GET['alamat'] ?>">
                      <input type="hidden" name="kode_gejala" value="<?= @$_GET['kode_gejala'].' '.$d['kode'] ?>">

                      <button type="submit" class="btn text-white fs-5" style="background-color: #D78D1E; padding-left: 25px; padding-right: 25px; margin-right: 10px;">Ya</button>
                    </form>

                    <form id="form" method="<?= empty($recordNext) ? 'POST' :'GET' ?>" action="<?= empty($recordNext)? 'hasilperiksa.php' :'periksa.php' ?>" style="display: inline-block;">
                      <input type="hidden" name="id" value="<?= @$recordNext['id'] ?>">
                      <input type="hidden" name="nama" value="<?= $_GET['nama'] ?>">
                      <input type="hidden" name="umur" value="<?= $_GET['umur'] ?>">
                      <input type="hidden" name="jenis_kelamin" value="<?= $_GET['jenis_kelamin'] ?>">
                      <input type="hidden" name="no_kk" value="<?= $_GET['no_kk'] ?>">
                      <input type="hidden" name="no_hp" value="<?= $_GET['no_hp'] ?>">
                      <input type="hidden" name="alamat" value="<?= $_GET['alamat'] ?>">
                      <input type="hidden" name="kode_gejala" value="<?= @$_GET['kode_gejala'] ?>">
                      <button type="submit" class="btn text-white fs-5" style="background-color: #D78D1E; margin-left: 10px;">Tidak</button>

                    </form>
                      
                  </div>
              </div>
          </div>
        <?php } ?>
     

  </div>
</section>

<?php include('footer.php') ?>