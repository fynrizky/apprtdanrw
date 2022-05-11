<section class="content-header">
    <h1>
        Kepala Keluarga
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>


<?php if (@$_GET['act'] == 'del') {
  $id = $_GET['id'];
  $koneksi->query("DELETE FROM tabel_kk WHERE id_kk = '$id'");
  echo "<script>alert('Data Telah Dihapus');window.location.href='?page=listkk';</script>";
}  ?>



<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">Title</h3> -->

            <!-- aksi tambah/print -->
            <div class="col-lg-12" style="text-align: left;">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah">
                    <li class="fa fa-plus"></li> Add New
                </button>
            </div>
            <!-- akhir aksi -->


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                        <center>Nomor KK</center>
                                    </th>
                                    <th>
                                        <center>Nama Kepala Keluarga</center>
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
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $totalnya = 0 ?>
                                <?php 
                                $no = 1;

                                $tampil = $koneksi->query("SELECT * FROM tabel_kk INNER JOIN tabel_rtrw ON tabel_kk.id_rtrw = tabel_rtrw.id_rtrw ORDER BY tabel_kk.id_rtrw ASC");

                                while ($data = $tampil->fetch_object()) {

                                  ?>
                                <tr>
                                    <td align="center"><?= $no++ . "."; ?></td>
                                    <td><?php echo "'" . $data->no_kk . "'"; ?></td>
                                    <td>
                                        <a href="#" class="data-kk" id="<?= $data->id_kk;  ?>"><?php echo "'" . ucwords($data->nama_kk) . "'"; ?></a>
                                    </td>
                                    <td><?php echo "'" . ucwords($data->alamat) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->rt) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->rw) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->jenis_kelamin) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->tempat_lahir) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->tgl_lahir) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->agama) . "'"; ?></td>
                                    <td><?php echo "'" . ucwords($data->pekerjaan) . "'"; ?></td>
                                    <td align="center">

                                        <a id="editkk" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_kk;  ?>" data-rtrw="<?php echo $data->id_rtrw;  ?>" data-nokk="<?php echo $data->no_kk; ?>" data-namakk="<?php echo $data->nama_kk; ?>" data-alamat="<?php echo $data->alamat; ?>" data-jeniskelamin="<?php echo $data->jenis_kelamin; ?>" data-tempatlahir="<?php echo $data->tempat_lahir; ?>" data-tgllahir="<?php echo $data->tgl_lahir; ?>" data-agama="<?php echo $data->agama; ?>" data-pekerjaan="<?php echo $data->pekerjaan; ?>">
                                            <button class="btn btn-warning btn-xs">
                                                <li class="fa fa-edit"> Edit!</li>
                                            </button></a>

                                        <a href="?page=listkk&act=del&id=<?= $data->id_kk; ?>" onclick="return confirm('Are you sure you want to delete it?')">
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
        </div><!-- box body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>

<?php include "proses/.modal_add_kk.php"; ?>
<?php include "proses/.modal_edit_kk.php"; ?> 