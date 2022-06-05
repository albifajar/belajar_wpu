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
    $gambar = htmlspecialchars($data['gambar']);
    
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
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";

	mysqli_query($connection, $query);

	return mysqli_affected_rows($connection);
}


function hapus($id){
    global $connection;

    mysqli_query($connection, "DELETE FROM `mahasiswa` WHERE id = '$id'");    
    
    return mysqli_affected_rows($connection);
}