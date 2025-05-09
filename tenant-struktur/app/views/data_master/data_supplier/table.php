<table id="master_sup" class="table table-striped  table-light text-center">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Kontak Supplier</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $no => $row) : ?>

            <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['id_supplier']; ?></td>
                <td><?= $row['nama_supplier']; ?></td>
                <td><?= $row['alamat_supplier']; ?></td>
                <td><?= "0" . $row['kontak_supplier']; ?></td>
                <td><?php switch ($row['active']) {
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
                    } ?></td>
                <td>
                    <button type="button" class="btn btn-sm shadow" id="edit_m_ssup" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit_modal_supp" data-editspm="<?php echo $row['id'] ?>">
                        <i class="fas fa-edit text-white fs-6"></i>
                    </button>
                    <div hidden>
                        <button type="button" class="btn btn-danger btn-sm shadow" data-hapussupp="<?= $row['id'] ?>" id="delete_ssup"><i class="fas fa-trash fs-6"></i></button>
                    </div>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<script>
    $("#master_sup").DataTable({
        lengthMenu: [5, 10, 25, 50]
    });
</script>