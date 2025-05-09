<!-- tambah data -->
<div class="modal" tabindex="-1" id="tambah" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="form_data_barang">
                <!-- enctype="multipart/form-data" -->
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label">Kode Barang </label>
                        <input type="text" id="id_co" name="id_co" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input class="form-control form-control-sm" type="text" required id="nama_barang" name="nama_barang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Merk Barang</label>
                        <input class="form-control form-control-sm" type="text" required id="merk_barang" name="merk_barang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Barang </label>
                        <select class="form-select form-select-sm" required id="jenis_barang" name="jenis_barang">
                            <option selected disabled value="">pilih</option>
                            <?php foreach ($data['jenis'] as $jenis) : ?>
                                <option value="<?= $jenis['id'] ?>"><?= $jenis['nama_jenis'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">satuan </label>
                        <select class="form-select form-select-sm" required id="satuan_barang" name="satuan_barang">
                            <option selected disabled value="">pilih </option>
                            <?php foreach ($data['satuan'] as $satuan) : ?>
                                <option value="<?= $satuan['id'] ?>"><?= $satuan['nama_satuan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input class="form-control form-control-sm" type="file" required id="upload_file" name="upload_file">
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

<!-- tutup  tambah data -->





<!-- buka edit data -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_edit_barang">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="hidden" id="id_ed" name="id_ed">
                        <input class="form-control form-control-sm" type="text" required id="nama_barang_edit" name="nama_barang_edit">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Merk Barang</label>
                        <input class="form-control form-control-sm" type="text" required id="merk_barang_edit" name="merk_barang_edit">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Barang </label>
                        <select class="form-select form-select-sm" id="jenis_barang_edit" name="jenis_barang_edit" required>
                            <option selected disabled value="">pilih </option>
                            <?php foreach ($data['jenis'] as $jenis) : ?>
                                <option value="<?= $jenis['id'] ?>"><?= $jenis['nama_jenis'] ?></option>
                            <?php endforeach ?>


                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">satuan </label>
                        <select class="form-select form-select-sm" required id="satuan_barang_edit" name="satuan_barang_edit">
                            <option selected disabled value="">pilih </option>
                            <?php foreach ($data['satuan'] as $satuan) : ?>
                                <option value="<?= $satuan['id'] ?>"><?= $satuan['nama_satuan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="input-group input-group-sm mb-3">
                            <input class="form-control form-control-sm " type="file" id="upload_file" name="upload_file">

                            <input id="gambar_lama" class="form-control" name="gambar_lama" placeholder="Pilih File..." type="hidden" readonly />
                            <!-- <input type="text" id="gambar_lama" name="gambar_lama"> -->
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Active</label>
                        <!-- <select name="active" id="active" class="form-select" required>
                            <option value="">Pilih Active</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select> -->
                        <div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                                <input type="radio" class="btn-check" name="active" id="ya" autocomplete="off" value="ya" checked>
                                <label class="btn btn-outline-success" for="ya">Ya</label>

                                <input type="radio" class="btn-check" name="active" id="tidak" autocomplete="off" value="tidak">
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
<!-- tutup edit data -->

<script>
    // tambah data part 2


    $("#form_data_barang").on('submit', function(e) {
        e.preventDefault();
        // const fileUpload = $("#upload_file").prop("files")[0];
        var DataFile = $("#form_data_barang")[0];
        data = new FormData(DataFile);

        $.ajax({
            type: 'POST',
            url: "<?php echo BASEURL ?>/data_barang/tambah_data",
            enctype: "multipart/form-data",
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(res) {

                Swal.fire({
                    icon: res.respon_tambah,
                    title: res.messages
                });

                $('#form_data_barang')[0].reset();
                $('#tambah').modal('hide');
                data_barang();

            },
            error: function(res) {
                Swal.fire({
                    icon: res.respon_tambah,
                    title: res.messages
                });
            }
        });




    })



    // edit Data
    $(document).on('click', '#edit_barang', function() {
        var edit = $(this).data('edit');
        $.ajax({
            url: '<?= BASEURL ?>/data_barang/edit_data',
            type: 'POST',
            data: {
                edit: edit
            },
            dataType: 'json',
            success: function(response) {
                $('#id_ed').val(response.id);
                $('#nama_barang_edit').val(response.nama_barang);
                $('#merk_barang_edit').val(response.merk_barang);
                $('#jenis_barang_edit').val(response.jenis_barang);
                $('#satuan_barang_edit').val(response.satuan);
                $('#gambar_lama').val(response.gambar);
                $("input:radio[name=active][value=" + response.active + "]")[0].checked = true;
            }
        });
    });

    $(document).on("change", "#upload_file", function() {
        isi = $(this).val();
        var nama = isi.files;
        for (var i = 0; i < nama.length; i++) {
            $("#gambar_lama").val(nama[i].name);
        }

    });

    // update data_barang
    $("#form_edit_barang").on("submit", function(e) {
        e.preventDefault();
        var DataFile = $("#form_edit_barang")[0];
        DataForm = new FormData(DataFile);
        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang/update_data',
            data: DataForm,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(res) {
                if (res.respon_edit == 'success') {
                    Swal.fire({
                        icon: res.respon_edit,
                        title: res.messages_edit
                    });

                    $('#form_edit_barang')[0].reset();
                    $('#edit').modal('hide');
                    data_barang();

                } else {
                    Swal.fire({
                        icon: res.respon_edit,
                        title: res.messages_edit
                    });
                }
            }
        });
    });

    // delete data 

    $(document).on('click', '#delete_barang', function() {
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
                    url: '<?= BASEURL ?>/data_barang/delete_data',
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
                            data_barang();
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