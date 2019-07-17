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
  <link rel="stylesheet" href="<?= base_url(); ?>src/vendors/fa/css/font-awesome.min.css" > 
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>src/css/horizontal-layout/style.css">

  
  <script src="<?= base_url(); ?>src/vendors/chart.js/Chart.min.js"></script>
  <style type="text/css">
    .navbar-nav a{
      color: white !important;
      margin-right: 10px;
      margin-left: 10px;
    }
    .dropdown-menu a{
      color: black !important;
      margin-right: 10px;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  
  <?php $this->load->view('template/menu'); ?>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="min-height: 600px;">