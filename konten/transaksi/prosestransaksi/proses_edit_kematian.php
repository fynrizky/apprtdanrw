<?php 

require_once ('../../../koneksi/koneksi.php');

    $idkematian = $_POST['idkematian'];
    $id_kk = $koneksi->real_escape_string($_POST['id_kk']);
    $id_warga = $koneksi->real_escape_string($_POST['id_warga']);
    $id_rtrw = $koneksi->real_escape_string($_POST['id_rtrw']);
    $sebab_kematian = $koneksi->real_escape_string($_POST['sebab_kematian']);
	

	$koneksi->query("UPDATE tabel_kematian SET id_kk = '$id_kk', id_warga = '$id_warga', id_rtrw = '$id_rtrw', sebab_kematian = '$sebab_kematian' WHERE id_kematian =".$idkematian);
	echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=listkematian';</script>";
	
	
                    
    ?>