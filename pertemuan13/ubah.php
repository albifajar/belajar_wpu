<?php 
session_start();
require "functions.php";
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}
$id = $_GET["id_ubah"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if( isset($_POST["ubah"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ubah Data Mahasiswa</title>
			<link rel="stylesheet" href="./style.css?v=1">
	</head>
	<body>
		<main>
		<h1>Ubah Data <small><?php echo $mhs["nama"]; ?></small></h1>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
			<input type="hidden" name="gambarlama" value="<?php echo $mhs["gambar"]; ?>">
			<ul class="input-list">
				<li>
					<label for="nim">NIM : </label>
					<input type="text" name="nim" id="nim" value="<?php echo $mhs["nim"]; ?>">
				</li>
				<li>
					<label for="nama">Nama : </label>
					<input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
				</li>
				<li>
					<label for="email">Email : </label>
					<input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
				</li>
				<li>
					<label for="jurusan">Jurusan : </label>
					<input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
				</li>
				<li>
					<label for="gambar">Ubah Gambar : </label><br>
					<div style="width:200px">
						<img width="100%" src="img/<?= $mhs["gambar"]; ?>" class="img-preview"/>
						<input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()">
					</div>
				</li>
				<li>
					<button type="submit" name="ubah" class="green">Ubah Data!</button>
				</li>
			</ul>
		</form>
	</main>
	<script src="js/script.js?v=1"></script>
	</body>
</html>