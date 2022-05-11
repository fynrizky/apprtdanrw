<section class="content-header">
    <h1>
        Dashboard
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_kk");
$jumlahkk = $tampil->num_rows;
?>

<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_warga");
$jumlahwrg = $tampil->num_rows;
?>
<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_warga WHERE jns_kelamin ='laki-laki'");
$jumlahlelaki = $tampil->num_rows;
?>
<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_warga WHERE jns_kelamin ='perempuan'");
$jumlahpr = $tampil->num_rows;
?>
<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_kelahiran");
$jumlahkelahiran = $tampil->num_rows;
?>
<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_kematian");
$jumlahkematian = $tampil->num_rows;
?>
<?php 
$tampil = $koneksi->query("SELECT * FROM tabel_sp WHERE proses ='belum validasi'");
$jumlahsp = $tampil->num_rows;
?>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="?page=listkk"><span class="info-box-icon bg-aqua"><i class="ion-ios-person"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Kepala Keluarga </span>
                    <span class="info-box-number"><?php echo $jumlahkk; ?><small></small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="?page=listwarga"><span class="info-box-icon bg-maroon"><i class="ion-ios-people"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Warga</span>
                    <span class="info-box-number"><?= $jumlahwrg;  ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Laki-laki</span>
                    <span class="info-box-number"><?php echo $jumlahlelaki; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-fuchsia-active"><i class="fa fa-female"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Perempuan</span>
                    <span class="info-box-number"><?php echo $jumlahpr; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="?page=listkelahiran"><span class="info-box-icon bg-info"><i class="fa fa-address-book-o"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Data Kelahiran</span>
                    <span class="info-box-number"><?php echo $jumlahkelahiran; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="?page=listkematian"><span class="info-box-icon bg-yellow"><i class="fa fa-bed"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Data Kematian</span>
                    <span class="info-box-number"><?php echo $jumlahkematian; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="?page=suratpengantar"><span class="info-box-icon bg-teal"><i class="ion ion-ios-paper"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Surat Pengantar</span>
                    <span class="info-box-number"><?php echo $jumlahsp; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content --> 