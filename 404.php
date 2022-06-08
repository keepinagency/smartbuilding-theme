<?php
/**
 * The template for displaying 404 pages (not found)
 **/
get_header();

$arreglo_productos = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'productos',
    'order'=>'DESC',
	'posts_per_page'=>3,
    'orderby' => 'post__in',
    'post__in' => array(48, 678, 45 )/*Ambiente PRO*/
));
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="error-404 not-found"
            style="background-image: url('<?= smartbuilding_IMG. 'tub0.png'?>'); background-repeat: no-repeat; background-size:cover; background-position: center; width:100%; min-height:50vh;">
            <div class="col-12 col-lg-12 d-flex align-items-center justify-content-center pt-5 p-0 m-0 titu-pages">
                <p><?php _e( '¡Vaya! No se ha podido encontrar esa página.' ); ?></p>
            </div>
        </div><!-- .error-404 -->   
            <div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center m-3 titulos-pages">
                <p><?php _e( 'Quizás alguno de estos artículos sean de tú interés' ); ?></p>
            </div>
                
            <div class="row contenedor-productoHome p-0 m-0 p-3 d-flex align-items-center justify-content-center">
                <?php if ($arreglo_productos->have_posts()) : while ($arreglo_productos->have_posts()) : $arreglo_productos->the_post();  ?>
                    <div class="col-lg-4 p-0 m-0 d-md-none ps-lg-1 pb-lg-1 d-lg-flex flex-lg-row-reverse d-flex flex-column-reverse"> 

                        <div class="miniatura-producto align-items-end p-0 m-0 mb-4 
                                    flex-lg-grow-1 me-lg-3 mb-lg-3" 
                            style="background-image: url('<?php echo the_post_thumbnail_url('');?>'); 
                                    background-size: cover;"> 

                            <div class="col-12 ">
                                <!-- href="<?php the_permalink(); ?>" -->
                                
                                <a class="titulo-post d-flex align-items-center text-center" 
                                    data-toggle="collapse" href="#producto<?=$i?>" 
                                    role="button" aria-expanded="false" aria-controls="producto<?=$i?>"
                                    onclick="let wact = jQuery(this).parent().parent().width();
                                            jQuery(this).parent().parent().css('max-width',wact);">      
                                    <h3 class="enlace-post text-uppercase text-center text-white w-100">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                                
                            </div>

                            <div  class="contenido-producto p-3 h-75 collapse multi-collapse" id="producto<?=$i?>">
                                <?php the_excerpt(); ?>
                            </div>
                        
                        </div> 
                    </div>
                <?php endwhile; endif;?>
            </div>
            <div>
                <div class="d-flex align-items-center justify-content-center m-3">
                    <p>Puedes ir a la página principal a través de este enlace <a class="btn btn-404" href="<?php echo get_home_url(); ?>" role="button">Inicio</a> 
                    </p>
                </div>
            </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();?>