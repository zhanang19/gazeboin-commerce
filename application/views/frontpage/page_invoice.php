<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<main class="mt-5 pt-5">
    <div class="container wow fadeIn">
        <section class="mb-4">
            <div class="card d-print-none">
                <div class="card-body d-flex justify-content-between">
                    <h4 class="h4-responsive mt-3">Invoice #<?= $data['id_order'] ?></h4>
                    <div>
                        <?php if ($data['order']['status'] === 'unpaid') : ?>
                        <a href="<?= base_url('invoice/confirm/' . $data['id_order']) ?>" class="btn btn-secondary">Confirm Transfer</a>
                        <?php endif; ?>
                        <a href="javascript:window.print()" class="btn btn-primary"><i class="fas fa-print left"></i> Print</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <div class="my-3">
                                <p><small>Customer Detail:</small></p>
                                <p><strong>Invoice Date: </strong><?= $data['order']['timestamp'] ?></p>
                                <p><strong><?= $data['order']['name'] ?></strong></p>
                                <p><?= $data['order']['address'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <h3 class="h3-responsive">
                                <small>Invoice No.</small><br>
                                <strong><span class="blue-text">#<?= $data['id_order'] ?></span></strong>
                            </h4>
                            <h4 class="h4-responsive">
                                <small>Status</small><br>
                                <strong><span class="blue-text"><?= strtoupper($data['order']['status']) ?></span></strong>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="my-3">
                        <p><small>Payment Detail:</small></p>
                        <p><strong>Paypal Name:</strong> Shop Gazeboin</p>
                        <p><strong>Paypal Email:</strong> shop@gazeboin.com</p>
                        <p><strong>Total Payment:</strong> Rp. <?= number_format($data['total_order'], 0, ',', '.') ?></p>
                        <p><small>Pembayaran harus ditransfer tepat sesuai total dibawah.<br>
                        Transfer yang tidak sesuai nominal mengakibatkan transaksi tidak dapat diproses.</small></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary table-bordered">
                                <tr class="text-center">
                                    <th class="font-weight-bold" style="width:60%">Item list</th>
                                    <?php if ($data['order']['status'] === 'paid') : ?>
                                    <th class="font-weight-bold d-print-none">Link</th>
                                    <?php endif; ?>
                                    <th class="font-weight-bold">Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                <?php foreach ($data['order_detail'] as $key => $row) : ?>
                                <tr>
                                    <td><?= $row['product_name'] ?></td>
                                    <?php if ($data['order']['status'] === 'paid') : ?>
                                    <td class="text-center d-print-none">
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('page/download/' . $row['token']) ?>">
                                            <i class="fa fa-download"></i>
                                            <span class="d-none d-md-inline-block">Download</span>
                                        </a>
                                    </td>
                                    <?php endif; ?>
                                    <td style="text-align: right">Rp. <?= number_format($row['price'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="table-info">
                                <tr>
                                    <td class="font-weight-bold" colspan="2" style="width: 80%">SUBTOTAL</td>
                                    <td class="text-right">Rp. <?= number_format($data['total_order'] - $data['id_user'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" colspan="2" style="width: 80%">UNIQUE CODE</td>
                                    <td class="text-right">Rp. <?= number_format($data['id_user'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" colspan="2" style="width: 80%">TOTAL</td>
                                    <td class="text-right">Rp. <?= number_format($data['total_order'], 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>