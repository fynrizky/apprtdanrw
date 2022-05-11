<section class="content-header">
      <h1>
       Data Warga
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
  $koneksi->query("DELETE FROM tabel_warga WHERE id_warga = '$id'");
	echo "<script>alert('Data Telah Dihapus');window.location.href='?page=listwarga';</script>";
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
          <a href="../konten/laporan/laporanwargafpdf.php"><button type="button" class="btn btn-default btn-xs"><li class="fa fa-print"></li> Cetak Data</button></a>
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
              <center>Aksi</center>
            </th>
          </tr>       
        </thead>
        <tbody>
          
          <?php $totalnya = 0 ?>
          <?php 
          $no = 1;

          $tampil = $koneksi->query("SELECT * FROM tabel_warga 
          INNER JOIN tabel_kk ON tabel_warga.id_kk = tabel_kk.id_kk
          INNER JOIN tabel_rtrw ON tabel_warga.id_rtrw = tabel_rtrw.id_rtrw ORDER BY tabel_warga.id_kk ASC");
          
          while ($data = $tampil->fetch_object()) {
            
            ?>  
            <tr>
              <td align="center"><?= $no++."."; ?></td>
              <td align=""><?php echo "'".$data->nik."'"; ?></td>
              <td align=""><?php echo "'".$data->no_kk."'"; ?></td>
              <td align="">
                  <a href="#" class="data-warga" id="<?= $data->id_kk; ?>">
                        <?php echo "'".ucwords($data->nama)."'"; ?>
                  </a>
              </td>
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
              <td align="center">
                  
            <a id="editwarga" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_warga;  ?>" data-nik="<?php echo $data->nik; ?>" data-rtrw="<?php echo $data->id_rtrw; ?>" data-nama="<?php echo $data->nama; ?>" data-tmplahir="<?php echo $data->tmp_lahir; ?>" data-tgllhr="<?php echo $data->tgl_lhr; ?>" data-jnskelamin="<?php echo $data->jns_kelamin; ?>" data-almt="<?php echo $data->almt; ?>" data-agm="<?php echo $data->agm; ?>" data-sttskawin="<?php echo $data->status_perkawinan; ?>" data-pkrjaan="<?php echo $data->pkrjaan; ?>" data-wrgngr="<?php echo $data->warganegara; ?>">
                  <button class="btn btn-warning btn-xs"><li class="fa fa-edit"> Edit!</li></button></a>

                  <a href="?page=listwarga&act=del&id=<?= $data->id_warga; ?>" onclick="return confirm('Are you sure you want to delete it?')">
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
    <?php include "prosestransaksi/.modal_add_warga.php"; ?>
    <?php include "prosestransaksi/.modal_edit_warga.php"; ?>