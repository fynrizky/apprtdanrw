<div class="col-lg-12" style="text-align:left;">
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Tambah Data Kelahiran</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="id_kk">Pilih Kepala Keluarga</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_kk"); ?>
                                <select name="id_kk" id="id_kk" class="form-control myselect" style="width: 100%" required>
                                    <option value="">-PILIH NAMA AYAH</option>
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
                                <label class="control-label" for="nama_ayah">Nama Ayah</label>
                                <?php $query = $koneksi->query("SELECT * FROM tabel_warga"); ?>
                                <select name="nama_ayah" id="nama_ayah" class="form-control myselect" style="width: 100%" required>
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
                                <select name="nama_ibu" id="nama_ibu" class="form-control myselect" style="width: 100%" required>
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
                                <input type="submit" class="btn btn-success" name="tambahkelahiran" value="Tambah" onclick="cambiar_sign_up()">
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['tambahkelahiran'])) {
                        $nama_balita = $koneksi->real_escape_string($_POST['nama_balita']);
                        $tempat_lahir = $koneksi->real_escape_string($_POST['tempat_lahir']);
                        $hari_lahir = $koneksi->real_escape_string($_POST['hari_lahir']);
                        $tanggal_lahir = $koneksi->real_escape_string($_POST['tgl_l']);
                        $jenis_kelamin = $koneksi->real_escape_string($_POST['jenis_kelamin']);
                        $nama_ayah = $koneksi->real_escape_string($_POST['nama_ayah']);
                        $nama_ibu = $koneksi->real_escape_string($_POST['nama_ibu']);

                        $koneksi->query("INSERT INTO tabel_kelahiran VALUES('','$nama_balita','$tempat_lahir','$hari_lahir','$tanggal_lahir','$jenis_kelamin','$nama_ayah','$nama_ibu')");
                        echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=listkelahiran';</script>";
                    }

                    ?>

                </div>
            </div>

        </div>
    </div>
</div> 