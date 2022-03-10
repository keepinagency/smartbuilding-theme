<?php 

	$url_fbk = get_option( 'faceurl', 'http://www.facebook.com' );
	$url_lik = get_option( 'linkeurl', 'http://www.linkedin.com' );
	$url_rss = get_option( 'rssurl', 'https://news.google.com/topstories?hl=es-419&gl=VE&ceid=VE:es-419' );
	$url_gooplus = get_option( 'gooplusurl', 'https://myaccount.google.com/' );
	$url_pint = get_option( 'pinturl', 'https://www.pinterest.com/' );

	$facelogo = get_option( 'facelogo', '/img/facebook.jpeg' );
	$linkelogo = get_option( 'linkelogo', '/img/linked-in.jpeg' );
	$rsslogo = get_option( 'rsslogo', '/img/rss.jpeg' );
	$goopluslogo = get_option( 'goopluslogo', '/img/gplus.jpeg' );
	$pintlogo = get_option( 'pintlogo', '/img/pinterest.jpeg' );

	$dir = get_option( 'direccion', 'El Juncal #901, Bodega3, Quilicura' );
	$tel = get_option( 'telefono', '+56 22 9480016' );
	$correo = get_option( 'correo', 'contacto@smartbuilding.cl' );
	$web = get_option( 'web', 'http://smartbuilding.cl/' );
		
	$quienes = get_option('quienes', '');
	/*$placeh = get_option('placeholder');*/

?>
</div--><!-- /.row -->
</div><!-- /.container -->
<!-- Footer -->
 <!-- Redes Sociales -->
<footer class="footer text-center">
    <div class="row col-12 conten-social p-0 m-0 py-2">
		<div class="col-lg-5 align-self-center">
			<p class="parrafo-info ps-2">
			<b class="titulo-negrita">¿Quiénes Somos?</b> 
				<?php if (empty($quienes)) {
					echo "Queremos ser referentes en la industria de la Construcción Sustentable y la eficiencia energética, con aplicaciones residenciales y Comerciales. 
					Líderes en ofrecer tecnologías y soluciones para las personas que buscan no sólo ahorros en sus consumos energéticos sino que también su impacto en el entorno y el planeta";
				}else{
					echo $quienes;
				} ?>.
			</p>
		</div>
		<div class="col-12 col-lg-3">
			<div class="conten-social-redes">
				<p class="titulo-redes">Siguenos en <b class="titulo-negrita">Redes</b>&nbsp;Sociales</p>
			</div>
			<div class="col-12 p-0 d-flex justify-content-center">
				<!-- RSS -->
				<a href="<?=$url_rss?>" class="text-decoration-none me-2">
					<!--img src="<?= smartbuilding_IMG. 'rss.jpeg'?>"/-->
					<img src="<?= $rsslogo;?>"/>
				</a>
				<!-- Facebook -->
				<a href="<?=$url_fbk?>" class="text-decoration-none me-2">
					<!--img src="<?= smartbuilding_IMG. 'facebook.jpeg'?>"/-->
					<img src="<?= $facelogo;?>"/>
				</a>
				<!-- Gplus -->
				<a href="<?=$url_gooplus?>" class="text-decoration-none me-2">
					<!--img src="<?= smartbuilding_IMG. 'gplus.jpeg'?>"/-->
					<img src="<?= $goopluslogo;?>"/>
				</a>
				<!-- LinkedIn -->
				<a href="<?=$url_lik?>" class="text-decoration-none me-2">
					<!--img src="<?= smartbuilding_IMG. 'linked-in.jpeg'?>"/-->
					<img src="<?= $linkelogo;?>"/>
				</a>
				<!-- Pinterest -->
				<a href="<?=$url_pint?>" class="text-decoration-none me-2">
					<!--img src="<?= smartbuilding_IMG. 'pinterest.jpeg'?>"/-->
					<img src="<?= $pintlogo;?>"/>
				</a>
			</div>
		</div>
		<div class="col-lg-4 p-0 m-0 col-12">
			<div class="contact-details row p-lg-0 m-lg-0 mt-3">
				<div class="col-lg-6">
					<span>
						<i class="fa-solid fa-house"></i> DIRECCIÓN
					</span>
					<p><?php if (empty($dir)) {
						echo "El Juncal #901, Bodega3, Quilicura";
					}else {
						echo $dir;
						}?></p>
				</div>
				<div class="col-lg-6">
					<span>
						<i class="fa-solid fa-square-phone"></i> TELÉFONO
					</span>
					<p><?php if (empty($tel)) {
						echo "+56 22 9480016";
					}else {
						echo $tel;
						}?></p>
				</div>
				<div class="col-lg-6">
					<span>
					<i class="fa-solid fa-envelope"></i> CORREO
					</span>
					<p><?php if (empty($correo)) {
						echo "contacto@smartbuilding.cl";
					}else {
						echo $correo;
						}?></p>
				</div>
				<div class="col-lg-6">
					<span>
					<i class="fa-solid fa-globe"></i> SITIO WEB
					</span>
					<p>http://smartbuilding.cl/</p>
				</div>
			</div>
		</div><!-- Contact Us Widget -->
	</div>
	
  <!-- Copyright -->
  <div class="col-12 p-2 d-flex justify-content-center">
	  <p class="copyright">© 2022 Copyright SmartBuilding. <b class="copy-url">Otro sitio web desarrollado, a medida por.</b> 
		<a class="text-reset fw-bold" href="https://www.keepinagency.com/" target="blank">
			Keepin Agency
		</a>
	  </p>
  </div>
  <!-- Copyright -->

	<!--div class="col-12 d-lg-flex flex-lg-row-reverse pl-lg-5">
		<!--SOCIAL MEDIA-->
		<!--div class="col-12 p-0 pt-3 pb-3 d-flex flex-row align-items-center col-lg-6 pl-lg-4 justify-content-lg-center">

			<a href="<?php echo $url_int; ?>" target="_blank" class="pl-4">
				<img src="<?php echo $instalogo; ?>" alt="" id="">
			</a>
			<a href="<?php echo $url_fbk; ?>" target="_blank" class="pl-4">
				<img src="<?php echo $facelogo;?>" alt="" id="">
			</a>
			<a href="<?php echo $url_lik;?> " target="_blank" class="pl-4">
				<img src="<?php echo $linkelogo;?>" alt="" id="">
			</a>
			<a href="<?php echo $url_git;?>" target="_blank" class="pl-4">
				<img src="<?php echo $gitlogo;?>" alt="" id="">
			</a>

		</div>
	</div-->

	<!--MENÚ-->
	<div class="col-12 d-md-flex flex-md-row p-0 justify-content-center">
		<nav class="navbar navbar-ligth col-12 p-0 m-0">
			<div class="col-12 p-0 pb-lg-0 pt-lg-0 h-100">
				<?php
					wp_nav_menu( array(
						'container'       => 'div',
						'container_class' => 'col-12 col-lg-12 d-lg-block p-0 m-0',
						'container_id'    => 'idFooterMenu',
						'items_wrap'      => '<ul id="%1$s" class="%2$s p-0 m-0 w-100 nav nav-tabs justify-content-center ">%3$s</ul>',
						'theme_location'  => 'footer-menu',
						'menu_class'      => 'footer-menu',
						'walker'          => new WP_Bootstrap_Navwalker())
					);
				?>
			</div>
		</nav>
	</div>
</footer>
<!-- Footer -->

<?php wp_footer(); ?>
</body>
</html>