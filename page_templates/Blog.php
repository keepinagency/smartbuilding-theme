<?php 
/*
Template Name:blog
Template Post Type: page
Esta es la plantilla para el Bog del menu
 */
get_header();
$paginacion_nueva = get_query_var('paged');
$nuevo_arreglo = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'blog',
	'posts_per_page'=>3,
	'paged'=>$paginacion_nueva 
));
?>

<div class="row container-fluid col-12 p-0 m-0">

    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0 d-flex justify-content-center" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-6 text-lg-center pt-5 p-0 m-0 titulo-page">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center my-5">
            <?php //the_excerpt();?>
        </div>

        <div class="row col-12 p-0 m-0 d-flex justify-content-lg-around">
        <?php 
            while ($nuevo_arreglo->have_posts()) : $nuevo_arreglo->the_post();?>
                <div class="row d-flex flex-lg-row col-12 p-0 m-0 p-lg-1 col-lg-4">
                    <a class="p-0 m-0" href="<?php the_permalink(); ?>">
                        <div class="p-0 m-0 titulo-pages text-center">
                            <h2 class="p-0 m-0"><?php the_title();?></h2>
                        </div>
                        <div class="col-lg-12 p-lg-0 cont-img pt-lg-3 pb-lg-1 h-50"
                            style="background-image: url('<?php echo get_the_post_thumbnail_url('');?>');background-repeat: no-repeat; background-size:cover; width:100%; min-height:30vh;">
                        </div> 
                        <div class="col-12 m-0 p-0 border cont-post">
                            <div class="p-2 m-0 text-center">
                                <p><?php the_excerpt();?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php 
                endwhile; wp_reset_postdata();
            ?>
        </div>   
        <div class="cont_pag_numbers col-12 d-flex justify-content-center p-5">
            <?php 
                echo paginate_links(array(
                'total' => $nuevo_arreglo->max_num_pages
            ));
            ?>
        </div>
    <?php endif;?>
</div>
<?php get_footer(); ?>