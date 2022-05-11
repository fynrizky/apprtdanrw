

<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Data Keperluan</h2>
				</div>
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label class="control-label" for="keperluan">Keperluan</label>
							<input type="hidden" name="idkeperluan" id="idkeperluan">
							<input class="form-control" type="text" name="keperluan" id="keperluan" required>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-danger">Reset</button>
							<input type="submit" class="btn btn-warning" name="editkeperluan" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/dist/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).on("click", "#editkeperluan", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var idkeperluan = $(this).data('id'); //data dari tombol edit barang yang data-id
			var keperluannya = $(this).data('keperluan');//data dari tombol edit barang yang data-nama
			// var rw = $(this).data('rw');//data dari tombol edit barang yang data-harga
			// var kelurahan = $(this).data('kel');//data dari tombol edit barang yang data-stok
			// var kecamatan = $(this).data('kec')//dst
    							$("#modal-edit #idkeperluan").val(idkeperluan);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #keperluan").val(keperluannya);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/master/proses/proses_edit_keperluan.php',
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
