<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 05/06/2019
 * Time: 18:11
 * Project: e-commerce
 */
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">group</i>
                            </div>
                            <h4 class="card-title">Edit User</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/user/update') ?>" method="post">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="<?= $data['user']['id'] ?>">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" class="form-control" value="<?= old('name', $data['user']['name']) ?>">
                                            <?= form_error('name') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input name="username" type="text" class="form-control disabled" disabled value="<?= $data['user']['username'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" type="email" class="form-control disabled" disabled value="<?= $data['user']['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input name="address" type="text" class="form-control" value="<?= old('address', $data['user']['address']) ?>">
                                            <?= form_error('address') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <input name="level" type="text" class="form-control" value="<?= old('level', $data['user']['level']) ?>">
                                            <?= form_error('level') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="btn btn-default" onclick="javascript:history.back()">Back</button>
                                        <button type="submit" class="btn btn-rose">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>