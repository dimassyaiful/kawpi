<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?php 
      if(empty($title_halaman)){
        echo "Undefined Page?";
      }else{
        echo $title_halaman;
      }
    ?>
    
  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="src/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/vendors/fa/css/font-awesome.min.css" > 
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="src/css/horizontal-layout/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="src/fa/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <h2 style="color: white"> KAWPI </h2>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
           
            <ul class="navbar-nav navbar-nav-right">
              
              <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" >
                  <img src="src/images/tony.jpg"/>
                  <span class="nav-profile-name"><?= $this->session->userdata('nama'); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="fa fa-user text-primary"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="<?= base_url(); ?>login/out"> 
                    <i class="fa fa-sign-out text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-vcard fa-fw menu-icon"></i>
                <span class="menu-title">Data Anggota</span>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Pendaftar Baru</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/advanced_elements.html">Anggora Resmi</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Data Pengguna</span>
                </a>
             
            </li>
           
          </ul>
        </div>
      </nav>
    </div>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">