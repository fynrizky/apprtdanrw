<div class="col-lg-12" style="text-align:left;">
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Edit Data Kelahiran</h2>
                </div>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                        <div class="form-group">
                            <label class="control-label" for="nama_ayah">Nama Ayah</label>
                            <input type="hidden" name="idkelahiran" id="idkelahiran">
                            <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                            <select name="nama_ayah" id="edit_nama_ayah" class="form-control myselect" style="width: 100%" required>
                                <option value="">-PILIH NAMA AYAH</option>
                                <?php if ($query->num_rows > 0) { ?>
                                <?php while ($data = $query->fetch_object()) { ?>
                                <option value="<?= $data->nama; ?>"><?php echo ucwords($data->nama); ?></option>
                                <?php 
                            } ?>
                                <?php 
                            } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_ibu">Nama Ibu</label>
                            <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                            <select name="nama_ibu" id="edit_nama_ibu" class="form-control myselect" style="width: 100%" required>
                                <option value="">-PILIH NAMA IBU</option>
                                <?php if ($query->num_rows > 0) { ?>
                                <?php while ($data = $query->fetch_object()) { ?>
                                <option value="<?= $data->nama; ?>"><?php echo ucwords($data->nama); ?></option>
                                <?php 
                            } ?>
                                <?php 
                            } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_balita">Nama Balita</label>
                            <input class="form-control" type="text" name="nama_balita" id="nama_balita" placeholder=" Nama Balita" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="hari_lahir">Hari Lahir</label>
                            <input class="form-control" type="text" name="hari_lahir" id="hari_lahir" placeholder="Hari Lahir" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tgl_l">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_l" id="tgl_l" value="<?= date('Y-m-d'); ?>" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
							<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">-PILIH</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                            </select>
						</div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-success" name="editkelahiran" value="Tambah" onclick="cambiar_sign_up()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/dist/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#editkelahiran", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
            var idkelahiran = $(this).data('id'); //data dari tombol edit barang yang data-id
            var nama_balita = $(this).data('nama_balita'); //data dari tombol edit barang yang data-nama
            var tempat_lahir = $(this).data('tempat_lahir'); //data dari tombol edit barang yang data-harga
            var hari_lahir = $(this).data('hari_lahir'); //data dari tombol edit barang yang data-stok
            var tanggal_lahir = $(this).data('tanggal_lahir'); //data dari tombol edit barang yang data-stok
            var jenis_kelamin = $(this).data('jenis_kelamin'); //data dari tombol edit barang yang data-stok
            var nama_ayah = $(this).data('ayah'); //data dari tombol edit barang yang data-stok
            var nama_ibu = $(this).data('ibu'); //data dari tombol edit barang yang data-stok

            $("#modal-edit #idkelahiran").val(idkelahiran); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #nama_balita").val(nama_balita); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #tempat_lahir").val(tempat_lahir); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #hari_lahir").val(hari_lahir);
            $("#modal-edit #tgl_l").val(tanggal_lahir);
            $("#modal-edit #jenis_kelamin").val(jenis_kelamin);
            $("#modal-edit #edit_nama_ayah").val(nama_ayah).select2({
                placeholder: '--PILIH NAMA AYAH--'
            });
            $("#modal-edit #edit_nama_ibu").val(nama_ibu).select2({
                placeholder: '--PILIH NAMA IBU--'
            });
        });


        $(document).ready(function(e) { //javascript siap jalankan
            $("#form").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
                e.preventDefault();
                $.ajax({
                    url: '../konten/transaksi/prosestransaksi/proses_edit_kelahiran.php',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) { //kalau sukses tampilkan sebagai berikut
                        $('.table').html(msg); //javascript carikan yang classnya table dihtml
                    }
                });
            }));
        });
    </script>

</div> 