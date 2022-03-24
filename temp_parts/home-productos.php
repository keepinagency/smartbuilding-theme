<?php 
/*** 
 *  Nuestros productos, categoría de entradas    
 *  Categoría: Productos   
 ***/       
$arreglo_productos = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'productos',
    'order'=>'DESC',
	'posts_per_page'=>7
));
?>
<div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center pt-4 pb-2">
    <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Productos</p>
</div>
<div class="row contenedor-productoHome p-0 m-0 p-3 d-flex flex-column-reverse">
    <?php if ($arreglo_productos->have_posts()) :?>
        <div class="row col-12 p-0 m-0">
            

            <?php  
            $i = 0;
            $col = 3;
            $x = 0;
            while ($arreglo_productos->have_posts()) : $arreglo_productos->the_post();

                if (is_int ($i / $col) ){
                    
                    if (!is_float($x)){?>
                        </div> <?php
                    }
                    ?>
                    <div class="p-0 m-0 d-lg-flex d-md-none ps-lg-1 pb-lg-1 d-flex flex-row-reverse"> <?php 
                    $x++;
                }
                ?>
                 
                    <div class="miniatura-producto d-flex flex-column align-items-end p-0 m-0 mb-4 
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
                                <h4 class="enlace-post text-uppercase text-center text-white w-100">
                                    <?php the_title(); ?>
                                </h4>
                            </a>
                            
                        </div>

                        <div  class="contenido-producto p-3 h-75 collapse multi-collapse" id="producto<?=$i?>">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        
                    </div> 
                    
            <?php 
                $i++; 
                endwhile;?>
                </div>
		</div>
    <?php endif;?>
</div>
