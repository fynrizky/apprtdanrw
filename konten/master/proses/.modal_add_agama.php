<div class="col-lg-12" style="text-align:left;">
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Add Agama</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="agama">Agama</label>
                                <input class="form-control" type="text" name="agama" id="agama" placeholder="Agama" required="">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambahagama" value="Tambah" onclick="cambiar_sign_up()">
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['tambahagama'])) {
                        $agama = $koneksi->real_escape_string($_POST['agama']);


                        $koneksi->query("INSERT INTO tabel_agama VALUES('','$agama')");
                        echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listagama';</script>";
                    }

                    ?>

                </div>
            </div>

        </div>
    </div>
</div> 