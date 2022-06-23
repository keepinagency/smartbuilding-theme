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

$clima1 = get_option( 'clima1', '' );
$clima2 = get_option( 'clima2', '' );
?>
<div class="row container-fluid col-12 p-0 m-0">
    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0 d-flex justify-content-center" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-6 text-lg-center pt-5 titulo-page">
                <h1><?php echo $sub.' '.$sub_; ?></h1>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <h2>Sector Corporativo</h2>
            <p>El 62% del consumo energético en oficinas promedio en Chile es en Climatización e Iluminación.</p>
            <img src="<?= smartbuilding_IMG. 'Soluciones/Sector-corporativo.png'?>" style="width:50%;"/>
        </div>
        <div class="row col-12 p-0 m-0 m-lg-0 p-lg-0 text-white d-lg-flex justify-content-lg-center" style="background: #2C5660;">
            <h2 class="text-center py-3">
                <?php if(empty($clima1)){ echo "Calefacción y/o Climatización"; } else { echo $clima1; }?>
            </h2>
            <p class="px-5 pb-3 text-center">
                <?php if(empty($clima2)){ 
                    echo "Para climatizar una casa o departamento con el menor costo de operación y mantención se deben tener en cuenta dos aspectos principalmente: 
                    Primero, incorporar elementos de aislación térmica al recinto a calefaccionar y segundo, proveer una fuente de energía que sea eficiente 
                    tanto en los Consumos como en la transmisión del calor que genera al ambiente."; } 
                else { echo $clima2; }?>
            </p>
        <?php 
            while ($nuevo_arreglo->have_posts()) : $nuevo_arreglo->the_post();?>
                <!--div class="col-12 bg-warning">
                    <?php $current_cat_id = the_category_ID(false);
                        echo '<h2>' . get_cat_name($current_cat_id) . '</h2>';
                        $catID = get_the_category();
                        echo category_description( $catID[0] );
                    ?>
                </div-->
                <div class="row d-flex flex-lg-row col-12 p-0 m-0 col-lg-5 p-lg-5">
                    <div class="col-12 col-lg-12 cont-img text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src(
                                            get_post_thumbnail_id( 
                                                get_the_ID() ), 
                                                    'single-post-thumbnail'
                                            );
                                if ($image) {
                                    echo "<img src='" . $image[0] . "' class='ima-post' />";
                                }
                            ?>
                        </a>
                    </div> 
                    <div class="row cont-corpotel col-12 m-0 p-0 text-center">
                        <div class="col-12 col-lg-12 m-0 p-0 cont_tit_blog">
                            <a class="text-decoration-none p-0 m-0" href="<?php the_permalink(); ?>">
                                <div class="p-2 m-0 text-white text-center text-uppercase">
                                    <h2><?php the_title();?></h2>
                                </div>
                            </a>
                            <div class="p-2 m-0 text-lg-justify text-white text-center">
                                <?php the_excerpt();?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
</div>
<?php get_footer(); ?>

