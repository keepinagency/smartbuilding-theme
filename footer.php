<?php 
	$url_1 = get_option( 'urlred1', '' );
	$logored1 = get_option( 'logored1', '' );

	$url_2 = get_option( 'urlred2', '' );
	$logored2 = get_option( 'logored2', '' );	

	$url_3 = get_option( 'urlred3', '' );
	$logored3 = get_option( 'logored3', '' );

	$dir = get_option( 'direccion', 'Andes 3723, Quinta Normal' );
	$tel = get_option( 'telefono', '+ 56 22 938 0016' );
	$correo = get_option( 'correo', 'contacto@smartbuilding.cl' );
	$web = get_option( 'web', 'https://www.smartbuilding.cl' );	
	$quienes = get_option('quienes', '');

	/*$url_pint = get_option( 'pinturl', 'https://www.pinterest.com/' );
	$url_lik = get_option( 'linkeurl', 'http://www.linkedin.com' );
	$pintlogo = get_option( 'pintlogo', '/img/pinterest.jpeg' );
	$linkelogo = get_option( 'linkelogo', '/img/linked-in.jpeg' );*/

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
				<!-- Red social - 1 -->
				<a href="<?=$url_1?>" target="_blank" class="text-decoration-none me-2">
					<img src="<?= $logored1;?>"/>
				</a>
				<!-- Red Social - 2 -->
				<a href="<?=$url_2?>" target="_blank" class="text-decoration-none me-2">
					<img src="<?= $logored2;?>"/>
				</a>
				<!-- Red Social - 3 -->
				<a href="<?=$url_3?>" target="_blank" class="text-decoration-none me-2">
					<img src="<?= $logored3;?>"/>
				</a>
				<!-- LinkedIn >
				<a href="<?=$url_lik?>" class="text-decoration-none me-2">
					<img src="<?= $linkelogo;?>"/>
				</a>
				< Pinterest >
				<a href="<?=$url_pint?>" class="text-decoration-none me-2">
					<img src="<?= $pintlogo;?>"/>
				</a-->
			</div>
		</div>
		<div class="col-lg-4 p-0 m-0 col-12">
			<div class="contact-details row p-lg-0 m-lg-0 mt-3">
				<div class="col-lg-6">
					<span>
						<i class="fa-solid fa-house"></i> DIRECCIÓN
					</span>
					<p><?php if (empty($dir)) {
						echo "Andes 3723, Quinta Normal";
					}else {
						echo $dir;
						}?></p>
				</div>
				<div class="col-lg-6">
					<span>
						<i class="fa-solid fa-square-phone"></i> TELÉFONO
					</span>
					<p><?php if (empty($tel)) {
						echo "+ 56 22 938 0016";
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
					<p>https://www.smartbuilding.cl</p>
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