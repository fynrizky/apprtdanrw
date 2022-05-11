<div class="col-lg-12" style="text-align:left;">
	<div id="tambah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Add RT/RW</h2>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="rt">RT</label>
								<input class="form-control" type="text" name="rt" id="rt" placeholder="RT" required="">
							</div>
							<div class="form-group">
								<label class="control-label" for="rw">RW</label>
								<input class="form-control" type="text" name="rw" id="rw" placeholder="RW" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="kelurahan">Kelurahan</label>
								<input class="form-control" type="text" name="kelurahan" id="kelurahan" placeholder="Kelurahan" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="kecamatan">Kecamatan</label>
								<input class="form-control" type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="gambar">Gambar</label>
								<input class="form-control" type="file" name="gambar" id="gambar" required>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambahrtrw" value="Tambah" onclick="cambiar_sign_up()">
							</div>
						</div>
					</form>
                    <?php 
                    if (isset($_POST['tambahrtrw'])) {
						$rt = $koneksi->real_escape_string($_POST['rt']);
						$rw = $koneksi->real_escape_string($_POST['rw']);
						$kelurahan = $koneksi->real_escape_string($_POST['kelurahan']);
						$kecamatan = $koneksi->real_escape_string($_POST['kecamatan']);

						$extensi = explode(".", $_FILES['gambar']['name']);
						$gbr = "gbr-".round(microtime(true)).".".end($extensi);
						$sumber = $_FILES['gambar']['tmp_name'];
						
						$upload = move_uploaded_file($sumber, "../assets/gambar/img/".$gbr);
						if ($upload) {

							$koneksi->query("INSERT INTO tabel_rtrw VALUES('','$rt','$rw','$kelurahan','$kecamatan','$gbr')");
							echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listrtrw';</script>";

						} else {

							echo "<script>alert('Upload Gagal')</script>";
							
						}
					
					}
                    
                    ?>

                </div>
			</div>

		</div>
	</div>
</div>