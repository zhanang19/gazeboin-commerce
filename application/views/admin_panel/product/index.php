<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 08/06/2019
 * Time: 21:24
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
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                <a href="<?= base_url('admin/product/create') ?>" class="btn btn-sm btn-rose">Add product</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-products" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Views</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['products'] as $key => $row) : ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $row['product_name'] ?></td>
                                            <td>Rp. <?= number_format($row['product_price'], 0, ',', '.') ?></td>
                                            <td><?= $row['views'] ?></td>
                                            <td>
                                                <span class="badge badge-<?= $row['status'] === '1' ? 'success' : 'danger' ?>"><?= $row['status'] === '1' ? 'Active' : 'Inactive' ?></span>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-just-icon btn-link" href="<?= base_url('product/detail/' . $row['product_slug']) ?>" title="View Product">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                                <a class="btn btn-success btn-just-icon btn-link btn-edit" href="<?= base_url('admin/product/edit/' . $row['product_slug']) ?>" title="Edit Product">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <?php if ($row['status'] === '1') : ?>
                                                <a class="btn btn-danger btn-just-icon btn-link btn-edit" href="<?= base_url('admin/product/deactivate/' . $row['product_slug']) ?>" title="Deactivate Product">
                                                    <i class="material-icons">close</i>
                                                </a>
                                                <?php else : ?>
                                                <a class="btn btn-info btn-just-icon btn-link btn-edit" href="<?= base_url('admin/product/activate/' . $row['product_slug']) ?>" title="Activate Product">
                                                    <i class="material-icons">check</i>
                                                </a>
                                                <?php endif; ?>
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
            $('#data-products').DataTable();
        });
    </script>