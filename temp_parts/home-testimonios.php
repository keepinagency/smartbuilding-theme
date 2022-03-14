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
<div class="testimonials-clean py-3 p-12 p-0 m-0">
    <div class="row col-12 d-flex justify-content-center p-0 m-0">
        <div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center p-0 m-0">
            <p class="border-2 border-bottom border-success text-dark"><b class="titulo-negrita">Nuestros</b>&nbsp;Clientes</p>
        </div>
        <div class="intro p-0 m-0">
            <p class="text-center">Explore la experiancia de nuestros clientes</p>
        </div>
    </div> 
    <?php if ($arreglo_testimonios->have_posts()) : ?>
        <div class="row col-lg-12 m-lg-0 people d-flex justify-content-center">
            <?php while ($arreglo_testimonios->have_posts()) : $arreglo_testimonios->the_post();?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box fst-italic p-lg-3 p-2 m-0">
                        <p class="description"><?php the_content();?></p>
                    </div>
                    <div class="author">
                        <img src="<?= the_post_thumbnail_url('Thumbnail');?>" class="rounded-circle">
                        <h5 class="name"><?php the_title(); ?></h5>
                        <p class="title">Cliente</p>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    <?php endif;?>  
</div>