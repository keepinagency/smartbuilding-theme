<?php 
/*
Template Name: Hoteleras
Template Post Type: page
Esta es la plantilla para el Bog del menu
 */
get_header();
$sub = get_post_meta($post->ID, 'subtitulo', true);
$sub_ = get_post_meta($post->ID, 'sub_titulo', true);
$paginacion_nueva = get_query_var('paged');
$nuevo_arreglo = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'climatizacion_iluminacion',
	'posts_per_page'=>3,
	'paged'=>$paginacion_nueva 
));
?>
<div class="row container-fluid col-12 p-0 m-0">
    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-12 text-lg-center pt-5">
                <h1><?php echo $sub.' '.$sub_; ?></h1>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <h3>Sector Hotelero</h3>
            <p>El 84% del consumo energético en hoteles promedio en Chile es en Agua Caliente, Climatización e Iluminación.</p>
            <img src="<?= smartbuilding_IMG. 'Soluciones/Sector-hotelero.png'?>" style="width:50%;"/>
        </div>
        <div class="col-12 text-white row p-0 m-0" style="background: #32B2D0;">
            <h3 class="text-center py-3">Agua Caliente</h3>
            <p class="px-5 pb-3 text-center">En hotelería existen una enormidad de servicios y funciones donde el agua caliente juega un rol fundamental. 
                Es por lo anterior, y de cara a optimizar el costo de operación de un Hotel, es muy importante el uso que se le dará al agua caliente para determinar la forma o los elementos que se utilizarán para generarla.
                (Es muy diferente generar agua caliente para las duchas, que para calefacción, por ejemplo). 
                Es por eso que las Bombas de Calor SmartPool, o el calefón SmartHotWater pueden jugar un rol muy importante en la matriz generadora de Agua Caliente en un Hotel.</p>
        
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="#">
                    <img src="<?= smartbuilding_IMG. 'Soluciones/agua1.jpg'?>" alt="" style="max-width:100%;"><br><br>
                    <h4 class="text-center text-white"><strong>SmartHotWater</strong></h4><br>
                </a>
                <p class="text-center">Sistema de calentamiento eléctrico de agua sin estanque (calienta flujo), posee la mas alta tecnología permitiendo ahorro de energía a la vez de máximo confort, cero gasto en mantención y máxima seguridad en su utilización. </p>
            </div>
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="#">
                    <img src="<?= smartbuilding_IMG. 'Soluciones/agua2.jpg'?>" alt="" style="max-width:100%"><br><br>
                    <h4 class="text-center text-white"><strong>SmartPool</strong></h4><br>
                </a>
                <p class="text-center">Se trata del mejor sistema para calefacción de piscinas, con la mejor relación costo y eficiencia. Contamos con la tecnología para transformar una piscina en una Piscina del Caribe. </p>
            </div>

            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="#">
                    <img src="<?= smartbuilding_IMG. 'Soluciones/agua3.jpg'?>" alt="" style="max-width:100%"><br><br>
                    <h4 class="text-center text-white"><strong>SmartTub</strong></h4><br>
                </a>
                <p class="text-center">La más confortable y Ecológica Tina Caliente del Mercado. Disfrutar en el patio de tu casa o donde quieras, relajándote con agua caliente y el menor costo de mantención.</p><br><br><br><br>
            </div>
        </div>
        <div class="row col-12 p-0 m-0 m-lg-0 p-lg-0 text-white" style="background: #2C5660;">
            <h3 class="text-center py-3">Climatización e Iluminación</h3>
            <p class="px-5 pb-3 text-center">Para calefaccionar una casa o departamento con el menor costo de operación y mantención se deben tener en cuenta dos aspectos principalmente: Primero, 
            incorporar elementos de aislación térmica al recinto a calefaccionar y segundo, proveer una fuente de Calor que sea eficiente tanto en los Consumos 
            como en la transmisión del calor que genera al ambiente.</p>
        <?php 
            while ($nuevo_arreglo->have_posts()) : $nuevo_arreglo->the_post();?>
                <!--div class="col-12 bg-warning">
                    <?php $current_cat_id = the_category_ID(false);
                        echo '<h3>' . get_cat_name($current_cat_id) . '</h3>';
                        $catID = get_the_category();
                        echo category_description( $catID[0] );
                    ?>
                </div-->
                <div class="row d-flex flex-lg-row col-12 p-0 m-0 col-lg-4">
                    <div class="col-12 col-lg-12 cont-img text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('') ;?>
                        </a>
                    </div> 
                    <div class="row cont-corpotel col-12 m-0 p-0 text-center">
                        <div class="col-10 col-lg-12 m-0 p-0 cont_tit_blog">
                            <a class=" p-0 m-0" href="<?php the_permalink(); ?>">
                                <div class="p-2 m-0 text-white">
                                    <h3><?php the_title();?></h3>
                                </div>
                                <div class="p-2 m-0 text-lg-justify text-white">
                                    <?php the_excerpt();?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif;?>
        </div>
</div>
<?php get_footer(); ?>

