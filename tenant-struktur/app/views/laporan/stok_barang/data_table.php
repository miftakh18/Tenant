<thead class="table-dark">
    <tr>
        <th scope="col">No</th>
        <th scope="col">ID Barang</th>
        <th scope="col">Merk Barang</th>
        <th scope="col">Jenis Barang</th>
        <th scope="col">Stok </th>
        <th scope="col"> Satuan</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($data['data'] as $no => $table) : ?>
        <tr>
            <td><?= $no + 1; ?></td>
            <td><?= $table['id_barang']; ?></td>
            <td><?= $table['merk_barang']; ?></td>
            <td><?= $table['jenis_barang']; ?></td>
            <td><?= $table['stok']; ?></td>
            <td><?= $table['satuan']; ?></td>




        </tr>
    <?php endforeach ?>



</tbody>



<script>
    $("#tableData").dataTable({
        lengthMenu: [5, 10, 25, 50]

    });
</script>