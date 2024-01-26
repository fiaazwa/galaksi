<?php 
include('header.php');
include('config.php');

if (@$_SESSION['role']) {
  $id = $_SESSION['user_id'];
  $query = mysqli_query($koneksi,"SELECT * FROM user where id=$id");     
  while($data = mysqli_fetch_array($query)){
    // $data['nama'] == "" || 
    if ($data['email'] == "" || $data['phone'] == "" || $data['jenis_kelamin'] == "" || $data['instansi'] == "" || $data['domisili'] == "") {
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
        <h3 class="mb-3">Data TPQ</h3>

        <div class="p-5 text-start">

            <a href="tambahdatatpq.php" class="btn btn-primary border " style="border-radius: 5px; padding-top: 3px; padding-left: 5px; width: 163px; padding-bottom: 1px;;"><span><img src="/ic-add.png" alt="" class="px-1"></span>Tambah Data</a>

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
                $query = mysqli_query($koneksi,"SELECT * FROM tpq");     
                while($data = mysqli_fetch_array($query)):
                $no++;
                ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $data['nama'] ?></td>
                  <td>
                    <button class="bg-primary border-0" style="padding: 2px 16px;"> <a href="editdatatpq.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Edit</a></button>
                    <button class="bg-danger border-0 mt-1" style="padding: 3px 5px;"><a href="hapustpq.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-white">Hapus</a></button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

        </div>
    </div>
</div>