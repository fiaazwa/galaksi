<?php 
include('header.php');
include('config.php');

if (@$_SESSION['role']) {
  $id = $_SESSION['user_id'];
  $query = mysqli_query($koneksi,"SELECT * FROM user where id=$id");     
  while($data = mysqli_fetch_array($query)){
    // if ($data['nama'] == "" || $data['email'] == "" || $data['phone'] == "" || $data['jenis_kelamin'] == "" || $data['instansi'] == "" || $data['domisili'] == "") {
    //   redirect_to('lengkapi-user.php');
    // }
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

        <div class="p-5 text-start">

            <table class="table mt-4 table-bordered border-warning table-striped" style="border-radius: 10px; width: 1025px;">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                $query = mysqli_query($koneksi,"SELECT * FROM calon_peserta where user_id=$id");     
                while($data = mysqli_fetch_array($query)):
                $no++;
                ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $data['nama'] ?></td>
                  <td>
                    <?php if($data['is_peserta'] == "0"){ ?>
                    <button class="bg-info border-0" style="padding: 2px 16px;"> <a href="editpeserta.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Edit</a></button>
                    <?php } ?>
                    <button class="bg-success border-0 mt-1" style="padding: 3px 5px;"><a href="peserta-detail.php?id=<?= $data['id'] ?>" class="text-decoration-none text-white">Status</a></button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>