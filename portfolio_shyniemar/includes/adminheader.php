<?php
ob_start(); 


ob_end_flush(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SHY ADMIN </title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../index.html">
            SH
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="menu-icon mdi mdi-account-circle-outline" style="width:1000px;"></i>
              <!-- <i class="menu-arrow"></i> -->
             </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> -->
          <<li class="nav-item">
    <a class="nav-link" href="../admin/intro.php">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Introduction</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/education.php">
        <i class="mdi mdi-school menu-icon"></i>
        <span class="menu-title">Education</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/technical.php">
        <i class="mdi mdi-laptop menu-icon"></i>
        <span class="menu-title">Technical</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/Projects.php">
        <i class="mdi mdi-folder-multiple menu-icon"></i>
        <span class="menu-title">Projects</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/gallery.php">
        <i class="mdi mdi-image menu-icon"></i>
        <span class="menu-title">Gallery</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/resume.php">
        <i class="mdi mdi-file-document menu-icon"></i>
        <span class="menu-title">Resume</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../admin/inquiries.php">
        <i class="mdi mdi-email menu-icon"></i>
        <span class="menu-title">Inquiries</span>
    </a>
</li>

          <!-- <li class="nav-item nav-category">pages</li> -->
          <li class="nav-item">
            <a class="nav-link" href="index.html  " data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Admin</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="login.php"> Login </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-panel">