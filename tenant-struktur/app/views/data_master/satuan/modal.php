<!-- add satuan -->
<div class="modal" tabindex="-1" id="tambah" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="frm_satuan">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label">Kode Satuan </label>
                        <input type="text" class="form-control form-control-sm" id="id_sat" name="id_sat" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Satuan </label>
                        <input class="form-control form-control-sm" type="text" required id="nama_satuan" name="nama_satuan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm text-white" style="background:#29c7ca">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- tutup add satuan  -->

<!-- edit satuan -->

<div class="modal" tabindex="-1" id="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="frm_edit_satuan">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Satuan </label>
                        <input type="hidden" id="id_satuan" name="id_satuan">
                        <input class="form-control form-control-sm" type="text" required id="nama_edit_satuan" name="nama_edit_satuan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Active</label>
                        <!-- <select name="active_satuan" id="active_satuan" class="form-select" required>
                            <option value="">Pilih Active</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select> -->

                        <div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                                <input type="radio" class="btn-check" name="active_satuan" id="ya" autocomplete="off" value="ya" checked>
                                <label class="btn btn-outline-success" for="ya">Ya</label>

                                <input type="radio" class="btn-check" name="active_satuan" id="tidak" autocomplete="off" value="tidak">
                                <label class="btn btn-outline-danger" for="tidak">Tidak</label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm text-white" style="background:#29c7ca">Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- tutup edit satuan -->

<script>
    $(document).on('click', '#satuan', function() {
        $('#masuk').html('Save');
        $('#frm_satuan').on('submit', function(e) {

            e.preventDefault();

            data = $('#frm_satuan').serialize();
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL ?>/satuan/InsertData',
                data: data,
                dataType: 'json',
                cache: false,
                success: function(res) {
                    if (res.res == 'success') {
                        Swal.fire({
                            icon: res.res,
                            title: res.msg
                        });

                        $('#frm_satuan')[0].reset();
                        $('#tambah').modal('hide');
                        satuan();

                    } else {
                        Swal.fire({
                            icon: res.res,
                            title: res.msg
                        });
                    }
                }
            });
        })

    });


    $(document).on('click', '#edit_satuan', function() {
        $('#masuk').html('Update');
        data = $(this).data('edit');
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/satuan/editData',
            data: {
                data: data
            },
            dataType: 'json',
            cache: false,
            success: function(res) {
                $('#id_satuan').val(res.id);
                $('#nama_edit_satuan').val(res.nama_satuan);
                $("input:radio[name=active_satuan][value=" + res.active + "]")[0].checked = true;

            }
        });

    });


    $('#frm_edit_satuan').on('submit', function(e) {
        e.preventDefault();
        data = $('#frm_edit_satuan').serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/satuan/UpdateData',
            data: data,
            dataType: 'json',
            cache: false,
            success: function(res) {
                if (res.res == 'success') {
                    Swal.fire({
                        icon: res.res,
                        title: res.msg
                    });

                    $('#frm_edit_satuan')[0].reset();
                    $('#edit').modal('hide');
                    satuan();

                } else {
                    Swal.fire({
                        icon: res.res,
                        title: res.msg
                    });
                }
            }
        });
    });





    // delete data 

    $(document).on('click', '#delete_satuan', function() {
        var hapus = $(this).data('hapus');
        Swal.fire({
            title: 'Apakah Anda Sudah Yakin?',
            text: "ingin Menghapus Data ini !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= BASEURL ?>/satuan/deleteData',
                    data: {
                        hapus: hapus
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(res) {
                        if (res.resS == 'success') {
                            Swal.fire({
                                icon: res.resS,
                                title: res.msgS
                            });
                            satuan();
                        } else {
                            Swal.fire({
                                icon: res.resS,
                                title: res.msgS
                            });
                        }
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Data Batal Di Delete ',
                    '',
                    'error'
                )
            }
        })

    });
</script>