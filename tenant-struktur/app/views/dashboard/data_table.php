<style>
    .bg-merah {
        background-color: #da1602;
    }

    .bg-kuning {
        background-color:
            #debc00;
    }
</style>
<table class="table table-bordered table-light" id="dataDashboard">
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
        <?php foreach ($data['data'] as $no => $table) :
            $cek  = $data['cek']->cekKetersediaan($table['id_barang']);

            // $class = '';
            if ($cek['stok'] <= 0) {
                $class = 'bg-danger text-white fst-italic';
                $bg = '#da1602';
            } elseif ($cek['stok'] <= 20) {
                $class = 'bg-warning text-black fst-italic';
                $bg = '#debc00';
            } else {
                $class = '';
            } ?>
            <tr class="<?= $class ?>">



                <td class="<?= $class ?>"><?= $no + 1; ?></td>
                <td class="<?= $class ?>"><?= $table['id_barang'] ?></td>
                <td class="<?= $class ?>"><?= $table['merk_barang']; ?></td>
                <td class="<?= $class ?>"><?= $table['jenis_barang']; ?></td>



                <td class="<?= $class ?>"><?= $table['stok']; ?></td>
                <td class="<?= $class ?>"><?= $table['satuan']; ?></td>


            </tr>
        <?php endforeach ?>



    </tbody>
</table>



<script>
    $("#tableData").dataTable({
        lengthMenu: [5, 10, 25, 50]

    });
</script>