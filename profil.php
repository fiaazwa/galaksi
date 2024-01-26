<?php 
include('header.php');
?>

<style type="text/css">
    body {
        background-color: white !important;
    }
</style>

<?php 
require_once('config.php');

$id = $_SESSION['user_id'];
$error = [];
$success = [];

if ($_POST) {
    $post = $_POST;

    if ($post['password1'] != $post['password2']) {
        $error[] = "Password baru tidak sama";
        goto bawah;
    }

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
    $data = mysqli_fetch_array($query);

    $hashed_password = sha1($post['password']);
    if ($data['password'] != $hashed_password) {
        $error[] = "Password lama tidak sama";
        goto bawah;
    } else {
        $new = sha1($post['password1']);
        $query = mysqli_query($koneksi, "UPDATE user set password = '$new' WHERE id = '$id'");
        $success[] = "Ubah password Berhasil";
    }

    bawah:
}
?>

<div class="bg-white my-5 text-center">
    <div class="container">
        <h3 class="mb-5">Profile</h3>

        <?php 
            if (count($error) > 0) { 
                 
                ?>

            <div class="alert alert-danger">
                <?php foreach ($error as $key => $item) { ?>
                <div><?= $item ?></div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
        <div class="alert alert-success">
                <div><?= $success[0] ?></div>
            </div>
        <?php } ?>

        <div class="p-5 mx-auto" style="border-radius: 20px;">

                <?php 
                $get = mysqli_query($koneksi,"SELECT A.*,B.nama as tpq FROM user A INNER JOIN tpq B ON A.tpq_id=B.id WHERE A.id='$id'");
                while($d = mysqli_fetch_array($get)){
                    ?>
                    <div class="row">
                        <div class="col">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#profilModal">
                                <img src="<?= $d['profil'] ?>" class="img-fluid" style="width: 300px;height: 400px;">
                            </a>

                            <form method="post" action="update-profil.php" enctype="multipart/form-data">
                                <input type="file" name="profil" class="form-control my-2 mx-auto" style="width:300px;">
                                <button type="submit" class="btn btn-primary border w-50 ">Ganti Profil</button>
                            </form>

                            <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <img src="<?= $d['profil'] ?>" class="img-fluid">
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="nama" id="floatingInput" value="<?= $d['nama']??$d['username'] ?>" placeholder="Nama" required readonly>
                              <label for="floatingInput">Nama</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" value="<?= $d['email'] ?>" readonly>
                              <label for="floatingInput">Email</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Nomor hp" value="<?= $d['phone'] ?>" readonly>
                              <label for="floatingInput">Nomor hp</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Jenis Kelamin" value="<?= $d['jenis_kelamin'] ?>" readonly>
                              <label for="floatingInput">Jenis Kelamin</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Domisili" value="<?= $d['domisili'] ?>" readonly>
                              <label for="floatingInput">Domisili</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Nama TPQ" value="<?= $d['tpq'] ?>" readonly>
                              <label for="floatingInput">Nama TPQ</label>
                          </div>
          </div>
      </div>



    <div class="text-end mt-3">
        <a href="#" class="btn btn-outline-success px-5" data-bs-toggle="modal" data-bs-target="#passwordModal">Ganti Password</a>
        <button onclick="history.go(-1);" class="btn btn-outline-success px-5">Kembali</button>
        <?php 
            $get = mysqli_query($koneksi,"SELECT * FROM calon_peserta where user_id = '$id' LIMIT 1");
                while($q = mysqli_fetch_array($get)){
                    if ($q['is_peserta'] == "0") {
        ?>
        <a href="pembayaran.php" target="_blank" class="btn btn-warning px-5">Cek Pembayaran</a>
        <?php } else { ?>
           <a href="pembayaran.php" target="_blank" class="btn px-5" style="background-color:#a4daaa;">Cek Pembayaran</a> 
        <?php }} ?>
    </div>


    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password Lama" required>
                <input type="password" name="password1" class="form-control mb-3" placeholder="Password Baru" required>
                <input type="password" name="password2" class="form-control mb-3" placeholder="Konfirmasi Password Baru" required>

                <button type="submit" class="btn btn-success">Ganti Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>



  <?php } ?>


  


</div>
</div>