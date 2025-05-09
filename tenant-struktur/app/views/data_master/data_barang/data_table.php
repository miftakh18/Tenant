<div class="table-responsive">
    <table class="table " id="table_data_barang" name="">
        <thead class="table-dark">
            <tr scope="">
                <th scope=" col" class="">No</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Merk Barang</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col"> Satuan</th>

                <th scope="col">Gambar</th>
                <th scope="col">Active</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody class="col" id="data_barang">
            <?php

            foreach ($data['data_barang'] as $key => $barang) :
            ?>
                <tr class="" valign="middle">

                    <td><?php echo $key + 1;
                        ?></td>
                    <td> <?php echo $barang['id_barang'];
                            ?> </td>
                    <td> <?php echo $barang['nama_barang'];
                            ?> </td>
                    <td>
                        <?php echo $barang['merk_barang']; ?>
                    </td>
                    <td>
                        <?php echo $barang['nama_jenis']; ?>
                    </td>

                    <td>
                        <?php echo $barang['nama_satuan']; ?>
                    </td>

                    <td>
                        <img src="<?php echo BASEURL . '/upload/' . $barang['gambar']; ?>" alt="Kosong" height="50px">
                    </td>
                    <td>
                        <?php

                        switch ($barang['active']) {
                            case 'ya':
                                echo '<svg width="40" height="40" >
                                <circle cx="20" cy="20" r="15"
                                stroke="black " stroke-width="2" fill="green"  />
                               <text fill="white" font-size="20" font-family="Verdana" x="13" y="27">
                               &#10004;
                               
                               </text>
                              </svg>';
                                break;

                            default:
                                echo '<svg width="40" height="40" >
                                <circle cx="20" cy="20" r="15"
                                stroke="black " stroke-width="2" fill="red"  />
                               <text fill="white" font-size="20" font-family="Verdana" x="10" y="26">
                               &#128473;
                               
                               </text>
                              </svg>';

                                break;
                        }
                        ?>

                    </td>

                    <td>
                        <button type="button" class="btn btn-sm shadow" id="edit_barang" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit" data-edit="<?php echo $barang['id'] ?>">
                            <i class="fas fa-edit text-white fs-6"></i>
                        </button>
                        <div hidden>
                            <button type="button" class="btn btn-danger btn-sm shadow" data-hapus="<?php echo $barang['id'] ?>" id="delete_barang"><i class="fas fa-trash fs-6"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>

    </table>
</div>
<script>
    $(document).ready(function() {
        $("#table_data_barang").DataTable({
            lengthMenu: [5, 10, 25, 50]
        });
        // ModalBarang();
    });
</script>