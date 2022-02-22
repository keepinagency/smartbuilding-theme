<?php
	$url_int = get_option( 'instaurl', 'http://www.instagram.com' );
	$url_fbk = get_option( 'faceurl', 'http://www.facebook.com' );
	$url_lik = get_option( 'linkeurl', 'http://www.linkedin.com' );
	$url_git = get_option( 'giturl', 'http://www.github.com' );

	$instalogo = get_option( 'instalogo', '/img/ico-instagram.png' );
	$facelogo = get_option( 'facelogo', '/img/ico-facebook.png' );
	$linkelogo = get_option( 'linkelogo', '/img/ico-linkedin.png' );
	$gitlogo = get_option( 'gitlogo', '' );
	
	$informa = get_option('informacion');
	$placeh = get_option('placeholder');

?>
</div--><!-- /.row -->
</div><!-- /.container -->
<!-- Footer -->
 <!-- Grid container -->
<footer class="bg-light text-center ">
	<div class="container p-4">
		<div class="row">
			<div class="col">
				<!-- Section: Social media -->
				<section class="mb-4">
					<!-- RSS -->
					<p>
					Nuestras Redes
					</p>
					<a href="" class="me-4 text-reset text-decoration-none">
						<img src="<?= smartbuilding_IMG. 'rss.jpeg'?>"/>
					</a>

					<!-- Facebook -->
					<a href="" class="me-4 text-reset text-decoration-none">
						<img src="<?= smartbuilding_IMG. 'facebook.jpeg'?>"/>
					</a>

					<!-- Gplus -->
					<a href="" class="me-4 text-reset text-decoration-none">
						<img src="<?= smartbuilding_IMG. 'gplus.jpeg'?>"/>
					</a>

					<!-- LinkedIn -->
					<a href="" class="me-4 text-reset text-decoration-none">
						<img src="<?= smartbuilding_IMG. 'linked-in.jpeg'?>"/>
					</a>

					<!-- Pinterest -->
					<a href="" class="me-4 text-reset text-decoration-none">
					<img src="<?= smartbuilding_IMG. 'pinterest.jpeg'?>"/>
					</a>
					</section>
					<!-- Section: Social media -->
			</div>
			<div class="col">
				<p>
					Contacto
				</p>
				<p>
					<a href="" class="me-4 text-reset text-decoration-none">
					</a>El Juncal #901 Bodega 3 Quilicura - Santiago
				</p>
				<p>
					<a href="" class="me-4 text-reset text-decoration-none">
					</a>info@example.com
				</p>
				<p>
					<a href="" class="me-4 text-reset text-decoration-none">
					</a> +56 22 9380016

				</p>		
			</div>
		</div>
	</div>
</footer>


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Keepin Agency</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<?php wp_footer(); ?>
</body>
</html>
