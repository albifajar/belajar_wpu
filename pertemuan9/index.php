<?php
require "functions.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Halaman Admin</title>
  </head>
  <body>
      <h1>Daftar Mahasiswa FTI UNSAP</h1>
      <a href="tambah.php" style="display: inline-block; margin-bottom: 20px">Tambah</a>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php foreach ($mahasiswa as $i=>$mhs):?>
            <tr>
                <td><?=$i+=1?></td>
                <td><a href="#">Ubah</a> | <a href="hapus.php?id_hapus=<?= $mhs['id']?>">Hapus</a></td>
                <td><img width="100px" src="img/<?= $mhs['gambar']?>" alt=""></td>
                <td><?= $mhs['nama']?></td>
                <td><?= $mhs['nim']?></td>
                <td><?= $mhs['email']?></td>
                <td><?= $mhs['jurusan']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
  </body>
</html>
