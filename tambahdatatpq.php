<?php include('header.php') ?>

<?php 
include 'config.php';

if ($_POST) {
    $data = $_POST;

    $simpan = mysqli_query($koneksi,"INSERT INTO tpq VALUES ('', '$data[nama]')");
    if($simpan) {
        redirect_to('tpq.php');
    }else{
        $errors[] = 'Data gagal disimpan';
    }
}
?>

      <div class="main-content">
          <h6 class="text-dark mt-4 pt-4 fs-5" style="margin-left: 20px;">Tambah Data TPQ</h6>

          <div class="container mt-3 bg-white" style="border: 1px solid green; border-radius: 5px;">
            
            <form class="row g-3 mb-3 mt-1" method="post">
                <div class="col-12 mb-1 text-dark fw-normal">
                    <label for="inputKode" class="form-label">Nama TPQ</label>
                    <input type="text" name="nama" class="form-control" style="border-radius: 10px;
                    border: 1px solid green;">                
                </div>
                <button type="submit" class="btn btn-primary border text-white"><a href="#" class="text-decoration-none text-white">Simpan</a>
                </button>
            </form>
        </div>
            
        </div>
      </div>