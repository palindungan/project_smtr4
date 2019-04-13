<?php
// $mahasiswa =
//     [
//         [
//             "nama" => "rizkika zakka palindungan",
//             "nim" => "E41170164",
//             "email" => "kikaku998@gmail.com"
//         ],
//         [
//             "nama" => "rizkika zakka palindungan2",
//             "nim" => "E411701642",
//             "email" => "kikaku998@gmail.com2"
//         ]
//     ];

// koneksi database
$dbh = new PDO('mysql:host=localhost;dbname=db_inventori', 'root', '');
$db = $dbh->prepare('SELECT * FROM tbl_barang');
$db->execute();;

//pengambil data menjadi bentuk array asscotiatif
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

// mengubah data menjadi jason
$data = json_encode($mahasiswa);

// tampil
echo $data;
