<!-- input -->
<div class="modal fade" id="add_modal_supp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="frm_supl">
                <div class="modal-header">
                    <h5 class="modal-title">ADD Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label">Kode Supplier</label>
                        <input type="text" class="form-control form-control-sm" id="id_sups" name="id_sups" readonly>
                    </div>
                    <div class="mb-3">

                        <label class="form-label">Nama Supplier</label>
                        <input class="form-control form-control-sm" type="text" name="nama_supplier" id="nama_supplier" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Supplier</label>
                        <textarea name="alamat_supplier" id="alamat_supplier" cols="30" rows="10" class="form-control form-control-sm" required>
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="telp_sup" name="telp_sup" placeholder="contoh:8123456790" required onkeypress="return event.charCode >= 48 && event.charCode <=57">

                        </div>
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

<!-- edit -->
<div class="modal fade" id="edit_modal_supp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="frm_supl_ed">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <input type="hidden" id="id_sups_edit" name="id_sups_edit">
                        <label class="form-label">Nama Supplier</label>
                        <input class="form-control form-control-sm" type="text" name="nama_supplier_ed" id="nama_supplier_ed" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Supplier</label>
                        <textarea name="alamat_supplier_ed" id="alamat_supplier_ed" cols="30" rows="10" class="form-control form-control-sm" required>
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="telp_sup_ed" name="telp_sup_ed" placeholder="contoh:8123456790" required onkeypress="return event.charCode >= 48 && event.charCode <=57">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Active</label>
                        <!-- <select name="active_sup" id="active_sup" class="form-select" required>
                            <option value="">Pilih Active</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select> -->

                        <div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                                <input type="radio" class="btn-check" name="active_sup" id="ya" autocomplete="off" value="ya" checked>
                                <label class="btn btn-outline-success" for="ya">Ya</label>

                                <input type="radio" class="btn-check" name="active_sup" id="tidak" autocomplete="off" value="tidak">
                                <label class="btn btn-outline-danger" for="tidak">Tidak</label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white btn-sm" style="background:#29c7ca">Update </button>
                </div>
            </form>
        </div>
    </div>
</div>





<script>
    $("#frm_supl").submit(function(e) {
        e.preventDefault();
        data_frm = $(this).serialize();
        $.ajax({
            url: '<?= BASEURL ?>/supplier/input_masSup',
            type: 'POST',
            data: data_frm,
            dataType: 'json',
            cache: false,
            success: function(res) {
                if (res.logo_sp == 'success') {
                    Swal.fire({
                        icon: res.logo_sp,
                        title: res.pesan_sp
                    });

                    $('#frm_supl')[0].reset();
                    $('#add_modal_supp').modal('hide');
                    Supplier();

                } else {
                    Swal.fire({
                        icon: res.logo_sp,
                        title: res.pesan_sp
                    });
                }
            }
        })
    });


    $(document).on('click', '#edit_m_ssup', function() {
        data = $(this).data('editspm');
        $("#id_sups_edit").val(data);


        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/supplier/getById',
            data: {
                id_sp: data
            },
            dataType: 'json',
            success: function(res) {
                $("#nama_supplier_ed").val(res.nama_supplier);
                $("#alamat_supplier_ed").val(res.alamat_supplier);
                $("#telp_sup_ed").val(res.kontak_supplier);
                $("input:radio[name=active_sup][value=" + res.active + "]")[0].checked = true;

            }
        })
    });



    $("#frm_supl_ed").submit(function(e) {
        e.preventDefault();
        data = $(this).serialize();

        $.ajax({
            url: '<?= BASEURL ?>/supplier/UpdateMSup',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(res) {
                if (res.logo_sp_ed == 'success') {
                    Swal.fire({
                        icon: res.logo_sp_ed,
                        title: res.pesan_sp_ed
                    });

                    $('#frm_supl_ed')[0].reset();
                    $('#edit_modal_supp').modal('hide');
                    Supplier();

                } else {
                    Swal.fire({
                        icon: res.logo_sp_ed,
                        title: res.pesan_sp_ed
                    });
                }
            }
        })
    })




    // delete


    // delete data 

    $(document).on('click', '#delete_ssup', function() {
        hapus_Supp = $(this).data('hapussupp');
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
                    url: '<?= BASEURL ?>/supplier/DeleteSup',
                    data: {
                        hapus_Supp: hapus_Supp
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(res) {
                        if (res.logo_sp_del == 'success') {
                            Swal.fire({
                                icon: res.logo_sp_del,
                                title: res.logo_sp_del
                            });
                            Supplier();
                        } else {
                            Swal.fire({
                                icon: res.logo_sp_del,
                                title: res.logo_sp_del
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