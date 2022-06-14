<?php
session_start();
require "functions.php";
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}

if(isset($_POST['submit'])){

	if(tambah($_POST)>0){
		echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>";

	}else{

		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Tambah data mahasiswa</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
	  <main>
      <h1>Tambah data mahasiswa</h1>
	    <form method="post" action="" enctype="multipart/form-data">
			<ul class="input-list">
				<li>
					<label for="nim">Nim</label>
					<input type="text" name="nim" id="nim">
				</li>
				<li>
					<label for="nama">Nama</label>
					<input type="text" name="nama" id="nama">
				</li>
				<li>
					<label for="email">Email</label>
					<input type="email" name="email" id="email">
				</li>
				<li>
					<label for="jurusan">Jurusan</label>
					<input type="text" name="jurusan" id="jurusan">
				</li>
				<li>
					<label for="gambar">Gambar</label>
					<div style="width:200px">
					<img src="img/nophoto.jpg" class="img-preview" width="100%">
					<input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()" width="100%">
					</div>
				</li>

				<li>
					<button type="submit" name="submit" class="green">Tambah Data!</button>
				</li>
			</ul>
      </form>
	  <main>
    <script src="js/script.js?v=1"></script>
  </body>
</html>
