<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=base_url('assets/css/fontastic.css')?>">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=base_url('assets/css/style.default.css')?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url('assets/css/custom.css')?>">

    <!-- Custom CSS Dynamic -->
    <?php if(isset($css)){
      foreach ($css as $css) {
        echo '<link rel="stylesheet" href="'.base_url("$row_css").'">';
      }
    }?>
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Apotek</span></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><img src="<?=base_url()?>assets/img/logo.jpg" height="40px" width="40px" alt=""> </div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                  </ul>
                </li>
                <!-- Logout    -->
                <li class="nav-item"><a href="<?=base_url()?>login/logout" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url('assets/img/foto-profil/foto_default.jpg'); ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Dummy</h1>
              <p>Dummy</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="<?=base_url()?>dashboard"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="#karyawanDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-usd" aria-hidden="true"></i>Karyawan</a>
                      <ul id="karyawanDropdown" class="collapse list-unstyled ">
                        <?php foreach ($list_jabatan as $grid_jabatan):
                          echo '<li><a href="'.base_url("karyawan/c/$grid_jabatan->nama_jabatan").'">'.$grid_jabatan->nama_jabatan.'</a></li>';
                        endforeach; ?>
                      </ul>
                    </li>
                    <li class=""><a href="<?=base_url()?>jabatan"><i class="fa fa-home" aria-hidden="true"></i>Jabatan</a></li>
                    <li><a href="#finaceDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-usd" aria-hidden="true"></i>Keuangan</a>
                      <ul id="finaceDropdown" class="collapse list-unstyled ">
                        <li><a href="<?=base_url()?>perkiraan">Estimate</a></li>
                        <li><a href="<?=base_url()?>keuangan">Financial Data</a></li>
                      </ul>
                    </li>
                    <li><a href="#galleryDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-picture-o" aria-hidden="true"></i>Pesanan</a>
                      <ul id="galleryDropdown" class="collapse list-unstyled ">
                        <li><a href="<?=base_url()?>post/add">Post</a></li>
                        <li><a href="<?=base_url()?>post">View Data</a></li>
                      </ul>
                    </li>
                    <li><a href="<?=base_url('obat')?>"><i class="fa fa-file" aria-hidden="true"></i>Kelola Obat</a></li>
          </ul>
          <span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="<?=base_url()?>setting"><i class="fa fa-cog" aria-hidden="true"></i>Account Setting</a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?=$title?></h2>
            </div>
          </header>
