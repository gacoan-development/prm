<?php
  // require_once 'change_password.php';
  $session = \Config\Services::session();
?>
<div class="sidebar-wrapper">
    <div>
        <!-- <div class="logo-wrapper"><a href="<?//= base_url('dashboard'); ?>"><img class="img-fluid for-light" src="../assets/images/logo/login.png" alt=""></a> -->
        <div class="logo-wrapper"><a href="<?= base_url('dashboard'); ?>"><img class="img-fluid for-light" src="../assets/prm-header.png" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="fa fa-cog status_toggle middle sidebar-toggle"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?= base_url('dashboard'); ?>"><img class="img-fluid" src="../assets/images/logo/logo-icon1.png" alt=""></a></div>
        <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <!-- <li class="sidebar-main-title">
                    <h6>Parking Revenue Monitoring </h6>
                </li> -->
                <li class="menu-box">
                    <ul>
                        <li class="sidebar-list d-none" menu-available-for="1 5"> <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="database"></i><span>Master </span></a>
                            <ul class="sidebar-submenu">
                                <li class="d-none" menu-available-for="5"><a href="<?= base_url('resto'); ?>">Data Resto</a></li>
                                <li class="d-none" menu-available-for="5"><a href="<?= base_url('group_resto'); ?>">Group Resto</a></li>
                                <li class="d-none" menu-available-for="1 5"><a href="<?= base_url('pengelola'); ?>">Pengelola</a></li>
                                <li class="d-none" menu-available-for="1 5"><a href="<?= base_url('tarif_parkir'); ?>">Tarif Parkir</a></li>
                                <li class="d-none" menu-available-for="5"><a href="<?= base_url('order_type'); ?>">Tipe Order</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list d-none" menu-available-for="1 2 3 4 5"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="dollar-sign"></i><span>Transaksi</span></a>
                            <ul class="sidebar-submenu">
                                <li class="d-none" menu-available-for="1 5"><a href="<?= base_url('invoice'); ?>">Penagihan</a></li>        
                                <li class="d-none" menu-available-for="2 3 4 5"><a href="<?= base_url('invoice/form_invoice'); ?>">Form Penagihan</a></li>
                                <!-- <li><a href="<?//= base_url('invoice/resto_dashboard_invoice'); ?>">Kalender Penagihan Resto (Prototype)</a></li> -->
                                <li class="d-none" menu-available-for="1 5"><a href="<?= base_url('pajak'); ?>">Monitoring Pembayaran Pajak</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list d-none" menu-available-for="1 5"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>Laporan</span></a>
                            <ul class="sidebar-submenu">
                                <!-- <li><a href="<?//= base_url('invoice'); ?>">Penagihan</a></li> -->
                                <li class="d-none" menu-available-for="1 5"><a href="<?= base_url('report/receive_fee'); ?>">Laporan Parkir Harian</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- <li class="sidebar-main-title">
                    <h6>Transaksi </h6>
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
                    <h6>Laporan </h6>
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
                </li> -->
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<script>
    $(document).ready(function () {
        restrict_input();
    });
    function restrict_input(){
        var user_group_code = '<?= $session->get('user_group_code'); ?>';
        $(document).find('.sidebar-list').each(function(index, element){
            if( $(element).is('[menu-available-for~="'+user_group_code+'"]') ) {
                $(element).removeClass('d-none');
            }
        });
        $(document).find('.sidebar-submenu > li').each(function(index, element){
            if( $(element).is('[menu-available-for~="'+user_group_code+'"]') ) {
                $(element).removeClass('d-none');
            }
        });
        $(document).find('.serialize').each(function(index, element){
            if( $(element).is('[menu-available-for~="'+user_group_code+'"]') ) {
                $(element).removeClass('d-none');
            }
        })
        $(document).find('.btn_tambah, .btn_edit').each(function(index, element){
            if( $(element).is('[menu-available-for~="'+user_group_code+'"]') ) {
                $(element).removeClass('d-none');
            }else{
                $(element).addClass('d-none');
            }
        })
    }
</script>