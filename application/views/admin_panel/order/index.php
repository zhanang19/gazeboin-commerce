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
                                            <th>Action</th>
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
                                            <td>
                                                <a class="btn btn-success btn-just-icon btn-link btn-edit" href="<?= base_url('admin/order/paid/' . $row['id']) ?>" title="Edit Category">
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
            $('#data-orders').DataTable();
        });
    </script>