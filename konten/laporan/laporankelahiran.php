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
    <caption style="font-size: 30px; font-weight: bold; margin-bottom: 5px;">Laporan Data Kelahiran</caption>
    <caption style="font-size: 14px; font-style: italic; margin-bottom: 20px;">Sekertariat Rukun Warga 010 Penjaringan</caption>
    <caption style="margin-bottom: 5px; border-bottom: 5px solid black;"></caption>
    <caption style="margin-bottom: 20px; border-bottom: 2px solid black;"></caption>
    <thead>
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Balita</center>
            </th>
            <th>
                <center>Tempat Lahir</center>
            </th>
            <th>
                <center>Hari Lahir</center>
            </th>
            <th>
                <center>Tanggal Lahir</center>
            </th>
            <th>
                <center>Jenis Kelamin</center>
            </th>
            <th>
                <center>Nama Ibu</center>
            </th>
            <th>
                <center>Nama Ayah</center>
            </th>
        </tr>
    </thead>
    <tbody>

        <?php 
        // $totalnya = 0;
        ?>
        <?php 
        $no = 1;

        $tampil = $koneksi->query("SELECT * FROM tabel_kelahiran ORDER BY id_kelahiran");

        while ($data = $tampil->fetch_object()) {

            ?>
        <tr>

            <td align="center"><?= $no++ . "."; ?></td>
            <td align=""><?php echo "'" . ucwords($data->nama_balita) . "'"; ?> </td>
            <td align=""><?php echo "'" . ucwords($data->tempat_lahir) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->hari_lahir) . "'"; ?></td>
            <td align=""><?php echo "'" . date('d/m/Y', strtotime($data->tanggal_lahir)) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->jenis_kelamin) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->nama_ayah) . "'"; ?></td>
            <td align=""><?php echo "'" . ucwords($data->nama_ibu) . "'"; ?></td>

        </tr>
        <?php  /* $totalnya+=$data->total_pembelian; */ ?>
        <?php 
    } ?>
    </tbody>
</table> 