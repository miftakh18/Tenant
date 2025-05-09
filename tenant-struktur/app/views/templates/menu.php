<style>
    /* .menu_baru { */

    /* width */
    /* ::-webkit-scrollbar {
        width: 20px;
    } */

    /* Track */
    /* ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    } */

    /* Handle */
    /* ::-webkit-scrollbar-thumb {
        background: red;
        border-radius: 10px;
    } */

    /* Handle on hover */
    /* ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    } */

    /* } */
</style>

<ul class="navbar navbar-nav">
    <li class="nav-item ">
        <a class="nav-link text-white " href="<?= BASEURL . '/dashboard/index' ?>"><i class="fas fa-tachometer-alt me-2"></i>Beranda</a>
    </li>


    <?php if ($_SESSION["level"] == "admin") : ?>
        <li class="fild">MENU UTAMA</li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-archive me-2"></i> Data Master
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= BASEURL ?>/data_barang/index"><i class="fas fa-boxes me-2"></i> Data Barang</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL ?>/jenis_barang/index"><i class="far fa-bookmark me-2"></i>Jenis Barang</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL ?>/satuan/index"><i class="fab fa-cloudsmith me-2"></i>Satuan</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL ?>/supplier/index"> <i class="fas fa-truck-loading me-2"></i>Supplier</a></li>

            </ul>
        </li>
    <?php endif ?>




    <?php if ($_SESSION["level"] == "admin") : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-dolly-flatbed me-2"></i> Data Transaksi </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= BASEURL  ?>/data_barang_masuk/index"><i class="fas fa-dolly me-2"></i> Transaksi Barang Masuk</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL ?>/data_barang_keluar/index"><i class="fas fa-truck-loading me-2"></i>Accept Barang Keluar</a></li>
            </ul>
        </li>

        <?php else :
        if ($_SESSION["level"] == "user" && $_SESSION["jabatan"] == "karyawan") : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-dolly-flatbed me-2"></i> Data Transaksi </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= BASEURL ?>/data_barang_keluar/index"><i class="fas fa-truck-loading me-2"></i>Request Barang</a></li>
                </ul>
            </li>
    <?php endif;
    endif; ?>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-clipboard-list me-2"></i> Laporan
        </a>
        <ul class="dropdown-menu">
            <li hidden><a class="dropdown-item" href="<?= BASEURL ?>/stok_barang/index"> <i class="fas fa-box-open me-2"></i>Stok Barang</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL ?>/barang_masuk/index"><i class="fas fa-dolly me-2"></i>Laporan Barang Masuk</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL ?>/barang_keluar/index"> <i class="fas fa-truck-loading me-2"></i>Laporan Barang Keluar</a></li>
            <!-- <li><a class="dropdown-item" href="<?php // BASEURL 
                                                    ?>/supplier/index_laporan"><i class="fas fa-people-carry me-2"></i>Supplier Masuk</a></li> -->
        </ul>
    </li>

    <li class="fild">LAINNYA</li>
    <?php if ($_SESSION["level"] == "admin") : ?>

        <li class="nav-item"><a class="nav-link text-white" href="<?= BASEURL ?>/manajemen_user/index"><i class="fas fa-user-cog me-2"></i>Manajemen User</a></li>
    <?php endif ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cogs me-2"></i> Pengaturan
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= BASEURL ?>/ubah_password/index"> <i class="fas fa-key me-2"></i>Ubah Password </a></li>
            <li><a class="dropdown-item" href="<?= BASEURL ?>/data_akun/index"> <i class="fas fa-user-cog me-2"></i>Edit Data Akun </a></li>

        </ul>
    </li>
    <li class="nav-item ">
        <a class="nav-link active text-white" aria-current="page" href="<?= BASEURL ?>/user/logout"><i class="fas fa-sign-out-alt me-2 "></i>LogOut</a>
    </li>


</ul>