<div class="table-responsive">
    <table class="table table-bordered table-hover table-light text-center" id="tabel_satuan">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Satuan</th>
                <th scope="col"> Satuan</th>
                <th scope="col"> Active</th>
                <th scope="col"> Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $no => $row) : ?>
                <tr>
                    <td><?= $no + 1 ?></td>
                    <td class="w-25"><?= $row['id_satuan'] ?></td>
                    <td class="w-25"><?= $row['nama_satuan'] ?></td>
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
                        <button type="button" class="btn btn-sm shadow" id="edit_satuan" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#edit" data-edit="<?php echo $row['id'] ?>">
                            <i class="fas fa-edit text-white fs-6"></i>
                        </button>
                        <div hidden>
                            <button type="button" class="btn btn-danger btn-sm shadow" data-hapus="<?= $row['id'] ?>" id="delete_satuan">
                                <i class="fas fa-trash fs-6"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>
</div>
<script>
    $("#tabel_satuan").DataTable({
        lengthMenu: [5, 10, 25, 50]
    });
</script>