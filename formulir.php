<?php 
include('header.php');
include('config.php');

if (@$_SESSION['role'] == "user") {
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
    body {
        background-color: white !important;
    }
</style>

<?php 
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($koneksi,"SELECT * FROM calon_peserta where user_id=$id AND is_peserta=1");     
    $count = mysqli_num_rows($query);

    if ($count > 0) {
?>



<div class="shadow p-5 text-center w-50 mx-auto my-5" style="border-radius:20px;">
    <div style="color: orange;">Anda telah mendaftarkan peserta!, tidak dapat mendaftar lagi.</div>
</div>

<?php } else { ?>
<div class="bg-white my-5 text-center">
    <div class="container">
        <h3 class="mb-5">Formulir Pendaftaran</h3>

        <div class="border border-1 border-dark p-5 w-50 mx-auto" style="border-radius: 20px;">
            <form method="post" action="formulir-post.php" enctype="multipart/form-data">
                
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="Nama" required>
                  <label for="floatingInput">Nama</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="date" class="form-control" name="tgl_lahir" id="floatingInput" placeholder="Tanggal Lahir">
                  <label for="floatingInput">Tanggal Lahir</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="lomba">
                    <option value="" selected>Buka Untuk Memilih</option>
                    <option>Tartil Quran (Putri)</option>
                    <option>Tartil Quran (Putra)</option>
                    <option>Tahfidz Quran (Putri)</option>
                    <option>Tahfidz Quran (Putra)</option>
                    <option>Cerdas Cermat (Putri)</option>
                    <option>Cerdas Cermat (Putra)</option>
                    <option>Cerita Islam (Putri)</option>
                    <option>Cerita Islam (Putra)</option>
                    <option>Doa Harian (Putri)</option>
                    <option>Doa Harian (Putra)</option>
                    <option>Ceramah (Putri)</option>
                    <option>Ceramah (Putra)</option>
                    <option>Prakter Sholat (Putri)</option>
                    <option>Prakter Sholat (Putra)</option>
                    <option>Adzan (Putra)</option>
                    <option>Mewarnai</option>
                  </select>
                  <label for="floatingSelect">Pilih Lomba</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori">
                    <option value="" selected>Buka Untuk Memilih</option>
                    <option>Anak</option>
                    <option>Remaja</option>
                    <option>Dewasa</option>
                  </select>
                  <label for="floatingSelect">Kategori Umur</label>
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

                <div class="mb-3 text-start">
                  <label for="formFile1">Pas Foto 3x4</label>
                  <input class="form-control" type="file" name="pas_poto" id="formFile" required>
                </div>

                <div class="mb-3 text-start">
                  <label for="formFile1">Akte Kelahiran</label>
                  <input class="form-control" type="file" name="akte" id="formFile" required>
                </div>

                <div class="mb-3 text-start">
                  <label for="formFile1">Kartu Keluarga</label>
                  <input class="form-control" type="file" name="kk" id="formFile" required>
                </div>

                <div class="row mt-5">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary border px-4" name="action" value="tambah">Tambah Peserta</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary border px-4" name="action" value="simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php include('footer.php') ?>