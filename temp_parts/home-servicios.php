<?php 
/*** 
 *  Nuestros servicios, categoría de entradas    
 *  Categoría: Servicios   
 ***/ 

//$descrip = get_post_meta($post->ID, 'descripcion', true);
$arreglo_servicios = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'servicios',
    'order'=>'ASC',
	'posts_per_page'=>6
));
?>
<div id="servicios" class="col-12 row p-0 m-0 py-3" style="background-color: rgba(0, 0, 0, 0.05);">
    <?php if ($arreglo_servicios->have_posts()) : ?>
        <div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center p-4">
            <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Servicios</p>
        </div>        
        <?php while ($arreglo_servicios->have_posts()) : $arreglo_servicios->the_post();?>
            <div class="pt-2 col-12 p-0 m-0 col-lg-6 p-lg-0 m-lg-0 d-flex justify-content-center justify-content-lg-center row">
                <div class="col-lg-3 p-lg-4 m-lg-0 col-3 cont-servicios d-flex justify-content-center"> 
                    <div class="ratio ratio-1x1 rounded-circle bg-secondary icono-servicios">
                        <div class="">
                            <?php $icono = get_post_meta($post->ID, 'icono', true);
                                echo $icono;
                            ?>
                        </div>
                        
                    </div>
               </div>
               <div class="row col-lg-6 col-8 p-lg-0 m-lg-0 p-0 m-0">
                    <div class="titulo-servicios col-lg-12 col-12 p-0 m-0 d-flex align-items-end">
                        <?php the_title(); ?>
                    </div>
                    <div class="post-servicios col-lg-12 col-12 p-0 m-0">
                        <?php the_excerpt();?>
                    </div>
               </div>

            </div>
        <?php endwhile;?>
    <?php endif;?>
</div>

