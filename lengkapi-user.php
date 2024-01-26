<?php include('header.php') ?>

<style type="text/css">
    body {
        background-color: white !important;
    }
</style>

<?php

include 'config.php';
$errors = array();

if ($_POST) :
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? trim($_POST['jenis_kelamin']) : '';
    $instansi = isset($_POST['instansi']) ? trim($_POST['instansi']) : '';
    $domisili = isset($_POST['domisili']) ? trim($_POST['domisili']) : '';
    $user_id = $_SESSION['user_id'];

    // Validasi
    if (!$nama) {
        $errors[] = 'Nama tidak boleh kosong';
    }

    if (empty($errors)) :
        $insert = mysqli_query($koneksi, "UPDATE user SET nama='$nama',email='$email',phone='$phone',jenis_kelamin='$jenis_kelamin',instansi='$instansi',domisili='$domisili' WHERE id=$user_id");
        
        if ($insert) {
            redirect_to("index.php");
        } else {
            $errors[] = 'Terjadi Kesalahan';
        }
    endif;

endif;
?>

<div class="bg-white my-5 text-center">
    <div class="container">
        <h3 class="mb-5">Lengkapi Data Diri</h3>

        <div class="p-5 mx-auto">
            <form method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col my-auto">
                        <img src="assets/default.png" class="img-fluid" style="height: 250px;width: 250px;">
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="Nama" required>
                          <label for="floatingInput">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email">
                          <label for="floatingInput">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" name="phone" id="floatingInput" placeholder="Nomor Hp/Wa">
                          <label for="floatingInput">Nomor Hp/Wa</label>
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
                          <input type="text" class="form-control" name="instansi" id="floatingInput" placeholder="Nama Instansi" required>
                          <label for="floatingInput">Nama Instansi</label>
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

                    </div>
                </div>
                

                <div class="text-end">
                    <button type="submit" class="btn btn-primary border px-4">Lanjut</button>
                </div>
            </form>
        </div>
    </div>

    <div class="p-3 text-start fw-bold" style="background-color: #c7e1b6;">
        CATATAN!
    </div>

    <div class="px-5 text-start">
        Mohon mengisi semua data dengan tepat dan sesuai. untuk no hp/<br> WA di harapkan mengisi dengan nomor yang masih aktif
    </div>
</div>
        

