<?php 
require 'functions.php';

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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
	<main>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		<ul class="input-list">
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" value="<?php echo $mhs["nim"]; ?>">
			</li>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">email : </label>
				<input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">gambar : </label>
				<input type="text" name="gambar" id="gambar" value="<?php echo $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="ubah" class="green">Ubah Data!</button>
			</li>
		</ul>
	</form>
</main>
</body>
</html>