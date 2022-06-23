<?php 
/*
Template Name: HomePage
Template Post Type: page
Esta es la plantilla para el Home - Page
 */
get_header();
/*********************** Sección Carousel ************************/
/****************************************************************/
$arreglo_slides = new WP_Query(array (
    'post_type'     =>'post',
	'category_name' =>'presentacion',
	'orderby'		=>'rand'
));
?>
<!--div class="content_home d-flex flex-column p-0 m-0 h-100"-->
    <div id="carruselHome" class="carousel slide p-0 m-0 col-12" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $i=1; while($arreglo_slides->have_posts()) : $arreglo_slides->the_post();?>
                <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>" > 
                    <img class="img-carousel w-100 h-100 img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    <div class="carousel-caption">
                        <h2 class="py-2"><?php the_title(); ?></h2>
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
                <!--span class="sr-only bg-dark text-white">Anterior</span-->
            </a>
            <a class="carousel-control-next" href="#carruselHome" role="button" data-bs-slide="next">
                <!--span class="sr-only bg-dark text-white">Siguiente</span-->
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
<!--/div--> <!-- outer_slidehome -->
<?php
/********************** Sección HomePage H1 Página ************************/  
/*************************************************************************/
?>
<div class="row page col-md-12 p-0 m-0">
        <?php if ( have_posts() ) { ?>
            <!--div class="page-title col-12 text-center col-lg-12 pb-lg-2 pt-lg-4">
                <h1><?php the_title(); ?></h1>
            </div-->
        <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="row page-cont col-12 d-flex-lg justify-content-lg-center p-0 m-0">
                    <div class="page-post col-12 text-justify col-lg-12 pr-lg-5 pl-lg-5 py-3">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
            endwhile;
            } 
        ?>
    </div>

<?php
/********************** Sección Nuestros Productos ***********************/  
/*************************************************************************/
$arreglo_productos = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'productos',
    'order'=>'DESC',
	'posts_per_page'=>7
));
?>
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
                                role="button" aria-expanded="false" aria-controls="producto<?=$i?>">      
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
<?php 
/********************** Sección Nuestros Servicios ***********************/ 
/************************************************************************/
//$descrip = get_post_meta($post->ID, 'descripcion', true);
$arreglo_servicios = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'servicios',
    'order'=>'ASC',
	'posts_per_page'=>6
));
?>
<div id="servicios" class="col-12 row p-0 m-0 ">
    <?php if ($arreglo_servicios->have_posts()) : ?>
        <div class="titulo-producto text-uppercase d-flex align-items-center justify-content-center pt-4 pb-2">
            <h2 class="border-2 border-bottom border-success"><b class="titulo-negrita">Nuestros</b>&nbsp;Principios</h2>
        </div>
        <div class="col-12 row p-0 m-0" style="background-color: rgba(0, 0, 0, 0.05);">
        <?php while ($arreglo_servicios->have_posts()) : $arreglo_servicios->the_post();?>
            <div class="pt-2 col-12 p-0 m-0 col-lg-6 p-lg-0 m-lg-0 d-flex justify-content-center justify-content-lg-center row">
                <div class="col-lg-3 p-3 p-lg-5 m-lg-0 col-3 cont-servicios"> 
                    <div class="icono-servicios">
                        <div class="rounded-circle bg-secondary">
                            <?php $icono = get_post_meta($post->ID, 'icono', true);
                                echo $icono;
                            ?>
                        </div>
                    </div>
               </div>
               <div class="row col-lg-6 col-8 p-lg-0 m-lg-0 p-0 m-0">
                    <div class="titulo-servicios col-lg-12 col-12 p-0 m-0 d-flex align-items-end">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <div class="post-servicios col-lg-12 col-12 p-0 m-0">
                        <?php the_excerpt();?>
                    </div>
               </div>

            </div>
        <?php endwhile;?>
        </div>
    <?php endif;?>
