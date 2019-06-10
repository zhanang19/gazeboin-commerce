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
                                <i class="material-icons">attach_file</i>
                            </div>
                            <h4 class="card-title">Create Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/product/store') ?>" method="post" enctype="multipart/form-data">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input name="product_name" type="text" class="form-control" value="<?= old('product_name') ?>">
                                            <?= form_error('product_name') ?>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="product_photo_1">Product Photo</label>
                                            </div>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?= base_url('assets/img/image_placeholder.jpg') ?>" alt="Image Preview">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file" title="Select Photo">
                                                        <span class="fileinput-new">Select Photo</span>
                                                        <span class="fileinput-exists">Change Photo</span>
                                                        <input type="file" name="product_photo_1" />
                                                    </span>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput" title="Remove Photo">
                                                        <i class="fa fa-times"></i> Remove Photo
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <?= form_error('product_photo_1') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_description">Product Description</label>
                                            <textarea name="product_description" class="form-control" rows="5"><?= old('product_description') ?></textarea>
                                            <?= form_error('product_description') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">Product Price</label>
                                            <input name="product_price" type="number" class="form-control" value="<?= old('product_price') ?>">
                                            <?= form_error('product_price') ?>
                                        </div>
                                        <div class="form-group">
                                            <div style="margin-bottom:-10px">
                                                <label for="status">Product Category</label>
                                            </div>
                                            <div class="bootstrap-select">
                                                <select class="selectpicker" name="id_category" data-size="4" data-style="select-with-transition" data-title="Choose a category">
                                                    <?php foreach ($data['categories'] as $key => $row) : ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div>
                                                <?= form_error('product_price') ?>
                                            </div>
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