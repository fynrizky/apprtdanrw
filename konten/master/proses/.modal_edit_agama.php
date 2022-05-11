<div class="col-lg-12" style="text-align:left;">
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Edit Agama</h2>
                </div>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                        <div class="form-group">
                            <label class="control-label" for="agama">Agama</label>
                            <input type="hidden" name="idagama" id="idagama">
                            <input class="form-control" type="text" name="agama" id="agama" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-warning" name="editagama" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/dist/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#editagama", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
            var idagama = $(this).data('id'); //data dari tombol edit barang yang data-id
            var agama = $(this).data('agama'); //data dari tombol edit barang yang data-nama
            $("#modal-edit #idagama").val(idagama); //#modal-edit/id modal edit diambil dari div modal-body
            $("#modal-edit #agama").val(agama);
        });


        $(document).ready(function(e) { //javascript siap jalankan
            $("#form").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
                e.preventDefault();
                $.ajax({
                    url: '../konten/master/proses/proses_edit_agama.php',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) { //kalau sukses tampilkan sebagai berikut
                        $('.table').html(msg); //javascript carikan yang classnya table dihtml kembalikan datanya
                    }
                });
            }));
        })
    </script>

</div> 