<div class="modal" tabindex="-1" id="tambah_modal_jenis" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="frm_jenis">
                <div class="modal-header">

                    <h5 class="modal-title">Tambah Jenis Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label">Kode Jenis Barang</label>
                        <input type="text" class="form-control form-control-sm" id="id_jen" name="id_jen" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Jenis Barang</label>
                        <input class="form-control form-control-sm" type="text" name="nama_jenis" id="nama_jenis" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white btn-sm" style="background:#29c7ca">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="edit_modal_jenis" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="frm_edit_jenis">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Jenis Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label">Nama Jenis Barang</label>
                        <input class="form-control form-control-sm" type="text" name="nama_jenis_edit" id="nama_jenis_edit" required>
                        <input class="form-control form-control-sm" type="hidden" name="id_jenis_edit" id="id_jenis_edit" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Active</label>
                        <!-- <select name="active_jen" id="active_jen" class="form-select" required>
                            <option value="">Pilih Active</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select> -->
                        <div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                                <input type="radio" class="btn-check" name="active_jen" id="ya" autocomplete="off" value="ya" checked>
                                <label class="btn btn-outline-success" for="ya">Ya</label>

                                <input type="radio" class="btn-check" name="active_jen" id="tidak" autocomplete="off" value="tidak">
                                <label class="btn btn-outline-danger" for="tidak">Tidak</label>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white btn-sm" style="background:#29c7ca"> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // insert


    $("#frm_jenis").on('submit', function(e) {
        e.preventDefault();
        var DataForm = $("#frm_jenis").serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/jenis_barang/insertJenis',
            data: DataForm,
            dataType: 'json',
            cache: false,
            success: function(res) {
                if (res.responJenis == 'success') {
                    Swal.fire({
                        icon: res.responJenis,
                        title: res.messageJenis
                    });

                    $('#frm_jenis')[0].reset();
                    $('#tambah_modal_jenis').modal('hide');
                    data();

                } else {
                    Swal.fire({
                        icon: res.responJenis,
                        title: res.messageJenis
                    });
                }
            }
        });
    });


    // edit

    $(document).on('click', '#edit_jenis', function() {
        edit = $(this).data('editjenis');
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/jenis_barang/GetEditJenis',
            data: {
                edit_data: edit
            },
            dataType: 'json',
            cache: false,
            success: function(res) {
                $('#id_jenis_edit').val(res.id);
                $('#nama_jenis_edit').val(res.nama_jenis);
                $("input:radio[name=active_jen][value=" + res.active + "]")[0].checked = true;

            }
        });

    });


    // update
    $("#frm_edit_jenis").on('submit', function(e) {
        e.preventDefault();
        var DataForm = $("#frm_edit_jenis").serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/jenis_barang/UpdateJenis',
            data: DataForm,
            dataType: 'json',
            cache: false,
            success: function(res) {
                if (res.responJenisEdit == 'success') {
                    Swal.fire({
                        icon: res.responJenisEdit,
                        title: res.messageJenisEdit
                    });

                    $('#frm_edit_jenis')[0].reset();
                    $('#edit_modal_jenis').modal('hide');
                    data();

                } else {
                    Swal.fire({
                        icon: res.responJenisEdit,
                        title: res.messageJenisEdit
                    });
                }
            }
        });
    });


    // delete data 

    $(document).on('click', '#delete_jenis', function() {
        hapus_Jenis = $(this).data('hapusjenis');
        Swal.fire({
            title: 'Apakah Anda Sudah Yakin?',
            text: "ingin Menghapus Data ini !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#29c7ca',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    type: 'POST',
                    url: '<?= BASEURL ?>/jenis_barang/DeleteJenis',
                    data: {
                        hapus_jenis: hapus_Jenis
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(res) {
                        if (res.responJenisDelete == 'success') {
                            Swal.fire({
                                icon: res.responJenisDelete,
                                title: res.messageJenisDelete
                            });
                            data();
                        } else {
                            Swal.fire({
                                icon: res.responJenisDelete,
                                title: res.messageJenisDelete
                            });
                        }
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Data Batal Di Delete ',
                    '',
                    'error'
                )
            }
        });

    });
</script>