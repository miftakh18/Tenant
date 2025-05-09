<!-- tambah data -->

<div class="modal" tabindex="-1" id="tambah" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_add">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi Barang Masuk</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3" hidden>
                        <label class="form-label">Tanggal </label>
                        <input class="form-control form-control-sm" type="date" required id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Transaksi Masuk </label>

                        <input type="text" id="id_tm" name="id_tm" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang </label>
                        <select class="form-select form-select-sm" id="nama_barang" name="nama_barang" required>
                            <option selected disabled value="">pilih </option>

                            <?php foreach ($data['data_barang'] as $no => $row) : ?>
                                <option value="<?= $row['id_barang'] ?>"><?= $row['nama_barang'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <select class="form-select form-select-sm" id="nama_supplier" name="nama_supplier" required>
                            <option selected disabled value="">pilih </option>

                            <?php foreach ($data['data_supplier'] as $no => $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama_supplier'] ?></option>
                            <?php endforeach ?>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Barang Masuk</label>
                        <input class="form-control form-control-sm" type="number" required id="jumlah_masuk" name="jumlah_masuk" onkeypress="return event.charCode >= 48 && event.charCode <=57">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm text-white" style="background:#29c7ca">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- tutup tambah data -->
<!-- buka edit -->

<div class="modal" tabindex="-1" id="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_edit">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaksi Barang Masuk</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3" hidden>
                        <input type="hidden" id="id_masuk" name="id_masuk">
                        <label class="form-label">Tanggal </label>
                        <input class="form-control form-control-sm" type="date" required id="tanggal_edit" name="tanggal_edit">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Barang </label>
                        <select class="form-select form-select-sm" id="validationCustom04" required id="nama_barang_edit_masuk" name="nama_barang_edit_masuk">
                            <option disabled value="">pilih </option>

                            <?php foreach ($data['data_barang'] as $no => $row) : ?>
                                <option value="<?= $row['id_barang'] ?>"><?= $row['nama_barang'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <select class="form-select form-select-sm" id="nama_supplier_ed" name="nama_supplier_ed" required>
                            <option selected disabled value="">pilih </option>

                            <?php foreach ($data['data_supplier'] as $no => $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama_supplier'] ?></option>
                            <?php endforeach ?>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Barang Masuk</label>
                        <input class="form-control form-control-sm" type="number" required id="jumlah_masuk_edit" name="jumlah_masuk_edit" onkeypress="return event.charCode >= 48 && event.charCode <=57">

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

<!-- tutup edit -->



<script>
    $('#form_add').on('submit', function(e) {
        e.preventDefault();
        Data_masuk = $('#form_add').serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_masuk/insertData',

            data: Data_masuk,
            dataType: 'json',
            success: function(res) {

                if (res.respon_tambah == 'success') {
                    Swal.fire({
                        icon: res.respon_tambah,
                        title: res.messages
                    });

                    $('#form_add')[0].reset();
                    $('#tambah').modal('hide');
                    Data();
                } else {
                    Swal.fire({
                        icon: res.respon_tambah,
                        title: res.messages
                    });
                }
            }

        });

    });

    $(document).on("click", "#edit_masuk", function() {
        var data_edit = $(this).data('editmasuk');
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_masuk/getEdit',
            data: {
                edit_data: data_edit
            },
            dataType: 'json',

            success: function(e) {
                $("#id_masuk").val(e.id);
                $("#tanggal_edit").val(e.tanggal);
                $("#nama_barang_edit_masuk").val(e.id_barang);
                $("#nama_supplier_ed").val(e.id_supplier);
                $("#jumlah_masuk_edit").val(e.jumlah_masuk);

            }
        });
    });


    $('#form_edit').on('submit', function(e) {
        e.preventDefault();
        Data_masuk = $('#form_edit').serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_masuk/UpdateData',

            data: Data_masuk,
            dataType: 'json',
            success: function(res) {

                if (res.respon_update == 'success') {
                    Swal.fire({
                        icon: res.respon_update,
                        title: res.messages_update
                    });

                    $('#form_edit')[0].reset();
                    $('#edit').modal('hide');
                    Data();
                } else {
                    Swal.fire({
                        icon: res.respon_update,
                        title: res.messages_update
                    });
                }
            }

        });

    });


    $(document).on('click', '#delete_masuk', function() {
        var hapus = $(this).data('hapus');
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
                    url: '<?= BASEURL ?>/data_barang_masuk/deleteData',
                    data: {
                        hapus: hapus
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(res) {
                        if (res.respon_hapus == 'success') {
                            Swal.fire({
                                icon: res.respon_hapus,
                                title: res.messages_hapus
                            });
                            Data();
                        } else {
                            Swal.fire({
                                icon: res.responJenisDelete,
                                title: res.messages_hapus
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