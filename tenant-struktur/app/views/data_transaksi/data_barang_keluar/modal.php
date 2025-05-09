<div class="modal" tabindex="-1" id="tambah" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="add_frm">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Request Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3" hidden>

                        <label class="form-label">Tanggal </label>
                        <input class="form-control form-control-sm" type="hidden" id="tanggal" name="tanggal" required value="<?= date('Y-m-d') ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <input type="text" id="id_kel" name="id_kel" class="form-control form-control-sm" readonly>
                        <label class="form-label"> Nama Barang </label>
                        <div id="nama_barang_keluar">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Barang Keluar</label>
                        <input class="form-control form-control-sm" type="number" id="jumlah_keluar" name="jumlah_keluar" min="0" required onkeypress="return event.charCode >= 48 && event.charCode <=57">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn  btn-sm text-white" style="background:#29c7ca">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- buka edit -->
<div class="modal" tabindex="-1" id="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_edit_keluar">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaksi Keluar</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <input type="hidden" id="id_keluar" name="id_keluar">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Barang </label>
                        <select class="form-select form-select-sm" id="validationCustom04" required id="nama_barang_edit_keluar" name="nama_barang_edit_keluar">
                            <option disabled value="">pilih </option>

                            <?php foreach ($data['data_barang'] as $no => $row) : ?>
                                <option value="<?= $row['id_barang'] ?>"><?= $row['nama_barang'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Barang Keluar</label>
                        <input class="form-control form-control-sm" type="number" required id="jumlah_keluar_edit" name="jumlah_keluar_edit" onkeypress="return event.charCode >= 48 && event.charCode <=57">

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
    // insert
    $("#add_frm").on('submit', function(e) {
        e.preventDefault();

        Data = $("#add_frm").serialize();
        $.ajax({
            url: '<?= BASEURL ?>/data_barang_keluar/insertData',
            type: 'POST',
            data: Data,
            dataType: 'json',
            success: function(res) {
                if (res.respon_tambah == 'success') {
                    Swal.fire({
                        icon: res.respon_tambah,
                        title: res.messages
                    });

                    $('#add_frm')[0].reset();
                    $('#tambah').modal('hide');
                    data_keluar();
                    nama_barang();

                } else {
                    Swal.fire({
                        icon: res.respon_tambah,
                        title: res.messages
                    });
                }
            }
        });

    });


    // get data


    $(document).on('click', '#edit_keluar', function() {

        data = $(this).data('editkeluar');
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_keluar/getEdit',
            data: {
                edit_data: data
            },
            dataType: 'json',
            cache: false,
            success: function(res) {
                $('#id_keluar').val(res.id);
                $("#tanggal_edit").val(res.tanggal);
                $('#nama_barang_edit_keluar').val(res.nama_barang);
                $("#jumlah_keluar_edit").val(res.jumlah_keluar);
            }
        });

    });

    $(document).on('change', '#nama_barang', function() {
        nilai = $(this).val();
        $.ajax({
            url: '<?= BASEURL ?>/data_barang_keluar/getJumlah_barang',
            type: 'POST',
            data: {
                data: nilai
            },
            dataType: 'json',
            success: function(res) {
                $("#jumlah_keluar , #jumlah_keluar_edit").attr('max', res.stok);
                // $("#jumlah_keluar").attr('min', 0);

                // alert(res);
            }
        })


    });
    $('#form_edit_keluar').on('submit', function(e) {
        e.preventDefault();
        Data_masuk = $('#form_edit_keluar').serialize();
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_keluar/UpdateData',

            data: Data_masuk,
            dataType: 'json',
            success: function(res) {

                if (res.respon_update == 'success') {
                    Swal.fire({
                        icon: res.respon_update,
                        title: res.messages_update
                    });

                    $('#form_edit_keluar')[0].reset();
                    $('#edit').modal('hide');
                    data_keluar();
                    nama_barang();
                } else {
                    Swal.fire({
                        icon: res.respon_update,
                        title: res.messages_update
                    });
                }
            }

        });
    });



    // delete
    $(document).on('click', '#delete_keluar', function() {
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
                    url: '<?= BASEURL ?>/data_barang_keluar/deleteData',
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
                            data_keluar();
                            nama_barang();

                        } else {
                            Swal.fire({
                                icon: res.respon_hapus,
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


    $(document).on('click', '#accept_keluar', function() {
        var acccept = $(this).data('accept');
        Swal.fire({
            title: 'Apakah Anda Sudah Siapkan Barang?',
            text: "Tekan Accept Jika sudah!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4ed4dd',
            cancelButtonColor: '#d33',
            confirmButtonText: 'accept',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    type: 'POST',
                    url: '<?= BASEURL ?>/data_barang_keluar/acceptData',
                    data: {
                        acccept: acccept
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(res) {
                        if (res.respon_accept == 'success') {
                            Swal.fire({
                                icon: res.respon_accept,
                                title: res.messages_accept
                            });
                            data_keluar();
                            nama_barang();

                        } else {
                            Swal.fire({
                                icon: res.responJenisDelete,
                                title: res.messages_accept
                            });
                        }
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Data Batal Di Accept ',
                    '',
                    'error'
                )
            }
        })

    });
</script>