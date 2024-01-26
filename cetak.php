<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$nama_dokumen='hasil-ekspor';
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak</title>

    <style type="text/css">
        table {
            border-collapse: collapse;
        }

        * {
            font-family: sans-serif;
        }

        #table tr th {
            padding: 8px;
            border: 1px solid green;
        }

        #table tr td {
            padding-left: 8px;
            border: 1px solid green;
        }

        /*@media print {
          @page { margin: 0; }
          body { margin: 1.6cm; }
        }*/

        body {

        }
    </style>
</head>
<body>

<?php 
    require_once('config.php');

    $id = (isset($_GET['id'])) ? trim($_GET['id']) : '';
?>

<table align="center">
    <tr>
        <td width="70px">
            <img src="assets/logo.png" width="50px" height="50px">
        </td>
        <td align="center">
            <div style="font-size: 25px;font-weight: bold;color: green;">GALAKSI-IV</div>
            <div>Kartu Peserta Lomba</div>
        </td>
    </tr>
</table>
<hr>

<?php 
$get = mysqli_query($koneksi,"SELECT A.*,B.nama as instansi FROM calon_peserta A INNER JOIN tpq B ON A.tpq_id=B.id WHERE A.id='$id'");
                while($d = mysqli_fetch_array($get)){
?>

<table id="table" border="1" width="75%" align="center">
    <tr>
        <th align="left">Nama</th>
        <th>:</th>
        <td><?= $d['nama'] ?></td>
    </tr>
    <tr>
        <th align="left">Tanggal Lahir</th>
        <th>:</th>
        <td><?= date('d-m-Y',strtotime($d['tgl_lahir'])) ?></td>
    </tr>
    <tr>
        <th align="left">Lomba</th>
        <th>:</th>
        <td><?= $d['lomba'] ?></td>
    </tr>
    <tr>
        <th align="left">Instansi</th>
        <th>:</th>
        <td><?= $d['instansi'] ?></td>
    </tr>
    <tr>
        <th align="left">Domisili</th>
        <th>:</th>
        <td><?= $d['domisili'] ?></td>
    </tr>
    <tr>
        <th align="left">Kategori</th>
        <th>:</th>
        <td><?= $d['kategori'] ?></td>
    </tr>
</table>
<?php } ?>

<div align="center" style="margin-top:50px;">
    Kartu ini digunakan untuk validasi di saat acara
</div>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>