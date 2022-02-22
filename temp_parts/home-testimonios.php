<?php 
/*** 
 *  Testimonios, categoría de entradas    
 *  Categoría: testimonios   
 ***/    
$arreglo_testimonio = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'testimonios',
    'order'=>'DESC',
	'posts_per_page'=>3
));
?>
<div class="home-testimonio my-5">
    <div class="d-flex justify-content-center">
        <div class="titulo-clientes text-uppercase d-flex align-items-center justify-content-center">
            <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Clientes</p>
        </div>
        <!--div class="col-md-12 d-flex justify-content-center">
            <h2>Explore la experiencia de nuestros clientes</h2>
        </div-->
    </div> 
    <div class="col-12 d-flex flex-column flex-lg-row p-0 m-0">
        <?php 
        $i=1;
        if ($arreglo_testimonio->have_posts()){
            while ($arreglo_testimonio->have_posts()) : $arreglo_testimonio->the_post();
            if ($i==2){
                    $direccion   = "-reverse";
                    $justifytext = "text-left text-lg-center";
                    $classmiddle = "middle_aboutus_home";
                }else{
                    $direccion="";
                    $justifytext = "text-right text-lg-center";
                    $classmiddle = "";
                }?>
                    <div class="col-12 col-lg-4 d-lg-flex flex-lg-row flex-lg-column p-0 m-0 aboutus_home <?=$classmiddle?>">
                        <div class="post-clientes col-6 col-lg-12 d-lg-flex justify-content-center py-2">
                            <?php the_title(); ?>
                        </div>
                        <div class="col-6 col-lg-12 d-lg-flex align-items-center justify-content-lg-center pb-3">
                            <?php the_post_thumbnail('full'); ?>  
                        </div>
                        <div class="col-12 col-lg-12 p-0 d-lg-flex justify-content-lg-center text-center px-3 cont-clientes">
                            <?php the_content();?>
                        </div>
                    </div>
                <?php $i++; endwhile; wp_reset_postdata();
        }
        ?>
    </div>
</div>