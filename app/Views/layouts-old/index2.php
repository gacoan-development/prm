<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enzo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Enzo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>ESS - Employee Self Service</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/font-awesome.css') ?>">
    <!-- ico-font-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/icofont.css') ?>">
    <!-- Themify icon-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/themify.css') ?>">
    <!-- Flag icon-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/flag-icon.css') ?>">
    <!-- Feather icon-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/feather-icon.css') ?>">
    <!-- Plugins css start-->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/scrollbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
		<?php
		  // include '../layouts/top-sidebar.php'
      $this->include('layouts/top-sidebar.php');
		?>
     <div class="modal-footer" style=" display: flex; justify-content: center;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 150px;">Batal</button>
          <button type="submit" class="btn btn-primary" style="width: 200px;">Simpan Perubahan</button>
        </div>

      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php
			// include '../layouts/right-sidebar.php'
      $this->include('layouts/left-sidebar.php');
		?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid default-dash">
            <div class="row">
              <div class="col-xl-4 col-md-6 box-col-50 xl-50">
                <div class="card profile-greeting">
                  <div class="card-body"><img class="img-fluid bg-img-cover" src="../assets/images/dashboard/profile-greeting/bg.png" alt="">
                    <div>
                      <h3>Available in your </h3>
                      <h4>Smartphone</h4>
                      <h5>Android & Ios</h5>
                      <p> Install app , upgrade system</p><a class="btn btn-primary" href="https://themeforest.net/user/pixelstrap/portfolio">Check Now</a>
                    </div>
                  </div>
                  <div class="shap-block">
                    <div class="rounded-shap"><i></i><i></i><i>                   </i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 col-md-6 box-col-50 xl-50">
                <div class="card company-view">
                  <div class="card-header card-no-border dflex justify-content-between p-b-0">
                    <h5>Company Overview</h5>
                    <div class="center-content">
                      <p>Last Year $300K Earning </p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="company-viewchart">  </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#company-view" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="company-view"><div class="card company-view">
 <div class="card-header card-no-border dflex justify-content-between p-b-0">
   <h5>Company Overview</h5>
     <div class="center-content">
       <p>Last Year $300K Earning </p>
     </div>
     <div class="card-header-right">
      <ul class="list-unstyled card-option">
         <li><i class="icon-more-alt"></i></li>
         <li><i class="view-html fa fa-code"></i></li>
         <li><i class="icofont icofont-maximize full-card"></i></li>
         <li><i class="icofont icofont-minus minimize-card"></i></li>
         <li><i class="icofont icofont-refresh reload-card"></i></li>
         <li><i class="icofont icofont-error close-card"></i></li>
       </ul>
     </div>
   </div>
 <div class="card-body">
   <div id="company-viewchart"></div>
 </div>
