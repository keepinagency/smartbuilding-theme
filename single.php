<?php get_header(); ?>

    <div class="row page col-md-12 p-0 m-0">
        <?php if ( have_posts() ) { ?>
            <div class="page-title col-12 text-center col-lg-12 pb-lg-2 pt-lg-4">
                <h1><?php the_title(); ?></h1>
            </div>
        <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="row page-cont col-12 d-flex-lg justify-content-lg-center p-0 m-0">

                    <div class="pag-post d-flex-lg justify-content-lg-center text-justify col-lg-10 p-lg-0 m-lg-0 col-12">
                        <?php the_content(); ?>
                    </div>
                    <div class="page-img col-lg-8 d-flex-lg justify-content-lg-end align-self-lg-center text-center d-none d-sm-block pb-lg-3">
                        <?php the_post_thumbnail('large');?>
                    </div>

                    <div class="page-imgmob col-12 d-flex justify-content-center p-0 m-0 d-lg-none">
                        <?php the_post_thumbnail('medium');?>
                    </div>
                    <div class="pag-post col-12 p-0 m-0 d-block d-sm-none">
                        <?php the_content(); ?>
                    </div>
                </div><!-- /.blog-post -->
                <?php
            endwhile;
            } 
        ?>
    </div>
    <!--Navegacion para cada entrada o post-->
    <!--div class="navegacion_entradas">    
        <-?php 
            if ( is_singular( 'post' ) ) {
                the_post_navigation( array(
                    'prev_text'          => __( '&nbsp;' ).'<span class="nav_post">%title</span>',
                    'next_text'          => '<span class="nav_post">%title</span>'.__( '&nbsp;' ),
                    'in_same_term'       => true,
                    'screen_reader_text' => __( '&nbsp;' )
                ) );
            }
        ?>
    </div-->
<?php get_footer();?>
