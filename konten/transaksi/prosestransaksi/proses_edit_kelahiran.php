<?php 

require_once ('../../../koneksi/koneksi.php');

    $idkelahiran = $_POST['idkelahiran'];
    $nama_balita = $koneksi->real_escape_string($_POST['nama_balita']);
    $tempat_lahir = $koneksi->real_escape_string($_POST['tempat_lahir']);
    $hari_lahir = $koneksi->real_escape_string($_POST['hari_lahir']);
    $tanggal_lahir = $koneksi->real_escape_string($_POST['tgl_l']);
    $jenis_kelamin = $koneksi->real_escape_string($_POST['jenis_kelamin']);
    $nama_ayah = $koneksi->real_escape_string($_POST['nama_ayah']);
    $nama_ibu = $koneksi->real_escape_string($_POST['nama_ibu']);
	

	$koneksi->query("UPDATE tabel_kelahiran SET nama_balita = '$nama_balita', tempat_lahir = '$tempat_lahir', hari_lahir = '$hari_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', 
    nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu' WHERE id_kelahiran =".$idkelahiran);
	echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listkelahiran';</script>";
	
	
                    
    ?>