</div></code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="items-slider">
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="dollar-sign"></i></div>
                        <p>Yearly Invoice</p>
                        <h3>$985k</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="database"></i></div>
                        <p>Yearly Investment</p>
                        <h3>$126k</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="user"></i></div>
                        <p>This Month User</p>
                        <h3>$84k</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="clipboard"></i></div>
                        <p>Launched Product</p>
                        <h3>$1206</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="file-text"></i></div>
                        <p>Yearly Spend</p>
                        <h3>$324k</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-sm-4 des-xsm-50 box-col-33">
                    <div class="card investment-sec">
                      <div class="animated-bg"><i></i><i></i><i></i></div>
                      <div class="card-body">
                        <div class="icon"><i data-feather="droplet"></i></div>
                        <p>Yearly Visitors</p>
                        <h3>$2556k</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-12 box-col-4 xl-30">
                <div class="card sellview-sec">
                  <div class="card-header card-no-border pb-0">
                    <h5>Sell Overview</h5>
                    <div class="center-content">
                      <p>Yearly selling product overview</p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="sell-view"></div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#sellview" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="sellview">&lt;div class="card company-view"&gt;
 &lt;div class="card-header card-no-border dflex justify-content-between p-b-0"&gt;
   &lt;h5&gt; Sell Overview &lt;/h5&gt;
     &lt;div class="center-content"&gt;
       &lt;p&gt; Yearly selling product overview &lt;/p&gt;
     &lt;/div&gt;
     &lt;div class="card-header-right"&gt;
       &lt;ul class="list-unstyled card-option"&gt;
         &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;/ul&gt;
     &lt;/div&gt;
   &lt;/div&gt;
 &lt;div class="card-body"&gt;
   &lt;div id="sell-view"&gt;&lt;/div&gt;
 &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 col-lg-6 box-col-4 xl-40">
                <div class="row">
                  <div class="col-md-12 col-sm-6">
                    <div class="card administrator-sec">
                      <div class="card-header card-no-border pb-0">
                        <h5>Administrator</h5>
                        <div class="center-content">
                          <p>View more admin information</p>
                        </div>
                        <div class="card-header-right">
                          <ul class="list-unstyled card-option">
                            <li><i class="icon-more-alt"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="administrator-table table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                              <tr>
                                <td>
                                  <div class="d-flex"><img class="img-fluid img-50 rounded-circle" src="../assets/images/dashboard/admins.png" alt="">
                                    <div class="status-circle bg-primary">                              </div>
                                    <div class="flex-grow-1"><a href="user-profile.html"> 
                                        <h6>Emay Walter<span class="badge badge-primary ms-2">New</span></h6></a>
                                      <p>View more information</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <ul>
                                    <li>
                                      <div class="admini-icon"><i class="fa fa-phone"></i></div>
                                    </li>
                                    <li>
                                      <div class="admini-icon"><i class="fa fa-commenting"></i></div>
                                    </li>
                                  </ul>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#administrator" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="administrator">&lt;div class="card administrator-sec"&gt;
 &lt;div class="card-header card-no-border pb-0"&gt;
 &lt;h5&gt;Administrator&lt;/h5&gt;
 &lt;div class="center-content"&gt;
   &lt;p&gt;View more admin information&lt;/p&gt;
 &lt;/div&gt;
 &lt;div class="card-header-right"&gt;
   &lt;ul class="list-unstyled card-option"&gt;
     &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
   &lt;/ul&gt;
 &lt;/div&gt;
 &lt;/div&gt;
 &lt;div class="card-body"&gt;
   &lt;div class="administrator-table table-responsive"&gt;
     &lt;table class="table table-bordernone"&gt;
       &lt;tbody&gt;
         &lt;tr&gt;
           &lt;td&gt;
             &lt;div class="media"&gt;
               &lt;img class="img-fluid img-50 rounded-circle" src="../assets/images/dashboard/admins.png" alt=""/&gt;
             &lt;div class="status-circle bg-primary"&gt; &lt;/div&gt;
           &lt;div class="media-body"&gt;
           &lt;h6&gt;Emay Walter&lt;span class="badge badge-primary ms-2"&gt;New&lt;/span&gt;&lt;/h6&gt;
           &lt;p&gt;View more information&lt;/p&gt;
           &lt;/div&gt;
           &lt;/div&gt;
         &lt;/td&gt;
         &lt;td&gt;
         &lt;ul&gt;
           &lt;li&gt;
             &lt;div class="admini-icon"&gt;&lt;i class="fa fa-phone"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
             &lt;li&gt;
               &lt;div class="admini-icon"&gt;&lt;i class="fa fa-commenting"&gt;&lt;/i&gt;&lt;/div&gt;
           &lt;/li&gt;
         &lt;/ul&gt;
         &lt;/td&gt;
         &lt;/tr&gt;
       &lt;/tbody&gt;
     &lt;/table&gt;
   &lt;/div&gt;
 &lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-6">
                    <div class="card browser-status">
                      <div class="card-header card-no-border pb-0">
                        <h5>Browser Status</h5>
                        <div class="center-content">
                          <p>All time browser user status</p>
                        </div>
                        <div class="card-header-right">
                          <ul class="list-unstyled card-option">
                            <li><i class="icon-more-alt"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-body">
                        <ul class="browser-used">
                          <li class="active">
                            <div class="brow-lable"><span>+50%</span><i class="fa fa-caret-down"></i></div>
                            <div class="browser-box"><img class="img-fluid" src="../assets/images/dashboard/chrom.png" alt=""></div>
                          </li>
                          <li>
                            <div class="brow-lable"><span>+60%</span><i class="fa fa-caret-down"></i></div>
                            <div class="browser-box"><img class="img-fluid" src="../assets/images/dashboard/explorer.png" alt=""></div>
                          </li>
                          <li>
                            <div class="brow-lable"><span>+79%</span><i class="fa fa-caret-down"></i></div>
                            <div class="browser-box"><img class="img-fluid" src="../assets/images/dashboard/safari.png" alt=""></div>
                          </li>
                          <li>
                            <div class="brow-lable"><span>+90%</span><i class="fa fa-caret-down"></i></div>
                            <div class="browser-box"><img class="img-fluid" src="../assets/images/dashboard/opera.png" alt=""></div>
                          </li>
                        </ul>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#browser-status" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="browser-status"> &lt;div class="card browser-status"&gt;
 &lt;div class="card-header card-no-border pb-0"&gt;
   &lt;h5&gt;Browser Status&lt;/h5&gt;
   &lt;div class="center-content"&gt;
     &lt;p&gt;All time browser user status&lt;/p&gt;
   &lt;/div&gt;
   &lt;div class="card-header-right"&gt;
     &lt;ul class="list-unstyled card-option"&gt;
     &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;/ul&gt;&lt;br /&gt;&lt;/div&gt;
   &lt;/div&gt;
   &lt;div class="card-body"&gt;
     &lt;ul class="browser-used"&gt;
       &lt;li class="active"&gt;
         &lt;div class="brow-lable"&gt;
           &lt;span&gt;+50%&lt;/span&gt;
             &lt;i class="fa fa-caret-down"&gt;&lt;/i&gt;
         &lt;/div&gt;
         &lt;div class="browser-box"&gt;
           &lt;img class="img-fluid" src="../assets/images/dashboard/chrom.png" alt="" /&gt;&lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;div class="brow-lable"&gt;
           &lt;span&gt;+60%&lt;/span&gt;
           &lt;i class="fa fa-caret-down"&gt;&lt;/i&gt;
         &lt;/div&gt;
         &lt;div class="browser-box"&gt;
           &lt;img class="img-fluid" src="../assets/images/dashboard/explorer.png" alt="" /&gt;
         &lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;div class="brow-lable"&gt;
           &lt;span&gt;+79%&lt;/span&gt;
           &lt;i class="fa fa-caret-down"&gt;&lt;/i&gt;
         &lt;/div&gt;
         &lt;div class="browser-box"&gt;
           &lt;img class="img-fluid" src="../assets/images/dashboard/safari.png" alt="" /&gt;&lt;/div&gt;
         &lt;/li&gt;
         &lt;li&gt;  
           &lt;div class="brow-lable"&gt;&lt;span&gt;+90%&lt;/span&gt;
             &lt;i class="fa fa-caret-down"&gt;&lt;/i&gt;
           &lt;/div&gt;
           &lt;div class="browser-box"&gt;
            &lt;img class="img-fluid" src="../assets/images/dashboard/opera.png" alt="" /&gt;
          &lt;/div&gt;
        &lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;.</code></pre>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 xl-30">
                <div class="card profitview-sec">
                  <div class="card-header card-no-border">
                    <h5>Profit Overview</h5>
                    <div class="center-content">
                      <p>Yearly company growth month wise</p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div id="profit-view"></div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#profitview" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="profitview">  &lt;div class="card profitview-sec"&gt;
   &lt;div class="card-header card-no-border"&gt;
     &lt;h5&gt;Profit Overview&lt;/h5&gt;
     &lt;div class="center-content"&gt;
       &lt;p&gt;Yearly company growth month wise&lt;/p&gt;
     &lt;/div&gt;
     &lt;div class="card-header-right"&gt;
       &lt;ul class="list-unstyled card-option"&gt;
         &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;/ul&gt;
     &lt;/div&gt;
   &lt;/div&gt;
   &lt;div class="card-body p-0"&gt;
     &lt;div id="profit-view"&gt;&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 box-col-6 best-selling">
                <div class="card bestselling-sec">
                  <div class="card-header p-b-0">
                    <h5>Best Selling Product</h5>
                    <div class="center-content">
                      <p>Our best Seller Details list</p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                    <ul class="selling-list">
                      <li>
                        <div class="icon"><i class="icon-headphone-alt"></i></div>
                        <div>
                          <p>Latest sony head phone</p>
                          <h6>84.6K<span>/ Month</span></h6>
                        </div>
                      </li>
                      <li>
                        <div class="icon"><i class="icon-bag"></i></div>
                        <div>
                          <p>Ladies handbags</p>
                          <h6>23.1K<span>/ Month</span></h6>
                        </div>
                      </li>
                      <li>
                        <div class="icon"><i class="icon-video-camera"></i></div>
                        <div>
                          <p>Latest camera</p>
                          <h6>84.6K<span>/ Month</span></h6>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body pt-0">
                    <div class="bestselling-table table-responsive">
                      <table class="table table-bordernone">
                        <tbody>
                          <tr>
                            <td><span>01</span>
                              <div class="t-title ms-3"><img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/1.png" alt="">
                                <div class="d-inline-block align-middle"><a href="product-page.html"> <span class="ms-3">Nike Shoes</span></a></div>
                              </div>
                            </td>
                            <td>16 August</td>
                            <td><i class="fa fa-arrow-up font-primary me-1"></i>65.00%</td>
                            <td>Done   </td>
                          </tr>
                          <tr>
                            <td><span>02</span>
                              <div class="t-title ms-3"><img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/2.png" alt="">
                                <div class="d-inline-block align-middle"><a href="product-page.html"><span class="ms-3">Headphone</span></a></div>
                              </div>
                            </td>
                            <td>02 October</td>
                            <td><i class="fa fa-arrow-up font-primary me-1"></i>95.00%</td>
                            <td>Done </td>
                          </tr>
                          <tr>
                            <td><span>03</span>
                              <div class="t-title ms-3"><img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/3.png" alt="">
                                <div class="d-inline-block align-middle"><a href="product-page.html"><span class="ms-3">Tree Plant</span></a></div>
                              </div>
                            </td>
                            <td>12 March</td>
                            <td><i class="fa fa-arrow-down font-danger me-1"></i>02.00%</td>
                            <td>Done </td>
                          </tr>
                          <tr>
                            <td><span>04</span>
                              <div class="t-title ms-3"><img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/4.png" alt="">
                                <div class="d-inline-block align-middle"><a href="product-page.html"><span class="ms-3">Handbags</span></a></div>
                              </div>
                            </td>
                            <td>31 December</td>
                            <td><i class="fa fa-arrow-up font-primary me-1"></i>43.00%</td>
                            <td>Done </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#bestselling" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="bestselling">&lt;div class="card bestselling-sec"&gt;
 &lt;div class="card-header p-b-0"&gt;
   &lt;h5&gt;Best Selling Product&lt;/h5&gt;
   &lt;div class="center-content"&gt;
     &lt;p&gt;Our best Seller Details list&lt;/p&gt;
   &lt;/div&gt;
   &lt;div class="card-header-right"&gt;
     &lt;ul class="list-unstyled card-option"&gt;
       &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;/ul&gt;
   &lt;/div&gt;
     &lt;ul class="selling-list"&gt;
       &lt;li&gt;
         &lt;div class="icon"&gt;
           &lt;i class="icon-headphone-alt"&gt;&lt;/i&gt;
         &lt;/div&gt;
         &lt;div&gt;
           &lt;p&gt;Latest sony head phone&lt;/p&gt;
           &lt;h6&gt;84.6K&lt;span&gt;/ Month&lt;/span&gt;&lt;/h6&gt;
         &lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;div class="icon"&gt;&lt;i class="icon-bag"&gt;&lt;/i&gt;
       &lt;/div&gt;
       &lt;div&gt;
         &lt;p&gt;Ladies handbags&lt;/p&gt;
         &lt;h6&gt;23.5K&lt;span&gt;/ Month&lt;/span&gt;&lt;/h6&gt;
       &lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;div class="icon"&gt;
           &lt;i class="icon-video-camera"&gt;&lt;/i&gt;
         &lt;/div&gt;
         &lt;div&gt;
           &lt;p&gt;Latest camera&lt;/p&gt;
           &lt;h6&gt;84.6K&lt;span&gt;/ Month&lt;/span&gt;&lt;/h6&gt;
         &lt;/div&gt;
       &lt;/li&gt;
     &lt;/ul&gt;
   &lt;/div&gt;
   &lt;div class="card-body pt-0"&gt;
     &lt;div class="bestselling-table table-responsive"&gt;
       &lt;table class="table table-bordernone"&gt;
         &lt;tbody&gt;
           &lt;tr&gt;
             &lt;td&gt;
               &lt;span&gt;01&lt;/span&gt;
               &lt;div class="t-title ms-3"&gt;
                 &lt;img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/1.png" alt="" /&gt;
               &lt;div class="d-inline-block align-middle"&gt;
                 &lt;span class="ms-3"&gt;Nike Shoes&lt;/span&gt;&lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;16 August&lt;/td&gt;
             &lt;td&gt;$210326&lt;/td&gt;
             &lt;td&gt;&lt;i class="fa fa-arrow-up font-primary me-1"&gt;&lt;/i&gt;65.00%&lt;/td&gt;
             &lt;td&gt;Done &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td&gt;&lt;span&gt;02&lt;/span&gt;
               &lt;div class="t-title ms-3"&gt;
                 &lt;img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/2.png" alt="" /&gt;
                 &lt;div class="d-inline-block align-middle"&gt;
                   &lt;span class="ms-3"&gt;Sony Headphone&lt;/span&gt;&lt;/div&gt;
                 &lt;/div&gt;
               &lt;/td&gt;
               &lt;td&gt;02 October&lt;/td&gt;
               &lt;td&gt;$548564&lt;/td&gt;
               &lt;td&gt;&lt;i class="fa fa-arrow-up font-primary me-1"&gt;&lt;/i&gt;95.00%&lt;/td&gt;
               &lt;td&gt;Done &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td&gt;&lt;span&gt;03&lt;/span&gt;
               &lt;div class="t-title ms-3"&gt;&lt;img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/3.png" alt="" /&gt;
                 &lt;div class="d-inline-block align-middle"&gt;
                   &lt;span class="ms-3"&gt;Tree Plant&lt;/span&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;12 March&lt;/td&gt;
             &lt;td&gt;$884596&lt;/td&gt;
             &lt;td&gt;
               &lt;i class="fa fa-arrow-down font-danger me-1"&gt;&lt;/i&gt;02.00%&lt;/td&gt;
             &lt;td&gt;Done &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td&gt;&lt;span&gt;04&lt;/span&gt;
               &lt;div class="t-title ms-3"&gt;
                 &lt;img class="img-40 rounded-circle align-top" src="../assets/images/dashboard/best-selling/4.png" alt="" /&gt;
                 &lt;div class="d-inline-block align-middle"&gt;
                   &lt;span class="ms-3"&gt;Handbags&lt;/span&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;31 December&lt;/td&gt;
             &lt;td&gt;$441523&lt;/td&gt;
             &lt;td&gt;
               &lt;i class="fa fa-arrow-up font-primary me-1"&gt;&lt;/i&gt;43.00%
             &lt;/td&gt;
            lt;td&gt;Done &lt;/td&gt;
          &lt;/tr&gt;
        &lt;/tbody&gt;
      &lt;/table&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-5 col-sm-6 box-col-3 our-city">
                <div class="card weather-sec">
                  <div class="card-header card-no-border pb-0">
                    <h5>Our city weather</h5>
                    <div class="center-content">
                      <p>See your city weather</p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                    <div class="city-weather">
                      <ul class="weather-wrraper">
                        <li>
                          <h3>
                             12<sup>째</sup>C</h3><span></span>
                        </li>
                        <li>
                          <div class="icon-moon"><i data-feather="moon"></i></div>
                        </li>
                        <li><a class="btn btn-primary">                            <i class="fa fa-refresh me-2"></i>Refresh</a></li>
                      </ul><span>Cool Night</span>
                      <p>Beautiful Sunny Day Walk                                                      </p>
                    </div>
                  </div>
                  <div class="card-body weather-img"><img class="img-fluid bg-img-cover" src="../assets/images/dashboard/weather.png" alt="">
                    <div class="ag-snow"></div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#wethersec" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="wethersec">&lt;div class="card weather-sec"&gt;
 &lt;div class="card-header card-no-border pb-0"&gt;
   &lt;h5&gt;Our city weather&lt;/h5&gt;
   &lt;div class="center-content"&gt;
     &lt;p&gt;See your city weather&lt;/p&gt;
   &lt;/div&gt;
   &lt;div class="card-header-right"&gt;
     &lt;ul class="list-unstyled card-option"&gt;
       &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;/ul&gt;
   &lt;/div&gt;
   &lt;div class="city-weather"&gt;
     &lt;ul class="weather-wrraper"&gt;
       &lt;li&gt;
        &lt;h3&gt; 12&lt;sup&gt;&deg;&lt;/sup&gt;C&lt;/h3&gt;
        &lt;span&gt;&lt;/span&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;div class="icon-moon"&gt;
           &lt;i data-feather="moon"&gt;&lt;/i&gt;
         &lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;
         &lt;a class="btn btn-primary"&gt; 
           &lt;i class="fa fa-refresh me-2"&gt;&lt;/i&gt;Refresh&lt;/a&gt;
       &lt;/li&gt;
     &lt;/ul&gt;
     &lt;span&gt;Cool Night&lt;/span&gt;
     &lt;p&gt;Beautiful Sunny Day Walk &lt;/p&gt;
   &lt;/div&gt;
 &lt;/div&gt;
