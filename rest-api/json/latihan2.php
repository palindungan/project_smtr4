<?php

// mengambil json dari file lain 
$data = file_get_contents('coba.json');

// menjadikan json menjadi objek / array
//objek
// $mahasiswa = json_decode($data);

//array
$mahasiswa = json_decode($data, true);

// tampilkan 
var_dump($mahasiswa);

// echo data yg spesifik
echo $mahasiswa[0]['pembimbing']['pembimbing1'];

// echo $mahasiswa;
