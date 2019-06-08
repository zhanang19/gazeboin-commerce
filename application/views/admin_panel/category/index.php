<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 08/06/2019
 * Time: 20:04
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
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                <a href="<?= base_url('admin/category/create') ?>" class="btn btn-sm btn-rose">Add category</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-categories" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['categories'] as $key => $row) : ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $row['category_name'] ?></td>
                                            <td>
                                                <span class="badge badge-primary"><?= $row['category_slug'] ?></span>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-just-icon btn-link" href="<?= base_url('product/category/' . $row['category_slug']) ?>" title="View Product Category">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                                <a class="btn btn-success btn-just-icon btn-link btn-edit" href="<?= base_url('admin/category/edit/' . $row['id']) ?>" title="Edit Category">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#data-categories').DataTable();
        });
    </script>