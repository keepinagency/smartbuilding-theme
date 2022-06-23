<?php 
/*** 
 *  Nuestros productos, categoría de entradas    
 *  Categoría: Productos   
 ***/   

$txth1 = get_option( 'h1', '' );
$arreglo_productos = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'productos',
    'order'=>'DESC',
	'posts_per_page'=>7
));
?>
<div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center pt-4 pb-2">
    <!--h2 class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Productos</h2-->
    <h1 class="border-2 border-bottom border-success px-1 m-0 text-center">
        <?php if (empty($txth1)) {
            echo "soluciones multi industria para el ahorro energético";
            }else{
                echo $txth1;
            }
        ?>    
    </h1>
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
                    <div class="p-0 m-0d-md-none ps-lg-1 pb-lg-1 d-lg-flex flex-lg-row-reverse d-flex flex-column-reverse"> <?php 
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
                                data-bs-toggle="collapse" href="#producto<?=$i?>" 
                                role="button" aria-expanded="false" aria-controls="producto<?=$i?>"
                                onclick="/*let wact = jQuery(this).parent().parent().width(); 
                                            jQuery(this).parent().parent().attr('style',  'border:thin solid red');
                                            alert(wact);
                                         jQuery(this).parent().parent().css('max-width',wact);
                                         var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
                                            var collapseList = collapseElementList.map(function (collapseEl) {
                                            return new bootstrap.Collapse(collapseEl)
                                            })*/">      
                                <h3 class="enlace-post text-uppercase text-center text-white w-100">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                            
                        </div>

                        <div  class="contenido-producto p-3 h-75 collapse multi-collapse" id="producto<?=$i?>">
                            <?php the_excerpt(); ?>
                        </div>
                        <script>
                            var myCollapsible = document.getElementById('producto<?=$i?>')
                            myCollapsible.addEventListener('show.bs.collapse', function () {
                                console.log(myCollapsible);
                                let wact = document.getElementById('producto<?=$i?>').parentElement.offsetWidth;
                                document.getElementById('producto<?=$i?>').style.maxWidth = wact+'px';
                                document.getElementById('producto<?=$i?>').parentElement.style.maxWidth = wact+'px';
                            })
                        </script>
                        
                    </div> 
                    
            <?php 
                $i++; 
                endwhile;?>
                </div>
		</div>
    <?php endif;?>
</div>
