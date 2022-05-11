

<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Data RT/RW</h2>
				</div>
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label class="control-label" for="rt">RT</label>
							<input type="hidden" name="idrtrw" id="idrtrw">
							<input class="form-control" type="text" name="rt" id="rt" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="rw">RW</label>
							<input class="form-control" type="text" name="rw" id="rw" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="kelurahan">Kelurahan</label>
							<input class="form-control" type="text" name="kelurahan" id="kelurahan" required>
						</div>
						<div class="form-group">
                            <label class="control-label" for="kecamatan">Kecamatan</label>
							<input class="form-control" type="text" name="kecamatan" id="kecamatan" required>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-danger">Reset</button>
							<input type="submit" class="btn btn-warning" name="editrtrw"  value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/dist/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).on("click", "#editrtrw", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var idrtrw = $(this).data('id'); //data dari tombol edit barang yang data-id
			var rt = $(this).data('rt');//data dari tombol edit barang yang data-nama
			var rw = $(this).data('rw');//data dari tombol edit barang yang data-harga
			var kelurahan = $(this).data('kel');//data dari tombol edit barang yang data-stok
			var kecamatan = $(this).data('kec')//dst
    							$("#modal-edit #idrtrw").val(idrtrw);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #rt").val(rt);
    							$("#modal-edit #rw").val(rw);
    							$("#modal-edit #kelurahan").val(kelurahan);
    							$("#modal-edit #kecamatan").val(kecamatan);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/master/proses/proses_edit_rtrw.php',
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
