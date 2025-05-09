<div class="table-responsive">

    <table class="table table-bordered table-light text-center" id="table_masuk" style="font-size: 14px;">

        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Transaksi Masuk</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Merk Barang</th>
                <th scope="col"> Jenis Barang </th>
                <th scope="col"> Satuan </th>
                <th scope="col">Supplier</th>
                <th scope="col"> Jumlah Masuk </th>

                <th scope="col">Aksi </th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($data['data_masuk'] as $no => $row) : ?>
                <tr>
                    <th scope="row"><?= $no + 1; ?></th>
                    <td><?= $row['id_trans_masuk'] ?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['merk_barang']  ?></td>
                    <td><?= $row['jenis_barang']  ?></td>
                    <td><?= $row['nama_satuan']  ?></td>
                    <td><?= $row['nama_supplier']; ?></td>
                    <td><?= $row['jumlah_masuk']  ?> </td>
                    <?php if ($_SESSION["level"] == "admin") : ?>

                        <td><button type="button" class="btn btn-sm shadow" id="edit_masuk" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit" data-editmasuk="<?php echo $row['id'] ?>">
                                <i class="fas fa-edit text-white fs-6"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm shadow" data-hapus="<?php echo $row['id'] ?>" id="delete_masuk"><i class="fas fa-trash fs-6"></i></button>
                        <?php endif ?>
                        </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function() {

        $("#table_masuk").DataTable({
            lengthMenu: [5, 10, 25, 50]

        });
        // ModalBarang();
    });
</script>