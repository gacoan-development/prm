<?php 
    $session = \Config\Services::session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRM | Parking Revenue Monitoring</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin@5.0.16/wordpress-admin.min.css" rel="stylesheet">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/vader/jquery-ui.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-wrap: nowrap;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            width: 250px;
        }
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px;
            /* margin-top: 75px; */
            padding: 20px;
            width: 100%;
            transition: margin-left .3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content, .navbar_top {
                margin-left: 0;
            }
            .sidebar-active .sidebar {
                display: block;
                width: 250px;
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                background: #fff;
                z-index: 1030;
            }
            .sidebar-active .main-content {
                margin-left: 250px;
            }
        }
        .sidebar-hidden {
            transform: translateX(-250px);
        }
        .main-content-expanded {
            margin-left: 0;
        }
        .submenu {
            /* display: none;
            list-style-type: none; */
            padding-left: 35px;
        }
        .menu_header {
            font-size: 18px;
            background-color: #294cbc;
        }

         /* Custom styles for the sidebar */
         .overlay-sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.9); /* Black background with opacity */
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px; /* Place content 60px from the top */
        }

        .overlay-sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .overlay-sidebar a:hover {
            color: #f1f1f1;
        }

        .overlay-sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        .collapsing {
            height: 0;
            overflow: hidden;
            transition: height 0.5s ease;
        }
        .collapse.show {
            height: auto;
        }
        .submenu > .nav-item:hover{
            background-color: #1c327d;
        }
    </style>
</head>
<body>
    <div class="sidebar pt-2" id="sidebar" style="background-color: rgba(62,96,213,1)">
        <a type="button" class="btn btn-sm" href="<?= base_url('dashboard'); ?>" style="background-color: rgba(62,96,213,1)"><img src="<?= base_url('logo.png') ?>" alt="gacoan-png" width="100%"></a>
        <nav class="sidebar-sticky" style="background-color: rgba(62,96,213,1)">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white menu_header" href="#ordersSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bi bi-database-fill text-dark"></i> MASTER <i class="bi bi-caret-down-fill float-end"></i></a>
                    <ul class="submenu" id="ordersSubmenu">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('resto'); ?>">Data Resto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('tarif_parkir'); ?>">Tarif Parkir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('order_type'); ?>">Tipe Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('pengelola'); ?>">Pengelola</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('bills'); ?>">Data Bills</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white menu_header" href="#productsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bi bi-cash-coin text-dark"></i> TRANSAKSI <i class="bi bi-caret-down-fill float-end"></i></a>
                    <ul class="submenu" id="productsSubmenu">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('invoice'); ?>">Penagihan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= base_url('pajak'); ?>">Monitoring Pembayaran Pajak</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white menu_header" href="#psm_report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bi bi-file-spreadsheet-fill text-dark"></i> LAPORAN <i class="bi bi-caret-down-fill float-end"></i></a>
                    <ul class="submenu" id="psm_report">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i>Receive Fee</i></a>
                        </li>
                    </ul>
                </li>
                <div id="copyright_sidebar" style="position: fixed; bottom: 0px; color: white;">
                    <span>2024 © Pesta Pora Abadi</span>
                </div>
                <!-- <li class="nav-item">
                    <a class="nav-link text-white menu_header" href="#psm_report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bi bi-file-spreadsheet-fill text-dark"></i> LAPORAN <i class="bi bi-caret-down-fill float-end"></i></a>
                    <ul class="submenu" id="psm_report">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i>Receive Fee</i></a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </div>
    <div class="main-content p-0" id="mainContent">
        <nav class="navbar navbar-light sticky-top" style="background-color: #d5ddf6;">
            <div class="container-fluid">
                <button class="btn btn-md btn-outline-dark mb-0" id="sidebarToggle"><i class="bi bi-list"></i></button>
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-outline-dark px-2 pb-0">
                        <h5 id="clock" style="font-size: 15px !important;"></h5>  
                    </button>
                    &emsp;
                    <div class="dropdown">
                        <button class="btn btn-sm text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #3e60d5;">
                            <i class="bi bi-person-circle"></i>
                            <?= $session->get('user_nama'); ?>
                            <?= ' ('.$session->get('user_group').')'; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="bi bi-power text-danger"></i>&emsp;Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <?= $this->renderSection('content') ?>
    </div>
    <!-- Bootstrap JS and dependencies -->

<script>
    $(document).ready(function () {
        // Initial call to display the clock immediately
        updateClock();

        // Update the clock every second
        setInterval(updateClock, 1000);
    });
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        var mainContent = document.getElementById('mainContent');
        sidebar.classList.toggle('sidebar-hidden');
        mainContent.classList.toggle('main-content-expanded');
    });
    function updateClock() {
        const now = new Date();
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const day = days[now.getDay()];
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedTime = `${day}, <?= date('d') ?> `+months[<?= intval(date('m')-1); ?>]+` <?= date('Y') ?> ${hours}:${minutes}:${seconds}`;
        $(document).find('#clock').html(formattedTime);
    }
</script>
</body>
</html>
