<?php
  include("config.php");
  session_start();

  if(!empty($_SESSION["admin_user"]))
  {
    if(time()-$_SESSION["login_time_stamp"] > 1800) 
    {
        session_unset();
        session_destroy();
        echo ("<script LANGUAGE='JavaScript'>
          window.location.href='login.php';
    	</script>");
    }
  }
  else
  {
    echo ("<script LANGUAGE='JavaScript'>
          window.location.href='login.php';
    </script>");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Trishula Innovation</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/trumbowyg.css">
  <link rel="icon" type="image/png" href="img/png-logo-copy-favicon.png">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand d-flex align-items-center" href="index.php"><img class="img-fluid" width="27px" src="img/png-logo-copy.png"><span>&nbsp;Trishula Innovation</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="home-slider.php">
            <i class="fa fa-fw fa-sliders"></i>
            <span class="nav-link-text">Home Slider</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="about.php">
            <i class="fa fa-fw fa-info-circle"></i>
            <span class="nav-link-text">About Us</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="products.php">
            <i class="fa fa-fw fa-product-hunt"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="vendor.php">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Vendor Registration</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="customer-support.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Customer Support</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="testimonials.php">
            <i class="fa fa-fw fa-comments-o"></i>
            <span class="nav-link-text">Testimonials</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="contact-details.php">
            <i class="fa fa-fw fa-phone-square"></i>
            <span class="nav-link-text">Contact Details</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-power-off"></i>
            <?php
            	if (isset($_SESSION['admin_user']))
                {
                  echo $_SESSION['admin_user'];
                }
            ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">