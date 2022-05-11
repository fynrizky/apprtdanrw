<?php
require_once ('../../../koneksi/koneksi.php');

    $idkeperluan = $_POST['idkeperluan'];
    $keperluan = $koneksi->real_escape_string($_POST['keperluan']);
   
    
    $koneksi->query("UPDATE tabel_keperluan SET keperluan = '$keperluan' WHERE id_keperluan = '$idkeperluan'"); 
    echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listkeperluan';</script>";



?>