<?php 
session_start();
include "../../koneksi/koneksi.php";




if (!isset($_SESSION['adm'])) 
{
	echo "<script>alert('Kamu Harus Login..!');</script>";  
	echo "<script>location='../../login/login.php';</script>";
	exit();
		  //header('location:login/login.php');
}


?>

<style>

@media print{    
    input.noPrint{
        display: none;
    }
}


</style>


<br>
<input type="button" value="Cetak" class="noPrint" onclick="window.print()">
<table border="1" width="100%" style="border-collapse: collapse;">
<caption style="font-size: 30px; font-weight: bold; margin-bottom: 5px;">Laporan Surat Pengantar</caption>
<caption style="font-size: 14px; font-style: italic; margin-bottom: 20px;">Sekertariat Rukun Warga 010 Penjaringan</caption>
<caption style="margin-bottom: 5px; border-bottom: 5px solid black;"></caption>
<caption style="margin-bottom: 20px; border-bottom: 2px solid black;"></caption>
        <thead>
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>
              <center>NIK</center>
            </th>
            <th>
              <center>Nama</center>
            </th>
            <th>
              <center>Tempat Lahir</center>
            </th>
            <th>
              <center>Tanggal Lahir</center>
            </th>
            <th>
              <center>Jenis Kelamin</center>
            </th>
            <th>
              <center>Alamat</center>
            </th>
            <th>
              <center>RT</center>
            </th>
            <th>
              <center>RW</center>
            </th>
            <th>
              <center>Kelurahan</center>
            </th>
            <th>
              <center>Kecamatan</center>
            </th>
            <th>
              <center>Agama</center>
            </th>
            <th>
              <center>Status Kawin</center>
            </th>
            <th>
              <center>Pekerjaan</center>
            </th>
            <th>
              <center>Kewarganegaraan</center>
            </th>
            <th>
              <center>Keperluan</center>
            </th>
          </tr>       
        </thead>
        <tbody>


          <?php 
        //   $totalnya = 0;
          ?>
          <?php 
          $no = 1;

          $tampil = $koneksi->query("SELECT * FROM tabel_sp
          INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw
          INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga
          INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan");
          
          while ($data = $tampil->fetch_object()) {
            
            ?>
            <tr>
              <td align="center"><?= $no++."."; ?></td>
              <td align=""><?php echo "'".$data->nik."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->nama)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->tmp_lahir)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->tgl_lhr)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->jns_kelamin)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->almt)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->rt)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->rw)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->kelurahan)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->kecamatan)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->agm)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->status_perkawinan)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->pkrjaan)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->warganegara)."'"; ?></td>
              <td align=""><?php echo "'".ucwords($data->keperluan)."'"; ?></td>
              
            
        </tr>
                <?php /* $totalnya+=$data->total_pembelian; */ ?>
                <?php } ?>
              </tbody>
              
            </table>