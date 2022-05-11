<?php 
session_start();
// sleep(1);
usleep(250000); //micro_seconds
include '../koneksi/koneksi.php';




$keyword = $_GET['keyword'];
$query = $koneksi->query("SELECT * FROM modulmenu WHERE nama_modul LIKE '%$keyword%' ORDER BY id_modul");
?>

<li class="header">MAIN NAVIGATION</li>

<?php while ($data = $query->fetch_object()) { ?>
<!-- Dashboard -->
<?php if ($data->nama_modul == 'dashboard') { ?>
<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span><?= ucfirst($data->nama_modul); ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=dashboard"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
        <!-- <li><a href="../assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
    </ul>
</li>


<!-- Master -->
<?php 
} elseif ($data->nama_modul == 'master') { ?>
<?php if (isset($_SESSION['administrator'])) { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-user-secret"></i>
        <span><?= ucfirst($data->nama_modul);  ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=listkk"><i class="fa fa-circle-o"></i> Kepala Keluarga</a></li>
        <li><a href="?page=listrtrw"><i class="fa fa-circle-o"></i> RT/RW</a></li>
        <li><a href="?page=listkeperluan"><i class="fa fa-circle-o"></i> Keperluan</a></li>
        <li><a href="?page=listagama"><i class="fa fa-circle-o"></i> Agama</a></li>
    </ul>
</li>
<?php 
} elseif (@$_SESSION['rt']) { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-user-secret"></i>
        <span><?= ucfirst($data->nama_modul);  ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=listkk"><i class="fa fa-circle-o"></i> Kepala Keluarga</a></li>
        <li><a href="?page=listkeperluan"><i class="fa fa-circle-o"></i> Keperluan</a></li>
    </ul>
</li>
<?php 
} ?>



<!-- Transaksi -->
<?php 
} elseif ($data->nama_modul == 'transaksi') { ?>
<?php if (isset($_SESSION['rw'])) { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-users"></i> <span><?= ucfirst($data->nama_modul); ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=suratpengantar"><i class="fa fa-circle-o"></i> Surat Pengantar</a></li>
    </ul>
</li>
<?php 
} elseif (isset($_SESSION['rt'])) { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-users"></i> <span><?= ucfirst($data->nama_modul);  ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=listwarga"><i class="fa fa-circle-o"></i> Data Warga</a></li>
        <li><a href="?page=listkelahiran"><i class="fa fa-circle-o"></i> Kelahiran</a></li>
        <li><a href="?page=listkematian"><i class="fa fa-circle-o"></i> Kematian</a></li>
        <li><a href="?page=suratpengantar"><i class="fa fa-circle-o"></i> Surat Pengantar</a></li>
        <!-- <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li> -->
    </ul>
</li>
<?php 
} elseif (isset($_SESSION['administrator'])) { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-users"></i> <span><?= ucfirst($data->nama_modul);  ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=listwarga"><i class="fa fa-circle-o"></i> Data Warga</a></li>
        <li><a href="?page=listkelahiran"><i class="fa fa-circle-o"></i> Kelahiran</a></li>
        <li><a href="?page=listkematian"><i class="fa fa-circle-o"></i> Kematian</a></li>
        <li><a href="?page=suratpengantar"><i class="fa fa-circle-o"></i> Surat Pengantar</a></li>
        <!-- <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li> -->
    </ul>
</li>
<?php 
} ?>

<!-- Laporan -->
<?php 
} elseif ($data->nama_modul == 'laporan') { ?>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-address-book"></i> <span><?= ucfirst($data->nama_modul); ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="../konten/laporan/laporanwarga.php"><i class="fa fa-circle-o"></i> Data Warga</a></li>
        <li><a href="../konten/laporan/laporankelahiran.php"><i class="fa fa-circle-o"></i> Kelahiran</a></li>
        <li><a href="../konten/laporan/laporankematian.php"><i class="fa fa-circle-o"></i> Kematian</a></li>
        <li><a href="../konten/laporan/laporanregistersp.php"><i class="fa fa-circle-o"></i> Register Surat Pengantar</a></li>
    </ul>
</li>

<!-- Modul Users -->
<?php 
} elseif ($data->nama_modul == 'users') { ?>
<li class="header">USERS</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-user"></i> <span><?= ucfirst($data->nama_modul);  ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="?page=users"><i class="fa fa-circle-o"></i> Data User</a></li>
        <!-- <li><a href="../assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
    </ul>
</li>

<?php 
} ?>
<?php 
} ?>
<!-- /while --> 