<div class="card shadow">
    <div class="card-body ">


        <div class=" d-flex justify-content-center">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="status_pasien" id="pasien_baru" autocomplete="off" data-pendaftaran="pasien_baru" checked>
                <label class="btn btn-outline-default" for="pasien_baru">Pasien Baru</label>

                <input type="radio" class="btn-check" name="status_pasien" id="pasien_lama" autocomplete="off" data-pendaftaran="pasien_lama">
                <label class="btn btn-outline-default" for="pasien_lama">Pasien Lama</label>
            </div>
        </div>

        <form id="form_pendaftaran">

        </form>
    </div>
</div>


<script>
    $(function() {
        pasien_baru = `
        <div class="card my-4 border border-default ">
                    <div class="card-header d-flex justify-content-center">
                        <h4 class="card-title">FORMULIR PASIEN BARU</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap <i>( sesuai identitas )</i> </label>
                                            <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kartu_identitas">Nomor KTP / SIM / Passport</label>
                                            <input type="text" id="kartu_identitas" class="form-control" placeholder="No. KTP / SIM / Passport" name="kartu_identitas">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" placeholder="Tanggal lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class="form-check-input" checked="">
                                                <label for="checkbox5">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-default me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`;
        $("#form_pendaftaran").html(pasien_baru);
    })

    $("input[name='status_pasien']").on("click", function() {
        $("#form_pendaftaran").html('');
        let pasien = $(this).data('pendaftaran');

        let form = pasien_baru;
        if (pasien == 'pasien_baru') {
            form = pasien_baru;
        } else {
            form = '';
        }
        $("#form_pendaftaran").html(form);
    })
</script>