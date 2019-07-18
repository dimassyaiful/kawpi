<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KAWPI</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>src/vendors/fa/css/font-awesome.min.css" > 
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>src/css/horizontal-layout/style.css"> 
  <style type="text/css">
    body, html {
      height: 100% !important;
        }

        .bg { 
          /* The image used */
          background-image: url("<?php base_url(); ?>src/images/home.jpg") !important;

          /* Full height */
          height: 100%; 

          /* Center and scale the image nicely */
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          
        }

        .navbar-nav a{
          color: white !important;
          margin-right: 10px;
          margin-left: 10px;
        }
  </style>
</head>

<body class="bg" bgcolor="black">

         <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #00450f; position: fixed; width: 100%;"  >
        <a href="<?= base_url(); ?>" class="navbar-brand">
            <h3> KAWPI</h3>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            
            <div class="navbar-nav ml-auto">
                <a href="<?= base_url().'login'; ?>" class="nav-item nav-link">Login</a>
                <a href="<?= base_url().'register'; ?>" class="nav-item nav-link">Register  </a>
            </div>
        </div>
    </nav>

    <!-- partial -->
    <div>
      <div>
        <div style="padding-top: 200px;">

          <center> 
            <h6 style="color: white; font-size: 40pt;"> Keanggotaan Asosiasi Web Programmer Indonesia </h6> 
            <h5 style="color: white;"> "Sudahkah anda bergabung sebagai anggota ??"</h5 >
          </center>