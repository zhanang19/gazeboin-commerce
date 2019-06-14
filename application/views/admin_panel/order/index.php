<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 11/06/2019
 * Time: 08:15
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
                                <i class="material-icons">store</i>
                            </div>
                            <h4 class="card-title">Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-orders" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>ID Order</th>
                                            <th>Customer Name</th>
                                            <th>Status</th>
                                            <th>Total Price</th>
                                            <th style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['orders'] as $key => $row) : ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['id_user'] ?></td>
                                            <td>
                                                <?php
                                                switch($row['status']) {
                                                    case 'unpaid':
                                                        $status = 'warning';
                                                        break;
                                                    case 'paid':
                                                        $status = 'success';
                                                        break;
                                                    case 'confirm transfer':
                                                        $status = 'primary';
                                                        break;
                                                    default:
                                                        $status = 'default';
                                                        break;
                                                }
                                                ?>
                                                <span class="badge badge-<?= $status ?>"><?= $row['status'] ?></span>
                                            </td>
                                            <td>Rp. <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                            <td style="text-align:center">
                                                <a class="btn btn-info btn-just-icon btn-link" href="<?= base_url('invoice/detail/' . $row['id']) ?>" title="View detail">
                                                    <i class="material-icons">info</i>
                                                </a>
                                                <?php if ($row['status'] === 'confirm transfer') : ?>
                                                <a class="btn btn-success btn-just-icon btn-link" href="<?= base_url('admin/order/paid/' . $row['id']) ?>" title="Mark as paid">
                                                    <i class="material-icons">check</i>
                                                </a>
                                                <?php elseif ($row['status'] === 'unpaid') : ?>
                                                <a class="btn btn-danger btn-just-icon btn-link" href="<?= base_url('admin/order/cancel/' . $row['id']) ?>" title="Mark as canceled">
                                                    <i class="material-icons">clear</i>
                                                </a>
                                                <?php elseif ($row['status'] === 'paid') : ?>
                                                <a class="btn btn-default btn-just-icon btn-link" href="<?= base_url('admin/order/confirm-transfer/' . $row['id']) ?>" title="Mark as transfer confirmed">
                                                    <i class="material-icons">undo</i>
                                                </a>
                                                <?php elseif ($row['status'] === 'cancel') : ?>
                                                <a class="btn btn-primary btn-just-icon btn-link" href="<?= base_url('admin/order/unpaid/' . $row['id']) ?>" title="Mark as unpaid">
                                                    <i class="material-icons">undo</i>
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
            $('#data-orders').DataTable();
        });
    </script>