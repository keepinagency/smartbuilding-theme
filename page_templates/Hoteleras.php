<?php 
/*
Template Name: Hoteleras
Template Post Type: page
Esta es la plantilla para el Bog del menu
 */
get_header();
$sub = get_post_meta($post->ID, 'subtitulo', true);
$sub_ = get_post_meta($post->ID, 'sub_titulo', true);
$nuevo_arreglo = new WP_Query(array(
	'post_type'=>'post', 
    'category_name' => 'climatizacion_iluminacion',
	'posts_per_page'=>3,
	'paged'=>$paginacion_nueva 
));
$htit_agua = get_option( 'htitulo-aguas', 'Agua Caliente' );
$hcont_agua = get_option( 'hcontenido-aguas', '' );

$htitpost_agua = get_option( 'htitulo-aguas-post', '' );
$hcontpost_agua = get_option( 'hcontenido-aguas-post', '' );
$hurl_agua = get_option( 'hurl-aguas', '' );
$himg_agua = get_option( 'himg-aguas', '' );

$htitpost_aguas = get_option( 'htitulo-aguas-posts', '' );
$hcontpost_aguas = get_option( 'hcontenido-aguas-posts', '' );
$hurl_aguas = get_option( 'hdurl-aguas', '' );
$himg_aguas = get_option( 'himge-aguas', '' );

$htitpost_aguat = get_option( 'htitulo-aguas__posts', '' );
$hcontpost_aguat = get_option( 'hcontenido-aguas__posts', '' );
$hurl_aguat = get_option( 'hdurl__aguas', '' );
$himg_aguat = get_option( 'himge__aguas', '' );
?>
<div class="row container-fluid col-12 p-0 m-0">
    <?php if ($nuevo_arreglo->have_posts()) : ?>
        <div class="col-12 col-lg-12 p-0 m-0 d-flex justify-content-center" 
            style="background-image: url('<?= the_post_thumbnail_url('');?>'); background-repeat: no-repeat; background-size:cover; width:100%; min-height:70vh;">
            <div class="col-12 text-center col-lg-6 text-lg-center pt-5 titulo-page">
                <h1><?php echo $sub.' '.$sub_; ?></h1>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <h3>Sector Hotelero</h3>
            <p>El 84% del consumo energético en hoteles promedio en Chile es en Agua Caliente, Climatización e Iluminación.</p>
            <img src="<?= smartbuilding_IMG. 'Soluciones/Sector-hotelero.png'?>" style="width:50%;"/>
        </div>
        <div class="col-12 text-white row p-0 m-0" style="background: #32B2D0;">
            <h3 class="text-center py-3"> 
                <?php if(empty($htit_agua)){ echo "Agua Caliente"; } else { echo $htit_agua; }?>
            </h3>
            <p class="px-5 pb-3 text-center">
                <?php if(empty($hcont_agua)) { 
                    echo "En hotelería existen una enormidad de servicios y funciones donde el agua caliente juega un rol fundamental. 
                        Es por lo anterior, y de cara a optimizar el costo de operación de un Hotel, 
                        es muy importante el uso que se le dará al agua caliente para determinar la forma o los elementos que se utilizarán para generarla.
                        (Es muy diferente generar agua caliente para las duchas, que para calefacción, por ejemplo). 
                        Es por eso que las Bombas de Calor SmartPool, o el calefón SmartHotWater pueden jugar un rol muy importante en la matriz generadora de Agua Caliente en un Hotel.";} 
                    else{
                        echo $hcont_agua; } ?> 
            </p>

         <!--PRIMER POST-->
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="<?php echo $hurl_agua; ?>">
                    <?php if(empty($himg_agua)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua1.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $himg_agua ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <h4 class="text-center text-white">
                        <strong>
                            <?php if(empty($htitpost_agua)){ echo "SmartHotWater"; } else { echo $htitpost_agua; }?>
                        </strong>
                    </h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($hcontpost_agua)) {echo "Sistema de calentamiento eléctrico de agua sin estanque (calienta flujo), 
                            posee la mas alta tecnología permitiendo ahorro de energía a la vez de máximo confort, cero gasto en mantención y máxima seguridad en su utilización.";}
                        else {
                            echo $hcontpost_agua;} 
                    ?>  
                </p>
            </div>

        <!--SEGUNDO POST-->
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="<?php echo $hurl_aguas; ?>">
                    <?php if(empty($himg_aguas)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua2.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $himg_aguas ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <h4 class="text-center text-white"><strong><?php if(empty($htitpost_aguas)){ echo "SmartPool"; } else { echo $htitpost_aguas; }?></strong></h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($hcontpost_aguas)) {echo "Se trata del mejor sistema para calefacción de piscinas, con la mejor relación costo y eficiencia. 
                            Contamos con la tecnología para transformar una piscina en una Piscina del Caribe.";}
                        else {
                            echo $hcontpost_aguas;} 
                    ?> 
                </p>
            </div>

        <!--TERCER POST-->
            <div class="col-lg-4 col-12">
                <a class="text-decoration-none"href="<?php echo $hurl_aguat; ?>">
                    <?php if(empty( $himg_aguat)) {
                            echo '<img src="'.smartbuilding_IMG.'Soluciones/agua3.jpg' . '" style="max-width:100%;><br><br>'; }
                        else{
                            echo '<img src="' . esc_url( $himg_aguat ) . '" style="max-width:100%;"><br><br>'; }
                    ?>
                    <h4 class="text-center text-white"><strong><?php if(empty($htitpost_aguat)){ echo "SmartTub"; } else { echo $htitpost_aguat; }?></strong></h4><br>
                </a>
                <p class="text-center">
                    <?php if(empty($contpost_aguas)) {echo "La más confortable y Ecológica Tina Caliente del Mercado. 
                            Disfrutar en el patio de tu casa o donde quieras, relajándote con agua caliente y el menor costo de mantención.";}
                        else {
                            echo $contpost_aguas;} 
                    ?> 
                </p><br><br><br><br>
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
                        <div class="col-12 col-lg-12 m-0 p-0 cont_tit_blog">
                            <a class="text-decoration-none p-0 m-0" href="<?php the_permalink(); ?>">
                                <div class="p-2 m-0 text-white text-center">
                                    <h3><?php the_title();?></h3>
                                </div>
                            </a>
                            <div class="p-2 m-0 text-lg-justify text-white text-center">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif;?>
        </div>
</div>
<?php get_footer(); ?>

