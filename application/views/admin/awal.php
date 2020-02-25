<?php date_default_timezone_set("Asia/Jakarta"); $tahun = date("Y"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WORKSHOP ELEARNING</title>
    <link rel="icon" href="<?= base_url('assets/')?>images/Logowrk.png" type="image/png">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/')?>vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/')?>dist/sweetalert2.min.css">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/')?>build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .tampilan{
        margin: 20px 20px;
      }
      .kotak{
        width: 80%;
        height: 250px;
        background: grey;
        color: white;
        border-radius: 5px;
        opacity: 80%;
      }
      .menu{
        width: 80%;
        height: 35px;
        color: white;
        border-radius: 5px;
        margin-top: 10px;
        margin-left: 5px;
        font-weight: bold;
      }
      h5{
        font-size: 15px;
        padding-top: 8px;
        font-weight: bold;
      }
      img{
        width: 55%;
        margin-top: 35px;
      }
      .gambar{
        width: 30%;
        margin-top: 20px;
      }
    </style>
  </head>

  <body class="login">
    <div class="row tampilan">
      <div class="form-group">
        <div align="center" class="col-md-6 col-sm-12 col-xs-12"> 
          <div class="kotak"><h5><br>DASHBOARD ELEARNING WORKSHOP</h5><img src="<?= base_url('assets/')?>images/toga.png"></div>
          <div class="clearfix"></div>
          <a href="<?= base_url('loginelearning')?>" class="menu btn btn-primary" target="_blank">MASUK ELEARNING WORKSHOP</a>
        </div>
        <div align="center" class="col-md-6 col-sm-12 col-xs-12">
          <div class="kotak"><h5><br>DASHBOARD INVENTARIS WORKSHOP</h5><img src="<?= base_url('assets/')?>images/inventory.png" class="gambar"></div>
          <div class="clearfix"></div>
          <a href="#" class="menu btn btn-primary">MASUK INVENTARIS WORKSHOP</a>
        </div>
      </div>
      <center><img src="<?= base_url('assets/')?>images/Logowrk.png"></center>
    </div>
  </body>
</html>
