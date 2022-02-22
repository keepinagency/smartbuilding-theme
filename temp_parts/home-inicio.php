<?php 
/*** 
 *  Sliders en inicio del home, categoría de entradas    
 *  Categoría: Presentación
 ***/ 
$arreglo_slides = new WP_Query(array (
    'post_type'     =>'post',
	'category_name' =>'presentacion',
	'orderby'		=>'rand'
));
?>
<!--div class="content_home d-flex flex-column p-0 m-0 h-100"-->
    <div id="carruselHome" class="carousel slide p-0 m-0 d-block col-12" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $i=1; while($arreglo_slides->have_posts()) : $arreglo_slides->the_post();?>
                <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>" > 
                    <img class="img-carousel d-block w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    <div class="carousel-caption visible-lg">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
                <?php $i++; endwhile; wp_reset_postdata();?>
        </div>
        <!--Indicadores de Slides-->
        <?php $x=1; ?>
        <ol class="carousel-indicators">
            <?php 
                for ($x = 0; $x < $i-1 ; $x++) {?>
                    <li data-bs-target="#carruselHome" data-bs-slide-to="<?php echo $x ?>" class="<?php if ($x == 0) echo 'active'; ?>"></li>
            <?php } ?>
        </ol>
        
        <!--Botones PREV and NEXT-->
        <div class="p-0 m-0 d-none d-sm-block" id="botones">
            <a class="carousel-control-prev" href="#carruselHome" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carruselHome" role="button" data-bs-slide="next">
                <span class="sr-only">Next</span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
<!--/div--> <!-- outer_slidehome -->
			