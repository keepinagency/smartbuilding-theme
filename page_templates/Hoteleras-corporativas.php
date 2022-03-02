<?php 
/*
Template Name: Corporativo
Template Post Type: page
Esta es la plantilla para el Bog del menu
 */
get_header();
$sub = get_post_meta($post->ID, 'subtitulo', true);
$sub_ = get_post_meta($post->ID, 'sub_titulo', true);
$paginacion_nueva = get_query_var('paged');
$nuevo_arreglo = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'climatizacion_iluminacion',
	'posts_per_page'=>3,
	'paged'=>$paginacion_nueva 
));
?>
<div class="row container-fluid col-12 p-0 m-0">
    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-12 text-lg-center pt-5">
                <h1><?php echo $sub.' '.$sub_; ?></h1>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <h3>Sector Corporativo</h3>
            <p>El 62% del consumo energético en oficinas promedio en Chile es en Climatización e Iluminación.</p>
            <img src="<?= smartbuilding_IMG. 'Soluciones/Sector-hotelero.png'?>" style="width:50%;"/>
        </div>
        <div class="row col-12 p-0 m-0 m-lg-0 p-lg-0 text-white" style="background: #2C5660;">
            <h3 class="text-center py-3">Climatización e Iluminación</h3>
        <?php 
            while ($nuevo_arreglo->have_posts()) : $nuevo_arreglo->the_post();?>
                <!--div class="col-12 bg-warning">
                    <?php $current_cat_id = the_category_ID(false);
                        echo '<h3>' . get_cat_name($current_cat_id) . '</h3>';
                    ?>
                </div-->
                <div class="row d-flex flex-lg-row col-12 p-0 m-0 col-lg-4">
                    <div class="col-12 col-lg-12 cont-img text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('') ;?>
                        </a>
                    </div> 
                    <div class="row cont-corpotel col-12 m-0 p-0 text-center">
                        <div class="col-10 col-lg-12 m-0 p-0 cont_tit_blog">
                            <a class=" p-0 m-0" href="<?php the_permalink(); ?>">
                                <div class="p-2 m-0 text-white">
                                    <h3><?php the_title();?></h3>
                                </div>
                                <div class="p-2 m-0 text-lg-justify text-white">
                                    <?php the_excerpt();?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
</div>
<?php get_footer(); ?>

