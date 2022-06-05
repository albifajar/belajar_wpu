<?php
$mahasiswa = [
    [
        "nama" => "Albi Fajar Ramadhan",
        "nim"   => "A2.2000003",
        "email" => "A2.2000003@mhs.stmik-sumedang.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "pas_foto_albi.png"
    ],
    [
        "nama" => "Bagas Sudam Darmana",
        "nim"   => "A2.2000117",
        "email" => "A2.2000117@mhs.stmik-sumedang.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "pas_foto_bagas.png"
    ],
    [
        "nama" => "Winata Pranata",
        "nim"   => "A2.2000113",
        "email" => "A2.2000113@mhs.stmik-sumedang.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "pas_foto_winata.png"
    ],
    [
        "nama" => "Winaya Zarkasih",
        "nim"   => "A2.2000114",
        "email" => "A2.2000114@mhs.stmik-sumedang.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "pas_foto_winaya.png"
    ]
]
?>

<html>
    <head>
        <title>GET</title>
    </head>
    <body>
        <h1> Daftar Mahasiswa </h1>
        <ul?>
        <?php foreach ($mahasiswa as $mhs):?>
        <li>
            <a href="latihan2.php?nim=<?php echo $mhs['nim']?>
            &nama=<?php echo $mhs['nama']?>
            &email=<?php echo $mhs['email']?>
            &jurusan=<?php echo $mhs['jurusan']?>
            &gambar=<?php echo $mhs['gambar']?>"><?php echo $mhs['nama']?></a>
        </li>
            <?php endforeach;?>
        </ul>
    </body>
</html>