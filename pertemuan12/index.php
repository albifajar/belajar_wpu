<?php
session_start();
require "functions.php";
$login = [];
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}else{
  $login = $_SESSION['login'];
  
  $show_alert = $_SESSION['login']['show_alert'];

  $_SESSION['login']['show_alert'] = false;
  
}

$jumlah_data_perhalaman = 3;
$jumlah_data            = query("SELECT COUNT(*) as count FROM mahasiswa")[0]['count'];
$jumlah_halaman         = ceil($jumlah_data/$jumlah_data_perhalaman);
$halaman_aktif          = intval(isset($_GET["halaman"])? $_GET["halaman"] : 1);
$awal_data              = ($jumlah_data_perhalaman * $halaman_aktif) - $jumlah_data_perhalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awal_data, $jumlah_data_perhalaman");

$keyword = "";
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    
    $query = "SELECT * FROM mahasiswa WHERE 
      nim LIKE '%$keyword%' OR 
      nama LIKE '%$keyword%' OR 
      email LIKE '%$keyword%' OR 
      jurusan LIKE '%$keyword%'";
    
    $mahasiswa = query($query);
}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <?php if($show_alert):?>
      <script type="text/javascript"> 
        alert("Selamat datang <?= $login['username']; ?>!");</script>
      <?php endif;?>

    <title>Halaman Admin</title>
    <link rel="stylesheet" href="./style.css?v=12.12">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/script.js?v=1"></script>
  </head>
  <body>
    <main>
      <div class="d-flex" style="align-items: center; justify-content: space-between;">
        <h1>Daftar Mahasiswa FTI UNSAP</h1>
        <a href="logout.php">Logout</a>
      </div>
      <div class="d-flex justify-content-between" style="margin-bottom: 20px">
        <a href="tambah.php" style="display: inline-block;">Tambah</a>
        
        <form method="get" action="" class="d-flex" style="gap:.5rem;">
          <div style="position: relative;">
            <input type="text" name="keyword" value="<?=$keyword?>" id="keyword" placeholder="Pencarian...">
            
            <a href="?" class="reset-btn" id="pencarian-reset">Reset</a>
            
          </div>
          <div><button class="btn green" type="submit" style="display: inline-block" id="tombol-cari">Cari</button></div>
        </form>

      </div>
      <ul class="nav nav-tabs" id="mynav">
        <?php if($halaman_aktif > 1):?>
        <li>
          <a href="?halaman=<?=$halaman_aktif - 1?>"><</a>
        </li>
        <?php else:?>
        <li class="prev-disabled">
          <a href="#"><</a>
        </li>
        <?php endif?>

        <?php for($i = 1; $i <= $jumlah_halaman; $i++):?>
          <li class="<?=($i == $halaman_aktif)? 'active': '';?>">
            <a href="?halaman=<?=$i?>"><?=$i?></a>
          </li>
        <?php endfor;?>

        <?php if($halaman_aktif < $jumlah_halaman):?>
        <li>
          <a href="?halaman=<?=$halaman_aktif + 1?>?>">></a>
        </li>
        <?php else:?>
        <li class="prev-disabled">
          <a href="#">></a>
        </li>
        <?php endif?>
      </ul>
      <div id="container">
        <table class="table-style" cellspacing="0" cellpadding="10" style="width: 100%;">
            <tr>
                <th class="text-center">No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($mahasiswa)):?>
              <?php foreach ($mahasiswa as $i=>$mhs):?>
              <tr>
                  <td class="text-center"><?=$i+=1?></td>
                  <td><img width="100px" src="img/<?= $mhs['gambar']?>" alt=""></td>
                  <td><?= $mhs['nama']?></td>
                  <td><?= $mhs['nim']?></td>
                  <td><?= $mhs['email']?></td>
                  <td><?= $mhs['jurusan']?></td>
                  <td>
                    <a href="ubah.php?id_ubah=<?= $mhs['id']?>">Ubah</a> | 
                    <a href="hapus.php?id_hapus=<?= $mhs['id']?>">Hapus</a>
                  </td>
              </tr>
              <?php endforeach; ?>
            <?php elseif(empty($mahasiswa) && isset($_GET['keyword'])):?>
              <tr>
                <td colspan="7" class="text-center py-3"> 
                  Pencarian denga keyowrd <strong>"<?= $keyword?>"</strong> tidak ditemukan
                </td>
              </tr>
            <?php elseif(empty($mahasiswa) && !isset($_GET['keyword'])):?>
              <tr>
                <td colspan="7" class="text-center py-3">
                  Data mahasiswa masih kosong !<br> klik <a href="tambah.php" style="display: inline-block;">Tambah</a> untuk membuat data baru
                </td>
              </tr>
            <?php endif?>
        </table>
      <div>
    </main>
  </body>
</html>
