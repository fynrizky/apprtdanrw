

<section class="content-header">
      <h1>
        Users
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
  $koneksi->query("DELETE FROM users WHERE id_users = '$id'");
	echo "<script>alert('Data Telah Dihapus');window.location.href='?page=users';</script>";
}  ?>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
  <div class="box">
  <div class="box-header with-border">
          <!-- <h3 class="box-title">Title</h3> -->
          
          <!-- aksi tambah/print -->
        <div class="col-lg-12" style="text-align: left;">
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah"><li class="fa fa-plus"></li> Add New</button>
        </div>
          <!-- akhir aksi -->

        
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
   <div class ="box-body">
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
              <center>Users</center>
            </th>
            <th>
              <center>Level</center>
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

          $tampil = $koneksi->query("SELECT * FROM users");
          
          while ($data = $tampil->fetch_object()) {
            
            ?>
            <tr>
              <td align="center"><?= $no++."."; ?></td>
              <td align=""><?php echo "'".ucwords($data->username)."'"; ?></td>
              <td align=""><?php echo "'".ucfirst($data->level == 1 ? 'administrator' : ($data->level == 2 ? 'rw' : 'rt'))."'"; ?></td>
              <td align="center">

              <a id="edituser" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_users;  ?>" data-username="<?php echo $data->username; ?>" data-level="<?php echo $data->level; ?>"><button class="btn btn-warning btn-xs"><li class="fa fa-edit"> Edit!</li></button></a>

                  <a href="?page=users&act=del&id=<?= $data->id_users; ?>" onclick="return confirm('Are you sure you want to delete it?')">
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
      <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

    </section>

    <?php include ".modal_users_add.php"; ?>
    <?php include ".modal_users_edit.php"; ?>