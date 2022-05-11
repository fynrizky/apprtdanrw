<section class="content-header">
      <h1>
        Data Kematian
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <?php 
    if(@$_GET['act'] == 'del')
    {
      $id = $_GET['id'];
      $koneksi->query("DELETE FROM tabel_kematian WHERE id_kematian = '$id'");
      echo "<script>alert('Data Telah Dihapus');window.location.href='?page=listkematian';</script>";
    }
    
    ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Data Kematian</h3> -->
          <!-- AKSI TAMBAH DAN PRINT -->
          <div class="col-lg-12" style="text-align: left;">
                <button type="button" id="tambahdata" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah">
                    <li class="fa fa-plus"></li> Add New
                </button>
                <a href="../konten/laporan/laporankematianfpdf.php"><button type="button" class="btn btn-default btn-xs">
                        <li class="fa fa-print"></li> Cetak Data
                    </button></a>
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
                                      <center>Tempat/Tanggal Lahir</center>
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
                                      <center>Kewarganegaraan</center>
                                    </th>
                                    <th>
                                      <center>Sebab Kematian</center>
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
                                    <td align=""><?php echo "'" . ucwords($data->no_kk) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->nama) . "'"; ?></td>
                                    <td align=""><?php echo "'" .ucwords($data->tmp_lahir)."/".date('d-m-Y', strtotime($data->tgl_lhr))."'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->jns_kelamin) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->almt) . "'"; ?></td>
                                    <td align=""><?php echo "'".strtoupper($data->rt)."/".strtoupper($data->rw)."'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->agm) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->warganegara) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->sebab_kematian) . "'"; ?></td>

                                    <td align="center">

                                        <a id="editkematian" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_kematian;  ?>" data-id_kk="<?php echo $data->id_kk;  ?>" data-id_warga="<?php echo $data->id_warga; ?>" data-id_rtrw="<?php echo $data->id_rtrw; ?>" data-sebab_kematian="<?php echo $data->sebab_kematian; ?>">
                                            <button class="btn btn-warning btn-xs">
                                                <li class="fa fa-edit"> Edit!</li>
                                            </button></a>

                                        <a href="?page=listkematian&act=del&id=<?= $data->id_kematian; ?>" onclick="return confirm('Are you sure you want to delete it?')">
                                            <button class="btn btn-danger btn-xs">
                                                <li class="fa fa-trash-o"></li> Hapus!
                                            </button></a>
                                    </td>
                                </tr>
                                <?php  /* $totalnya+=$data->total_pembelian; */ ?>
                                <?php 
                            } ?>
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
    <?php include "prosestransaksi/.modal_add_kematian.php"; ?>
    <?php include "prosestransaksi/.modal_edit_kematian.php"; ?> 