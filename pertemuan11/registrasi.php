<?php

require "functions.php";
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="./style.css">
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
						<label for="konfpass">Konfirmasi Password</label>
						<input type="password" name="konfpass" id="konfpass">
					</li>
					<li>
						<button type="submit" name="submit" class="green">Daftar!</button>
					</li>
				</ul>
      </form>
	  <main>
  </body>
</html>
