<?php
  // require_once 'change_password.php';
  $session = \Config\Services::session();
?>
<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search In ESS .." name="" title="" autofocus>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="index.php"><img class="img-fluid" src="../assets/images/logo/login.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <!-- <div class="left-header col horizontal-wrapper ps-0">
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text mobile-search"><i class="fa fa-search"></i></span></div>
        <input class="form-control" type="text" placeholder="Search Here........">
      </div>
    </div> -->
    <div class="nav-right col-8 pull-right right-header p-0">
      <ul class="nav-menus">
        <!-- <li class="onhover-dropdown">
          <div class="notification-box"><i class="fa fa-bell-o"> </i><span class="badge rounded-pill badge-primary">4
            </span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li><i data-feather="bell"> </i>
              <h6 class="f-18 mb-0">Notifications</h6>
            </li>
            <li><a href="email_read.html">
                <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10
                    min.</span></p>
              </a></li>
            <li><a href="email_read.html">
                <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span>
                </p>
              </a></li>
            <li><a href="email_read.html">
                <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span>
                </p>
              </a></li>
            <li><a href="email_read.html">
                <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span>
                </p>
              </a></li>
            <li><a class="btn btn-primary" href="email_read.html">Check all notification</a></li>
          </ul>
        </li> -->
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="profile-nav onhover-dropdown p-0 me-0">
          <div class="d-flex profile-media">
            <img class="b-r-50" src="../assets/images/dashboard/profile.jpg" alt="">
            <div class="flex-grow-1">
                <span>
                    <?= $session->get('user_nama'); ?>
                </span>
                <p class="mb-0 font-roboto">
                    <?= ' ('.$session->get('user_group').')'; ?>
                    <i class="middle fa fa-angle-down"></i>
                </p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <!-- <li><a data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i data-feather="user"></i><span data-bs-toggle="modal" data-bs-target="#changePasswordModal"> Ubah Password </span></a></li> -->
            <!-- <li><a href="email_inbox.html"><i data-feather="mail"></i><span>Inbox</span></a></li> -->
            <!-- <li><a href="kanban.html"><i data-feather="file-text"></i><span>Taskboard</span></a></li> -->
            <li><a href="<?= base_url('/logout'); ?>"><i data-feather="log-in"> </i><span>Log in</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Ubah Kata Sandi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="currentPassword" class="form-label">Password Saat Ini</label>
            <div class="input-group">
              <input type="password" class="form-control" id="currentPassword" name="currentPassword" maxlength="6" pattern="^[a-zA-Z0-9]+$" style="border-radius: 0.25rem 0 0 0.25rem; border-left-color: transparent;">
              <button class="btn btn-outline-primary" type="button" id="showCurrentPasswordBtn" ><i class="bi bi-eye"></i></button>
            </div>
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <div class="input-group">
              <input type="password" class="form-control" id="newPassword" name="newPassword" maxlength="6" pattern="^[a-zA-Z0-9]+$" style="border-radius: 0.25rem 0 0 0.25rem; border-left-color: transparent;">
              <button class="btn btn-outline-primary" type="button" id="showNewPasswordBtn" ><i class="bi bi-eye"></i></button>
            </div>
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
            <div class="input-group">
              <input maxlength="6" pattern="^[a-zA-Z0-9]+$" type="password" class="form-control" id="confirmPassword" name="confirmPassword" required style="border-radius: 0.25rem 0 0 0.25rem; border-left-color: transparent;">
              <button class="btn btn-outline-primary" type="button" id="showConfirmPasswordBtn" ><i class="bi bi-eye"></i></button>
            </div>
          </div>
          <div id="passwordMismatchAlert" class="alert alert-danger d-none" role="alert">
            Password baru tidak sesuai dengan konfirmasi password baru. Mohon periksa kembali.
          </div>
        </div>
        <div class="modal-footer" style=" display: flex; justify-content: center;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 150px;">Batal</button>
          <button type="submit" class="btn btn-primary" style="width: 200px;">Simpan Perubahan</button>
        </div>

      </form>
    </div>
  </div>
</div>





<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

<!-- Include Bootstrap JS and any other necessary scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
function rupiah(amount) {
  return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
  }).format(amount);
}
function parseRupiah(rupiahString) {
  // Remove the currency symbol and any non-digit characters except for the decimal point
  let numericString = rupiahString.replace(/[^0-9,-]+/g, '');
  
  // Replace comma (,) with an empty string and period (.) with a decimal point
  numericString = numericString.replace(/,/g, '').replace(/-/g, '');
  
  // Parse the cleaned string to a float number
  return parseFloat(numericString);
}
  // $(document).ready(function() {
  //   $('#showCurrentPasswordBtn').click(function() {
  //     var currentPasswordInput = $('#currentPassword');
  //     if (currentPasswordInput.attr('type') === 'password') {
  //       currentPasswordInput.attr('type', 'text');
  //     } else {
  //       currentPasswordInput.attr('type', 'password');
  //     }
  //   });

  //   $('#showNewPasswordBtn').click(function() {
  //     var newPasswordInput = $('#newPassword');
  //     if (newPasswordInput.attr('type') === 'password') {
  //       newPasswordInput.attr('type', 'text');
  //     } else {
  //       newPasswordInput.attr('type', 'password');
  //     }
  //   });

  //   $('#showConfirmPasswordBtn').click(function() {
  //     var confirmPasswordInput = $('#confirmPassword');
  //     if (confirmPasswordInput.attr('type') === 'password') {
  //       confirmPasswordInput.attr('type', 'text');
  //     } else {
  //       confirmPasswordInput.attr('type', 'password');
  //     }
  //   });


  //   $('form').submit(function(event) {
  //     // var currentPassword = $('#currentPassword').val();
  //     var newPassword = $('#newPassword').val();
  //     var confirmPassword = $('#confirmPassword').val();

  //     // if (currentPassword !== '<?php // echo $currentPassword; ?>') {
  //     //   event.preventDefault();
  //     //   $('#currentPasswordMismatchAlert').removeClass('d-none');
  //     // }

  //     if (newPassword !== confirmPassword) {
  //       event.preventDefault();
  //       $('#passwordMismatchAlert').removeClass('d-none');
  //     }
  //   });
  // });
</script>
<script>
  // document.addEventListener('DOMContentLoaded', function() {
  //   const changePasswordForm = document.getElementById('changePasswordForm');
  //   const newPasswordInput = document.getElementById('newPassword');
  //   const confirmPasswordInput = document.getElementById('confirmPassword');
  //   const submitButton = document.querySelector('#changePasswordForm button[type="submit"]');

  //  changePasswordForm.addEventListener('submit', function(event) {
  //     event.preventDefault();
  //   if (newPasswordInput.value.trim() === '' || confirmPasswordInput.value.trim() === '') {
  //       alert('Harap isi semua bidang sebelum melanjutkan.');
  //       return;
  //     }
  //    this.submit();
  //   });

  //  changePasswordForm.addEventListener('input', function() {
  //    if (newPasswordInput.value.trim() === '' || confirmPasswordInput.value.trim() === '') {
  //       submitButton.setAttribute('disabled', 'disabled');
  //     } else {
  //       submitButton.removeAttribute('disabled');
  //     }
  //   });
  // });
</script>