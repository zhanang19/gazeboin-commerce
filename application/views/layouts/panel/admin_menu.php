<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/user') ?>">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/category') ?>">
                    <i class="material-icons">label</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/product') ?>">
                    <i class="material-icons">attach_file</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#menu-event" aria-expanded="false">
                    <i class="material-icons">event</i>
                    <p>Events<b class="caret"></b></p>
                </a>
                <div class="collapse" id="menu-event">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini">
                                    <i class="material-icons">event</i>
                                </span>
                                <span class="sidebar-normal">All Events</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>