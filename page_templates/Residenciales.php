<?php 
/*
Template Name: Residenciales
Template Post Type: page
Esta es la plantilla para el Bog del menu
 */
get_header();
$sub = get_post_meta($post->ID, 'subtitulo', true);
$sub_ = get_post_meta($post->ID, 'sub_titulo', true);
$nuevo_arreglo = new WP_Query(array(
	'post_type'=>'post',
    'category_name' => 'calefaccion',
	'posts_per_page'=>4,
    'orderby' => 'post__in',
    /*'post__in' => array(43, 55, 58 )---> Local */ 
    'post__in' => array(58, 45, 62 )/*Ambiente DEV*/
    
));

$tit_agua = get_option( 'titulo-aguas', 'Agua Caliente' );
$cont_agua = get_option( 'contenido-aguas', '' );

$titpost_agua = get_option( 'titulo-aguas-post', '' );
$contpost_agua = get_option( 'contenido-aguas-post', '' );
$url_agua = get_option( 'url-aguas', '' );
$img_agua = get_option( 'img-aguas', '' );

$titpost_aguas = get_option( 'titulo-aguas-posts', '' );
$contpost_aguas = get_option( 'contenido-aguas-posts', '' );
$url_aguas = get_option( 'durl-aguas', '' );
$img_aguas = get_option( 'imge-aguas', '' );

$clima1 = get_option( 'clima1', '' );
$clima2 = get_option( 'clima2', '' );
/*$url_aguat = get_option( 'durl__aguas', '' );
$img_aguat = get_option( 'imge__aguas', '' );*/
?>
<div class="row container-fluid col-12 p-0 m-0">
    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0 d-flex justify-content-center" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-6 text-lg-center pt-5 p-0 m-0 titulo-page">
                <h1><?php echo $sub.' '.$sub_; ?></h1>
            </div>
        </div>
        <div class="col-12 text-center my-5">
            <h2>Sector Residencial</h2>
            <p>El 67% del consumo energético de un hogar promedio en Chile (Casa o Departamento) es en Calefacción y Agua Caliente.</p>
            <img src="<?= smartbuilding_IMG. 'Soluciones/Sector-residencial.png'?>" style="width:50%;"/>
        </div>
        <div class="row col-12 p-0 m-0 m-lg-0 p-lg-0 text-white" style="background: #FF8900;">
            <h2 class="text-center py-3">
                <?php if(empty($clima1)){ echo "Calefacción y/o Climatización"; } else { echo $clima1; }?>
            </h2>
            
            <p class="px-5 pb-3 text-center">
                <?php if(empty($clima2)){ 
                    echo "Para climatizar una casa o departamento con el menor costo de operación y mantención se deben tener en cuenta dos aspectos principalmente: 
                    Primero, incorporar elementos de aislación térmica al recinto a calefaccionar y segundo, proveer una fuente de energía que sea eficiente 
                    tanto en los Consumos como en la transmisión del calor que genera al ambiente."; } 
                else { echo $clima2; }?>
            </p>
            <?php while ($nuevo_arreglo->have_posts()) : $nuevo_arreglo->the_post();?>
                <!--div class="col-12 bg-warning">
                    <?php $current_cat_id = the_category_ID(false);
                        echo '<h2>' . get_cat_name($current_cat_id) . '</h2>';
                    ?>
                </div-->
                <div class="row d-flex d-lg-flex justify-content-center flex-lg-row col-12 p-0 m-0 col-lg-6 px-lg-5 pb-lg-3">
                    <div class="col-12 col-lg-12 cont-img text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('') ;?>
                        </a>
                    </div> 
                    <div class="cont-corpotel col-12 m-0 p-0 text-center">
                        <div class="col-12 col-lg-12 m-0 p-0 cont_tit_blog">
                            <a class="p-0 m-0 text-decoration-none" href="<?php the_permalink(); ?>">
                                <div class="p-2 m-0 text-white text-center text-uppercase">
                                    <h2 class=""><?php the_title();?></h2>
                                </div>
                            </a>
                            <div class="p-2 m-0 text-lg-justify text-white text-center">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="col-12 text-white row p-0 m-0 d-lg-flex justify-content-lg-center" style="background: #32B2D0;">
            <h2 class="text-center py-3"><?php if(empty($tit_agua)){ echo "Agua Caliente"; } else { echo $tit_agua; }?></h2>
            <p class="px-5 pb-3 text-center">
                <?php if(empty($cont_agua)) {echo "Para calefaccionar una casa o departamento con el menor costo de operación y mantención se deben tener en cuenta dos aspectos principalmente: 
                    Primero, incorporar elementos de aislación térmica al recinto a calefaccionar y segundo, proveer una fuente de Calor que sea eficiente 
                    tanto en los Consumos como en la transmisión del calor que genera al ambiente.";}
                else{
                    echo $cont_agua; } ?>
                </p>

        <!--PRIMER POST-->
            <div class="col-lg-4 col-12 m-lg-5">
                <a class="text-decoration-none"href="<?= $url_agua ?>">
                    <?php if(empty($img_agua)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua1.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $img_agua ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <h4 class="text-center text-white text-uppercase"><strong><?php if(empty($titpost_agua)){ echo "SmartHotWater"; } else { echo $titpost_agua; }?></strong></h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($contpost_agua)) {echo "Sistema de calentamiento eléctrico de agua sin estanque (calienta flujo), 
                        posee la mas alta tecnología permitiendo ahorro de energía a la vez de máximo confort, cero gasto en mantención y máxima seguridad en su utilización.";}
                        else {
                            echo $contpost_agua;} 
                    ?> 
                </p>
                <div class="col-12 read-more"><a href="<?= $url_agua ?>">Leer mas -></a></div>
            </div>

        <!--SEGUNDO POST-->
            <div class="col-lg-4 col-12 m-lg-5">
                <a class="text-decoration-none"href="<?= $url_aguas ?>">
                    <?php if(empty($img_aguas)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua2.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $img_aguas ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <h4 class="text-center text-white text-uppercase"><strong><?php if(empty($titpost_aguas)){ echo "SmartPool"; } else { echo $titpost_aguas; }?></strong></h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($contpost_aguas)) {echo "Se trata del mejor sistema para calefacción de piscinas, con la mejor relación costo y eficiencia. 
                            Contamos con la tecnología para transformar una piscina en una Piscina del Caribe.";}
                        else {
                            echo $contpost_aguas;} 
                    ?> 
                </p>
                <div class="col-12 read-more"><a href="<?= $url_aguas ?>">Leer mas -></a></div>
            </div>

        <!--TERCER POST-->
            <!--div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="<?= $url_aguat ?>">
                    <?php if(empty( $img_aguat)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua3.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $img_aguat ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <img src="<?= smartbuilding_IMG. 'Soluciones/agua3.jpg'?>" alt="" style="max-width:100%"><br><br>
                    <h4 class="text-center text-white"><strong><?php if(empty($titpost_aguat)){ echo "SmartTub"; } else { echo $titpost_aguat; }?></strong></h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($contpost_aguas)) {echo "La más confortable y Ecológica Tina Caliente del Mercado. 
                            Disfrutar en el patio de tu casa o donde quieras, relajándote con agua caliente y el menor costo de mantención.";}
                        else {
                            echo $contpost_aguas;} 
                    ?> 
                </p><br><br><br><br>
            </div-->
        </div>
    <?php endif; ?>
        
</div>
<?php get_footer(); ?>

