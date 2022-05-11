<section class="content-header">
    <h1>
        Data Kelahiran
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
    $koneksi->query("DELETE FROM tabel_kelahiran WHERE id_kelahiran = '$id'");
    echo "<script>alert('Data Telah Dihapus');window.location.href='?page=listkelahiran';</script>";
}  ?>




<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">Title</h3> -->
            <!-- aksi tambah/print -->
            <div class="col-lg-12" style="text-align: left;">
                <button type="button" id="tambahdata" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah">
                    <li class="fa fa-plus"></li> Add New
                </button>
                <a href="../konten/laporan/laporankelahiranfpdf.php"><button type="button" class="btn btn-default btn-xs">
                        <li class="fa fa-print"></li> Cetak Data
                    </button></a>
            </div>

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
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $totalnya = 0 ?>
                                <?php 
                                $no = 1;

                                $tampil = $koneksi->query("SELECT * FROM tabel_kelahiran 
                                INNER JOIN tabel_kk ON tabel_kelahiran.id_kk = tabel_kk.id_kk 
                                -- INNER JOIN tabel_warga ON tabel_kelahiran.id_kk = tabel_warga.id_kk 
                                ORDER BY tabel_kelahiran.id_kelahiran");

                                while ($data = $tampil->fetch_object()) {

                                    ?>
                                <tr>
                                    <td align="center"><?= $no++ . "."; ?></td>
                                    <td align=""><a href="#" class="data-kelahiran" id="<?= $data->id_kk; ?>">
                                            <?php echo "'" . ucwords($data->nama_balita) . "'"; ?>
                                        </a>
                                    </td>
                                    <td align=""><?php echo "'" . ucwords($data->tempat_lahir) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->hari_lahir) . "'"; ?></td>
                                    <td align=""><?php echo "'" . date('d/m/Y', strtotime($data->tanggal_lahir)) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->jenis_kelamin) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->nama_ayah) . "'"; ?></td>
                                    <td align=""><?php echo "'" . ucwords($data->nama_ibu) . "'"; ?></td>

                                    <td align="center">

                                        <a id="editkelahiran" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_kelahiran;  ?>" data-nama_balita="<?php echo $data->nama_balita;  ?>" data-tempat_lahir="<?php echo $data->tempat_lahir; ?>" data-hari_lahir="<?php echo $data->hari_lahir; ?>" data-tanggal_lahir="<?php echo $data->tanggal_lahir; ?>" data-jenis_kelamin="<?php echo $data->jenis_kelamin; ?>" data-ayah="<?php echo $data->nama_ayah; ?>" data-ibu="<?php echo $data->nama_ibu; ?>">
                                            <button class="btn btn-warning btn-xs">
                                                <li class="fa fa-edit"> Edit!</li>
                                            </button></a>

                                        <a href="?page=listkelahiran&act=del&id=<?= $data->id_kelahiran; ?>" onclick="return confirm('Are you sure you want to delete it?')">
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
<?php include "prosestransaksi/.modal_add_kelahiran.php"; ?>
<?php include "prosestransaksi/.modal_edit_kelahiran.php"; ?> 