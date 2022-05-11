<div class="col-lg-12" style="text-align:left;">
	<div id="edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Edit Warga</h2>
                </div>
					<form id="form" action="" method="post" enctype="multipart/form-data">
						<div class="modal-body" id="modal-edit">
							<div class="form-group">
								<label class="control-label" for="nik">NIK</label>
                                <input type="hidden" name="wrgid" id="wrgid">
								<input class="form-control" type="text" name="nik" id="nik">
							</div>
							<div class="form-group">
							<label class="control-label" for="rtrw">Pilih RT/RW</label>
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
								<label class="control-label" for="nama">Nama</label>
								<input class="form-control" type="text" name="nama" id="nama" >
							</div>
                            <div class="form-group">
								<label class="control-label" for="tmp_lahir">Tempat Lahir</label>
								<input class="form-control" type="text" name="tmp_lahir" id="tmp_lahir" >
							</div>
                            <div class="form-group">
								<label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
								<input class="form-control" type="date" name="tgl_lhr" id="tgl_lhr" value="<?= date('Y-m-d'); ?>">
							</div>
                            <div class="form-group">
								<label class="control-label" for="jns_kelamin">Jenis Kelamin</label>
                                <select name="jns_kelamin" id="jns_kelamin" class="form-control">
                                    <option value="">-PILIH</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            <div class="form-group">
								<label class="control-label" for="almt">Alamat</label>
								<input class="form-control" type="text" name="almt" id="almt">
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
								<input class="form-control" type="text" name="pkrjaan" id="pkrjaan">
							</div>
                            <div class="form-group">
								<label class="control-label" for="warganegara">Kewarganegaraan</label>
								<input class="form-control" type="text" name="warganegara" id="warganegara" >
							</div>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-warning" name="editw" value="Edit">
							</div>
						</div>
					</form>
			    </div>
		    </div>
	    </div>
        <script src="../assets/dist/js/jquery-1.10.2.js"></script>
		<script type="text/javascript">
		$(document).on("click", "#editwarga", function() {// javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
			var idw = $(this).data('id'); //data dari tombol edit barang yang data-id
			var nik = $(this).data('nik');//data dari tombol edit barang yang data-nama
			var rtrw = $(this).data('rtrw');//data dari tombol edit barang yang data-nama
			var nama = $(this).data('nama');//data dari tombol edit barang yang data-harga
			var tmplahir = $(this).data('tmplahir');//data dari tombol edit barang yang data-stok
			var tgllhr = $(this).data('tgllhr');//dst
			var jnskelamin = $(this).data('jnskelamin')//dst
			var almt = $(this).data('almt');//dst
			var agm = $(this).data('agm');//dst
			var sttskawin = $(this).data('sttskawin');//dst
			var pkrjaan = $(this).data('pkrjaan');//dst
			var wrgngr = $(this).data('wrgngr');//dst
    							$("#modal-edit #wrgid").val(idw);//#modal-edit/id modal edit diambil dari div modal-body
    							$("#modal-edit #nik").val(nik);
    							$("#modal-edit #rtrw").val(rtrw);
    							$("#modal-edit #nama").val(nama);
    							$("#modal-edit #tmp_lahir").val(tmplahir);
    							$("#modal-edit #tgl_lhr").val(tgllhr);
    							$("#modal-edit #jns_kelamin").val(jnskelamin);
    							$("#modal-edit #almt").val(almt);
    							$("#modal-edit #agm").val(agm);
    							$("#modal-edit #sttsnikah").val(sttskawin);
    							$("#modal-edit #pkrjaan").val(pkrjaan);
    							$("#modal-edit #warganegara").val(wrgngr);
    						});

	
			$(document).ready(function(e) {//javascript siap jalankan
			$("#form").on("submit", (function(e) {//javascript carikan id form yang ketika disubmit jalankan sebagai berikut
				e.preventDefault();
				$.ajax({
					url : '../konten/transaksi/prosestransaksi/proses_edit_warga.php',
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