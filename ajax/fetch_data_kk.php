
<?php 

if (isset($_POST["idkk"])) {
    include "../koneksi/koneksi.php";
    $idkk = $_POST["idkk"];
    $query = $koneksi->query("SELECT * FROM tabel_warga INNER JOIN tabel_kk ON tabel_warga.id_kk = tabel_kk.id_kk INNER JOIN tabel_rtrw ON tabel_warga.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_warga.id_kk = '$idkk'");
    while ($row = $query->fetch_object()) {
       
       
       
        $output ='
       <section class="content-header">
       <h1>
        Anggota Keluarga
         <small>'.ucwords($row->nama_kk).'</small>
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
           <table class="table table-bordered table-hover table-striped" id="datatables-kk">
             <thead>
             <tr>
                 <th>
                   <center>Nomor KK</center>
                 </th>
                 <th>
                   <center>NIK</center>
                 </th>
                 <th>
                   <center>Anggota Keluarga</center>
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
             </tr>       
             </thead>
             <tbody>';


            $query = $koneksi->query("SELECT * FROM tabel_warga INNER JOIN tabel_kk ON tabel_warga.id_kk = tabel_kk.id_kk INNER JOIN tabel_rtrw ON tabel_warga.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_warga.id_kk =".$_POST["idkk"]);
            while ($row = $query->fetch_object()) {
              
          
               $output .= '<tr>
                   
                   <td >'.$row->no_kk.'</td>
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
                 
               </tr>';

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
          ';
      
          
          
        }
        
        echo $output;
      }
      
      ?>
    
<script type="text/javascript" src="../assets/dataTables/datatables.min.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
    $('#datatables-kk').DataTable({
      lengthMenu : [[5, 25, 50, -1], [5, 25, 50, "All"]],
      language :{
          url : "../assets/dataTables/indonesia.json",
          sEmptyTable : "Tidads"
      }
    });
});