<?php 
session_start();
require_once("../koneksi/koneksi.php");

if (!isset($_SESSION['adm'])) {
    echo "<script>alert('Anda Harus login..!');</script>";
    echo "<script>location='../login/login.php';</script>";
    exit();
    //header('location:login/login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi | ADM RW </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
  
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
    <!-- My css -->
    <link rel="stylesheet" href="../assets/css/css_template/style_template.css">
    <!-- dataTables -->
    <link href="../assets/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Select2/selecttwo -->
    <link href="../select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>RW</b>10</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->


                        <?php 
                        $tampil = $koneksi->query("SELECT * FROM tabel_sp INNER JOIN tabel_warga ON tabel_sp.id_warga = tabel_warga.id_warga 
           INNER JOIN tabel_keperluan ON tabel_sp.id_keperluan = tabel_keperluan.id_keperluan 
           INNER JOIN tabel_rtrw ON tabel_sp.id_rtrw = tabel_rtrw.id_rtrw WHERE tabel_sp.proses ='belum validasi'");
                        $jumlahsp = $tampil->num_rows;
                        ?>

                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- Pesan Notifikasi -->
                        <?php if ($jumlahsp) { ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-danger"><?= $jumlahsp; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><strong>Pemberitahuan..!! </strong>Ada <?= $jumlahsp; ?> Permohonan Surat Yang Belum Di Validasi</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                        <?php  ?>
                                        <?php $data = $tampil->fetch_object(); ?>
                                        <li class="notif">
                                            <a href="#" class="data-sp" id="<?= $data->proses; ?>">
                                                <i class="fa fa-users text-red"></i><?= $jumlahsp; ?> Notifikasi
                                            </a>
                                        </li>
                                        <?php  ?>

                                    </ul><!-- menu -->
                                </li>
                                <li class="footer"><a href="?page=suratpengantar">View all</a></li>
                            </ul>
                        </li><!-- dropdown -->
                        <?php 
                    } else { ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Belum Ada Pemberitahuan</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <!-- <ul class="menu">
                  
                  <li>
                    <a href="?page=listwarga">
                      <i class="fa fa-users text-red"></i> <?= $jumlahsp; ?> Surat Belum Divalidasi
                    </a>
                  </li>
                  
                </ul> -->
                                </li>
                                <li class="footer"><a href="?page=suratpengantar">View all</a></li>
                            </ul>
                            <?php 
                        } ?>
                        </li><!-- dropdown else -->
                        <!-- Tasks: style can be found in dropdown.less -->







                        <!-- User Account: style can be found in dropdown.less -->
                        <!-- USER ACCOUNT -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../assets/dist/img/user-admin.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php 
                                    echo strtoupper($_SESSION['adm']['level'] == '1' ? 'Sekertaris (RW)' : ($_SESSION['adm']['level'] == '2' ? 'Rukun Warga' : 'Rukun Tetangga'));
                                    ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../assets/dist/img/user-admin.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?php 
                                        echo strtoupper($_SESSION['user']);
                                        ?>
                                        <small> 2019</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="font-size: 12px;">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px;">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center" style="font-size: 12px;">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" id="profil" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../login/proseslogin.php?logout=1" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->


        <!-- modal profil -->

        <?php include "../konten/users/profiles.php"; ?>




        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../assets/dist/img/user-admin.png" class="img-circle" id="imagecircle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= ($_SESSION['adm']['level'] == '1' ? 'Sekertaris (RW)' : ($_SESSION['adm']['level'] == '2' ? 'Rukun Warga' : 'Rukun Tetangga')); ?></p><!-- Operator Ternary/ IF satu baris -->
                        <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                    </div>
                </div>

                <!-- Search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." id="keyword">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn search" class="btn btn-flat">
                                <!-- <i class="fa fa-search"></i> -->
                            </button>
                            <img src="../assets/css/css_template/img/sharingan.gif" class="loader">

                        </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree" id="modulmenu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=dashboard"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            <!-- <li><a href="../assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                        </ul>
                    </li>



                    <!-- MAster -->

                    <?php if (isset($_SESSION['administrator'])) { ?>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-user-secret"></i>
                            <span>Master</span>
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
                            <span>Master</span>
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

                    <?php if (isset($_SESSION['rw'])) { ?>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Transaksi</span>
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
                            <i class="fa fa-users"></i> <span>Transaksi</span>
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
                            <i class="fa fa-users"></i> <span>Transaksi</span>
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
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-address-book"></i> <span> Laporan</span>
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

                    <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->



                    <!--User  -->

                    <li class="header">USERS</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=users"><i class="fa fa-circle-o"></i> Data User</a></li>
                            <!-- <li><a href="../assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- ===============================================KONTENT============================================================ -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php 
            if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
                include '../konten/dashboard.php';
            } elseif (@$_GET['page'] == 'listkk') {
                if (@$_SESSION['administrator'] || @$_SESSION['rt']) {
                    include '../konten/master/listkk.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listrtrw') {
                if (@$_SESSION['administrator']) {
                    include '../konten/master/listrtrw.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listkeperluan') {
                if (@$_SESSION['administrator'] || @$_SESSION['rt']) {
                    include '../konten/master/listkeperluan.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listagama') {
                if (@$_SESSION['administrator'] || @$_SESSION['rt']) {
                    include '../konten/master/listagama.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listwarga') {
                if (@$_SESSION['administrator'] || @$_SESSION['rt']) {
                    include '../konten/transaksi/listwarga.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listkelahiran') {
                if (@$_SESSION['administrator'] || @$_SESSION['rt']) {
                    include '../konten/transaksi/listkelahiran.php';
                } else {
                    echo "<script>alert('Maaf Anda Tidak Punya Hak Akses Kesini..!!');</script>";
                    include '../konten/dashboard.php';
                }
            } elseif (@$_GET['page'] == 'listkematian') {
                include '../konten/transaksi/listkematian.php';
            } elseif (@$_GET['page'] == 'suratpengantar') {
                include '../konten/transaksi/suratpengantar.php';
            } elseif (@$_GET['page'] == 'users') {
                include '../konten/users/users.php';
            }
            ?>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer bg-gray-light">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2019 <i class="fa fa-instagram instagram"></i><a href="https://www.instagram.com/kykyrizky__/" class=target="_blank"> kykyrizky__</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <!-- My modul menu -->
    <script src="../assets/js/fetch_data.js"></script>
    <script src="../assets/js/modulmenu_jq.js"></script>
    <script src="../assets/js/modulmenu.js"></script>
    <!-- select2 -->
    <script src="../select2/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#tambahdata", function() {
            $('.myselect').select2({
                placeholder: '--PILIH--'

            });
        });
    </script>
    <!-- My sweetalert2 -->
    <script src="../sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        });
    </script>
    <script type="text/javascript" src="../assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Semua"]
                ],
                language: {
                    url: "../assets/dataTables/indonesia.json",
                    sEmptyTable: "Tidads"
                }
            });
        });
    </script>

</body>

</html> 