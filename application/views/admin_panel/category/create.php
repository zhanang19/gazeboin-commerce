<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 08/06/2019
 * Time: 20:26
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
                                <i class="material-icons">label</i>
                            </div>
                            <h4 class="card-title">Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/category/store') ?>" method="post">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_name">Category Name</label>
                                            <input name="category_name" type="text" class="form-control" value="<?= old('category_name') ?>">
                                            <?= form_error('category_name') ?>
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