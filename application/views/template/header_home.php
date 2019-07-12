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
  </style>
</head>

<body class="bg">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container" style="padding: 10px;">
          <div class="text-center navbar-nav-left d-flex  ">
            <a href="<?= base_url(); ?>" class="nav-link"> <h2 style="color: white"> KAWPI </h2> </a>
          </div>
          <div class="text-center navbar-nav-right d-flex ">
            <a class="nav-link" href="<?= base_url(); ?>login" >
              Log In
            </a>
            <a class="nav-link" href="<?= base_url(); ?>register" >
              Register
            </a>
          </div>


        </div>
      </nav>
      

    </div >

    <!-- partial -->
    <div>
      <div>
        <div style="padding-top: 200px;">

          <center> 
            <h1 style="color: white; font-size: 60pt;"> HOME PAGE </h1> 
            <h1 style="color: white;"> "Quotes"</h1>
          </center>