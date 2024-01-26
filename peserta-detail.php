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

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if ($_POST) {
    $data = $_POST;

    $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET is_peserta=1 WHERE id = '$id' ");
    if($simpan) {
        $_SESSION['berhasil'] = 1;
    }else{
        $errors[] = 'Data gagal disimpan';
    }
}
?>

<div class="bg-white my-5 text-center">
    <div class="container">
        <h3 class="mb-5">Data Peserta</h3>

        <div class="p-5 mx-auto" style="border-radius: 20px;">

                <?php 
                $get = mysqli_query($koneksi,"SELECT A.*,B.nama as instansi FROM calon_peserta A INNER JOIN tpq B ON A.tpq_id=B.id WHERE A.id='$id'");
                while($d = mysqli_fetch_array($get)){
                    ?>
                    <div class="row">
                        <div class="col">
                            <img src="<?= $d['pas_poto'] ?>" class="img-fluid" style="width: 300px;height: 400px;">
                        </div>
                        <div class="col">

                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="nama" id="floatingInput" value="<?= $d['nama'] ?>" placeholder="Nama" required readonly>
                              <label for="floatingInput">Nama</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Tanggal Lahir" value="<?= date('d-m-Y',strtotime($d['tgl_lahir'])) ?>" readonly>
                              <label for="floatingInput">Tanggal Lahir</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir" id="floatingInput" placeholder="Lomba" value="<?= $d['lomba'] ?>" readonly>
                              <label for="floatingInput">Lomba</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Kategori Umur" value="<?= $d['kategori'] ?>" readonly>
                              <label for="floatingInput">Kategori Umur</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Domisili" value="<?= $d['domisili'] ?>" readonly>
                              <label for="floatingInput">Domisili</label>
                          </div>

                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="tgl_lahir"  id="floatingInput" placeholder="Nama Instansi" value="<?= $d['instansi'] ?>" readonly>
                              <label for="floatingInput">Nama Instansi</label>
                          </div>

                          <div class="mb-3 border rounded text-start p-2">
                                <div class="row">
                                    <div class="col my-auto">Foto KK</div>
                                    <div class="col text-end">
                                        <button type="button" class="btn btn-primary border" data-bs-toggle="modal" data-bs-target="#kkModal"><i class="bi bi-eye"></i> Preview</button>
                                    </div>
                                </div>
                          </div>

                          <div class="mb-3 border rounded text-start p-2">
                                <div class="row">
                                    <div class="col my-auto">Foto Akte Kelahiran</div>
                                    <div class="col text-end">
                                        <button type="button" class="btn btn-primary border" data-bs-toggle="modal" data-bs-target="#akteModal"><i class="bi bi-eye"></i> Preview</button>
                                    </div>
                                </div>
                          </div>

                          
          </div>
      </div>

<!-- <div class="row">
      <div class="col">
          <h4>Foto Akta Kelahiran</h4>
          <a href="#" data-bs-toggle="modal" data-bs-target="#akteModal">
            <img src="<?= $d['akte'] ?>" class="img-fluid img-blur">
          </a>
      </div>
      <div class="col">
          <h4>Foto Kartu Keluarga</h4>
          <a href="#" data-bs-toggle="modal" data-bs-target="#kkModal">
            <img src="<?= $d['kk'] ?>" class="img-fluid img-blur">
            </a>
      </div>
  </div> -->

  <!-- Modal -->
<div class="modal fade" id="akteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Akte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="<?= $d['akte'] ?>" class="img-fluid">
      </div>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="kkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="<?= $d['kk'] ?>" class="img-fluid">
      </div>
    </div>
  </div>
</div>

    <div class="text-end mt-3">
    <?php if ($d['is_peserta'] == "0") {  ?>
    
        <a href="#" role="button" class="btn px-5 mb-1" style="background-color:#a4daaa;">Belum terkonfirmasi</a>
    
    <?php } else { ?>
        <!-- <form method="post" action="hapuspeserta.php?id=<?= $d['id'] ?>" class="d-inline-block">
            <button type="submit" class="btn btn-danger">Hapus Data</button>
        </form> -->
        <a href="cetak.php?id=<?= $d['id'] ?>" target="_blank" class="btn px-5 mb-1" style="background-color:#a4daaa;">Konfirmasi</a>
    <?php } ?>
    <a href="#" onclick="history.back();" class="btn px-5 mb-1" style="background-color:#a4daaa;">Kembali</a>
    </div>


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

        <a href="cetak.php?id=<?= $d['id'] ?>" target="_blank" class="btn btn-outline-success px-4 my-5">Cetak Kartu</a>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

  <?php } ?>


  


</div>
</div>

<div class="p-3 text-start fw-bold mb-4" style="background-color: #c7e1b6;">
        CATATAN!
    </div>

    <div class="row">
        <div class="col-6 col-md-2">
            <div class="p-3 text-start fw-bold" style="background-color: #c7e1b6;">
                <i class="bi bi-check-circle-fill"></i> Informasi Kartu Peserta
            </div>
        </div>
        <div class="col-6 col-md-10">
            <div class="text-start">
                Mohon untuk acc data peserta lomba jika syarat dan ketentuan sudah terpenuhi. <br> Data peserta akan otomatis hilang apa bila belum di acc melewati 14 hari setelah data ter-input.
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php if (@$_SESSION['berhasil'] == "1") { $_SESSION['berhasil'] = "0" ?>
    $('#btnModal').trigger('click');
    <?php } ?>
</script>

<?php include('footer.php') ?>