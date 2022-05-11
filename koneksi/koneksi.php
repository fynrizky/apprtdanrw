<?php 
$host = "localhost";
$root = "root";
$pass = "";
$db = "dbadm";

$koneksi = new mysqli("$host","$root","$pass","$db");
if ($koneksi->connect_errno) {
    echo "<script>alert('Koneksi Gagal');</script>". $koneksi->connect_error;
}

?>