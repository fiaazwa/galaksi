<?php 
include('header.php');

?>

<style type="text/css">
    body {
        background-color: white !important;
    }
</style>

<div class="bg-white my-5 text-center">

    <div class="container">
        <?php
                include 'config.php';
                $id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

                $query = mysqli_query($koneksi,"SELECT lomba FROM calon_peserta WHERE tpq_id = $id GROUP BY lomba"); 
                $arr = [];
                $i = 0;
                while($data = mysqli_fetch_array($query)){
                    $arr[$i]['lomba'] = $data['lomba'];
                    $query2 = mysqli_query($koneksi,"SELECT * FROM calon_peserta WHERE tpq_id = $id AND lomba = '$data[lomba]' ");

                    $detail = [];
                    while($data2 = mysqli_fetch_array($query2)){
                        $detail[] = $data2;
                    }
                    $arr[$i]['detail'] = $detail;
                    $i++;
                }


            foreach ($arr as $key => $item) {
                ?>
        <div class="row">
            <h5 class="text-start"><?= $item['lomba'] ?></h5>

            <?php foreach ($item['detail'] as $key => $value) { 
            ?>
            <div class="col-md-4 mt-5" style="position: relative;">
                <?php if(@$_SESSION['role']=="admin") { ?>
                <a href="peserta-detail.php?id=<?= $value['id'] ?>">
                    <img src="<?= $value['pas_poto'] ?>" class="img-fluid" style="width: 300px;height: 400px;">
                    <div class="border text-dark shadow w-75 py-2 btn-primary rounded-pill" style="position: absolute;left: 50px;bottom:1px;"><?= $value['nama'] ?></div>
                </a>
            <?php } else { ?>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?= $value['pas_poto'] ?>" class="img-fluid" style="width: 300px;height: 400px;">
                    <div class="border text-dark shadow w-75 py-2 btn-primary rounded-pill" style="position: absolute;left: 50px;bottom:1px;"><?= $value['nama'] ?></div>
                </a>
            <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
        


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-danger">Hanya bisa dilihat oleh admin</h4>
      </div>
    </div>
  </div>
</div>


<?php include('footer.php') ?>