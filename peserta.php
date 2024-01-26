<?php 
include('header.php');
include('config.php');
$id = $_SESSION['user_id'];
if (@$_SESSION['role'] == "user") {
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

<div class="bg-white my-5 text-center">

    <div class="container">
        <table class="table mt-4 table-bordered border-warning table-striped" style="border-radius: 10px; ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama TPQ</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                $query = mysqli_query($koneksi,"SELECT A.*,B.user_id,B.is_peserta FROM tpq A INNER JOIN calon_peserta B ON A.id=B.tpq_id GROUP BY B.user_id");     
                while($data = mysqli_fetch_array($query)):
                $no++;
                ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $data['nama'] ?></td>
                  <td>
                    <!-- <button class="bg-info border-0" style="padding: 2px 16px;"> <a href="editpeserta.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Edit</a></button> -->
                    <?php if ($data['is_peserta'] == "0") { ?>

                    <button class="bg-warning border-0 mt-1 px-4 rounded-pill text-white" style="padding: 3px 5px;">Menunggu Pembayaran</button>

                    <?php } else { ?>
                        <button class="bg-success border-0 mt-1 px-4 rounded-pill text-white" style="padding: 3px 5px;">Terkonfirmasi</button>
                    <?php } ?>
                  </td>

                  <td>
                    <button class="bg-info border-0 mt-1 px-4 rounded-pill" style="padding: 3px 5px;"><a href="tpq-detail.php?id=<?= $data['id'] ?>&userid=<?= $data['user_id'] ?>" class="text-decoration-none text-white">Detail</a></button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>


    </div>
</div>
        

<?php include('footer.php') ?>