</div>
<?php
/***************** Sección de Contáctanos *****************/
/*********************************************************/
?>
<div class="row p-0 m-0 mx-3 mb-3">
    <div class="titulo-producto col-12 text-uppercase d-flex align-items-center justify-content-center p-4 ">
        <p class="border-2 border-bottom border-success" id="form-contacto"><b class="titulo-negrita">Contáctanos</b></p>
    </div>
    <div class="col-12 col-lg-6 p-0 m-0 border ">
        <!--p class="text-center titulo-contact">
            <b>Información de Contacto</b>
        </p-->
        <div class="row col-12 m-0 p-0 p-3 p-lg-4"> 
            <div class="texto-contacto pb-4">
                <?php if (empty($uno)) {
                    echo "Smartbuilding es una empresa creada con el objetivo de ofrecer la mejor tecnología del mundo en Eficiencia Energética y Construcción Sustentable. 
                    Nuestra experiencia nacional e internacional y respaldo técnico, nos permite ofrecer soluciones de vanguardia y con la mejor relación calidad - precio.</br></br>";
                }else{
                    echo $uno . "</br>" . "</br>";
                } ?>
                <?php if (empty($dos)) {
                    echo "Queremos ser referentes en la industria de la Construcción Sustentable y la eficiencia energética, con aplicaciones residenciales y Comerciales. 
                    Líderes en ofrecer tecnologías y soluciones para las personas que buscan no sólo ahorros en sus consumos energéticos sino que también su impacto en el entorno y el planeta.";
                }else{
                    echo $dos;
                } ?>
            </div>
            <div class="col-12 col-lg-6">
                <span class="text-secondary">
                    <i class="fa-solid fa-house pt-4 pe-2"></i> Dirección:
                </span>
                <p><?php if (empty($dir)) {
                    echo "Andes 3723, Quinta Normal";
                }else {
                    echo $dir;
                    }?>
                </p>
                <span class="text-secondary">
                    <i class="fa-solid fa-square-phone pt-4 pe-2"></i> Teléfono:
                </span>
                <p>
                    <?php if (empty($tel)) {?>
                        <a href="https://wa.me/56229380016?text=Hola,%20les%20escribo%20desde%20www.smartbuilding.cl" target="_blank">+56229380016<a>
                    <?php } else {?>
                        <a href="https://wa.me/<?=$tel?>?text=Hola,%20les%20escribo%20desde%20www.smartbuilding.cl" target="_blank"><?=$tel?></a>
                    <?php }?>
                </p>
                <span class="text-secondary">
                    <i class="fa-solid fa-envelope pt-4 pe-2"></i> Correo:
                </span>
                <p class="p-0 m-0"><?php if (empty($correo)) {
                    echo "<a href:'mailto:contacto@smartbuilding.cl'>contacto@smartbuilding.cl<a>";
                }else {
                    ?>
                    <a href="mailto:<?= $correo; ?>"><?=$correo?></a>
                    <?php
                }
                ?></p>
                <div class="pt-4 pe-2 m-0 text-secondary">
                    <span class="">Nuestras Redes:</span>
                </div>
                <div class="col-12 p-0 m-0 pt-1" >
                    <!-- Red social - 1 -->
                    <a href="<?=$url_1?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored1;?>"/>
                    </a>
                    <!-- Red Social - 2 -->
                    <a href="<?=$url_2?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored2;?>"/>
                    </a>
                    <!-- Red Social - 3 -->
                    <a href="<?=$url_3?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored3;?>"/>
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-lg-6 p-0 m-0">
                <div class="pt-4 pe-2 text-secondary text-end">
                    
                </div>
                    
            </div>
        </div>
        
    </div>
    <div class="contact col-12 col-lg-6 p-0 m-0">
        <script type="text/javascript" src="https://clientify.net/web-marketing/webforms/script/72456.js"></script>
    </div>
</div>
<?php get_footer(); ?>