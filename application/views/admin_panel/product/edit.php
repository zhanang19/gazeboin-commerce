<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 08/06/2019
 * Time: 20:51
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
                            <h4 class="card-title">Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/product/update') ?>" method="post">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="hidden" name="product_slug" value="<?= $data['product']['product_slug'] ?>">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input name="product_name" type="text" class="form-control" value="<?= old('product_name', $data['product']['product_name']) ?>">
                                            <?= form_error('product_name') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_description">Product Description</label>
                                            <textarea name="product_description" class="form-control" rows="5"><?= old('product_description', $data['product']['product_description']) ?></textarea>
                                            <?= form_error('product_description') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">Product Price</label>
                                            <input name="product_price" type="number" class="form-control" value="<?= old('product_price', $data['product']['product_price']) ?>">
                                            <?= form_error('product_price') ?>
                                        </div>
                                        <div class="form-group">
                                            <div style="margin-bottom:-10px">
                                                <label for="id_category">Product Category</label>
                                            </div>
                                            <div class="bootstrap-select">
                                                <select class="selectpicker" name="id_category" data-size="4" data-style="select-with-transition" data-title="Choose a category">
                                                    <?php foreach ($data['categories'] as $key => $row) : ?>
                                                    <option value="<?= $row['id'] ?>" <?= $data['product']['id_category'] === $row['id'] ? 'selected' : '' ?>><?= $row['category_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div>
                                                <?= form_error('id_category') ?>
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