<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title ?> | ArachniApp</title>

        <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/build/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/arachniapp.css" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title navLogo" style="border: 0;">
                            <a href="<?php echo base_url(); ?>" class="site_title"><img src="<?php echo base_url(); ?>/assets/img/AAlogo.png" style="width:80%;"></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="<?php echo base_url(); ?>assets/img/userIcon.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo $username; ?></h2>
                            </div>
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>Search by</h3>
                                <ul class="nav side-menu">
                                    <?php
                                    if($active == "fn"){
                                    ?>
                                        <li  class="active">
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <li>
                                    <?php
                                    }
                                    ?>
                                            <a href="<?php echo base_url(); ?>main/file_name">
                                            <i class="fa fa-file-text-o"></i>
                                            File Name
                                            </a>
                                        </li>
                                    <?php
                                    if($active == "ca"){
                                    ?>
                                        <li  class="active">
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <li>
                                    <?php
                                    }
                                    ?>
                                            <a href="<?php echo base_url(); ?>main/category_list">
                                            <i class="fa fa-coffee"></i>
                                            Category
                                            </a>
                                        </li>
                                    <?php
                                    if($active == "da"){
                                    ?>
                                        <li  class="active">
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <li>
                                    <?php
                                    }
                                    ?>
                                            <a href="<?php echo base_url(); ?>main/date_list">
                                            <i class="fa fa-calendar"></i>
                                            Date
                                            </a>
                                        </li>
                                    <?php
                                    if($active == "wp"){
                                    ?>
                                        <li  class="active">
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <li>
                                    <?php
                                    }
                                    ?>
                                            <a href="<?php echo base_url(); ?>main/web_portal_list">
                                            <i class="fa fa-laptop"></i>
                                            Web Portal
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-footer hidden-small icons-background">
                            <a href="<?php echo base_url(); ?>main" data-toggle="tooltip" data-placement="top" title="Introduction">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="User manual">
                                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="ArachniApp Desktop">
                                <i class="fa fa-github" style="font-size:125%;" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url(); ?>home/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>