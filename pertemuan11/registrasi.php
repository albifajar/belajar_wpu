<?php

require "functions.php";
if( isset($_POST["register"]) ) {
	if( register($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan, silahkan login!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($connection);
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Registrasi</title>
    <link rel="stylesheet" href="./style.css?v=1">
  </head>
  <body>
	  <main>
      <h1>Registrasi</h1>
	      <form method="post" action="" enctype="multipart/form-data">
			<ul class="input-list">
				<li>
					<label for="username">Username</label>
					<input type="text" name="username" id="username">
				</li>
				<li>
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</li>
				<li>
					<label for="confpass">Konfirmasi Password</label>
					<input type="password" name="confpass" id="confpass">
				</li>
				<li>
					<button type="submit" name="register" class="green">Daftar!</button>
				</li>
			</ul>
      </form>
	  <main>
  </body>
</html>
