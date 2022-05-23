<?php get_header(); ?>

    <div class="row page col-md-12 p-0 m-0">
        <?php if ( have_posts() ) { ?>
            <div class="col-12 col-lg-12 p-0 m-0 d-flex justify-content-center" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; background-position: center; width:100%; min-height:80vh;">
                <div class="col-12 text-center col-lg-6 text-lg-center pt-5 p-0 m-0 titulo-page">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="row col-12 d-flex-lg justify-content-lg-center p-0 my-2">

                    <div class="col-12 p-0 m-0 d-flex-lg justify-content-lg-center text-justify col-lg-10 p-lg-0 m-lg-0 col-12">
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
        <?php 
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
