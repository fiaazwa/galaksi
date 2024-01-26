<?php 
include('header.php');
include('config.php');
?>

<style type="text/css">
    body {
        background-color: white !important;
    }
</style>

<div class="bg-white my-5">
    <?php 
    $tpqid = $_GET['id'];
                $userid = $_GET['userid'];
    ?>
    <div class="container">
      <?php
                $query = mysqli_query($koneksi,"SELECT * FROM tpq WHERE id=$tpqid");     
                while($data = mysqli_fetch_array($query)){
                ?>
<h5 class="text-center"><?= $data['nama'] ?></h5>
        <?php } ?>
      <h5>Data Pembimbing</h5>
        <table class="table mt-4 table-bordered border-warning table-striped" style="border-radius: 10px; ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nomor Hp/wa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;

                $query = mysqli_query($koneksi,"SELECT * FROM user WHERE id=$userid");     
                while($data = mysqli_fetch_array($query)):
                $no++;
                ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $data['nama'] ?></td>
                  <td><?= $data['phone'] ?></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

        <h5>Data Peserta</h5>
        <table class="table mt-4 table-bordered border-warning table-striped" style="border-radius: 10px; ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nomor Peserta</th>
                  <th scope="col">Lomba</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;

                $query = mysqli_query($koneksi,"SELECT * FROM calon_peserta WHERE tpq_id=$tpqid AND user_id=$userid");     
                while($data = mysqli_fetch_array($query)):
                $no++;
                ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $data['nama'] ?></td>
                  <td><?= str_pad( $no, 3, "0", STR_PAD_LEFT ) ?></td>
                  <td><?= $data['lomba'] ?></td>
                  <td>
                    <?php if ($data['is_peserta'] == "0"){ ?>
                    <button class="bg-warning border-0" style="padding: 2px 16px;"> <a href="peserta-detail.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Status</a></button>
                  <?php } else { ?>
                    <button class="bg-success border-0" style="padding: 2px 16px;"> <a href="peserta-detail.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Status</a></button>
                  <?php } ?>

                    <button class="bg-danger border-0" style="padding: 2px 16px;"> <a href="hapuspeserta.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Hapus</a></button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

            <div class="text-end">
              <a href="pembayaran.php?id=<?= $userid ?>" class="btn btn-primary border text-dark">Status Pembayaran</a>
              <button onclick="history.go(-1);" class="btn btn-outline-success px-5">Kembali</button>
            </div>


    </div>
</div>
        

<?php include('footer.php') ?>