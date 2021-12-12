<?php
// menentukan variable untuk koneksi
$host   =   "localhost";
$user   =   "root";
$pass   =   "";
$db     =   "db_crud";

//melakukan koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

//cek koneksi database berhasil atau tidak 
if ($conn->connect_error) {
    die('koneksi gagal : '). $conn->connect_error;
}

?>