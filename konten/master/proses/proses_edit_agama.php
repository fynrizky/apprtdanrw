<?php
require_once('../../../koneksi/koneksi.php');

$idagama = $_POST['idagama'];
$agama = $koneksi->real_escape_string($_POST['agama']);


$koneksi->query("UPDATE tabel_agama SET agama = '$agama' WHERE id_agama = '$idagama'");
echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listagama';</script>";
 
 
 ?>