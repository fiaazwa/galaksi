<?php 
require_once('config.php');

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if ($_POST) {
    $data = $_POST;

    $target_dir = "uploads/";
    $target_file_poto = $target_dir . rand(1,9999999) . rand(1,999) . basename(@$_FILES["pas_poto"]["name"]);
    $target_file_kk = $target_dir . rand(1,9999999) . rand(1,999) . basename(@$_FILES["kk"]["name"]);
    $target_file_akte = $target_dir . rand(1,9999999) . rand(1,999) . basename(@$_FILES["akte"]["name"]);
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png' ,'jpeg' , 'jfif'];

    $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET nama='$data[nama]',tgl_lahir='$data[tgl_lahir]',lomba='$data[lomba]',kategori='$data[kategori]',domisili='$data[domisili]' WHERE id = '$id' ");

    if ($_FILES["pas_poto"]["name"]) {
        move_uploaded_file($_FILES["pas_poto"]["tmp_name"], $target_file_poto);
        $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET pas_foto='$target_file_poto' WHERE id = '$id' ");
    }
    if ($_FILES["kk"]["name"]) {
        move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file_kk);
        $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET kk='$target_file_kk' WHERE id = '$id' ");
    }
    if ($_FILES["akte"]["name"]) {
        move_uploaded_file($_FILES["akte"]["tmp_name"], $target_file_akte);
        $simpan = mysqli_query($koneksi,"UPDATE calon_peserta SET akte='$target_file_akte' WHERE id = '$id' ");
    }

    
    if($simpan) {
        redirect_to('list-peserta.php');
    }else{
        $errors[] = 'Data gagal disimpan';
    }
}
?>