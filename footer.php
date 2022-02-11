</div><!-- /.row -->
</div><!-- /.container -->
<footer class="footer">
	<div class="area-menufoot col-sm-4">
		<?php
	        wp_nav_menu( array(
	            'theme_location' => 'footer-menu',
	            'menu_class'     => 'footer-menu',
	            'walker'         => new WP_Bootstrap_Navwalker())
	        );
	    ?>
	</div>
	<div class="area-widgetsfoot col-sm-8">
		<?php if ( is_active_sidebar( 'footer_copyright_text' ) ) { dynamic_sidebar( 'footer_copyright_text' ); } ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
