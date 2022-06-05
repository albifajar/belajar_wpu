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
    $gambar = htmlspecialchars($data["gambarlama"]);

    if($_FILES["gambar"]["error"] !== 4){
        $gambar = upload();
    }
    
	$query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";

	mysqli_query($connection, $query);

	return mysqli_affected_rows($connection);
}


function hapus($id){
    global $connection;

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
		echo "<script>
				alert('harap pilih gambar terlebih dahulu!');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
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

    //generate nama file baru
    $new_name = uniqid();
    $new_name .= '.';
    $new_name .= $ektension;

    move_uploaded_file($tmp_name, 'img/'.$new_name);

    return $new_name;
}