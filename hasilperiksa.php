<?php include('header.php') ?>

<section style="background-image: url(/Group\ 40.png); height: auto; ">
  <form>
  <div class="container mt-5  text-white" style="padding-top:35px;">
    <div>
    <table class="table table-bordered border-white text-white" style="background-color: #0B0334;">
      <h5 class="text-center text-white pt-1"  style="height: 35px; background-color: #D78D1E;">Biodata User</h5>
      <tbody>
        <tr>
          <td>Nama</td>
          <td><?= $_POST['nama'] ?></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td><?= $_POST['umur'] ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><?= $_POST['jenis_kelamin'] ?></td>
        </tr>
        <tr>
          <td>No Kartu Keluarga</td>
          <td><?= $_POST['no_kk'] ?></td>
        </tr>
        <tr>
          <td>No Handphone</td>
          <td><?= $_POST['no_hp'] ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?= $_POST['alamat'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php 
  include 'config.php';
  $kodeGejala = ltrim($_POST['kode_gejala']);
  $kodeGejala = str_replace(" ",",",$kodeGejala);
  $arr = explode(",",$kodeGejala);
  $totalGejala = count($arr);
  foreach ($arr as $key => $item) {
    $arr[$key] = "'".$item."'";
  }
  $kodeGejala = implode(",",$arr);


  ?>

    <table class="table table-bordered border-white text-white" style="background-color: #0B0334;">
      <h5 class="text-left text-white pt-1 text-center"  style="height: 35px; background-color: #D78D1E;">Gejala Yang Dipilih</h5>
      <tbody>
        <?php
        $no=0;
        $query = mysqli_query($koneksi,"SELECT * FROM gejala WHERE kode IN ($kodeGejala)");     
        while($data = mysqli_fetch_array($query)):
        $no++;
        ?>
        <tr>
          <td><?= $no.'. ' . $data['nama'] ?></td>
        </tr>
        <?php endwhile; ?>
        
      </tbody>
    </table>


    <?php

      $query2 = mysqli_query($koneksi,"SELECT A.*,B.jenis,B.penanganan FROM rule A INNER JOIN penyakit B ON A.kode_penyakit=B.kode");

      $kodeGejala = ltrim($_POST['kode_gejala']);
      $kodeGejala = explode(" ",$kodeGejala);

      $result = [];
      $i = 0;
      while($rule = mysqli_fetch_array($query2)){
        $arrRule = explode(" ",$rule['kode_gejala']);
        $compare = array_intersect($arrRule,$kodeGejala);

        if (count($compare) > 0) {
          $result[$i] = [
            'kode_penyakit' => $rule['kode_penyakit'],
            'penyakit' => $rule['jenis'],
            'penanganan' => $rule['penanganan'],
            'totalChoice' => count($kodeGejala),
            'totalRule' => count($arrRule),
            'totalSame' => count($compare),
            'persentase' => (count($kodeGejala) / count($arrRule)) * 100,
          ];
        }

        $i++;
      }

      // di urutkan berdasarkan yg terakhir
      $keys = array_column($result, 'persentase');
      array_multisort($keys, SORT_DESC, $result);
      $gjl = ltrim($_POST['kode_gejala']);
      $kd = $result[0]['kode_penyakit'];
      $persen = $result[0]['persentase'];
      if (count($result) > 0) {
        $simpan = mysqli_query($koneksi,"INSERT INTO riwayat VALUES ('', '$_POST[nama]', '$_POST[umur]', '$_POST[no_kk]', '$_POST[jenis_kelamin]', '$_POST[no_hp]', '$_POST[alamat]', '$gjl', '$kd', '$persen',DEFAULT)");
        if($simpan) {
            // redirect_to('datagejala.php');
        }else{
            $errors[] = 'Data gagal disimpan';
        }
      }
    ?>


        <div class="row">
          <div class="col-md-12">
            <h5 class="text-white text-center pt-1" style="height: 35px; background-color: #D78D1E;">Hasil Diagnosa</h5>
            <table class="table table-bordered border-white text-white" style="background-color: #0B0334;">
              <thead>
                <tr>
                  <th>Kode Penyakit</th>
                  <th>Nama Penyakit</th>
                  <th>Gejala Didapat</th>
                  <th>Proses Hitung</th>
                  <th>Penanganan</th>
                  <th>Persentase</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $result[0]['kode_penyakit'] ?></td>
                  <td><?= $result[0]['penyakit'] ?></td>
                  <td> <?= $totalGejala ?> Gejala dari User dari <?= $result[0]['totalRule'] ?> Gejala dalam rule</td>
                  <td><?= $totalGejala ?>/<?= $result[0]['totalRule'] ?> *100</td>
                  <td><?= $result[0]['penanganan'] ?></td>
                  <td><?= number_format($result[0]['persentase'],2) ?>%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>


<?php include('footer.php') ?>