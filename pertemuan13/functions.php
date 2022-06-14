<?php
$connection = mysqli_connect('localhost','root','','phpdasar');

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $connection;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = upload();

    $query = "INSERT INTO `mahasiswa`(`nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES ('$nama', '$nim', '$email', '$jurusan', '$gambar')";
    
    $result = mysqli_query($connection, $query);
        
    return mysqli_affected_rows($connection);
}

function ubah($data) {
	global $connection;

	$id = $data["id"];
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = empty($data["gambarlama"])?'nophoto.jpg':htmlspecialchars($data["gambarlama"]);

    if($_FILES["gambar"]["error"] !== 4){
        $gambar = upload();
    }

	$query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";

	mysqli_query($connection, $query);

	return mysqli_affected_rows($connection);
}


function hapus($id){
    global $connection;
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if($mhs['gambar'] !== 'nophoto.jpg'){
        unlink("img/".$mhs['gambar']);
    }
    
    mysqli_query($connection, "DELETE FROM `mahasiswa` WHERE id = '$id'");    
    
    return mysqli_affected_rows($connection);
}


function upload(){
	// ambil data gambar
	$name = $_FILES["gambar"]["name"];
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	$size = $_FILES["gambar"]["size"];
	$type = $_FILES["gambar"]["type"];
	$error = $_FILES["gambar"]["error"]; 

    // jika user tidak pilih gambar
	if( $error == 4 ) {
		return 'nophoto.jpg';
	}

    //cek format yang didukung
    $ekstenstionValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ektension = explode('.', $name);
    $ektension = strtolower(end($ektension));

    if(!in_array($ektension, $ekstenstionValid)){
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;        
    }

    //cek jika ukuran nya besar
    if($size>1000000){
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;        
    }
    // //Cek tipe file
    // if($type != 'image/jpeg' || $type != 'image/png' || $type != 'image/jpg'){
    //     echo "<script>
    //         alert('yang anda upload bukan gambar!');
    //     </script>";
    //    return false;    
    // }
    //generate nama file baru
    $new_name = uniqid();
    $new_name .= '.';
    $new_name .= $ektension;

    move_uploaded_file($tmp_name, 'img/'.$new_name);

    return $new_name;
}

function register($data){
    global $connection;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($connection, $data['password']);
    $confpass = mysqli_real_escape_string($connection, $data['confpass']);


    $result = mysqli_query($connection,
        "SELECT username FROM user WHERE username = '$username'"
    );
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang anda masukan tidak tersedia, silahkan menggunakan username lain');
            </script>";
        return false; 
    }

    if($password !== $confpass){
        echo "<script>
                alert('konfirmasi yang anda masukan salah!');
            </script>";
        return false;    
    }

    $password =  password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connection, 
        "INSERT INTO `user`(`username`, `password`) VALUES ('$username', '$password')"
    );

    return mysqli_affected_rows($connection);
}