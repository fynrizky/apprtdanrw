<div class="col-lg-12" style="text-align:left;">
	<div id="tambah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Add Users</h2>
					<form action="../konten/users/prosesregister2.php" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="nm_user">username</label>
								<input class="form-control" type="text" name="nm_user" id="nm_user" placeholder="Username" required="">
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="password2">Password2</label>
								<input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password" required>
							</div>
                            <div class="form-group">
								<label class="control-label" for="level">Level</label>
								<select name="level" id="level" class="form-control">
									<option value="">-Pilih Level-</option>
									<option value="1">Administrator</option>
									<option value="2">RT</option>
									<option value="3">RW</option>
								</select>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="daftaradmin" value="daftar" onclick="cambiar_sign_up()">
							</div>
						</div>
					</form>

            	</div>
			</div>
			
		</div>
	</div>
</div>