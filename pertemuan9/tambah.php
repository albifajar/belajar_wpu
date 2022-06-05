<?php

require "functions.php";

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
  </head>
  <body>
      <h1>Tambah data mahasiswa</h1>
      
      <form method="post" action="">
				<ul>
					<li>
						<label for="nim">Nim : </label>
						<input type="text" name="nim" id="nim">
					</li>
					<li>
						<label for="nama">Nama : </label>
						<input type="text" name="nama" id="nama">
					</li>
					<li>
						<label for="email">Email : </label>
						<input type="email" name="email" id="email">
					</li>
					<li>
						<label for="jurusan">Jurusan : </label>
						<input type="text" name="jurusan" id="jurusan">
					</li>
					<li>
						<label for="gambar">Gambar : </label>
						<input type="text" name="gambar" id="gambar">
					</li>
					<li>
						<button type="submit" name="submit">Tambah Data!</button>
					</li>
				</ul>
      </form>
  </body>
</html>
