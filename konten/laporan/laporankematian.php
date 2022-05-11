<?php 
session_start();
include "../../koneksi/koneksi.php";




if (!isset($_SESSION['adm'])) {
    echo "<script>alert('Kamu Harus Login..!');</script>";
    echo "<script>location='../../login/login.php';</script>";
    exit();
    //header('location:login/login.php');
}


?>

<style>
    @media print {
        input.noPrint {
            display: none;
        }
    }
</style>


<br>
<input type="button" value="Cetak" class="noPrint" onclick="window.print()">
<table border="1" width="100%" style="border-collapse: collapse;">
    <caption style="font-size: 30px; font-weight: bold; margin-bottom: 5px;">Laporan Data Kematian</caption>
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
                <center>Tempat/Tgl Lahir</center>
            </th>
            <th>
                <center>Jenis Kelamin</center>
            </th>
            <th>
                <center>Alamat</center>
            </th>
            <th>
                <center>RT/RW</center>
            </th>
            <th>
                <center>Agama</center>
            </th>
            <th>
                <center>Sebab Kematian</center>
            </th>
        </tr>
    </thead>
    <tbody>

        <?php 
        // $totalnya = 0;
        ?>
        <?php 
        $no = 1;

        $tampil = $koneksi->query("SELECT * FROM tabel_kematian 
        INNER JOIN tabel_kk ON tabel_kematian.id_kk = tabel_kk.id_kk
        INNER JOIN tabel_warga ON tabel_kematian.id_warga = tabel_warga.id_warga
        INNER JOIN tabel_rtrw ON tabel_kematian.id_rtrw = tabel_rtrw.id_rtrw
        ORDER BY tabel_kematian.id_kematian");

        while ($data = $tampil->fetch_object()) {

            ?>
        <tr>

            <td align="center"><?= $no++ . "."; ?></td>
            <td align=""><?php echo "'".($data->nik)."'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->nama) . "'"; ?></td>
            <td align=""><?php echo "'" .ucwords($data->tmp_lahir)."/".date('d-m-Y', strtotime($data->tgl_lhr))."'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->jns_kelamin) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->almt) . "'"; ?></td>
            <td align=""><?php echo "'".strtoupper($data->rt)."/".strtoupper($data->rw)."'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->agm) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->sebab_kematian) . "'"; ?></td>

        </tr>
        <?php  /* $totalnya+=$data->total_pembelian; */ ?>
        <?php 
    } ?>
    </tbody>
</table> 