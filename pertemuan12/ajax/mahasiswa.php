<?php 
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
            WHERE
          nama LIKE '%$keyword%' OR
          nim LIKE '%$keyword%' OR
          email LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%'
        ";
$mahasiswa = query($query);
?>

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