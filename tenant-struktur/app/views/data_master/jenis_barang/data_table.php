<table class="table table-bordered table-light text-center" id="table_jenis">
    <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Jenis</th>

            <th scope="col">Nama Jenis</th>

            <th scope="col">Active</th>
            <th scope="col"> Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['jenis_barang'] as $no => $row) :
        ?>
            <tr>
                <th scope="row"><?= $no + 1; ?></th>
                <td class="w-25"><?= $row['id_jenis']; ?></td>
                <td class="w-25"><?= $row['nama_jenis']; ?></td>
                <td class="w-25">
                    <?php
                    switch ($row['active']) {
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
                    } ?>
                </td>

                <td>
                    <button type="button" class="btn btn-sm shadow" id="edit_jenis" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit_modal_jenis" data-editjenis="<?php echo $row['id'] ?>">
                        <i class="fas fa-edit text-white fs-6"></i>
                    </button>
                    <div hidden>
                        <button type="button" class="btn btn-danger btn-sm shadow" data-hapusjenis="<?= $row['id'] ?>" id="delete_jenis"><i class="fas fa-trash fs-6"></i></button>
                    </div>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
    </tbody>
</table>


<script>
    $("#table_jenis").DataTable({
        lengthMenu: [5, 10, 25, 50]

    });
</script>