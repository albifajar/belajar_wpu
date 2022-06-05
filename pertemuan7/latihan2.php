<html>
    <head>
        <title>Detail Mahasiswa</title>
    </head>
    <body>
        <ul>
            <li><img height="100px" src="assets/<?= $_GET['gambar']?>" alt="">
            <li><?= $_GET['nama']?></li>
            <li><?= $_GET['nim']?></li>
            <li><?= $_GET['email']?></li>
            <li><?= $_GET['jurusan']?></li>
        </ul>
    </body>
</html>