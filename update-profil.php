<?php
session_start();
require_once('config.php');
$errors = array();

if (@$_FILES["profil"]) :
    $id = $_SESSION['user_id'];
    $target_dir = "uploads/profil/";
    $target = $target_dir . rand(1,9999999) . rand(1,999) . basename($_FILES["profil"]["name"]);
    $allowedTypes = ['jpg', 'png' ,'jpeg' , 'jfif'];

    move_uploaded_file($_FILES["profil"]["tmp_name"], $target);

    $update = mysqli_query($koneksi, "UPDATE user SET profil='$target' WHERE id = '$id' ");
    
    if ($update) {
        redirect_to('profil.php');
    } else {
        $errors[] = 'Terjadi Kesalahan';
    }

endif;
?>