<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    
    <title>Shop Gazeboin</title>
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/material-design-iconic-font.min.css') ?>" />
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/material-dashboard.css') ?>" />

    <script src="<?= base_url('assets/js/core/jquery.min.js') ?>"></script>

</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="rose" data-background-color="black" data-image="">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a href="<?= base_url() ?>" class="simple-text logo-mini">SG</a>
                <a href="<?= base_url() ?>" class="simple-text logo-normal">SHOP GAZEBOIN</a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="https://via.placeholder.com/150" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" data-target="#user-profile" href="javascript:void(0)" class="username">
                            <span><?= get_userdata()['name'] ?> <b class="caret"></b></span>
                        </a>
                        <div class="collapse" id="user-profile">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('page/profile') ?>">
                                        <span class="sidebar-mini">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <span class="sidebar-normal">My Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Include menu here -->
                <?php include 'admin_menu.php'; ?>
            </div>
        </div>
        <div class="main-panel"> 
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle Menu">
                        <span class="sr-only">Toggle Menu</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0)" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">Account</p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownProfile">
                                    <a class="dropdown-item" href="<?= base_url('page/profile') ?>">Profile</a>
                                    <a class="dropdown-item" href="<?= base_url('page/profile') ?>">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('page/logout') ?>">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            