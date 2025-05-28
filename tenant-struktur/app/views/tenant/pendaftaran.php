    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/extensions/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/extensions/choices.js/public/assets/styles/choices.css">


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
    <script src="<?= BASEURL ?>/assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>

    <script>
        const pasien_baru = `
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
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="text" id="tgl_lahir" class="form-control fpckr" name="tgl_lahir" placeholder="Tanggal lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jk_pasien">Jenis Kelamin</label>
                                              <div class="form-group">
                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                        <input type="radio" class="btn-check" name="jenis_kelamin" id="jk_l" autocomplete="off" value="m" checked>
                                                        <label class="btn btn-outline-default" for="jk_l">Laki-Laki</label>

                                                        <input type="radio" class="btn-check" name="jenis_kelamin" id="jk_p" autocomplete="off" value="f" >
                                                        <label class="btn btn-outline-default" for="jk_p">Perempuan</label>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="choices form-select" id="status" name="status">
                                            <option value="belum menikah">Belum Menikah</option>
                                            <option value="menikah">Menikah</option>
                                            <option value="janda">Janda</option>
                                            <option value="duda">Duda</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Agama</label>
                                            <select class="choices form-select" id="agama" name="agama">
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katholik">Khatolik</option>
                                            <option value="budha">Budha</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="kepercayaan">Kepercayaan</option>
                                            <option value="lain-lain">Lain-Lain</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Kewarganegaraan</label>
                                            <select class="choices form-select" id="warga" name="warga">
                                            <option value="indonesia">Indonesia</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                       <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Pendidikan</label>
                                            <select class="choices form-select" id="pendidikan" name="pendidikan">
                                            <option value="s3">S3</option>
                                            
                                            </select>
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

        $(function() {

            $("#form_pendaftaran").html(pasien_baru);
            flatpickr("#tgl_lahir", {
                enableTime: false,
                dateFormat: "d-m-Y",
                disableMobile: true

            });
            var choice = document.querySelectorAll('.choices');
            var co;
            for (let i = 0; i < choice.length; i++) {

                co = new Choices(choice[i], {
                    sorter: function(a, b) {
                        return b.label.length - a.label.length;
                    }
                });

            }


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
            flatpickr("#tgl_lahir", {
                enableTime: false,
                dateFormat: "d-m-Y",
                disableMobile: true
            });
            var choice = document.querySelectorAll('.choices');
            var co;
            for (let i = 0; i < choice.length; i++) {

                co = new Choices(choice[i], {
                    sorter: function(a, b) {
                        return b.label.length - a.label.length;
                    }
                });

            }
        })
    </script>