<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 05/06/2019
 * Time: 17:40
 * Project: e-commerce
 */
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">persons</i>
                            </div>
                            <p class="card-category">User</p>
                            <h3 class="card-title"><?= $data['total_user'] ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">info</i>
                                <a href="#" class="text-muted">More detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">label</i>
                            </div>
                            <p class="card-category">Category</p>
                            <h3 class="card-title"><?= $data['total_category'] ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">info</i>
                                <a href="#" class="text-muted">More detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">attach_file</i>
                            </div>
                            <p class="card-category">Products</p>
                            <h3 class="card-title"><?= $data['total_product'] ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">info</i>
                                <a href="#" class="text-muted">More detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Orders</p>
                            <h3 class="card-title">+245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">info</i>
                                <a href="#" class="text-muted">More detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>