<?php 

require_once ('../../../koneksi/koneksi.php');

    $idwarga = $_POST['wrgid'];
	$nik = $koneksi->real_escape_string($_POST['nik']);
	$rtrw = $koneksi->real_escape_string($_POST['rtrw']);
	$nama = $koneksi->real_escape_string($_POST['nama']);
	$tmp_lahir = $koneksi->real_escape_string($_POST['tmp_lahir']);
	$tgl_lhr = $koneksi->real_escape_string($_POST['tgl_lhr']);
	$jns_kelamin = $koneksi->real_escape_string($_POST['jns_kelamin']);
	$almt = $koneksi->real_escape_string($_POST['almt']);
	$agm = $koneksi->real_escape_string($_POST['agm']);
	$sttsnikah = $koneksi->real_escape_string($_POST['sttsnikah']);
	$pkrjaan = $koneksi->real_escape_string($_POST['pkrjaan']);
	$warganegara = $koneksi->real_escape_string($_POST['warganegara']);

	$koneksi->query("UPDATE tabel_warga SET id_rtrw = '$rtrw', nik = '$nik', nama = '$nama', tmp_lahir = '$tmp_lahir', tgl_lhr = '$tgl_lhr', jns_kelamin = '$jns_kelamin', almt = '$almt', agm = '$agm', status_perkawinan = '$sttsnikah', pkrjaan ='$pkrjaan', warganegara = '$warganegara' WHERE id_warga = '$idwarga'");
    echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listwarga';</script>";
					
                    
    ?>