<div class="col-lg-12" style="text-align:left;">
	<div id="tambah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Add Warga</h2>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="nik">NIK</label>
								<input type="hidden" name="wrgid" id="wrgid">
								<input class="form-control" type="text" name="nik" id="nik" placeholder="NIK" required="">
							</div>
							<div class="form-group">
								<label class="control-label" for="kk">Kepala Keluarga</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_kk"); ?>
                                <select name="kk" id="kk" class="form-control myselect" style="width: 100%;">
                                <option value="">-PILIH KEPALA KELUARGA</option>
                                <?php if($query->num_rows > 0) { ?>
                                <?php while($row = $query->fetch_object()) { ?>
								<option value="<?= $row->id_kk; ?>"><?= ucfirst($row->nama_kk); ?></option>
                                <?php } ?>
                                <?php } ?>
                                </select>
							</div>
                            <div class="form-group">
								<label class="control-label" for="rtrw">RT/RW</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
                                <select name="rtrw" id="rtrw" class="form-control">
                                <option value="">-PILIH RT/RW</option>
                                <?php if($query->num_rows > 0) { ?>
                                <?php while($row = $query->fetch_object()) { ?>
								<option value="<?= $row->id_rtrw; ?>"><?= $row->rt."/".$row->rw; ?></option>
                                <?php } ?>
                                <?php } ?>
                                </select>
							</div>
                            <div class="form-group">
								<label class="control-label" for="nama">Nama</label>
								<input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="tmp_lahir">Tempat Lahir</label>
								<input class="form-control" type="text" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
								<input class="form-control" type="date" name="tgl_lhr" id="tgl_lhr" value="<?= date('Y-m-d'); ?>" placeholder="Tanggal Lahir" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="jns_kelamin">Jenis Kelamin</label>
                                <select name="jns_kelamin" id="jns_kelamin" class="form-control">
                                    <option value="">-PILIH</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
							</div>
                            <div class="form-group">
								<label class="control-label" for="almt">Alamat</label>
								<input class="form-control" type="text" name="almt" id="almt" placeholder="Alamat" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="agm">Agama</label>
								<select class="form-control" name="agm" id="agm">
                                    <option value="">-PILIH</option>
                                    <option value="islam">ISLAM</option>
                                    <option value="kristen">KRISTEN</option>
                                    <option value="budha">BUDHA</option>
                                    <option value="hindu">HINDU</option>
                                </select>
							</div>
                            <div class="form-group">
								<label class="control-label" for="sttsnikah">Status Nikah</label>
								<select class="form-control" name="sttsnikah" id="sttsnikah">
                                    <option value="">-PILIH</option>
                                    <option value="kawin">Kawin</option>
                                    <option value="belum kawin">Belum Kawin</option>
                                </select>
							</div>
                            <div class="form-group">
								<label class="control-label" for="pkrjaan">Pekerjaan</label>
								<input class="form-control" type="text" name="pkrjaan" id="pkrjaan" placeholder="Pekerjaan" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="warganegara">Kewarganegaraan</label>
								<input class="form-control" type="text" name="warganegara" id="warganegara" placeholder="Warga Negara" required>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambahwarga" value="Tambah" onclick="cambiar_sign_up()">
							</div>
						</div>
					</form>
                    <?php 
                    if (isset($_POST['tambahwarga'])) {
						$nik = $koneksi->real_escape_string($_POST['nik']);
						$kk = $koneksi->real_escape_string($_POST['kk']);
						$rtrw = $koneksi->real_escape_string($_POST['rtrw']);
						$nama = $koneksi->real_escape_string($_POST['nama']);
						$tmp_lahir = $koneksi->real_escape_string($_POST['tmp_lahir']);
						$tgl_lhr = $koneksi->real_escape_string($_POST['tgl_lhr']);
						$jns_kelamin = $koneksi->real_escape_string($_POST['jns_kelamin']);
						$almt = $koneksi->real_escape_string($_POST['almt']);
						$agm = $koneksi->real_escape_string($_POST['agm']);
						$sttsnikah = $koneksi->real_escape_string($_POST['sttsnikah']);
						$pkrjaan = $koneksi->real_escape_string($_POST['pkrjaan']);
						$warganegara = $koneksi->real_escape_string($_POST['warganegara']);

							$koneksi->query("INSERT INTO tabel_warga VALUES('','$kk','$rtrw','$nik','$nama','$tmp_lahir','$tgl_lhr','$jns_kelamin','$almt','$agm','$sttsnikah','$pkrjaan','$warganegara')");
                           echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listwarga';</script>";
					
					}
                    
                    ?>

                </div>
			</div>

		</div>
	</div>
</div>