<?php include('header.php') ?>

<?php 
require_once('config.php');

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if ($_POST) {
    $data = $_POST;

    $simpan = mysqli_query($koneksi,"UPDATE tpq SET nama='$data[nama]' WHERE id = '$id' ");
    if($simpan) {
        redirect_to('tpq.php');
    }else{
        $errors[] = 'Data gagal disimpan';
    }
}
?>

      <div class="main-content">
          <h6 class="text-dark mt-4 pt-4 fs-5" style="margin-left: 20px;">Edit Data TPQ</h6>

          <div class="container mt-3" style="border: 1px solid green; border-radius: 5px; width: 1033px;">
            <?php 
            $get = mysqli_query($koneksi,"SELECT * FROM tpq WHERE id='$id'");
            while($d = mysqli_fetch_array($get)){
            ?>
            <form class="row g-3 mb-3 mt-1" method="post">
                <div class="col-12 mb-1 text-dark fw-normal">
                    <label for="inputKoderule" class="form-label">Nama TPQ</label>
                    <input type="text" name="nama" class="form-control" style="border-radius: 10px;
                    border: 1px solid #D78D1E;" value="<?php echo $d['nama']; ?>">                
                </div>

                <button type="submit" class="btn btn-primary border text-white" style="width: 1010px; margin-left: 7px;"><a href="#" class="text-decoration-none text-white">Simpan</a>
                </button>
            </form>
            <?php } ?>
        </div>
        </div>
      </div>