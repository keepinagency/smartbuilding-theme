		<?php
			if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) ) { 
				$numcol_main = 9;
				$numcol_side = 3;
			}else{
				$numcol_main = 12;
				$numcol_side = 0;
			} ?>

		<div class="col-sm-<?php echo $numcol_main;?> blog-main">

		<?php 
		    if ( have_posts() ) { 
		        while ( have_posts() ) : the_post();
					?>
				    <div class="blog-post">
				        <h2 class="blog-post-title"><?php the_title(); ?></h2>
				        <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
				        <?php the_content(); ?>
				    </div><!-- /.blog-post -->
					<?php
			    endwhile;
		    } 
		?>

		<nav>
			<ul class="pager">
				<li><?php next_posts_link('Previous'); ?></li>
				<li><?php previous_posts_link('Next'); ?></li>
			</ul>
		</nav>
		 
		</div><!-- /.blog-main -->

		<div class="col-sm-<?php echo $numcol_side;?>  sidebar">
			<?php get_sidebar(); ?>
		</div><!-- /.blog-sidebar -->
