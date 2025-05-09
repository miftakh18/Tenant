<div class="table-responsive">

    <table class="table table-bordered table-light" id="table_keluar">

        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Transaksi Keluara</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Merk Barang</th>
                <th scope="col"> Jenis Barang </th>
                <th scope="col"> Satuan </th>
                <th scope="col"> Jumlah Keluar </th>

                <th scope="col">Aksi </th>

            </tr>
        </thead>
        <tbody>
            <?php if ($_SESSION["level"] == "admin") : ?>

                <?php foreach ($data['data_keluar'] as $no => $row) :
                    $stok  = $data['data_stok']->cekKetersediaan($row['id_barang']);

                ?>

                    <tr>
                        <th scope="row"><?= $no + 1; ?></th>
                        <td><?= $row['id_trans_keluar'] ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['merk_barang']  ?></td>
                        <td><?= $row['jenis_barang']  ?></td>
                        <td><?= $row['nama_satuan']  ?></td>
                        <td><?= $row['jumlah_keluar'] ?> </td>



                        <?php
                        if (empty($row['status'])) :
                            if (empty($row['jumlah_keluar'] < 0 || $stok['stok'] <= 0)) :
                        ?>
                                <td>

                                    <button type="button" class="btn btn-sm btn-info" data-accept="<?php echo $row['id'] ?>" id="accept_keluar"><i class="fas fa-clipboard-check text-white"></i></button>
                                </td>
                        <?php
                            else :
                                echo "<td class='bg-danger text-white'><i>Mencapai Batas Minimum</i></td>";
                            endif;
                        else :
                            echo "<td class='bg-info text-white'><i>Berhasil Di Accept</i></td>";
                        endif; ?>
                    </tr>
                <?php endforeach; ?>

            <?php else : ?>

                <?php if ($_SESSION["level"] == "user" && $_SESSION['jabatan'] == 'karyawan') : ?>
                    <?php foreach ($data['data_keluar_notaccept'] as $no => $row) :
                        $stok  = $data['data_stok']->cekKetersediaan($row['id_barang']);
                    ?>

                        <tr>
                            <th scope="row"><?= $no + 1; ?></th>
                            <td><?= $row['id_trans_keluar'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['merk_barang']  ?></td>
                            <td><?= $row['jenis_barang']  ?></td>
                            <td><?= $row['nama_satuan']  ?></td>
                            <td><?= $row['jumlah_keluar']  ?> </td>


                            <?php if (empty($row['status'])) :
                                if (empty($row['jumlah_keluar'] < 0 || $stok['stok'] <= 0)) :
                            ?> <td>
                                        <button type="button" class="btn btn-sm shadow" id="edit_keluar" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit" data-editkeluar="<?php echo $row['id'] ?>">
                                            <i class="fas fa-edit text-white fs-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm shadow" data-hapus="<?php echo $row['id'] ?>" id="delete_keluar">
                                            <i class="fas fa-trash fs-6"></i>
                                        </button>
                                    </td>
                            <?php
                                else :
                                    echo "<td class='bg-danger text-white'><i>Mencapai Batas Minimum</i></td>";
                                endif;
                            else :
                                echo "<td class='bg-info text-white'><i>Berhasil Di Accept</i></td>";
                            endif; ?>

                        </tr>
                    <?php endforeach; ?>

                <?php endif ?>
            <?php endif ?>

        </tbody>
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function() {

        $("#table_keluar").DataTable({
            lengthMenu: [5, 10, 25, 50]

        });
        // ModalBarang();
    });
</script>