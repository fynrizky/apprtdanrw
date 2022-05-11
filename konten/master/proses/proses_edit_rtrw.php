<?php
require_once ('../../../koneksi/koneksi.php');

    $id_rtrw = $_POST['idrtrw'];
    $rt = $koneksi->real_escape_string($_POST['rt']);
    $rw = $koneksi->real_escape_string($_POST['rw']);
    $kelurahan = $koneksi->real_escape_string($_POST['kelurahan']);
    $kecamatan = $koneksi->real_escape_string($_POST['kecamatan']);
    
    $koneksi->query("UPDATE tabel_rtrw SET rt = '$rt', rw = '$rw', kelurahan = '$kelurahan', kecamatan = '$kecamatan' WHERE id_rtrw = '$id_rtrw'"); 
    echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listrtrw';</script>";



?>