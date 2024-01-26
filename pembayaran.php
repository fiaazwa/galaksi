<?php include('header.php') ?>

<style type="text/css">
    body {
        background-color: #e5e5e5 !important;
    }
</style>

<?php 
     include 'config.php';
     $user_id = $_GET['id'] ?? $_SESSION['user_id'];

     if ($_POST) {

        $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET is_peserta=1 WHERE user_id = '$user_id' ");
        if($simpan) {
            $_SESSION['berhasil'] = 1;
        }else{
            $errors[] = 'Data gagal disimpan';
        }
    }

     $query = mysqli_query($koneksi, "SELECT * FROM calon_peserta WHERE user_id = '$user_id'");
    $cek = mysqli_num_rows($query);
?>
<div class="my-5 text-center">
    <div class="container">
        <h3 class="mb-5">Pembayaran</h3>

        <div class="bg-white p-5 w-75 mx-auto" style="border-radius: 20px;">
            <h3 class="mb-5 text-start">Detail Pembayaran</h3>
            
            <div class="shadow p-3" style="border-radius: 10px;">
                <div class="row">
                    <div class="col-6 text-start">Biaya Pendaftaran</div>
                    <div class="col-6 text-end">Rp 35.000</div>
                    <div class="col-6 text-start">Jumlah Peserta</div>
                    <div class="col-6 text-end"><?= $cek ?></div>
                </div>
            </div>

            <hr class="my-5">

            <div class="row">
                <div class="col-6 text-start">Total Harga</div>
                <div class="col-6 text-end text-danger h3">Rp <?= number_format($cek*35000) ?></div>
            </div>

            <?php 
            $query2 = mysqli_query($koneksi, "SELECT * FROM calon_peserta WHERE user_id = '$user_id' LIMIT 1");
            while($data = mysqli_fetch_array($query2)){ 
                if ($data['is_peserta'] == "0") {
                    if ($_SESSION['role'] == "user") {
                ?>
                <a href="https://wa.me/6282315753653" target="_blank" class="btn btn-primary border text-dark px-5">Pergi ke whatsapp</a>
            <?php } else { ?>
                <hr>
                <div class="fw-bold h2 text-end text-danger">Belum dibayar</div>
            <?php }} else { ?>
                <hr>
                <div class="fw-bold h2 text-end">LUNAS</div>
        <?php } ?>

        <?php if ($data['is_peserta'] == "0") { if ($_SESSION['role'] == "admin") { ?>
            <form method="post">
                <input type="hidden" name="konfirmasi" value="true">

                <div class="text-center mt-3">
                    <button class="btn px-5" type="submit" style="background-color:#a4daaa;">Tandai Lunas</button>
                </div>
            </form>
        <?php }} ?>

        <button onclick="history.go(-1);" class="btn btn-outline-success px-5">Kembali</button>

            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="btnModal" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-lg">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
        <i class="bi bi-check-circle-fill" style="color: #c7e1b6;font-size: 250px;"></i>

        <br>

        <div class="fw-bold">Persetujuan Data berhasil! Data telah tersimpan. <br> Klik tombol untuk mencetak kartu peserta.</div>

        <a href="cetak.php?id=<?= $data['id'] ?>" target="_blank" class="btn btn-outline-success px-4 my-5">Cetak Kartu</a>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

    <?php } ?>

        <?php if ($_SESSION['role'] == "user") { ?>
            <div class="text-start mt-5">Pembayaran selanjutnya akan di arahkan ke Whatsapp admin.</div>
        <?php } ?>
        </div>

        
    </div>
</div>
        

<script type="text/javascript">
    <?php if (@$_SESSION['berhasil'] == "1") { $_SESSION['berhasil'] = "0" ?>
    $('#btnModal').trigger('click');
    <?php } ?>
</script>

<?php include('footer.php') ?>