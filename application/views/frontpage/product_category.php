<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

	<!--Carousel Wrapper-->
	<div id="popular-product-carousel" class="carousel slide carousel-fade pt-4" data-ride="carousel">

		<!--Indicators-->
		<ol class="carousel-indicators">
		<li data-target="#popular-product-carousel" data-slide-to="0" class="active"></li>
		<li data-target="#popular-product-carousel" data-slide-to="1"></li>
		<li data-target="#popular-product-carousel" data-slide-to="2"></li>
		</ol>
		<!--/.Indicators-->

		<!--Slides-->
		<div class="carousel-inner" role="listbox">

			<?php foreach ($data['popular'] as $key => $popular) : ?>
			<div class="carousel-item <?= $key === 0 ? ' active' : '' ?>">
				<div class="view" style="background-image: url('https://via.placeholder.com/1300x400?text=Produk 1'); background-repeat: no-repeat; background-size: cover;">

					<!-- Mask & flexbox options-->
					<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

						<!-- Content -->
						<div class="text-center white-text mx-5 wow fadeIn">
							<h1 class="my-4">
								<strong><?= $popular['product_name'] ?></strong>
							</h1>

							<p class="my-4 d-none d-md-block">
								<strong><?= substr($popular['product_description'], 0, 80) ?></strong>
							</p>

							<a href="<?= base_url('product/detail/') . $popular['product_slug'] ?>" class="mt-5 btn btn-outline-white btn-lg">
								<i class="fas fa-shopping-cart ml-2"></i> Beli Sekarang
							</a>
						</div>
						<!-- Content -->

					</div>
					<!-- Mask & flexbox options-->

				</div>
			</div>
			<?php endforeach; ?>

		</div>
		<!--/.Slides-->

		<!--Controls-->
		<a class="carousel-control-prev" href="#popular-product-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Sebelumnya</span>
		</a>
		<a class="carousel-control-next" href="#popular-product-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Selanjutnya</span>
		</a>
		<!--/.Controls-->

	</div>
	<!--/.Carousel Wrapper-->

	<!--Main layout-->
	<main>
		<div class="container">

			<!--Navbar-->
			<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

				<!-- Navbar brand -->
				<span class="navbar-brand">Kategori:</span>

				<!-- Collapse button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#category_menu" aria-controls="category_menu" aria-expanded="false" aria-label="Toggle Menu">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Collapsible content -->
				<div class="collapse navbar-collapse" id="category_menu">
					<!-- Links -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url() ?>">All</a>
						</li>
						<?php foreach($data['category'] as $category) : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('product/category/' . $category['category_slug']) ?>"><?= $category['category_name'] ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
					<!-- Links -->
					<form class="form-inline">
						<div class="md-form my-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
						</div>
					</form>
				</div>

			</nav>
			<!--/.Navbar-->

			<!--Section: Products v.3-->
			<section class="text-center mb-4">
				<div class="row wow fadeIn">

					<?php foreach ($data['product'] as $product) : ?>
					<!--Grid column-->
					<div class="col-lg-3 col-md-6 mb-4">

						<!--Card-->
						<div class="card">

							<!--Card image-->
							<div class="view overlay">
								<img src="https://via.placeholder.com/520x650?text=<?= $product['product_name'] ?>" class="card-img-top" alt="<?= $product['product_name'] ?> Image">
								<a href="<?= base_url('product/detail/') . $product['product_slug'] ?>">
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<!--Card image-->

							<!--Card content-->
							<div class="card-body text-center">
								<!--Category & Title-->
								<a href="<?= base_url('product/category/') . $product['category_slug'] ?>" class="grey-text">
									<h5>
										<small><?= $product['category_name'] ?></small>
									</h5>
								</a>
								<h5>
									<strong>
										<a href="<?= base_url('product/detail/') . $product['product_slug'] ?>" class="dark-grey-text">
											<?= strlen($product['product_name']) > 18 ? trim(substr($product['product_name'], 0, 18)) . '...' : $product['product_name'] ?>
										</a>
									</strong>
								</h5>

								<h4 class="font-weight-bold blue-text">
									<strong>Rp. <?= number_format($product['product_price'], 0, ',', '.') ?></strong>
								</h4>

							</div>
							<!--Card content-->

						</div>
						<!--Card-->

					</div>
					<!--Grid column-->
					<?php endforeach; ?>

				</div>
			</section>
			<!--Section: Products v.3-->

			<!--Pagination-->
			<nav class="d-flex justify-content-center wow fadeIn">
				<ul class="pagination pg-blue">
					<li class="page-item<?= $data['current_page'] === 1 ? ' disabled' : '' ?>">
						<a class="page-link" href="<?= $data['current_page'] > 1 ? base_url('product/page/') . previous_page($data['current_page']) : 'javascript:void(0)' ?>" aria-label="Sebelumnya">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Sebelumnya</span>
						</a>
					</li>
					<?php for($i = 1; $i <= $data['total_page']; $i++) : ?>
					<li class="page-item<?= $i === $data['current_page'] ? ' active' : '' ?>">
						<a class="page-link" href="<?= base_url('product/page/') . $i ?>"><?= $i ?></a>
					</li>
					<?php endfor; ?>
					<li class="page-item<?= $data['current_page'] === $data['total_page'] ? ' disabled' : '' ?>">
						<a class="page-link" href="<?= base_url('product/page/2') ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</nav>
			<!--Pagination-->

		</div>
	</main>
	<!--Main layout-->

	