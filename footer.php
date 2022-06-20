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

?>
<!-- /.row -->
</div><!-- /.container -->
<!-- Footer -->
 <!-- Redes Sociales -->
<footer class="footer text-center p-0 m-0">

    <div class="row col-12 conten-social p-0 m-0 py-2">
		<!--Social Media-->
		<div class="col-12 col-lg-3 col-xl-4 py-2 m-0">
			<div class="conten-social-redes row">
				<div class="titulo-redes p-0 m-0 col-lg-8 col-xl-7">Siguenos en <b class="titulo-negrita">Redes</b>&nbsp;Sociales:</div>
				<div class="col-lg-4 col-xl-5 p-0 m-0 d-flex justify-content-center d-lg-flex justify-content-lg-start">
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
				</div>
			</div>
		</div>

		<!--Contacto-->
		<div class="col-lg-5 col-xl-4 p-0 m-0 col-12 py-2">
			<div class="contact-details row p-lg-0 m-lg-0 mt-3 m-0 p-0">
				<div class="col-lg-5 p-0 m-0">
					<span>
						<i class="fa-solid fa-house"></i> DIRECCIÓN
					</span>
					<p><?php if (empty($dir)) {
						echo "Andes 3723, Quinta Normal";
					}else {
						echo $dir;
						}?></p>
				</div>
				<div class="col-lg-3 p-0 m-0">
					<span>
						<i class="fa fa-whatsapp"></i> TELÉFONO
					</span>
					<p>
						<?php if (empty($tel)) {?>
							<a href="https://wa.me/56229380016?text=Hola,%20les%20escribo%20desde%20www.smartbuilding.cl" target="_blank">+56229380016<a>
						<?php } else {?>
							<a href="https://wa.me/<?=$tel?>?text=Hola,%20les%20escribo%20desde%20www.smartbuilding.cl" target="_blank"><?=$tel?></a>
						<?php }?>
					</p>
				</div>
				<div class="col-lg-4 p-0 m-0">
					<span>
					<i class="fa-solid fa-envelope"></i> CORREO
					</span>
					<p><?php if (empty($correo)) {
						echo "<a href:'mailto:contacto@smartbuilding.cl'>contacto@smartbuilding.cl<a>";
					}else {
						?>
						<a href="mailto:<?= $correo; ?>"><?=$correo?></a>
						<?php
					}?></p>
					
				</div>
			</div>
		</div>

		<!--MENÚ-->
		<div class="col-lg-4 col-xl-4 col-12 p-0 justify-content-center p-0 m-0">
			<nav class="navbar navbar-ligth col-12 p-0 m-0">
				<div class="col-12 p-0 m-0">
					<?php
						wp_nav_menu( array(
							'container'       => 'div',
							'container_class' => 'footer-div col-12 col-lg-12 d-lg-block p-0 m-0',
							'container_id'    => 'menusmartbuilding',
							'items_wrap'      => '<ul id="%1$s" class="%2$s p-0 m-0 w-100 nav nav-tabs justify-content-center border-0">%3$s</ul>',
							'theme_location'  => 'footer-menu',
							'menu_class'      => 'footer-menu',
							'walker'          => new WP_Bootstrap_Navwalker())
						);
					?>
				</div>
			</nav>
		</div>
	</div>
	
	<!-- Copyright -->
	<div class="col-12 p-2 m-0 d-flex justify-content-center">
		<p class="copyright">© 2022 Copyright SmartBuilding. <br><span class="copy-url">Desarrollado a medida por:</span> 
			<a class="text-reset fw-bold" href="https://www.keepinagency.com/" target="blank">Keepin Agency</a>
		</p>
	</div>
</footer>
<!-- Footer -->

<?php wp_footer(); ?>
</body>
</html>