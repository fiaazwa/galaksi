
<?php
require_once('config.php');
$ada_error = false;
$result = '';

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if(!$id) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
		mysqli_query($koneksi,"DELETE FROM calon_peserta WHERE id = '$id';");
		redirect_to('peserta.php');
}
?>

<?php
$page = "TPQ";
require_once('header.php');
?>
	<?php if($ada_error): ?>
		<?php echo '<div class="alert alert-danger">'.$ada_error.'</div>'; ?>	
	<?php endif; ?>
<?php
require_once('footer.php');
?>