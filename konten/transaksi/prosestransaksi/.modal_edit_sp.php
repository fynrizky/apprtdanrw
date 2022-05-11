

<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Data Surat Pengantar</h2>
				</div>
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label class="control-label" for="rtrw">Pilih RT/RW</label>
							<input type="hidden" name="idsp" id="idsp">
                            <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
							<select class="form-control" name="rtrw" id="rtrw" required>
                                <option value="">-PILIH</option>
                            <?php if($query->num_rows > 0 ) { ?>
                            <?php while($data = $query->fetch_object()) { ?>
                                <option value="<?= $data->id_rtrw; ?>"><?php echo $data->rt."/".$data->rw; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label" for="nama">Pilih Nama</label>
                            <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
							<select class="form-control" style="width: 100%;" name="nama" id="nama" required>
                                <option value="">-PILIH</option>
                            <?php if($query->num_rows > 0 ) { ?>
                            <?php while($data = $query->fetch_object()) { ?>
                                <option value="<?= $data->id_warga; ?>"><?php echo $data->nama; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label" for="keperluan">Pilih Keperluan</label>
                            <?php $query = $koneksi->query("SELECT * FROM tabel_keperluan"); ?>
							<select class="form-control" name="keperluan" id="keperluan" required>
                                <option value="">-PILIH</option>
                            <?php if($query->num_rows > 0 ) { ?>
                            <?php while($data = $query->fetch_object()) { ?>
                                <option value="<?= $data->id_keperluan; ?>"><?php echo $data->keperluan; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label" for="proses">Proses</label>    
							<select class="form-control" name="proses" id="proses" required>
                                <option value="">-PILIH</option>
								<option value="belum validasi">Belum Validasi</option>
                                <option value="sudah validasi">Validasi</option>
                            </select>
						</div>
						<div class="modal-footer">
							<a href="?page=suratpengantar"><button type="button" class="btn btn-default" style="margin-right: 7px;">Back</button></a>
							<button type="reset" class="btn btn-danger">Reset</button>
							<input type="submit" class="btn btn-warning" name="editsp" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/dist/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).on("click", "#editsp", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var idsurat = $(this).data('id'); //data dari tombol edit barang yang data-id
			var rtrw = $(this).data('rtrw');//data dari tombol edit barang yang data-nama
			var nama = $(this).data('nama');//data dari tombol edit barang yang data-harga
			var keperluannya = $(this).data('keperluan');//data dari tombol edit barang yang data-stok
			var prosesnya = $(this).data('proses');//data dari tombol edit barang yang data-stok
			// var kecamatan = $(this).data('kec')//dst
    							$("#modal-edit #idsp").val(idsurat);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #rtrw").val(rtrw);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #nama").val(nama).select2({ placeholder: '--PILIH NAMA--' });//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #keperluan").val(keperluannya);
    							$("#modal-edit #proses").val(prosesnya);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/transaksi/prosestransaksi/proses_edit_sp.php',
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					processData : false,
					success  : function(msg){//kalau sukses tampilkan sebagai berikut
						$('.table').html(msg);//javascript carikan yang classnya table dihtml
					}
				});
			}));
		});

	</script>

</div>
