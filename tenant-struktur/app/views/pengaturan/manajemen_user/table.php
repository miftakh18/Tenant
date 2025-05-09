<table class="table table-bordered table-light text-center" id="table_userd">
    <thead class="table-dark ">
        <tr>

            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Level</th>
            <th scope="col">Jabatan</th>

            <th scope="col">Status</th>
            <th scope="col"> Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $no => $row) : ?>
            <tr>
                <td><?= $no + 1; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['level']; ?></td>
                <td><?= $row['jabatan']; ?></td>
                <td><?php switch ($row['status']) {
                        case '0':
                            echo '<span class="badge bg-success shadow">Akses</span>';
                            break;
                        case '1':
                            echo '<span class="badge bg-warning text-dark shadow">Blokir</span>';
                    }
                    ?></td>

                <td>
                    <button type="button" class="btn shadow btn-sm" style="background:#29c7ca" data-bs-toggle="modal" data-bs-target="#akses_user" id="btn_akses" data-akses="<?= $row['id'] ?>">
                        <i class="fas fa-door-closed text-white"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#pass_user" data-password="<?php echo $row['id'] ?>" id="btn_pass">
                        <i class="fas fa-unlock"></i></button>
                    <button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#level_user" data-level="<?php echo $row['id'] ?>" id="btn_level">
                        <i class="fas fa-hands-helping"></i></button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $("#table_userd").DataTable();
    })
</script>