<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">
		<div class="row wow fadeIn">
			<div class="col-md-6 mb-4">
				<img src="<?= base_url('assets/uploads/' . $data['product']['product_photo_1']) ?>" class="img-fluid" alt="">
			</div>
			<div class="col-md-6 mb-4">
				<div class="p-4">
					<div class="mb-3">
						<h1 class="display-4"><?= $data['product']['product_name'] ?></h1>
						<a href="<?= base_url('product/category/') . $data['product']['category_slug'] ?>">
							<span class="badge purple mr-1"><?= $data['product']['category_name'] ?></span>
						</a>
					</div>
					<h3 class>Rp. <?= number_format($data['product']['product_price'], 0, ',', '.') ?></h3>
					<!-- <form action="" class="d-flex justify-content-left"> -->
						<a class="btn btn-primary btn-md my-0 p" href="<?= base_url('cart/add/' . $data['product']['product_slug']) ?>">Add to cart
							<i class="fas fa-shopping-cart ml-1"></i>
						</a>
					<!-- </form> -->
				</div>
			</div>
		</div>

		<hr>

		<div class="row d-flex justify-content-center wow fadeIn">
			<div class="col-md-6 text-center">
				<h4 class="my-4 h4">Deskripsi</h4>
				<p><?= $data['product']['product_description'] ?></p>
			</div>	
		</div>
		
		<h4 class="mt-5 mb-3 h4 text-center">Produk Terkait</h4>
		
		<div class="row wow fadeIn">
			<?php foreach ($data['related_product'] as $row) : ?>
			<div class="col-lg-4 col-md-12 mb-4">
				<a href="<?= base_url('product/detail/') . $row['product_slug'] ?>">
					<img src="https://via.placeholder.com/500x360?text=<?= $row['product_name'] ?>" class="img-fluid" alt="<?= $row['product_name'] ?>">
				</a>
			</div>
			<?php endforeach; ?>
		</div>
		

    </div>
</main>