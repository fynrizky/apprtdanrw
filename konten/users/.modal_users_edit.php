
<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Data Users</h2>
				</div>
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="modal-body" id="modal-edit">
						<div class="form-group">
							<label class="control-label" for="username">Username</label>
							<input type="hidden" name="iduser" id="iduser">
							<input class="form-control" type="text" name="username" id="username">
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password" placeholder="Silahkan Ganti Password Jika Ingin Ganti">
						</div>
						<div class="form-group">
							<label class="control-label" for="password2">Password Konfirmasi</label>
							<input class="form-control" type="password" name="password2" id="password2" placeholder="Silahkan Ganti Password Jika Ingin Ganti">
						</div>
	
						<div class="form-group">
                            <label class="control-label" for="level">Level</label>
							<select name="level" id="level" class="form-control">
							<option value="">-PILIH LEVEL-</option>
							<option value="1">Administrator</option>
							<option value="2">RW</option>
							<option value="3">RT</option>
							
                            </select>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-danger">Reset</button>
							<input type="submit" class="btn btn-warning" name="edituser" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/dist/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).on("click", "#edituser", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var iduser = $(this).data('id'); //data dari tombol edit barang yang data-id
			var username = $(this).data('username');//data dari tombol edit barang yang data-nama
			// var password = $(this).data('password');//data dari tombol edit barang yang data-harga
			var level = $(this).data('level');//data dari tombol edit barang yang data-stok
			// var kecamatan = $(this).data('kec')//dst
    							$("#modal-edit #iduser").val(iduser);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #username").val(username);
    							$("#modal-edit #level").val(level);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/users/proses_edit_users.php',
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
