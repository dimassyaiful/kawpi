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
    .navbar-nav a{
      color: white !important;
      margin-right: 10px;
      margin-left: 10px;
    }
  </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #00450f; position: fixed; width: 100%;">
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
    <div class="container-fluid" >
      <div class="main-panel" >
        <div class="content-wrapper" style="padding-top: 100px;">