<?php 
session_start();
include_once "../../assets/fpdf/fpdf.php";
include "../../koneksi/koneksi.php";

if (!isset($_SESSION['adm'])) {
    echo "<script>alert('Kamu Harus Login..!');</script>";
    echo "<script>location='../../login/login.php';</script>";
    exit();
    //header('location:login/login.php');
}

class myPDFKEMATIAN extends FPDF
{

    function header()
    {

        $this->SetFont('Times', 'B', 18);
        $this->image('../../assets/css/img_sp/jayaraya.png', 20, 2, 24, 0, 'PNG');
        $this->Cell(0, 10, 'LAPORAN DATA KEMATIAN', '0', '1', 'C', false);
        $this->SetFont('Times', 'i', 8);
        $this->Cell(0, 5, 'Sekertariat : Rukun Warga 010 Penjaringan', '0', '1', 'C', false);
        $this->Cell(0, 2, 'D.K.I. Jakarta, Kode Pos 14440', '0', '1', 'C', false);
        $this->Ln(4);
        $this->Cell(270, 1, '', '0', '1', 'L', true);
        $this->Ln(1);
        $this->Cell(270, 0.5, '', '0', '1', 'L', true);
        $this->Ln(4);

        //}


        //function headerJudul(){


        $this->SetFont('Times', 'B', 14);
        $this->Cell(50, 5, 'Laporan Data Kematian', '0', '1', 'L', false);
        $this->Ln(4);
    }

    function headerTable()
    {


        $this->SetFont('Times', 'B', 10);
        $this->Cell(40, 8, 'NIK', 1, 0, 'C');
        $this->Cell(50, 8, 'Nama Lengkap', 1, 0, 'C');
        $this->Cell(40, 8, 'Tempat/Tanggal Lahir', 1, 0, 'C');
        $this->Cell(30, 8, 'Jenis Kelamin', 1, 0, 'C');
        $this->Cell(30, 8, 'Alamat', 1, 0, 'C');
        $this->Cell(20, 8, 'RT/RW', 1, 0, 'C');
        $this->Cell(60, 8, 'Sebab Kematian', 1, 0, 'C');
        $this->Ln(0);
    }

    function viewTable($koneksi)
    {

        $jumlahnya = 0;
        $no = 0;
        //$query = "SELECT a.*, b.* FROM transaksi a
        //LEFT JOIN stok b on a.id_stok = b.id_stok 
        //order by a.date ASC";
        $tampil = $koneksi->query("SELECT * FROM tabel_kematian 
                                INNER JOIN tabel_kk ON tabel_kematian.id_kk = tabel_kk.id_kk
                                INNER JOIN tabel_warga ON tabel_kematian.id_warga = tabel_warga.id_warga
                                INNER JOIN tabel_rtrw ON tabel_kematian.id_rtrw = tabel_rtrw.id_rtrw
                                ORDER BY tabel_kematian.id_kematian");
        //$tampil = mysqli_query($koneksi,$query);
        while ($data = mysqli_fetch_assoc($tampil)) {


            //$sql="select * from barang order by id_barang asc";
            //$res=mysqli_query($con,$sql);
            //while(ucwords($data = mysqli_fetch_assoc($res)){



            //$sql="SELECT a.*, b.* FROM transaksi a
            //LEFT JOIN stok b on a.id_stok = b.id_stok 
            //order by a.date ASC";
            //$res=mysql_query($sql);
            //while(ucwords($data = mysql_fetch_array($res)){

            $no++;
            $this->Ln(8);
            $this->SetFont('Times', '', 10);
            // $this->Cell(10, 8, $no . ".", 1, 0, 'C');
            $this->Cell(40, 8, "'" . ucwords($data['nik']) . "'", 1, 0, 'L');
            $this->Cell(50, 8, "'" . ucwords($data['nama']) . "'", 1, 0, 'L');
            $this->Cell(40, 8, "'" . ucwords($data['tmp_lahir']) . "/" .date('d-m-Y', strtotime($data['tgl_lhr'])). "'", 1, 0, 'L');
            $this->Cell(30, 8, "'" . ucwords($data['jns_kelamin']) . "'", 1, 0, 'L');
            $this->Cell(30, 8, "'" . ucwords($data['almt']) . "'", 1, 0, 'L');
            $this->Cell(20, 8, "'" . strtoupper($data['rt']) . "/" .strtoupper($data['rw']) . "'", 1, 0, 'L');
            $this->Cell(60, 8, "'" . ucwords($data['sebab_kematian']) . "'", 1, 0, 'L');
        
            // $this->Cell(65,8,"Rp".". ".number_format(ucwords($data['harga_barang']).",-",1,0,'L');
            // $this->Cell(25,8,ucwords($data['jml_pembelian'],1,0,'C');
            // $this->Cell(75,8,"Rp".". ".number_format(ucwords($data['total_pembelian']).",-",1,0,'L');

            // $jumlahnya+=ucwords($data['total_pembelian'];
        }

        // $this->Ln(8);
        // $this->SetFont('Times','B',12);
        // $this->Cell(195,8,'Total Pembelian',1,0,'C',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
        // $this->Cell(75,8,"Rp".". ".number_format($jumlahnya).",-",1,0,'L',0);
    }

    function footer()
    {


        $this->SetY(-15);
        $this->SetFont('Times', '', 12);
        $this->Cell(0, 8, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

        $this->SetY(-15);
        $this->SetFont('Times', '', 12);
        $date = date("j-m-Y");
        $this->Cell(0, 8, $date, 0, 0, 'L');
    }
}

$pdf = new myPDFKEMATIAN();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
//$pdf->headerJudul();
$pdf->headerTable();
$pdf->viewTable($koneksi);
$pdf->Output();

 ?>