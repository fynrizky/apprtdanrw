<div class="col-lg-12" style="text-align:left;">
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Add Surat Pengantar</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="rtrw">Pilih RT/RW</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
                                <select class="form-control" name="rtrw" id="rtrw" required>
                                    <option value="">-PILIH</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_rtrw; ?>"><?= $data->rt . "/" . $data->rw; ?></option>
                                    <?php 
								} ?>
                                    <?php 
								} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nama">Pilih Nama</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                                <select class="form-control myselect" style="width: 100%" name="nama" id="nama" required>
                                    <option value="">-PILIH</option>
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
                                <label class="control-label" for="keperluan">Pilih Keperluan</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_keperluan"); ?>
                                <select class="form-control" name="keperluan" id="keperluan" required>
                                    <option value="">-PILIH</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_keperluan; ?>"><?php echo ucwords($data->keperluan); ?></option>
                                    <?php 
								} ?>
                                    <?php 
								} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="proses">Proses</label>
                                <select class="form-control" name="proses" id="proses" required>
                                    <option value="">-PILIH</option>
                                    <option value="belum validasi">Belum Validasi</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambahsp" value="Tambah" onclick="cambiar_sign_up()">
                            </div>
                        </div>
                    </form>
                    <?php 
					if (isset($_POST['tambahsp'])) {
						$rtrw = $koneksi->real_escape_string($_POST['rtrw']);
						$nama = $koneksi->real_escape_string($_POST['nama']);
						$keperluannya = $koneksi->real_escape_string($_POST['keperluan']);
						$proses = $koneksi->real_escape_string($_POST['proses']);


						$koneksi->query("INSERT INTO tabel_sp VALUES('','$rtrw','$nama','$keperluannya','$proses')");
						echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=suratpengantar';</script>";
					}

					?>

                </div>
            </div>
        </div>
    </div>
</div> 