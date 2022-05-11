<?php
require_once ('../../../koneksi/koneksi.php');

    $id_kk = $_POST['kkid'];
    $nokk = $koneksi->real_escape_string($_POST['nokk']);
    $nm_kk = $koneksi->real_escape_string($_POST['nm_kk']);
    $rtrw = $koneksi->real_escape_string($_POST['rtrw']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jenis_k = $koneksi->real_escape_string($_POST['jenis_k']);
    $tempat_l = $koneksi->real_escape_string($_POST['tempat_l']);
    $tgl_l = $koneksi->real_escape_string($_POST['tgl_l']);
    $agama = $koneksi->real_escape_string($_POST['agama']);
    $pekerjaan = $koneksi->real_escape_string($_POST['pekerjaan']);
    
    $koneksi->query("UPDATE tabel_kk SET id_rtrw = '$rtrw', no_kk = '$nokk', nama_kk = '$nm_kk', alamat = '$alamat', jenis_kelamin = '$jenis_k', tempat_lahir = '$tempat_l', tgl_lahir = '$tgl_l', agama = '$agama', pekerjaan = '$pekerjaan' WHERE id_kk = '$id_kk'"); 
    echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listkk';</script>";



?>