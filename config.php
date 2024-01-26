<?php 
$koneksi = mysqli_connect("localhost","root","","galaksi");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


if(!function_exists('redirect_to')){
	function redirect_to($url = '')
	{
		header('Location: ' . $url);
		exit();
	}
}

if(!function_exists('cek_login')){
function cek_login($role = array())
	{

		if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && in_array($_SESSION['role'], $role)) {
			// do nothing
		} else {
			redirect_to("login.php");
		}
	}
}

if(!function_exists('get_role')){
	function get_role()
	{

		if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
			return $_SESSION['role'];
		} else {
			return false;
		}
	}
}

?>
 