<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TENANT</title>

    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    <style>

    </style>
</head>

<body>
    <script src="<?= BASEURL; ?>/assets/static/js/initTheme.js"></script>
    <script src="<?= BASEURL; ?>/js/jquery/jquery-3.6.0.min.js"></script>
    <div id="app">
        <?php require_once 'sidebar.php' ?>
        <div id="main" class='layout-navbar navbar-fixed '>
            <header>
                <nav class="navbar navbar-expand text-white bg-default navbar-top shadow" style="background-color: var(--bs-default-text-color-gelap);height: 20px !important;">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block text-white">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <!-- <li class="nav-item dropdown me-1 ">
                                    <a class="nav-link active dropdown-toggle text-white" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4' style="font-size: 14pt !important;"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-white" href="#"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4' style="font-size: 14pt !important;"></i>
                                        <span class="badge badge-notification bg-danger">7</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifications</h6>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-primary">
                                                    <i class="bi bi-cart-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Successfully check out</p>
                                                    <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="true" class="show">
                                    <div class="user-menu d-flex">

                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= BASEURL; ?>/assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownMenuButton" data-bs-popper="static">
                                    <li>
                                        <h6 class="dropdown-header">Hello SIRS</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <?php require_once 'submenu.php' ?>
            </header>
            <div id="main-content">

                <div class="page-heading">

                </div>
                <section class="section">
                    <script>
                        $(function() {
                            let sidebar_item = $(".sidebar-item.active");
                            let id_sidebar = sidebar_item.data('id');
                            $.ajax({
                                url: `<?= BASEURL ?>/menu/cekmenu/${id_sidebar}/submenu`,
                                dataType: 'json',
                                success: function(res) {
                                    let html = '';
                                    $.each(res, function(i, val) {
                                        if (val.link !== '#') html += ` <li class="nav-item  "><a class="nav-link text-default" aria-current="page" href="<?= BASEURL ?>${val.link}">${val.submenu}</a></li>`;
                                        else {
                                            html += `   <li class="nav-item dropdown  ">
                                                            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                ${val.submenu}
                                                            </span>
                                                            <ul class="dropdown-menu border ">`;
                                            if (val.hasOwnProperty('subsubmenu') && val.subsubmenu.length > 0) {
                                                $.each(val.subsubmenu, (i2, v2) => {
                                                    html += `<li ><a class="dropdown-item text-default" href="<?= BASEURL ?>${v2.link}">${v2.subsubmenu}</a></li>`;

                                                })
                                            };

                                            html += `       </ul>
                                                        </li> `;
                                        }

                                    })
                                    $("#navbarNavDropdown > .navbar-nav").html(html);
                                }
                            })
                        })
                    </script>