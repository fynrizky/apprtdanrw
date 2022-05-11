<?php 
session_start();//pada report wajib aktifkan session_start agar tidak dilempar ke menu login
include_once "../../assets/fpdf/fpdf.php";
include_once "../../koneksi/koneksi.php";
// $connect = new mysqli("$host","$root","","$db");
//include_once "inc/class.crud.php";
//$crud = new CRUD();
if (@$_SESSION['administrator'] || @$_SESSION['rw'] || @$_SESSION['rt']) 
{
    if(isset($_GET['idsp']))
    {     
        $idsp = $_GET['idsp'];
        $query = $koneksi->query("SELECT * FROM tabel_sp WHERE id_sp =".$idsp);
        $adayangcocok = $query->num_rows;
          if ($adayangcocok === 1) 
          {
            $getdata = $query->fetch_assoc();   
            $data = $getdata['proses'];
            if ($data == 'belum validasi') 
            {
              $_SESSION['blm_valid'] = 'TRUE';          
            }elseif($data == 'sudah validasi')
            {
                $_SESSION['sdh_valid'] = 'TRUE';   
            }
          }
        if (@$_SESSION['blm_valid']) 
        {
            echo "<script>alert('Surat Belum Di Validasi');window.location.href='../../admin/?page=suratpengantar';</script>";
            unset($_SESSION['blm_valid']);//hapus session

        }elseif(!@$_SESSION['sdh_valid']) 
        {
            echo "<script>alert('Surat Belum Di Validasi');window.location.href='../../admin/?page=suratpengantar';</script>";
        
        }
    }

}else{
    echo "<script>alert('Anda Harus login..!');</script>";  
	echo "<script>location='../../login/login.php';</script>";
    exit();
    
}


    
    
    //include "../models/m_barang.php";
    //include "../models/database.php";
    //$brg = new Barang($connection);
    
    //$con=mysqli_connect("localhost","root","","dbtuts3");
    
    //$koneksi= new DB_con("localhost","root","","dbtuts3");
    
    
    // Check connection
    //if (mysqli_connect_errno())
    //{
        //echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //}
        
        
        
        
		//if (!isset($_SESSION['login_user'])) 
		//{
            //echo "<script>alert('You must login..!');</script>";  
            //echo "<script>location='index.php';</script>";
            //exit();
            //header('location:login/login.php');
            //}
            
            
            
            //membuat fpdf data tampil per halaman , jika data yang ditampilkan lebih dari 1 halaman. dengan menggunakan class dan function.
            
            class myPDFtransaksi extends FPDF{//membuat class myPDF untuk menggantikan var FPDF
                

                function header(){

                    $this->Ln(12);
                $this->SetFont('Times','B',12);
                $this->image('../../assets/css/img_sp/jayaraya.png',15,12,25,0,'PNG');
$this->Cell(0,5,'KELURAHAN PENJARINGAN KECAMATAN PENJARINGAN','0','1','C',false);
$this->Cell(0,5,'KOTA ADMINISTRASI JAKARTA UTARA','0','1','C',false);
$this->SetFont('Times','i',8);
$this->Cell(0,5,'Sekertariat : Rukun Warga 010 Penjaringan','0','1','C',false);
$this->Cell(0,2,'D.K.I. Jakarta, Kode Pos 14440','0','1','C',false);
$this->Ln(4);
$this->Cell(190,1,'','0','1','L',true);
$this->Ln(1);
$this->Cell(190,0.6,'','0','1','L',true);
$this->Ln(16);

}


//function headerJudul(){

    
    //$this->SetFont('Times','B',14);
    //$this->Cell(50,5,'Daftar Pembelian','0','1','L',false);
//$this->Ln(3);

//}

//function headerTable(){
    
    
    //$this->SetFont('Times','B',12);
    //$this->Cell(20,12,'No.',1,0,'C');
    //$this->Cell(85,12,'Nama Barang',1,0,'C');
    //$this->Cell(65,12,'Harga',1,0,'C');
    //$this->Cell(25,12,'Jumlah Beli',1,0,'C');
    //$this->Cell(75,12,'Total Harga',1,0,'C');
    //$this->Ln(4);
    
    //}
    
    function viewTable($koneksi){
        
        //$jumlahnya = 0;
//$no=0;
//$tampil = $crud->alltransaksi();
//while ($data = mysql_fetch_array($tampil)){

    
    //$sql="select * from barang order by id_barang asc";
//$res=mysqli_query($con,$sql);
//while($data = mysqli_fetch_assoc($res)){
	 
    $idsp  = $_GET['idsp']; //kode berita yang akan dikonvert
    $query  = $koneksi->query("SELECT * FROM tabel_sp
INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw
INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga
INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan WHERE tabel_sp.id_sp = $idsp");

while($data = mysqli_fetch_array($query)){
    

    //$sql="SELECT a.*, b.* FROM transaksi a
    //LEFT JOIN stok b on a.id_stok = b.id_stok 
		//order by a.date ASC";
        //$res=mysql_query($sql);
        //while($data = mysql_fetch_array($res)){
            
            $this->SetFont('Times','U',14);
            $this->Cell(185,5,'SURAT PENGANTAR','0','0','C',0);
            
            
            $this->Ln(8);
            $this->SetFont('Times','B',12);
            $this->Cell(77,8,"NO.",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
            
            
            
            function getRomawi($bln){
                switch ($bln){
                    case 1: 
                    return "I";
                    break;
                    case 2:
                    return "II";
                    break;
                    case 3:
                    return "III";
                    break;
                    case 4:
                    return "IV";
                    break;
                    case 5:
                    return "V";
                    break;
                    case 6:
                    return "VI";
                    break;
                    case 7:
                    return "VII";
                    break;
                    case 8:
                    return "VIII";
                    break;
                    case 9:
                    return "IX";
                    break;
                    case 10:
                    return "X";
                    break;
                    case 11:
                    return "XI";
                    break;
                    case 12:
                    return "XII";
                    break;
                }
            }
            
            $bulan	= date('m');
            $blnromawi = getRomawi($bulan);
            // echo $romawi;
            $tanggal = getdate();
            // echo $tanggal['year'];
            
            $this->Cell(100,8,"0"."0".$data['id_sp'].'/'.$data['rt'].'/'.$data['rw'].'/'.$blnromawi."/".$tanggal['year'] ,0,0,'L',0);


            
            $this->Ln(16);
$this->SetFont('Times','i',12);
$this->Cell(195,8,"Yang bertanda tangan dibawah ini. Pengurus RT.".$data['rt']."/ RW.".$data['rw']." Kelurahan ".ucwords($data['kelurahan']).", Kecamatan",0,0,'C',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Ln(8);
$this->Cell(120,8, ucwords($data['kecamatan']).", Jakarta Utara. Dengan ini menerangkan bahwa :",0,0,'C',0);



$this->Ln(12);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Nama Lengkap"."               :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['nama']),0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Jenis Kelamin"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['jns_kelamin']),0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Tempat"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['tmp_lahir']),0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Tanggal Lahir"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,$data['tgl_lhr'],0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"No.KTP"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,$data['nik'],0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"kewarganegaraan"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['warganegara']),0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Agama"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['agm']),0,0,'L',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Alamat"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['almt']),0,0,'L',0);

$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(85,8,"Keperluan"."                 :",0,0,'R',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Cell(100,8,ucwords($data['keperluan']),0,0,'L',0);


$this->Ln(16);
$this->SetFont('Times','i',12);
$this->Cell(195,8,"Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya dan",0,0,'C',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
$this->Ln(8);
$this->Cell(90,8,"yang berkepentingan untuk menjadi maklum.",0,0,'C',0);



$this->Ln(15);
$this->SetFont('Times','U',12);
$this->Cell(90,8,"",0,0,'C',0);


$this->SetFont('Times','U',12);
$date=date('y-m-d');
$this->Cell(90,8,"(Jakarta, ".$date.")",0,0,'R',0);


$this->Ln(8);
$this->SetFont('Times','i',12);
$this->Cell(90,8,"Pengurus RW 010",0,0,'C',0);


$this->SetFont('Times','i',12);
$this->Cell(90,8,"Pengurus RT." .$data['rt']."/".$data['rw'] ,0,0,'R',0);

$this->Ln(2);
$this->image('../../assets/css/img_sp/ttg.png',10,195,100,0,'PNG');

$this->Ln(2);
$this->image('../../assets/css/img_sp/stampel rw 010 2.png',10,190,90,0,'PNG');

$this->Ln(2);
$this->image('../../assets/gambar/img/'.$data['gambar'],120,195,77,0,'PNG');

$this->Ln(32);
$this->SetFont('Times','U',12);
$this->Cell(90,8,"(Ketua"." Rukun Warga)",0,0,'C',0);

$this->SetFont('Times','U',12);
$this->Cell(90,8,"(Ketua"." Rukun Tetangga)",0,0,'R',0);

//$no++;
//$this->Ln(8);
//$this->SetFont('Times','',12);
//$this->Cell(20,8,$no.".",1,0,'C');
//$this->Cell(85,8,"'".$data['nama_barang'//]."'",1,0,'L');
//$this->Cell(65,8,"Rp".". ".number_format($data['harga_barang']).",-",1,0,'L');
//$this->Cell(25,8,$data['jml_pembelian'],1,0,'C');
//$this->Cell(75,8,"Rp".". ".number_format($data['total_pembelian']).",-",1,0,'L');

//$jumlahnya+=$data['total_pembelian'];
//}

//$this->Ln(8);
//$this->SetFont('Times','B',12);
//$this->Cell(195,8,'Total Pembelian',1,0,'C',0);//C artinya center bisa diubah L/R / menghilangkan kolom ubah angka 1 menjadi 0
//$this->Cell(75,8,"Rp".". ".number_format($jumlahnya).",-",1,0,'L',0);
    
//}

//function footer(){
    
    //$this->SetY(-15);
    //$this->SetFont('Times','',12);
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');	
    //}
        
}
}

}

$pdf = new myPDFtransaksi();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf->headerJudul();
//$pdf->headerTable();
$pdf->viewTable($koneksi);
$pdf->Output();


?>	