<!-- dataTables -->
<link href="../assets/dataTables/datatables.min.css" rel="stylesheet">
<?php 

if (isset($_POST["id"])) {
    include "../koneksi/koneksi.php";
    $id = $_POST["id"];
    $query = $koneksi->query("SELECT * FROM tabel_sp INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga 
    INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan 
    INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_sp.proses = '$id'");
    while ($row = $query->fetch_object()) {
       
       
       
        $output ='
       <section class="content-header">
       <h1>
        Surat Pengantar
         <small>"'.ucwords($row->proses).'"</small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="?page=listwarga"><i class="fa fa-dashboard"></i> Data warga</a></li>
         <li><a href="#">Examples</a></li>
         <li class="active">Blank page</li>
       </ol>
     </section>
       ';
       
       
        $output .= '
        <div class ="box-body">
        <div class="row">
        <div class="col-lg-12">
         <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped" id="datatables-sp">
             <thead>
             <tr>
                 <th>
                   <center>NIK</center>
                 </th>
                 <th>
                   <center>Nama</center>
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
                   <center>Jenis Kelamin</center>
                 </th>
                 <th>
                   <center>Tempat Lahir</center>
                 </th>
                 <th>
                   <center>Tanggal Lahir</center>
                 </th>
                 <th>
                   <center>Agama</center>
                 </th>
                 <th>
                   <center>Pekerjaan</center>
                 </th>
                 <th>
                   <center>Keperluan</center>
                 </th>
                 <th>
                   <center>Status Proses</center>
                 </th>
             </tr>       
             </thead>
             <tbody>';


            $query = $koneksi->query("SELECT * FROM tabel_sp INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga 
            INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan 
            INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_sp.proses = '$id' ORDER BY tabel_sp.id_sp ASC");
            while ($row = $query->fetch_object()) {
              
          
               $output .= '<tr>
                   
              
                   <td >'.$row->nik.'</td>
                   <td >'.ucwords($row->nama).'</td>
                   <td >'.ucwords($row->almt).'</td>
                   <td >'.ucwords($row->rt).'</td>
                   <td >'.ucwords($row->rw).'</td>
                   <td >'.ucwords($row->jns_kelamin).'</td>
                   <td >'.ucwords($row->tmp_lahir).'</td>
                   <td >'.ucwords($row->tgl_lhr).'</td>
                   <td >'.ucwords($row->agm).'</td>
                   <td >'.ucwords($row->pkrjaan).'</td>
                   <td >'.ucwords($row->keperluan).'</td>';

                   if($row->proses == 'belum validasi'){

                     
                     $output .= '
                     <td ><span class="label label-danger" style="border-radius: 100px;"><i class="glyphicon glyphicon-share"></i> '.ucwords($row->proses).'</span></td>';
                     
                    }elseif($row->proses == 'belum validasi'){

                     
                     $output .= '
                     <td ><span class="label label-danger" style="border-radius: 100px;"><i class="glyphicon glyphicon-share"></i> '.ucwords($row->proses).'</span></td>';
                     
                    }
                     $output .= '</tr>';

            }

                    
               $output .= '</tbody>
                   
                 </table>
     
                 
               </div>
             </div>
           </div>
           </div>
           <div class="box-footer">
               Footer
             </div>
             <!-- /.box-footer-->
        ';

         
           
    }

    echo $output;
}
?>
<script type="text/javascript" src="../assets/dataTables/datatables.min.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
    $('#datatables-sp').DataTable({
      lengthMenu : [[5, 25, 50, -1], [5, 25, 50, "All"]],
      language :{
          url : "../assets/dataTables/indonesia.json",
          sEmptyTable : "Tidads"
      }
    });
});