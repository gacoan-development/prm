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
    <script src="<?= base_url('assets/config.js') ?>"></script>
    <link href="<?= base_url('assets/app.css') ?>" rel="stylesheet">
</head>
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
  <!-- Brand Logo Light -->
  <a href="index.php" class="logo logo-light">
    <span class="logo-lg">
      <img src="assets/images/logo.png" alt="logo" />
    </span>
    <span class="logo-sm">
      <img src="assets/images/logo-sm.png" alt="small logo" />
    </span>
  </a>

  <!-- Brand Logo Dark -->
  <a href="index.php" class="logo logo-dark">
    <span class="logo-lg">
      <img src="assets/images/logo-dark.png" alt="dark logo" />
    </span>
    <span class="logo-sm">
      <img src="assets/images/logo-sm.png" alt="small logo" />
    </span>
  </a>

  <!-- Sidebar Hover Menu Toggle Button -->
  <div
    class="button-sm-hover"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Show Full Sidebar"
  >
    <i class="ri-checkbox-blank-circle-line align-middle"></i>
  </div>

  <!-- Full Sidebar Menu Close Button -->
  <div class="button-close-fullsidebar">
    <i class="ri-close-fill align-middle"></i>
  </div>

  <!-- Sidebar -left -->
  <div class="h-100" id="leftside-menu-container" data-simplebar>
    <!-- Leftbar User -->
    <div class="leftbar-user">
      <a href="pages-profile.php">
        <img
          src="assets/images/users/avatar-1.jpg"
          alt="user-image"
          height="42"
          class="rounded-circle shadow-sm"
        />
        <span class="leftbar-user-name mt-2"><?php // echo $nama; ?><br><?php // echo $email; ?></span>
      </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">
      <li class="side-nav-title">Navigation</li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#"
          aria-expanded="false"
          aria-controls="sidebarDashboards"
          class="side-nav-link"
        >
          <i class="ri-home-4-line"></i>
          <span> Dashboards </span>
        </a>
      </li>

      <li class="side-nav-title">Personal</li>

      <li class="side-nav-item">
        <a href="apps-calendar.php" class="side-nav-link">
          <i class="ri-calendar-event-line"></i>
          <span> Absensi </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="apps-chat.php" class="side-nav-link">
          <i class="ri-message-3-line"></i>
          <span> Sistem Kinerja Individu </span>
        </a>
      </li>
		
      <li class="side-nav-item">
        <a href="apps-kanban.php" class="side-nav-link">
          <i class="ri-list-check-3"></i>
          <span> Perjalanan Dinas </span>
        </a>
      </li>
		
		<li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarMaps"
          aria-expanded="false"
          aria-controls="sidebarMaps"
          class="side-nav-link"
        >
          <i class="ri-treasure-map-line"></i>
          <span>Permintaan Pegawai</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarMaps">
          <ul class="side-nav-second-level">
            <li>
              <a href="form-permintaan-pegawai.php">Pengajuan</a>
            </li>
            <li>
              <a href="history-permintaan-pegawai.php">History</a>
            </li>
          </ul>
        </div>
      </li>
		
      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarEmail"
          aria-expanded="false"
          aria-controls="sidebarEmail"
          class="side-nav-link"
        >
          <i class="ri-mail-line"></i>
          <span> Cuti & Izin </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEmail">
          <ul class="side-nav-second-level">
            <li>
              <a href="form-cuti.php">Pengajuan</a>
            </li>
            <li>
              <a href="history-cuti.php">History</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarTasks"
          aria-expanded="false"
          aria-controls="sidebarTasks"
          class="side-nav-link"
        >
          <i class="ri-task-line"></i>
          <span> Tukar Hari Libur </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarTasks">
          <ul class="side-nav-second-level">
            <li>
              <a href="form-thl.php">Pengajuan</a>
            </li>
            <li>
              <a href="history-thl.php">Approval</a>
            </li>
          </ul>
        </div>
      </li>


      <li class="side-nav-title">Managerial</li>
	  <li class="side-nav-item">
        <a href="form-disos.php" class="side-nav-link">
          <i class="ri-pages-line"></i>
          <span> Disposisi & Sosialisasi </span>
        </a>
      </li>
		
	  <li class="side-nav-item">
        <a href="form-memodinas.php" class="side-nav-link">
          <i class="ri-shield-user-line"></i>
          <span> Memo Dinas </span>
        </a>
      </li>

	  <li class="side-nav-item">
        <a href="form-fpk.php" class="side-nav-link">
          <i class="ri-error-warning-line"></i>
          <span> Permohonan Karyawan</span>
        </a>
      </li>
      <li class="side-nav-title">Benefit</li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarBaseUI"
          aria-expanded="false"
          aria-controls="sidebarBaseUI"
          class="side-nav-link"
        >
          <i class="ri-briefcase-line"></i>
          <span> Santunan Duka </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarBaseUI">
          <ul class="side-nav-second-level">
            <li>
              <a href="ui-accordions.php">Pengajuan</a>
            </li>
            <li>
              <a href="ui-alerts.php">Approval</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarExtendedUI"
          aria-expanded="false"
          aria-controls="sidebarExtendedUI"
          class="side-nav-link"
        >
          <i class="ri-stack-line"></i>
          <span> Rembesment Asuransi </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarExtendedUI">
          <ul class="side-nav-second-level">
            <li>
              <a href="extended-dragula.php">Pengajuan</a>
            </li>
            <li>
              <a href="extended-range-slider.php">Approval</a>
            </li>
          </ul>
        </div>
      </li>
		
	 <li class="side-nav-title">Other</li>

		<li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarIcons"
          aria-expanded="false"
          aria-controls="sidebarIcons"
          class="side-nav-link"
        >
          <i class="ri-service-line"></i>
          <span> Quesioner </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarCharts"
          aria-expanded="false"
          aria-controls="sidebarCharts"
          class="side-nav-link"
        >
          <i class="ri-bar-chart-line"></i>
          <span> Suara Rakyat Gacoan </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarForms"
          aria-expanded="false"
          aria-controls="sidebarForms"
          class="side-nav-link"
        >
          <i class="ri-survey-line"></i>
          <span> Inbox </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a
          data-bs-toggle="collapse"
          href="#sidebarTables"
          aria-expanded="false"
          aria-controls="sidebarTables"
          class="side-nav-link"
        >
          <i class="ri-table-line"></i>
          <span> Profile </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="apps-kanban.php" class="side-nav-link">
          <i class="ri-list-check-3"></i>
          <span> Help </span>
        </a>
      </li>
    </ul>
    <!--- End Sidemenu -->

    <div class="clearfix"></div>
  </div>
</div>
<!-- ========== Left Sidebar End ========== -->
