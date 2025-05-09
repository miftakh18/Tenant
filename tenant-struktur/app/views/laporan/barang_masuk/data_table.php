<div class="table-responsive">
    <table class="table table-bordered table-light table-hover" id="table_datas">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="20px">No</th>
                <th scope="col">Tanggal</th>

                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Masuk</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $no => $t) : ?>
                <tr>
                    <th scope="row"><?= $no + 1; ?></th>
                    <td><?= date('d-m-Y', strtotime($t['tanggal'])) ?></td>
                    <td><?= $t['nama_barang'] ?></td>
                    <td><?= $t['jumlah_masuk'] . ' ' . $t['nama_satuan']  ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {

        $("#table_datas").DataTable({
            lengthMenu: [5, 10, 25, 50]

        });
        // ModalBarang();
    });
</script>