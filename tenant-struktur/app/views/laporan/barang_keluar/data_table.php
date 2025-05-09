<div class="table-responsive">
    <table class="table table-bordered table-light table-hover display" id="table_dat">
        <thead class="table-dark">
        </thead>


    </table>
</div>

<script>
    $(document).ready(function() {
        var no = 0;
        $("#table_dat").dataTable({
            ajax: {
                url: "<?= BASEURL ?>/barang_keluar/Table"

            },
            "deferRender": true,
            columns: [{
                    "data": null,
                    "title": "No",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    "title": "Tanggal",
                    "data": "tanggal"
                },
                {
                    "name": "tiga",
                    "title": "Nama Barang",
                    "data": "nama_barang",

                }, {
                    "title": "Jumlah Barang",
                    "data": "jumlah_keluar"
                }
            ],
            rowsGroup: [
                'first:name'
            ],
            "order": [
                [1, 'asc']
            ],
            lengthMenu: [5, 10, 25, 50]

        });


    });
</script>