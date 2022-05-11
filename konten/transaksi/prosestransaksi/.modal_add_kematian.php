<div class="col-lg-12" style="text-align:left;">
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Tambah Data Kematian</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="id_kk">Pilih Kepala Keluarga</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_kk"); ?>
                                <select name="id_kk" id="id_kk" class="form-control myselect" style="width: 100%" required>
                                    <option value="">-PILIH KEPALA KELUARGA</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_kk; ?>"><?php echo ucwords($data->nama_kk); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="id_warga">Nama Warga</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                                <select name="id_warga" id="id_warga" class="form-control myselect" style="width: 100%" required>
                                    <option value="">-PILIH NAMA WARGA</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_warga; ?>"><?php echo ucwords($data->nama); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="id_rtrw">RT/RW</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
                                <select name="id_rtrw" id="id_rtrw" class="form-control" style="width: 100%" required>
                                    <option value="">-PILIH RT/RW</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_rtrw; ?>"><?php echo strtoupper($data->rt); ?>/<?php echo strtoupper($data->rw); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
								<label class="control-label" for="sebab_kematian">Sebab Kematian</label>
								<textarea class="form-control" type="text" name="sebab_kematian" id="sebab_kematian" placeholder="Keterangan"></textarea>
							</div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambahkematian" value="Tambah" onclick="cambiar_sign_up()">
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['tambahkematian'])) {
                        $id_kk = $koneksi->real_escape_string($_POST['id_kk']);
                        $id_warga = $koneksi->real_escape_string($_POST['id_warga']);
                        $id_rtrw = $koneksi->real_escape_string($_POST['id_rtrw']);
                        $sebab_kematian = $koneksi->real_escape_string($_POST['sebab_kematian']);

                        $koneksi->query("INSERT INTO tabel_kematian VALUES('','$id_kk','$id_warga','$id_rtrw','$sebab_kematian')");
                        echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listkematian';</script>";
                    }

                    ?>

                </div>
            </div>

        </div>
    </div>
</div> 