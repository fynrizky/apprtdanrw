

<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Data Kepala Keluarga</h2>
				</div>
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label class="control-label" for="nokk">Nomor Kepala Keluarga</label>
							<input type="hidden" name="kkid" id="kkid">
							<input class="form-control" type="text" name="nokk" id="nokk" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="nm_kk">Nama Kepala Keluarga</label>
							<input class="form-control" type="text" name="nm_kk" id="nm_kk" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="rtrw">RT/RW</label>
							<?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
							<select name="rtrw" id="rtrw" class="form-control">
								<option value="">-PILIH</option>
							<?php if ($query->num_rows > 0) { ?>
							<?php while($data = $query->fetch_object()) { ?>
								<option value="<?= $data->id_rtrw; ?>"><?= $data->rt."/".$data->rw; ?></option>
							<?php } ?>
							<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="alamat">Alamat</label>
							<textarea class="form-control" type="text" name="alamat" id="alamat" required></textarea>
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
							<input type="submit" class="btn btn-warning" name="editkk"  value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/dist/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).on("click", "#editkk", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var id_kk = $(this).data('id'); //data dari tombol edit barang yang data-id
			var nokk = $(this).data('nokk');//data dari tombol edit barang yang data-nama
			var namakk = $(this).data('namakk');//data dari tombol edit barang yang data-harga
			var rtrw = $(this).data('rtrw');//data dari tombol edit barang yang data-harga
			var alamat = $(this).data('alamat');//data dari tombol edit barang yang data-stok
			var jeniskelamin = $(this).data('jeniskelamin')//dst
			var tempatlahir = $(this).data('tempatlahir')//dst
			var tgllahir = $(this).data('tgllahir')//dst
			var agama = $(this).data('agama')//dst
			var pekerjaan = $(this).data('pekerjaan')//dst
    							$("#modal-edit #kkid").val(id_kk);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #nokk").val(nokk);
    							$("#modal-edit #nm_kk").val(namakk);
    							$("#modal-edit #rtrw").val(rtrw);
    							$("#modal-edit #alamat").val(alamat);
    							$("#modal-edit #jenis_k").val(jeniskelamin);
    							$("#modal-edit #tempat_l").val(tempatlahir);
    							$("#modal-edit #tgl_l").val(tgllahir);
    							$("#modal-edit #agama").val(agama);
    							$("#modal-edit #pekerjaan").val(pekerjaan);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/master/proses/proses_edit_kk.php',
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
		})
	</script>

</div>
