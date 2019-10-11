<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>ASDP | Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap Select Css -->
    <link href="<?=base_url();?>assets/backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= site_url('assets/backend/plugins/jquery-datatable/dataTables.bootstrap4.min.css'); ?>">

    <link rel="stylesheet" href="<?=base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css"/>
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/plugins/morrisjs/morris.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/main.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/css/color_skins.css">
    <link rel="stylesheet" href="<?= site_url('assets/backend/plugins/jquery-datatable/dataTables.bootstrap4.min.css'); ?>">
</head>
<body class="theme-orange">
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>
<nav class="navbar">
    <div class="col-12">
        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">Asdp</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        </ul>
       <!--  <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li>
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-coral"> <i class="material-icons">person_add</i> </div>
                                <div class="menu-info">
                                    <h4>12 new members joined</h4>
                                    <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-turquoise"> <i class="material-icons">add_shopping_cart</i> </div>
                                <div class="menu-info">
                                    <h4>4 sales made</h4>
                                    <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle g-bg-cyan"> <i class="material-icons">delete_forever</i> </div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle g-bg-blue"> <i class="material-icons">mode_edit</i> </div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> changed name</h4>
                                    <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-slategray"> <i class="material-icons">comment</i> </div>
                                <div class="menu-info">
                                    <h4><b>John</b> commented your post</h4>
                                    <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-seagreen"> <i class="material-icons">cached</i> </div>
                                <div class="menu-info">
                                    <h4><b>John</b> updated status</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-blue"> <i class="material-icons">settings</i> </div>
                                <div class="menu-info">
                                    <h4>Settings updated</h4>
                                    <p> <i class="material-icons">access_time</i> Yesterday </p>
                                </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            
            <li><a href="#" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
        </ul> -->
    </div> 
</nav>
<?php //print_r($this->session->userdata('admin_data')); die();?>

<aside id="leftsidebar" class="sidebar">
     <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?=base_url();?>assets/backend/images/xs/avatar1.jpg" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown"><?=$this->session->userdata('admin_data')->username;?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button" style="position: relative;left: 55px;top: 5px;"> keyboard_arrow_down </i>
                <ul class="dropdown-menu slideUp">
                    <li><a href="#"><i class="material-icons">person</i>Profile</a></li>
                    <li class="divider"></li>
                   <!--  <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li> -->
                    <!-- <li class="divider"></li> -->
                    <li><a href="<?=base_url();?>panel/logout"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
            <?php
                if(!isset($this->session->userdata('admin_data')->id_cabang)){
            ?>
            <div class="email" style="font-size: 9px"><?= $this->session->userdata('admin_data')->email;?></div>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- #User Info --> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li> <a href="<?=base_url();?>"><i class="zmdi zmdi-home"></i><span>Beranda</span> </a> </li>
            <?php
                if($this->session->userdata('admin_data')->roles == 4){

                }else{
            ?>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder-outline"></i><span>Master Data</span></a>
                <ul class="ml-menu">
                    <?php
                        if($this->session->userdata('admin_data')->roles==5){
                    ?>  
                            <li><a href="<?=base_url();?>panel/roles">Roles</a></li>
                            <li><a href="<?=base_url();?>panel/users">User</a></li>
                    <?php
                        }
                        else{
                            if(($this->session->userdata('admin_data')->roles==3) && (isset($this->session->userdata('admin_data')->id_cabang))){
                    ?>
                                <!-- <li><a href="<?=base_url();?>panel/icon">Icon</a></li> -->
                                <!-- <li><a href="<?=base_url();?>panel/cabang">Cabang</a></li> -->
                                <!-- <li><a href="<?=base_url();?>panel/aspek">Aspek</a></li> -->
                                <li><a href="<?=base_url();?>panel/pelabuhan">Pelabuhan</a></li>
                                <li><a href="<?=base_url();?>panel/armada">Armada</a></li>

                    <?php
                            }else{
                    ?>          
                                <li><a href="<?=base_url();?>panel/icon">Icon</a></li>
                                <li><a href="<?=base_url();?>panel/cabang">Cabang</a></li>
                                <li>
                                    <a href="javascript:void(0)" class="menu-toggle">Aspek</a>
                                    <ul class="ml-menu">
                                        <li><a href="<?=base_url();?>panel/aspekArmada" title="">Armada</a></li>
                                        <li><a href="<?=base_url();?>panel/aspekPelabuhan" title="">Pelabuhan</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=base_url();?>panel/pelabuhan">Pelabuhan</a></li>
                                <li><a href="<?=base_url();?>panel/armada">Armada</a></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </li>
            <?php
                }

                if(($this->session->userdata('admin_data')->roles != 5) && ($this->session->userdata('admin_data')->id_cabang != null)){
            ?>
                    <li> <a href="<?=base_url();?>panel/photo"><i class="zmdi zmdi-collection-image-o"></i><span>Foto</span> </a> </li>
                    <li> <a href="<?=base_url();?>panel/video"><i class="zmdi zmdi-collection-video"></i><span>Video</span> </a> </li>
                    <li> <a href="<?=base_url();?>panel/file"><i class="zmdi zmdi-file"></i><span>Standarisasi</span> </a> </li>
                    <li> <a href="<?=base_url();?>backend/notifikasi"><i class="zmdi zmdi-notifications-active"></i><span>Notifikasi <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= count($this->m_model->selectwhere('status','On Process','trans_approval')); ?></span></span> </a> </li>
            <?php

                }else{
                    if($this->session->userdata('admin_data')->roles != 5){
            ?>
                <li> <a href="<?=base_url();?>panel/photo"><i class="zmdi zmdi-collection-image-o"></i><span>Foto</span> </a> </li>
                <li> <a href="<?=base_url();?>panel/video"><i class="zmdi zmdi-collection-video"></i><span>Video</span> </a> </li>
                <li> <a href="<?=base_url();?>panel/file"><i class="zmdi zmdi-file"></i><span>Standarisasi</span> </a> </li>
            <?php
                        if(($this->session->userdata('admin_data')->roles == 1 || 2)){
                        ?>
                             <!-- <li> <a href="#"><i class="zmdi zmdi-file"></i><span>Laporan</span> </a> </li> -->
                            <li> <a href="<?=base_url();?>backend/notifikasi"><i class="zmdi zmdi-notifications-active"></i><span>Notifikasi <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= count($this->m_model->selectwhere('status','On Process','trans_approval')); ?></span></span> </a> </li>
                        <?php
                        }       
                    }elseif(($this->session->userdata('admin_data')->roles == 1) && ($this->session->userdata('admin_data')->roles == 2)){
                        ?>
                             <!-- <li> <a href="#"><i class="zmdi zmdi-file"></i><span>Laporan</span> </a> </li> -->
                    <li> <a href="<?=base_url();?>backend/notifikasi"><i class="zmdi zmdi-notifications-active"></i><span>Notifikasi <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= count($this->m_model->selectwhere('status','On Process','trans_approval')); ?></span></span> </a> </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </div>
    <!-- #Menu -->
</aside>

<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><?php echo isset($title) ? $title : 'Dashboard'; ?>
                <small class="text-muted">Welcome to Asdp Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> <?php echo isset($title) ? $title : 'Dashboard'; ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">