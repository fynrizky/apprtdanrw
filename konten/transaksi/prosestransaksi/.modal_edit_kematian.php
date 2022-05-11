<div class="col-lg-12" style="text-align:left;">
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Edit Data Kematian</h2>
                </div>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                            <div class="form-group">
                                <label class="control-label" for="id_kk">Pilih Kepala Keluarga</label>
                                <input type="hidden" name="idkematian" id="idkematian">
                                <?php $query = $koneksi->query("SELECT * FROM tabel_kk"); ?>
                                <select name="id_kk" id="edit_id_kk" class="form-control myselect" style="width: 100%" required>
                                    <option value="">-PILIH KEPALA KELUARGA</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_kk; ?>"><?php echo ucwords($data->nama_kk); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="id_warga">Nama Warga</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                                <select name="id_warga" id="edit_id_warga" class="form-control myselect" style="width: 100%" required>
                                    <option value="">-PILIH NAMA WARGA</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_warga; ?>"><?php echo ucwords($data->nama); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="id_rtrw">RT/RW</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_rtrw"); ?>
                                <select name="id_rtrw" id="id_rtrw" class="form-control" style="width: 100%" required>
                                    <option value="">-PILIH RT/RW</option>
                                    <?php if ($query->num_rows > 0) { ?>
                                    <?php while ($data = $query->fetch_object()) { ?>
                                    <option value="<?= $data->id_rtrw; ?>"><?php echo strtoupper($data->rt); ?>/<?php echo strtoupper($data->rw); ?></option>
                                    <?php 
                                } ?>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
								<label class="control-label" for="sebab_kematian">Sebab Kematian</label>
								<textarea class="form-control" type="text" name="sebab_kematian" id="sebab_kematian" placeholder="Keterangan"></textarea>
							</div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-success" name="editkematian" value="Tambah" onclick="cambiar_sign_up()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/dist/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#editkematian", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
            var idkematian = $(this).data('id'); //data dari tombol edit barang yang data-id
            var id_kk = $(this).data('id_kk'); //data dari tombol edit barang yang data-nama
            var id_warga = $(this).data('id_warga'); //data dari tombol edit barang yang data-harga
            var id_rtrw = $(this).data('id_rtrw'); //data dari tombol edit barang yang data-stok
            var sebab_kematian = $(this).data('sebab_kematian'); //data dari tombol edit barang yang data-stok

            $("#modal-edit #idkematian").val(idkematian); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #edit_id_kk").val(id_kk).select2({
                placeholder: '--PILIH NAMA--'
            }); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #edit_id_warga").val(id_warga).select2({
                placeholder: '--PILIH NAMA--'
            }); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #id_rtrw").val(id_rtrw);
            $("#modal-edit #sebab_kematian").val(sebab_kematian);
            $("#modal-edit #jenis_kelamin").val(jenis_kelamin);
            
        });


        $(document).ready(function(e) { //javascript siap jalankan
            $("#form").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
                e.preventDefault();
                $.ajax({
                    url: '../konten/transaksi/prosestransaksi/proses_edit_kematian.php',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) { //kalau sukses tampilkan sebagai berikut
                        $('.table').html(msg); //javascript carikan yang classnya table dihtml kemudian kembalikan datanya ke element tersebut
                    }
                });
            }));
        });
    </script>

</div> 