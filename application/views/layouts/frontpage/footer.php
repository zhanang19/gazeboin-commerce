<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

	<!--Footer-->
	<footer class="page-footer text-center mt-4 wow fadeIn d-print-none">
		<div class="py-4">
			<a href="https://facebook.com/gazeboinofficial" target="_blank">
				<i class="fab fa-facebook-f mr-3"></i>
			</a>
			<a href="https://instagram.com/gazeboinofficial" target="_blank">
				<i class="fab fa-instagram mr-3"></i>
			</a>
			<a href="https://github.com/gazeboin" target="_blank">
				<i class="fab fa-github mr-3"></i>
			</a>
		</div>
		<div class="footer-copyright py-3">
			© 2018 - <script>document.write(new Date().getFullYear())</script> Copyright <a href="https://gazeboin.com" target="_blank"> Gazeboin.com </a>
		</div>
	</footer>
	<!--/.Footer-->

	<!-- SCRIPTS -->
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?= base_url('assets/js/core/bootstrap-material-design.min.js') ?>"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?= base_url('assets/js/mdb-4.8.js') ?>"></script>
	<!-- Initializations -->
	<script type="text/javascript">
		// Animations initialization
		new WOW().init();
	</script>

	<?php get_flashdata() ?>
</body>
</html>