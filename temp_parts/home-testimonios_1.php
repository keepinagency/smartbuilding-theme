<?php 
/*** 
 *  Testimonios, categoría de entradas    
 *  Categoría: testimonios   
 ***/ 
$arreglo_testimonios = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'testimonios',
    'orderby'=>'Rand',
	'posts_per_page'=>3
));
?>
<section class="home-testimonial mt-lg-5">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center testimonial-pos">
       
            <div class="col-md-12 pt-4 d-flex justify-content-center">
                <h3>Testimonios</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <h2>Explore la experiancia de nuestros clientes</h2>
            </div>
        </div> 
        <?php if ($arreglo_testimonios->have_posts()) : ?>
            <section class="home-testimonial-bottom">
                <div class="container testimonial-inner">
                    <div class="row d-flex justify-content-center">
                        <?php while ($arreglo_testimonios->have_posts()) : $arreglo_testimonios->the_post();?>
                        <div class="col-md-4 style-3">
                            <div class="tour-item ">
                                <div class="tour-desc bg-white">
                                    <div class="tour-text color-grey-3 text-center"><?php the_content().'"';?></div>
                                    <div class="d-flex justify-content-center pt-2 pb-2">
                                        <!--img class="tm-people" src="<?php the_post_thumbnail('Thumbnail'); ?>" alt=""-->
                                        <?php the_post_thumbnail('Thumbnail'); ?>
                                    </div>
                                    <div class="link-name d-flex justify-content-center"><?php the_title(); ?></div>
                                    <div class="link-position d-flex justify-content-center">Cliente</div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </section>
        <?php endif;?>  
</section>