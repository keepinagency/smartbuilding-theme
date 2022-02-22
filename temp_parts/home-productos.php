<?php 
/*** 
 *  Nuestros productos, categoría de entradas    
 *  Categoría: Productos   
 ***/       
$arreglo_productos = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'productos',
    'order'=>'ASC',
	'posts_per_page'=>6
));
?>
<div class="row contenedor-productoHome p-0 m-0">
    <?php if ($arreglo_productos->have_posts()) :?>
        <div class="row col-12 p-0 m-0">
            <div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center p-4">
                <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Productos</p>
            </div>
            <?php while ($arreglo_productos->have_posts()) : $arreglo_productos->the_post();?>
                <div class="content-post col-12 col-lg-4 p-1 m-0 p-lg-1">  
                    <div class="miniatura-producto d-flex align-items-end p-0 m-0" 
                                style="background-image: url('<?php echo the_post_thumbnail_url('');?>'); background-size: cover;"> 
                        <a class="titulo-post w-100 d-flex align-items-center text-center" href="<?php the_permalink(); ?>" >      
                            <h4 class="enlace-post text-uppercase text-center text-white w-100">
                                <?php the_title(); ?>
                            </h4>
                        </a>
                    </div> 
                    <!--div class="contenido-producto p-2"><?php the_excerpt(); ?></div-->
                </div>
            <?php endwhile;?>
		</div>
    <?php endif;?>
</div>
