<?php

require "functions.php";


// jika tombol login ditekan
if( isset($_POST['login']) ) {

	// cek login
	// cek usernamenya dulu
	global $connection;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek_username = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		$row = mysqli_fetch_assoc($cek_username);
        var_dump(password_verify($password, $row['password']));
		// cek password
		if( password_verify($password, $row['password']) ) {
			$_SESSION['username'] = $_POST['username'];
			header('Location: index.php');
			exit;
		}
	}
	
	$error = true;

}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Login</title>
    <link rel="stylesheet" href="./style.css?v=1">
  </head>
  <body>
	  <main>
      <h1>Login</h1>
      <?if(isset($error)):?>
          <span style="color:maroon; font-weight:bold; font-style: italic">
            Username/password salah
          </span>
      <?php endif?>
	      <form method="post" action="">
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
					<button type="submit" name="login" class="green">Daftar!</button>
				</li>
			</ul>
      </form>
	  <main>
  </body>
</html>
