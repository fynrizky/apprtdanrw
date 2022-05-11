<section class="content-header">
      <h1>
       Surat Pengantar
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>


  <?php if(@$_GET['act'] == 'del') {
  $id = $_GET['id'];
  $koneksi->query("DELETE FROM tabel_sp WHERE id_sp = '$id'");
	echo "<script>alert('Data Telah Dihapus');window.location.href='?page=suratpengantar';</script>";
}  ?>





    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Title</h3> -->

            <!-- aksi tambah/print -->
        <div class="col-lg-12" style="text-align: left;">
          <button type="button" id="tambahdata" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah"><li class="fa fa-plus"></li> Add New</button>
        </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
  <div class="box-body">
  <div class="row">
   <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" id="datatables">
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
            <th>
              <center>Status Proses</center>
            </th>
            <th>
              <center>Cetak Surat</center>
            </th>
            <th>
              <center>Aksi</center>
            </th>
          </tr>       
        </thead>
        <tbody>

          <?php 
         
            

		          ?>

          <?php $totalnya = 0 ?>
          <?php 
          $no = 1;

          $tampil = $koneksi->query("SELECT * FROM tabel_sp
          INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw
          INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga
          INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan ORDER BY tabel_sp.id_sp ASC");
          
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
              <td align="">
              <?php if($data->proses == 'belum validasi') { ?>
              <span class="label label-danger" style="border-radius: 100px; font-size: 12px;"><i class="glyphicon glyphicon-share"></i>
                 <?php echo "'".ucwords($data->proses)."'"; ?>
              </span>
              <?php }elseif($data->proses == 'sudah validasi'){ ?>
                <span class="label label-success" style="border-radius: 100px; font-size: 12px;"><i class="glyphicon glyphicon-check"></i>
                 <?php echo "'".ucwords($data->proses)."'"; ?>
              </span>
              <?php } ?>
              </td>
              <td align="center">  
                <a href="../konten/transaksi/cetak_sp.php?idsp=<?= $data->id_sp;  ?>" target=""><button class="btn btn-default btn-xs"><li class="fa fa-print"> Cetak Surat</li></button></a>
              </td>    
              <td align="center">
            <a id="editsp" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_sp;  ?>" data-rtrw="<?php echo $data->id_rtrw; ?>" data-nama="<?php echo $data->id_warga; ?>" 
            data-keperluan="<?php echo $data->id_keperluan; ?>" data-proses="<?php echo $data->proses; ?>">
                  <button class="btn btn-warning btn-xs"><li class="fa fa-edit"> Edit!</li></button></a>

                  <a href="?page=suratpengantar&act=del&id=<?= $data->id_sp; ?>" onclick="return confirm('Are you sure you want to delete it?')">
                    <button class="btn btn-danger btn-xs"><li class="fa fa-trash-o"></li> Hapus!</button></a>
                  </td>
                </tr>
                <?php /* $totalnya+=$data->total_pembelian; */ ?>
                <?php } ?>
              </tbody>
              
            </table>

            <!-- <a style="margin-right: 10px" href="../report/cetak_fpdf_pembelian" target="_blank" class="btn btn-default btn-xs"><li class='fa fa-print'></li>  Print FPDF</a> -->
          </div>
        </div>
      </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <?php include "prosestransaksi/.modal_add_sp.php"; ?>
    <?php include "prosestransaksi/.modal_edit_sp.php"; ?>