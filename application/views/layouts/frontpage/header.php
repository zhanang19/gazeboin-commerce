<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shop Gazeboin</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?= base_url('assets/css/mdb-4.8.css') ?>" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="<?= base_url('assets/css/style.min.css') ?>" rel="stylesheet">
	<!-- JQuery -->
	<script type="text/javascript" src="<?= base_url('assets/js/core/jquery.min.js') ?>"></script>

	<style type="text/css">
		html,
		body,
		header,
		.carousel {
			height: 60vh;
		}

		@media (max-width: 740px) {
			html,
			body,
			header,
			.carousel {
				height: 100vh;
			}
		}

		@media (min-width: 800px) and (max-width: 850px) {
			html,
			body,
			header,
			.carousel {
				height: 100vh;
			}
		}
	</style>
</head>

<body>

	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
		<div class="container">
		<!-- Brand -->
		<a class="navbar-brand waves-effect" href="<?= base_url() ?>">
			<strong class="blue-text" style="font-family: 'Montserrat Alternates', sans-serif;">shop gazeboin</strong>
		</a>
		<!-- Collapse -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle Menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Links -->
		<div class="collapse navbar-collapse" id="navbar-content">
			<!-- Left -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item<?= current_url() === base_url() ? ' active' : '' ?>">
					<a class="nav-link waves-effect" href="<?= base_url() ?>">Home</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link waves-effect" href="<?= base_url('page/about-us') ?>">About Us</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link waves-effect" href="https://gazeboin.com" target="_blank">Tryout Online</a>
				</li>
			</ul>

			<!-- Right -->
			<ul class="navbar-nav nav-flex-icons">
				<li class="nav-item mx-1">
					<a class="nav-link waves-effect" href="<?= base_url('page/cart') ?>">
						<i class="fas fa-shopping-cart"></i> Cart
					</a>
				</li>
				<?php if (! isLogin()) : ?>
				<li class="nav-item mx-1">
					<a href="<?= base_url('page/auth') ?>" class="nav-link border border-light rounded waves-effect">
						<i class="fa fa-sign-in-alt mr-2"></i> Login/Register
					</a>
				</li>
				<?php else: ?>
				<li class="nav-item mx-1">
					<?php if (get_userdata('level') === '1') : ?>
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link waves-effect">
						<i class="fa fa-tachometer-alt mr-2"></i> Dashboard
					</a>
					<?php endif; ?>
				</li>
				<li class="nav-item mx-1">
					<a href="<?= base_url('page/logout') ?>" class="nav-link border border-light rounded waves-effect">
						<i class="fa fa-sign-in-alt mr-2"></i> Logout
					</a>
				</li>
				<?php endif; ?>
			</ul>

		</div>

		</div>
	</nav>
	<!-- Navbar -->

