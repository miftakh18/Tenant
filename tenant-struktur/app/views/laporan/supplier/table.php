<table class="table table striped text-center table-light" id="data_Table">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Tanggal Supplier Masuk</th>
            <th>Waktu Supplier Masuk</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['data_supplier_masuk'] as $no => $row) : ?>
            <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['nama_supplier']  ?></td>
                <td><?= date('d-m-Y', strtotime($row['waktu'])); ?></td>
                <td><?= date('H:i', strtotime($row['waktu'])); ?></td>

            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#data_Table").DataTable();
    })
</script>