<?php
session_start();
$errors = array();
include('config.php');
if ($_POST) :

    $user_id = $_SESSION['user_id'];
  $query = mysqli_query($koneksi,"SELECT * FROM user where id=$user_id");     
  while($data = mysqli_fetch_array($query)){
    $tpq = $data['tpq_id'];
  }
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$tgl_lahir = isset($_POST['tgl_lahir']) ? trim($_POST['tgl_lahir']) : '';
$lomba = isset($_POST['lomba']) ? trim($_POST['lomba']) : '';
$kategori = isset($_POST['kategori']) ? trim($_POST['kategori']) : '';
$domisili = isset($_POST['domisili']) ? trim($_POST['domisili']) : '';
// $pas_foto = $_FILES['pas_poto'];
// $kk = $_FILES['kk'];
// $akte = $_FILES['akte'];
$btn = $_POST['action'];


    // Validasi
    if (!$nama) {
        $errors[] = 'Nama tidak boleh kosong';
    }
    if (!$tgl_lahir) {
        $errors[] = 'Tgl Lahir tidak boleh kosong';
    }

    $target_dir = "uploads/";
    $target_file_poto = $target_dir . rand(1,9999999) . rand(1,999) . basename($_FILES["pas_poto"]["name"]);
    $target_file_kk = $target_dir . rand(1,9999999) . rand(1,999) . basename($_FILES["kk"]["name"]);
    $target_file_akte = $target_dir . rand(1,9999999) . rand(1,999) . basename($_FILES["akte"]["name"]);
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png' ,'jpeg' , 'jfif'];

    move_uploaded_file($_FILES["pas_poto"]["tmp_name"], $target_file_poto);
    move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file_kk);
    move_uploaded_file($_FILES["akte"]["tmp_name"], $target_file_akte);

    if (empty($errors)) :
        $insert = mysqli_query($koneksi, "INSERT INTO calon_peserta VALUES(NULL,'$user_id','$tpq','$nama','$tgl_lahir','$lomba','$kategori','$domisili','$target_file_poto','$target_file_akte','$target_file_kk',0)");
        
        if ($insert) {
            if ($btn == "tambah") {
                header('Refresh: 1; url=formulir.php');   
                exit();
            } else {
                redirect_to("pembayaran.php");
            }
            
        } else {
            $errors[] = 'Terjadi Kesalahan';
        }
    endif;

endif;
?>