&lt;div class="card-body weather-img"&gt;
  &lt;img class="img-fluid bg-img-cover" src="../assets/images/dashboard/weather.png" alt="" /&gt;
  &lt;div class="ag-snow"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;              </code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-7 col-sm-6 box-col-3 our-city">
                <div class="card recent-activi">
                  <div class="card-header pb-0 border-0">
                    <h5>Recent Activity</h5>
                    <div class="center-content">
                      <p>Install app , upgrade system</p>
                    </div>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="icon-more-alt"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordernone">
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                  <g>
                                    <g>
                                      <path d="M506.35,80.699c-7.57-7.589-19.834-7.609-27.43-0.052L331.662,227.31l-42.557-42.557c-7.577-7.57-19.846-7.577-27.423,0                                                      L89.076,357.36c-7.577,7.57-7.577,19.853,0,27.423c3.782,3.788,8.747,5.682,13.712,5.682c4.958,0,9.93-1.894,13.711-5.682                                                      l158.895-158.888l42.531,42.524c7.57,7.57,19.808,7.577,27.397,0.032l160.97-160.323                                                      C513.881,100.571,513.907,88.288,506.35,80.699z"></path>
                                    </g>
                                  </g>
                                  <g>
                                    <g>
                                      <path d="M491.96,449.94H38.788V42.667c0-10.712-8.682-19.394-19.394-19.394S0,31.955,0,42.667v426.667                                                      c0,10.712,8.682,19.394,19.394,19.394H491.96c10.712,0,19.394-8.682,19.394-19.394C511.354,458.622,502.672,449.94,491.96,449.94z                                                      "></path>
                                    </g>
                                  </g>
                                  <g>
                                    <g>
                                      <path d="M492.606,74.344H347.152c-10.712,0-19.394,8.682-19.394,19.394s8.682,19.394,19.394,19.394h126.061v126.067                                                      c0,10.705,8.682,19.394,19.394,19.394S512,249.904,512,239.192V93.738C512,83.026,503.318,74.344,492.606,74.344z"></path>
                                    </g>
                                  </g>
                                </svg>
                                <div class="flex-grow-1"><span>Google Project</span>
                                  <p>Completed in 3 Hours</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                  <path d="m362 91v-60h-212v60h-150v390h512c0-16.889 0-372.29 0-390zm-182-30h152v30h-152zm302 390h-452v-202.844l90 36v46.844h90v-30h92v30h90v-46.844l90-36zm-302-150h-30v-60h30zm152-60h30v60h-30c0-7.259 0-52.693 0-60zm150-25.156-90 36v-40.844h-90v60h-92v-60h-90v40.844l-90-36c0-14.163 0-84.634 0-94.844h452z"></path>
                                </svg>
                                <div class="flex-grow-1"><span>Business Logo Create</span>
                                  <p>Completed in 5 Hours</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                    <path d="m345.622 126.038c-50.748-45.076-130.482-46.914-183.244 3.903-21.262 20.478-35.375 47.381-39.737 75.754-5.454 35.471 2.872 70.834 23.444 99.576 56.271 78.616 49.132 141.058 49.915 145.691 0 16.435 6.211 31.795 17.491 43.253 11.289 11.469 26.386 17.785 42.509 17.785 33.084 0 60-26.916 60-60 .686-4.269-6.11-72.81 47.676-143.691 17.875-23.557 27.324-51.673 27.324-81.309 0-38.547-16.54-75.347-45.378-100.962zm-89.622 355.962c-16.486 0-29.462-13.096-29.975-30h59.975c0 16.542-13.458 30-30 30zm83.777-191.826c-30.015 39.554-47.946 84.707-52.569 131.826h-62.57c-4.961-45.331-23.43-91.26-54.157-134.19-15.985-22.333-22.444-49.876-18.188-77.556 7.293-47.43 49.733-88.262 103.846-88.262 58.661 0 104.861 47.891 104.861 105.008 0 23.032-7.339 44.877-21.223 63.174z"></path>
                                    <path d="m256 62c8.284 0 15-6.716 15-15v-32c0-8.284-6.716-15-15-15s-15 6.716-15 15v32c0 8.284 6.716 15 15 15z"></path>
                                    <path d="m419.385 149.99 25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.142-7.175-13.316-9.633-20.49-5.49l-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.162 7.21 13.349 9.613 20.49 5.49z"></path>
                                    <path d="m92.615 304.01-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.163 7.21 13.35 9.613 20.49 5.49l25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.141-7.175-13.316-9.632-20.49-5.49z"></path>
                                    <path d="m338.5 84.105c7.141 4.124 16.33 1.716 20.49-5.49l15-25.98c4.142-7.174 1.684-16.348-5.49-20.49-7.174-4.144-16.349-1.685-20.49 5.49l-15 25.98c-4.142 7.175-1.684 16.348 5.49 20.49z"></path>
                                    <path d="m153.01 78.615c4.163 7.21 13.35 9.613 20.49 5.49 7.174-4.142 9.632-13.316 5.49-20.49l-15-25.98c-4.142-7.174-13.315-9.633-20.49-5.49-7.174 4.142-9.632 13.316-5.49 20.49z"></path>
                                    <path d="m445.365 319.01-25.98-15c-7.175-4.143-16.349-1.684-20.49 5.49-4.142 7.174-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"></path>
                                    <path d="m107.615 124.01-25.98-15c-7.175-4.144-16.348-1.684-20.49 5.49s-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"></path>
                                    <path d="m466 212h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15s-6.716-15-15-15z"></path>
                                    <path d="m91 227c0-8.284-6.716-15-15-15h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15z"></path>
                                    <path d="m275.394 216.394-19.394 19.393-19.394-19.393c-5.857-5.858-15.355-5.858-21.213 0s-5.858 15.355 0 21.213l25.607 25.606v53.787c0 8.284 6.716 15 15 15s15-6.716 15-15v-53.787l25.606-25.606c5.858-5.858 5.858-15.355 0-21.213-5.857-5.859-15.355-5.859-21.212 0z"></path>
                                  </g>
                                </svg>
                                <div class="flex-grow-1"><span>Business Research</span>
                                  <p>Due in 1 hour</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                    <path d="m512 390v-390h-512v390h241v32h-15c-41.355 0-75 33.645-75 75v15h210v-15c0-41.355-33.645-75-75-75h-15v-32zm-226 62c19.556 0 36.239 12.539 42.43 30h-144.86c6.191-17.461 22.874-30 42.43-30zm-256-92v-330h452v330c-12.164 0-438.947 0-452 0z"></path>
                                    <path d="m136 180c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z"></path>
                                    <path d="m184.568 197.848c-28.678-24.39-60.953-16.827-61.054-16.833-35.639 5.799-62.514 38.985-62.514 77.196v41.789h150v-45c0-22.034-9.634-42.865-26.432-57.152zm-3.568 72.152h-90v-11.789c0-23.666 16.049-44.122 37.332-47.584 13.509-2.198 26.578 1.38 36.801 10.074 10.083 8.577 15.867 21.078 15.867 34.299z"></path>
                                    <path d="m241 270h120v30h-120z"></path>
                                    <path d="m241 210h210v30h-210z"></path>
                                    <path d="m241 150h210v30h-210z"></path>
                                    <path d="m331 90h120v30h-120z"></path>
                                    <path d="m241 90h60v30h-60z"></path>
                                    <path d="m391 270h60v30h-60z"></path>
                                  </g>
                                </svg>
                                <div class="flex-grow-1"><span>Recruitment in IT</span>
                                  <p>Complete in 2 Hours</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <svg viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                  <path d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531s26.628906 132.667969 74.980469 181.019531c48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.640625 74.980469-181.019531s-26.628906-132.667969-74.980469-181.019531zm-181.019531 407.019531c-124.617188 0-226-101.382812-226-226s101.382812-226 226-226 226 101.382812 226 226-101.382812 226-226 226zm0 0"></path>
                                  <path d="m326.203125 234.433594-23.339844 5.160156v-112.898438c0-8.285156-6.71875-15-15-15h-63.722656c-8.285156 0-15 6.714844-15 15v112.898438l-23.34375-5.160156c-10.226563-2.261719-20.695313 1.832031-26.675781 10.429687-5.976563 8.597657-6.171875 19.839844-.492188 28.636719l73.398438 113.742188c5.277344 8.179687 14.238281 13.0625 23.972656 13.0625s18.695312-4.882813 23.972656-13.0625l73.402344-113.738282c5.679688-8.800781 5.484375-20.042968-.496094-28.640625-5.980468-8.597656-16.449218-12.691406-26.675781-10.429687zm-105.304687 38.488281c4.441406.980469 9.085937-.105469 12.632812-2.949219 3.546875-2.847656 5.609375-7.152344 5.609375-11.699218v-116.578126h33.722656v116.578126c0 4.546874 2.0625 8.851562 5.605469 11.699218 3.546875 2.847656 8.191406 3.929688 12.632812 2.949219l31.429688-6.953125-66.53125 103.09375-66.527344-103.09375zm0 0"></path>
                                </svg>
                                <div class="flex-grow-1"><span>Submit Riverfront Project</span>
                                  <p>Complete in 2 Days</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#recentactiviti" title="" data-bs-original-title="Copy" aria-label="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="recentactiviti">&lt;div class="card recent-activi"&gt;
 &lt;div class="card-header pb-0 border-0"&gt;
   &lt;h5&gt;Recent Activity&lt;/h5&gt;
   &lt;div class="center-content"&gt;
   &lt;p&gt;Install app , upgrade system&lt;/p&gt;
 &lt;/div&gt;
 &lt;div class="card-header-right"&gt;
   &lt;ul class="list-unstyled card-option"&gt;
     &lt;li&gt;&lt;i class="icon-more-alt"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="view-html fa fa-code"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-maximize full-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card"&gt;&lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body ps-0 pe-0"&gt;
 &lt;div class="table-responsive"&gt;
   &lt;table class="table table-bordernone"&gt;
     &lt;tbody&gt;
       &lt;tr&gt; 
         &lt;td&gt;
           &lt;div class="media"&gt;
             &lt;svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;path d="M506.35,80.699c-7.57-7.589-19.834-7.609-27.43-0.052L331.662,227.31l-42.557-42.557c-7.577-7.57-19.846-7.577-27.423,0 L89.076,357.36c-7.577,7.57-7.577,19.853,0,27.423c3.782,3.788,8.747,5.682,13.712,5.682c4.958,0,9.93-1.894,13.711-5.682 l158.895-158.888l42.531,42.524c7.57,7.57,19.808,7.577,27.397,0.032l160.97-160.323 C513.881,100.571,513.907,88.288,506.35,80.699z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;path d="M491.96,449.94H38.788V42.667c0-10.712-8.682-19.394-19.394-19.394S0,31.955,0,42.667v426.667 c0,10.712,8.682,19.394,19.394,19.394H491.96c10.712,0,19.394-8.682,19.394-19.394C511.354,458.622,502.672,449.94,491.96,449.94z "&gt;&lt;/path&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;g&gt;&lt;br /&gt;&lt;path d="M492.606,74.344H347.152c-10.712,0-19.394,8.682-19.394,19.394s8.682,19.394,19.394,19.394h126.061v126.067 c0,10.705,8.682,19.394,19.394,19.394S512,249.904,512,239.192V93.738C512,83.026,503.318,74.344,492.606,74.344z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;/svg&gt;&lt;br /&gt;&lt;div class="media-body"&gt;&lt;span&gt;Google Projetc Apply Review&lt;/span&gt;&lt;br /&gt;&lt;p&gt;Completed in 3 Hours&lt;/p&gt;&lt;br /&gt;&lt;/div&gt;&lt;br /&gt;&lt;/div&gt;&lt;br /&gt;&lt;/td&gt;&lt;br /&gt;&lt;/tr&gt;&lt;br /&gt;&lt;tr&gt;&lt;br /&gt;&lt;td&gt;&lt;br /&gt;&lt;div class="media"&gt;&lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;&lt;br /&gt;&lt;path d="m362 91v-60h-212v60h-150v390h512c0-16.889 0-372.29 0-390zm-182-30h152v30h-152zm302 390h-452v-202.844l90 36v46.844h90v-30h92v30h90v-46.844l90-36zm-302-150h-30v-60h30zm152-60h30v60h-30c0-7.259 0-52.693 0-60zm150-25.156-90 36v-40.844h-90v60h-92v-60h-90v40.844l-90-36c0-14.163 0-84.634 0-94.844h452z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/svg&gt;
             &lt;div class="media-body"&gt;
               &lt;span&gt;Business Logo Craeate&lt;/span&gt;
               &lt;p&gt;Completed in 5 Hours&lt;/p&gt;
             &lt;/div&gt;
           &lt;/div&gt;
         &lt;/td&gt;
       &lt;/tr&gt;
       &lt;tr&gt;
        &lt;td&gt;
           &lt;div class="media"&gt;
             &lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;&lt;g&gt;
               &lt;path d="m345.622 126.038c-50.748-45.076-130.482-46.914-183.244 3.903-21.262 20.478-35.375 47.381-39.737 75.754-5.454 35.471 2.872 70.834 23.444 99.576 56.271 78.616 49.132 141.058 49.915 145.691 0 16.435 6.211 31.795 17.491 43.253 11.289 11.469 26.386 17.785 42.509 17.785 33.084 0 60-26.916 60-60 .686-4.269-6.11-72.81 47.676-143.691 17.875-23.557 27.324-51.673 27.324-81.309 0-38.547-16.54-75.347-45.378-100.962zm-89.622 355.962c-16.486 0-29.462-13.096-29.975-30h59.975c0 16.542-13.458 30-30 30zm83.777-191.826c-30.015 39.554-47.946 84.707-52.569 131.826h-62.57c-4.961-45.331-23.43-91.26-54.157-134.19-15.985-22.333-22.444-49.876-18.188-77.556 7.293-47.43 49.733-88.262 103.846-88.262 58.661 0 104.861 47.891 104.861 105.008 0 23.032-7.339 44.877-21.223 63.174z"&gt;&lt;/path&gt;
               &lt;path d="m256 62c8.284 0 15-6.716 15-15v-32c0-8.284-6.716-15-15-15s-15 6.716-15 15v32c0 8.284 6.716 15 15 15z"&gt;&lt;/path&gt;
               &lt;path d="m419.385 149.99 25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.142-7.175-13.316-9.633-20.49-5.49l-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.162 7.21 13.349 9.613 20.49 5.49z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m92.615 304.01-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.163 7.21 13.35 9.613 20.49 5.49l25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.141-7.175-13.316-9.632-20.49-5.49z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m338.5 84.105c7.141 4.124 16.33 1.716 20.49-5.49l15-25.98c4.142-7.174 1.684-16.348-5.49-20.49-7.174-4.144-16.349-1.685-20.49 5.49l-15 25.98c-4.142 7.175-1.684 16.348 5.49 20.49z"&gt;&lt;/path&gt;
               &lt;path d="m153.01 78.615c4.163 7.21 13.35 9.613 20.49 5.49 7.174-4.142 9.632-13.316 5.49-20.49l-15-25.98c-4.142-7.174-13.315-9.633-20.49-5.49-7.174 4.142-9.632 13.316-5.49 20.49z"&gt;&lt;/path&gt;
               &lt;path d="m445.365 319.01-25.98-15c-7.175-4.143-16.349-1.684-20.49 5.49-4.142 7.174-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m107.615 124.01-25.98-15c-7.175-4.144-16.348-1.684-20.49 5.49s-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"&gt;&lt;/path&gt;
               &lt;path d="m466 212h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15s-6.716-15-15-15z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m91 227c0-8.284-6.716-15-15-15h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m275.394 216.394-19.394 19.393-19.394-19.393c-5.857-5.858-15.355-5.858-21.213 0s-5.858 15.355 0 21.213l25.607 25.606v53.787c0 8.284 6.716 15 15 15s15-6.716 15-15v-53.787l25.606-25.606c5.858-5.858 5.858-15.355 0-21.213-5.857-5.859-15.355-5.859-21.212 0z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/g&gt;
             &lt;/svg&gt;
             &lt;div class="media-body"&gt;
               &lt;span&gt;Business Project Research&lt;/span&gt;
               &lt;p&gt;Due in 1 hour&lt;/p&gt;
             &lt;/div&gt;
             &lt;/div&gt;
        &lt;/td&gt;
       &lt;/tr&gt;
       &lt;tr&gt;
         &lt;td&gt;
           &lt;div class="media"&gt;
             &lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;&lt;g&gt;
               &lt;path d="m512 390v-390h-512v390h241v32h-15c-41.355 0-75 33.645-75 75v15h210v-15c0-41.355-33.645-75-75-75h-15v-32zm-226 62c19.556 0 36.239 12.539 42.43 30h-144.86c6.191-17.461 22.874-30 42.43-30zm-256-92v-330h452v330c-12.164 0-438.947 0-452 0z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m136 180c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m184.568 197.848c-28.678-24.39-60.953-16.827-61.054-16.833-35.639 5.799-62.514 38.985-62.514 77.196v41.789h150v-45c0-22.034-9.634-42.865-26.432-57.152zm-3.568 72.152h-90v-11.789c0-23.666 16.049-44.122 37.332-47.584 13.509-2.198 26.578 1.38 36.801 10.074 10.083 8.577 15.867 21.078 15.867 34.299z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m241 270h120v30h-120z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m241 210h210v30h-210z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m241 150h210v30h-210z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m331 90h120v30h-120z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m241 90h60v30h-60z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m391 270h60v30h-60z"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/g&gt;&lt;br /&gt;&lt;/svg&gt;
             &lt;div class="media-body"&gt;
               &lt;span&gt;Recruitment in IT Department&lt;/span&gt;
               &lt;p&gt;Complete in 2 Hours&lt;/p&gt;
             &lt;/div&gt;
           &lt;/div&gt;
         &lt;/td&gt;
       &lt;/tr&gt;
       &lt;tr&gt;
         &lt;td&gt;
           &lt;div class="media"&gt;
             &lt;svg viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;&lt;br /&gt;&lt;path d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531s26.628906 132.667969 74.980469 181.019531c48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.640625 74.980469-181.019531s-26.628906-132.667969-74.980469-181.019531zm-181.019531 407.019531c-124.617188 0-226-101.382812-226-226s101.382812-226 226-226 226 101.382812 226 226-101.382812 226-226 226zm0 0"&gt;&lt;/path&gt;&lt;br /&gt;&lt;path d="m326.203125 234.433594-23.339844 5.160156v-112.898438c0-8.285156-6.71875-15-15-15h-63.722656c-8.285156 0-15 6.714844-15 15v112.898438l-23.34375-5.160156c-10.226563-2.261719-20.695313 1.832031-26.675781 10.429687-5.976563 8.597657-6.171875 19.839844-.492188 28.636719l73.398438 113.742188c5.277344 8.179687 14.238281 13.0625 23.972656 13.0625s18.695312-4.882813 23.972656-13.0625l73.402344-113.738282c5.679688-8.800781 5.484375-20.042968-.496094-28.640625-5.980468-8.597656-16.449218-12.691406-26.675781-10.429687zm-105.304687 38.488281c4.441406.980469 9.085937-.105469 12.632812-2.949219 3.546875-2.847656 5.609375-7.152344 5.609375-11.699218v-116.578126h33.722656v116.578126c0 4.546874 2.0625 8.851562 5.605469 11.699218 3.546875 2.847656 8.191406 3.929688 12.632812 2.949219l31.429688-6.953125-66.53125 103.09375-66.527344-103.09375zm0 0"&gt;&lt;/path&gt;&lt;br /&gt;&lt;/svg&gt;
             &lt;div class="media-body"&gt;
               &lt;span&gt;Submit Riverfront Project&lt;/span&gt;
               &lt;p&gt;Complete in 2 Days&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/td&gt;
      &lt;/tr&gt;
    &lt;/tbody&gt;
  &lt;/table&gt;
   &lt;/div&gt;
  &lt;/div&gt;
 &lt;/div&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
		  <?php
				// include '../layouts/footer.php'
        $this->include('layouts/footer.php');
		  ?>

      </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/chart/chartist/chartist.js"></script>
    <script src="../assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="../assets/js/chart/knob/knob.min.js"></script>
    <script src="../assets/js/chart/knob/knob-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="../assets/js/prism/prism.min.js"></script>
    <script src="../assets/js/clipboard/clipboard.min.js"></script>
    <script src="../assets/js/custom-card/custom-card.js"></script>
    <script src="../assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="../assets/js/dashboard/default.js"></script>
    <script src="../assets/js/notify/index.js"></script>
    <script src="../assets/js/slick-slider/slick.min.js"></script>
    <script src="../assets/js/slick-slider/slick-theme.js"></script>
    <script src="../assets/js/typeahead/handlebars.js"></script>
    <script src="../assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="../assets/js/typeahead/typeahead.custom.js"></script>
    <script src="../assets/js/typeahead-search/handlebars.js"></script>
    <script src="../assets/js/typeahead-search/typeahead-custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>