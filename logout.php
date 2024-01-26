<?php 
include 'config.php';
session_start();
session_destroy();

redirect_to('index.php');
?>