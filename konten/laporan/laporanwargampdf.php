<?php
session_start();
require_once("../../vendor/autoload.php");
include "../../koneksi/koneksi.php";




if (!isset($_SESSION['adm'])) 
{
    echo "<script>alert('Kamu Harus Login..!');</script>";  
	echo "<script>location='../../login/login.php';</script>";
	exit();
    //header('location:login/login.php');
}



$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


 $html = '<img src="../../assets/css/img_sp/jayaraya.png" height="100px" style="margin-top: -50px;">
 <h2 style="text-align: center; font-size: 30px; font-weight: bold; margin-bottom: 0px; margin-top: -75px;">Laporan Data Warga</h2>
 <caption style="font-size: 12px; font-style: italic; margin-bottom: 20px;">Sekertariat Rukun Warga 010 Penjaringan</caption>
 <caption style="margin-bottom: 5px; border-bottom: 5px solid black;"></caption>
 <caption style="margin-bottom: 5px; border-bottom: 2px solid black;"></caption>';

$html .= '<style>
.table {margin-top: -80px;}
            .table td{padding: 10px 4px;}
        </style>';

$html .= '
        <br>
<br>
<br>
<br>
<br>
<table class="table" border="1" width="100%" style="border-collapse: collapse;">
<thead>
<tr>

            <th>
            <center>NIK</center>
            </th>
            <th>
            <center>No. KK</center>
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
              
              </tr>
              </thead>
              <tbody>';
              
              $totalnya = 0;
              
          $no = 1;
          
          $tampil = $koneksi->query("SELECT * FROM tabel_warga 
          INNER JOIN tabel_kk ON tabel_warga.id_kk = tabel_kk.id_kk
          INNER JOIN tabel_rtrw ON tabel_warga.id_rtrw = tabel_rtrw.id_rtrw");
          
          while ($data = $tampil->fetch_object()) {
              
        
            $html .= '<tr>
              
              <td align="">'.$data->nik.'</td>
              <td align="">'.$data->no_kk.'</td>
              <td align="">'.ucfirst($data->nama).'</td>
              <td align="">'.ucfirst($data->tmp_lahir).'</td>
              <td align="">'.ucfirst($data->tgl_lhr).'</td>
              <td align="">'.ucfirst($data->jns_kelamin).'</td>
              <td align="">'.ucfirst($data->almt).'</td>
              <td align="">'.ucfirst($data->rt).'</td>
              <td align="">'.ucfirst($data->rw).'</td>
              <td align="">'.ucfirst($data->kelurahan).'</td>
              <td align="">'.ucfirst($data->kecamatan).'</td>
              <td align="">'.ucfirst($data->agm).'</td>
              
              </tr>';
              
             } 
             
           $html .=   '</tbody>
           </table>';
           
           
          
           $mpdf->SetHTMLFooter('
<table width="100%">
<tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">My document</td>
    </tr>
</table>');
//   $mpdf->SetHTMLHeader();
           $mpdf->WriteHTML($html);
           $mpdf->Output("laporan-warga.pdf", \Mpdf\Output\Destination::INLINE);