<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-sm btn-outline-primary" id="edit_akun">
        <i class="fas fa-edit fs-6 text-primary"></i>
    </button>




</div>
<table class=" table mt-3">
    <tr>
        <th class="text-center" colspan="3">Data Akun </th>
    </tr>
    <tr>
        <td width="30%"> <b> Nama</b></td>
        <td width="2%">:</td>
        <td><?= $data['nama']; ?></td>
    </tr>
    <tr>
        <td width="30%"> <b> Jabatan</b></td>
        <td width="2%">:</td>
        <td><?= $data['jabatan']; ?></td>
    </tr>
    <tr>
        <td width="30%"> <b> Jenis Kelamin</b></td>
        <td width="2%">:</td>
        <td><?= $data['jk']; ?></td>
    </tr>
    <tr>
        <td width="30%"> <b> Username</b></td>
        <td width="2%">:</td>
        <td><?= $data['username']; ?></td>
    </tr>
    <tr>
        <td width="30%"> <b> Alamat</b></td>
        <td width="2%">:</td>
        <td><?= $data['alamat']; ?></td>
    </tr>
</table>