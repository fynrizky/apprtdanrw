<?php 

if (isset($_POST["id"])) {
    include "../koneksi/koneksi.php";

    $query = $koneksi->query("SELECT * FROM tabel_kk INNER JOIN tabel_warga ON tabel_kk.id_kk = tabel_warga.id_kk INNER JOIN tabel_rtrw ON tabel_kk.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_kk.id_kk = '".$_POST["id"]."'");
    while ($row = $query->fetch_object()) {
        
      
      $output = '
      <section class="content-header">
      <h1>
       Kepala Keluarga
        <small>'.ucwords($row->nama_kk).'</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?page=listkk"><i class="fa fa-user"></i> Kepala Keluarga</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
      ';
      
      $output .= '
        
        <div class ="card-body">
        <div class="row">
        <div class="col-lg-12">
         <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped" id="datatables">
             <thead>
             <tr>
                 <th>
                   <center>Nomor KK</center>
                 </th>
                 <th>
                   <center>Kepala Keluarga</center>
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


            $query = $koneksi->query("SELECT * FROM tabel_kk INNER JOIN tabel_rtrw ON tabel_kk.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_kk.id_kk =".$_POST['id']);
            while ($row = $query->fetch_object()) {
              
          
               $output .= '<tr>
                   
                   <td >'.$row->no_kk.'</td>
                   <td >'.ucwords($row->nama_kk).'</td>
                   <td >'.ucwords($row->alamat).'</td>
                   <td >'.ucwords($row->rt).'</td>
                   <td >'.ucwords($row->rw).'</td>
                   <td >'.ucwords($row->jenis_kelamin).'</td>
                   <td >'.ucwords($row->tempat_lahir).'</td>
                   <td >'.ucwords($row->tgl_lahir).'</td>
                   <td >'.ucwords($row->agama).'</td>
                   <td >'.ucwords($row->pekerjaan).'</td>
                 
               </tr>';

            }

                    
               $output .= '</tbody>
                   
                 </table>
     
                 
               </div>
             </div>
           </div>
           </div>
           <div class="card-footer">
               Footer
             </div>
             <!-- /.card-footer-->
        ';
    }
    echo $output;
}
?>