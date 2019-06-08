<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">
        <h2 class="my-5 h2 text-center">Keranjang Belanja</h2>
        <div class="row my-5">
            <div class="col-12">
                <h4 class="d-flex justify-content-between align-items-center my-3">
                    <span class="text-muted">Total Barang</span>
                    <span class="badge badge-secondary badge-pill"><?= $data['cart_count'] ?></span>
                </h4>
                <ul class="list-group mb-3 z-depth-1">
                    <?php if (! empty($data['cart'])) : ?>
                    <?php foreach($data['cart'] as $product) : ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class="col-sm-8">
                            <div>
                                <h6 class="my-0"><?= $product['product_name'] ?></h6>
                                <small class="text-muted"><a href="<?= base_url('product/detail/' . $product['product_slug']) ?>">Detail Produk</a></small>
                            </div>
                        </div>
                        <h6 class="mt-2 text-muted">Rp. <?= number_format((int) $product['product_price'], 0, ',', '.') ?></h6>
                        <a href="<?= base_url('cart/remove/' . $product['product_slug']) ?>" class="btn btn-danger btn-sm p-3">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class="col-sm-9">
                            <div>
                                <h4 class="my-2">Belum ada barang di keranjang</h4>
                                <a class="btn btn-secondary" href="<?= base_url('product') ?>">Lanjutkan belanja</a>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Total Harga</span>
                </h4>
                <ul class="list-group mb-3 z-depth-1 my-4">
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <span>Total</span>
                        <strong class="text-secondary">Rp. <?= number_format((int) $data['total_price'], 0, ',', '.') ?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 offset-md-6 d-flex justify-content-end align-items-end my-3">
                <a href="<?= base_url('page/checkout') ?>" class="btn btn-secondary mb-5">Checkout</a>
            </div>
        </div>
    </div>
</main>
<!--Main layout-->