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
    <link href="<?= base_url('assets/app.css') ?>" rel="stylesheet">
</head>
<body>
  <div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/login.png" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="fa fa-cog status_toggle middle sidebar-toggle"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon1.png" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
              <h6 class="lan-1">General </h6>
            </li>
            <li class="menu-box">
              <ul>
                <li class="sidebar-list"> <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="home"></i><span class="lan-3">Dashboard </span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="lan-4" href="index.html">Default</a></li>
                    <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="airplay"></i><span class="lan-6">Widgets</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="general-widget.html">General</a></li>
                    <li><a href="chart-widget.html">Chart</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="layout"></i><span class="lan-7">Page layout</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="box-layout.html">Boxed</a></li>
                    <li><a href="layout-rtl.html">RTL</a></li>
                    <li><a href="layout-dark.html">Dark Layout</a></li>
                    <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                    <li><a href="footer-light.html">Footer Light</a></li>
                    <li><a href="footer-dark.html">Footer Dark</a></li>
                    <li><a href="footer-fixed.html">Footer Fixed</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="sidebar-main-title">
              <h6>Personal </h6>
            </li>
            <li class="menu-box">
              <ul>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="git-pull-request"> </i><span>Absensi</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="shopping-bag"> </i><span>Penilaian Pegawai </span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="calendar"> </i><span>Perjalanan Dinas </span></a></li>
                <li class="sidebar-list"> <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="box"></i><span>Permintaan Surat </span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Pengajuan</a></li>
                    <li><a href="#">History</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"> <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span>Cuti & Izin </span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Pengajuan</a></li>
                    <li><a href="#">History</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="message-circle"></i><span>Tukar Hari Libur</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Pengajuan</a></li>
                    <li><a href="#">History</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="sidebar-main-title">
              <h6>Managerial </h6>
            </li>
            <li class="menu-box">
              <ul>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="file-text"> </i><span>Disposisi & Sosialisasi</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="server"> </i><span>Memo Dinas</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span>ManPower Planning</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="../head/permohonan-mpp.php">Pengajuan</a></li>
                    <li><a href="../head/datatable-mpp.php">History - Approval</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span>FP Karyawan</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="../head/permohonan-karyawan.php">Pengajuan</a></li>
                    <li><a href="../head/datatable-fpk-approval.php">History - Approval</a></li>
                    <li><a href="../head/datatable-fpk-pengajuan.php">Summary Pengajuan</a></li>
                    <li><a href="../head/datatable-fpk-summary-fpk.php">Summary FPK</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="sidebar-main-title">
              <h6>Benefit Pegawai</h6>
            </li>
            <li class="menu-box">
              <ul>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="box"> </i><span>Santunan Duka</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="folder-plus"></i><span>Rembesment </span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="#">Pengajuan</a></li>
                    <li><a href="#">History</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="sidebar-main-title">
              <h6>Others </h6>
            </li>
            <li class="menu-box">
              <ul>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="cast"> </i><span>Quesioner</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="file-text"> </i><span>Suara Rakyat Gacoan</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="globe"> </i><span>Inbox</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="edit-profile.php" target="_blank"><i data-feather="anchor"></i><span>Profile</span></a></li>
                <li class="mega-menu"><a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)"><i data-feather="layers"></i><span>Help</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="help-circle"> </i><span>Support Ticket</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>