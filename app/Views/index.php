<?php 
    $session = \Config\Services::session();
    if($session->getFlashdata('message') !== NULL){
        $message = $session->getFlashdata('message');
    }else{
        $message = '';
    }
    helper('html'); // include ini untuk pake function img()
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin@5.0.16/wordpress-admin.min.css" rel="stylesheet">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen"> -->
    <!-- Responsive css-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css"> -->
    
    <title>PRM | Parking Revenue Monitoring</title>
</head>
<style>
    .bordered-left {
        border-left: 2px solid white; /* Line thickness and color */
        height: 100%; /* Height of the vertical line */
        margin: 0 10px; /* Optional: Add some margin */
    }
    .p2 {
        font-family: sans-serif;
        font-size: 20px;
    }
</style>
<body class="authentication-bg position-relative">
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-header text-white text-center p-2" style="background-color: rgba(62,96,213,1)">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            $imageProperties = [
                                'src'    => 'logo.png',
                                'alt'    => 'gacoan-prm-logo',
                                'class'  => 'm-2',
                                'width'  => '250',
                                'height' => '70',
                                'title'  => 'Welcome to PRM Gacoan!',
                                'rel'    => 'lightbox',
                            ];

                            echo img($imageProperties);
                        ?>
                    </div>
                    <div class="col-lg-6 text-center">   
                        <div class="bordered-left">
                            <span class="p2"><b>PARKING REVENUE MONITORING</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body m-2">
                <div class="text-center w-75 m-auto">
                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                </div>
                <form action="<?= base_url('login/login_action'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NIK:</label>
                        <input type="text" class="form-control form-control-md" id="nik_psm" name="nik_psm" placeholder="NIK...">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password:</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-md" id="pass_psm" name="pass_psm" placeholder="Password...">
                            <button type="button" class="btn btn-md btn-secondary" id="togglePassword"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" id="login" class="btn btn-md text-center text-white" style="background-color: rgba(62,96,213,1)">Log In</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="fixed-bottom">
            <div class="text-center">
                2024 © Pesta Pora Abadi - miegacoan.co.id
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        var message = '<?= $message; ?>';
        if(message != ''){
            Swal.fire({
                iconHtml: "<i class='bi bi-exclamation-diamond-fill text-warning'></i>",
                title: "Gagal!",
                text: message,
                allowOutsideClick: false,
                showConfirmButton: true
            })
        }
        $('#togglePassword').click(function() {
            let passwordField = $('#pass_psm');
            let type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);

            // Toggle the button text based on the current state
            $(this).html(type === 'password' ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>');
        });
    });
    $('form').off('submit').on('submit', function(e){
        var nik = $('#nik_psm').val();
        var pass = $('#pass_psm').val();
        if(nik == '' || pass == ''){
            e.preventDefault();
            Swal.fire({
                iconHtml: "<i class='bi bi-exclamation-diamond-fill text-warning'></i>",
                title: "Perhatian!",
                text: "Username atau password masih ada yang kosong. Mohon dicek kembali.",
                allowOutsideClick: false,
                showConfirmButton: true
            })
        }else{
            // do nothing straight to controller
        }
    })
</script>