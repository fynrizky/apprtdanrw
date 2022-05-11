<?php 

require_once ('../../../koneksi/koneksi.php');

    $idsp = $_POST['idsp'];
	$rtrw = $koneksi->real_escape_string($_POST['rtrw']);
	$nama = $koneksi->real_escape_string($_POST['nama']);
	$keperluannya = $koneksi->real_escape_string($_POST['keperluan']);
	$prosesnya = $koneksi->real_escape_string($_POST['proses']);
	

	$koneksi->query("UPDATE tabel_sp SET id_rtrw = '$rtrw', id_warga = '$nama', id_keperluan = '$keperluannya', proses = '$prosesnya' WHERE id_sp =".$idsp);
	echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=suratpengantar';</script>";
	
	
                    
    ?>