<div class="col-lg-12" style="text-align:left;">
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Tambah Data Kepala Keluarga</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="nokk">Nomor Kepala Keluarga</label>
                                <input class="form-control" type="text" name="nokk" id="nokk" placeholder=" No KK" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nm_kk">Nama Kepala Keluarga</label>
                                <input class="form-control" type="text" name="nm_kk" id="nm_kk" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="alamat">Alamat</label>
                                <textarea class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="rtrw">RT/RW</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw") ?>
                                <select class="form-control" name="rtrw" id="rtrw">
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($row = $query->fetch_object()) { ?>
                                    <option value="<?= $row->id_rtrw; ?>"><?= $row->rt; ?>/<?= $row->rw ?></option>
                                    <?php 
								} ?>
                                    <?php 
								} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="jenis_k">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_k" id="jenis_k">
                                    <option value="">-Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="tempat_l">Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempat_l" id="tempat_l" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="tgl_l">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_l" id="tgl_l" value="<?= date('Y-m-d'); ?>" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="">-Pilih Agama</option>
                                    <option value="islam">ISLAM</option>
                                    <option value="kristen">KRISTEN</option>
                                    <option value="budha">BUDHA</option>
                                    <option value="hindu">HINDU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="pekerjaan">Pekerjaan</label>
                                <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambahkk" value="Tambah" onclick="cambiar_sign_up()">
                            </div>
                        </div>
                    </form>
                    <?php 
					if (isset($_POST['tambahkk'])) {
						$nokk = $koneksi->real_escape_string($_POST['nokk']);
						$nm_kk = $koneksi->real_escape_string($_POST['nm_kk']);
						$alamat = $koneksi->real_escape_string($_POST['alamat']);
						$idrtrw = $koneksi->real_escape_string($_POST['rtrw']);
						$jenis_k = $koneksi->real_escape_string($_POST['jenis_k']);
						$tempat_l = $koneksi->real_escape_string($_POST['tempat_l']);
						$tgl_l = $koneksi->real_escape_string($_POST['tgl_l']);
						$agama = $koneksi->real_escape_string($_POST['agama']);
						$pekerjaan = $koneksi->real_escape_string($_POST['pekerjaan']);

						$koneksi->query("INSERT INTO tabel_kk VALUES('','$idrtrw','$nokk','$nm_kk','$alamat','$jenis_k','$tempat_l','$tgl_l','$agama','$pekerjaan')");
						echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listkk';</script>";
					}

					?>

                </div>
            </div>

        </div>
    </div>
</div> 