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
                            <thead>
                                <tr>
                                    <th>Item list</th>
                                    <th style="text-align: right">Total price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['order_detail'] as $row) : ?>
                                <tr>
                                    <td><?= $row['product_name'] ?></td>
                                    <td style="text-align: right">Rp. <?= number_format($row['price'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="list-unstyled text-right">
                        <li><strong>TOTAL:</strong><span class="float-right ml-3">Rp. <?= number_format($data['total_order'], 0, ',', '.') ?></span></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

</main>