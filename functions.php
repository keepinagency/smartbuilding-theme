<?php
/* Libreria bootstrap para Nav - Menu */
require_once('class-wp-bootstrap-navwalker.php');

/*Definicion de rutas TEMP_PARTS*/
define( 'smartbuilding_VERSION', '0.0.1' );
define( 'smartbuilding_TEMP_PARTS', trailingslashit( get_template_directory() ) . 'temp_parts/' );
define( 'smartbuilding_IMG', trailingslashit( get_template_directory_uri() ) . 'img/' );

/*Soporte para Titulos, Imagen destacada y logo*/
function smartbuilding_setup(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 434,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => array( 'site-title', 'site-description'),
	));
}

/*Archivos JS y CSS*/
function smartbuilding_cssjs(){
	wp_enqueue_style('bootstrap_5', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap_js_5', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
	$dependencies = array('bootstrap_5');
	wp_enqueue_style( 'smartbuilding-style', get_stylesheet_uri(), $dependencies );
}
function smartbuilding_enqueue_scripts() {
    /*** Archivos JS BootStrap y sus dependencias ***/
    $dependencies = array('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', $dependencies, '', true );
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', $dependencies, '', true );
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', $dependencies, '', true );

}

/*Registro Menú Header and Footer*/
function smartbuilding_register_menu() {
	register_nav_menu( 'header-menu', __('Header Menu'));
    register_nav_menu( 'footer-menu', __('Footer Menu'));
}
/****************FUNCION PARA EXTRACTO***********************/
function custom_excerpt_length( $length){
	return 32;
}

function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<br><div class="col-12 read-more "><a href="%1$s">%2$s</a></div>',
            get_permalink( get_the_ID() ),
            __( 'Leer mas ->', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/************** METABOXES PARA EL TITULO ****************
********************************************************/

function descrip() { 
	add_meta_box( 'descrip','Configuración adicional para el Post.','la_descripcion','post','normal','high' );  
}
function la_descripcion() {
    global $wpdb, $post;
    $descrip  = get_post_meta($post->ID, 'descripcion', true);
    $icono  = get_post_meta($post->ID, 'icono', true);

    echo '<label><strong>Icono para el post</strong></label></br>
    <input type="text" name="icono" id="icono" value="'.htmlspecialchars($icono).'" style="width: 300px;" /></br></br>';

    echo '<label><strong>Descripci&oacute;n:</strong></label></br>
    <textarea name="descripcion" id="descripcion" value="'.htmlspecialchars($descrip).'" cols="50" rows="5"></textarea>';
}
function guardar_descripcion() {
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    $price= $_POST['descripcion'];
    update_post_meta($post_id, 'descripcion', $price);
}
function guardar_icono(){
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    $price = $_POST['icono'];
    update_post_meta($post_id, 'icono', $price);
}

function subtitulo() { 
	add_meta_box( 'subtitulo','Indique el Subtitulo a ser usado para esta página.','el_subtitulo','page','normal','high' );  
}
function el_subtitulo() {
    global $wpdb, $post;
    $subfirst  = get_post_meta($post->ID, 'subtitulo', true);
    $subsecond = get_post_meta($post->ID, 'sub_titulo', true);

    echo '<label><strong>Titulo:</strong></label></br>
    <input type="text" name="subtitulo" id="subtitulo" value="'.htmlspecialchars($subfirst).'" style="width: 300px;" /></br></br>';

    echo '<label><strong>Sub Titulo:</strong></label></br>
    <input type="text" name="sub_titulo" id="sub_titulo" value="'.htmlspecialchars($subsecond).'" style="width: 300px;" /></br>';
}
function guardar_subtitulo() {
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    $price= $_POST['subtitulo'];
    update_post_meta($post_id, 'subtitulo', $price);
}
function guardar_sub_titulo() {
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    $price= $_POST['sub_titulo'];
    update_post_meta($post_id, 'sub_titulo', $price);
}
/*FUNCIÓN PARA 404*/

function redirigir_todos_los_404(){
    $url_a_redireccionar = 'https://smartbuilding.cl/s';
    if(is_404()){
        wp_redirect( $url_a_redireccionar, 301 );
        exit;
        }
  }
add_action('template_redirect', 'redirigir_todos_los_404');

/***** FUNCIONES CUSTOM PARA EL PERSONZALIDOR *******
*****************************************************/
function custom_smartbuilding_register( $wp_customize ) {

	/** Panel OPCIONES SMARTBUILDING para el personalizador **
    ***************************************************************
    ***************************************************************/

    /*SECCIÓN PARA CONTÁCTANOS HOME**
    ***************************************************/
    $wp_customize->add_panel( 'smartbuildingContacto', array(
        'title' => 'Contáctanos home',
        'description' => 'Opciones personalizadas',
        'priority' => 101,
    ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'Parrafo', array(
            'title' => __( 'Información en contáctanos', 'textdomain' ),
            'panel' => 'smartbuildingContacto',
            'priority' => 1,
        ));
            /** Setting Parrafos en contáctanos - 1er parrafo **/
            $wp_customize->add_setting( 'parrafo1', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('parrafo1', array(
                'label' => __( 'Texto para el Primer parrafo', 'textdomain' ),
                'section' => 'Parrafo',
                'priority' => 1,
                'type' => 'textarea',
            ));
            /** Setting Parrafos en contáctanos - 2do parrafo **/
            $wp_customize->add_setting( 'parrafo2', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('parrafo2', array(
                'label' => __( 'Texto para el Segundo parrafo', 'textdomain' ),
                'section' => 'Parrafo',
                'priority' => 2,
                'type' => 'textarea',
            ));

    /********SECCIÓN PARA TEXTO CLIMATIZACIÓN**********
    ***************************************************/
    $wp_customize->add_panel( 'smartbuildingClima', array(
        'title' => 'Climatización y/o Calefacción',
        'description' => 'Opciones personalizadas',
        'priority' => 102,
    ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'Clima', array(
            'title' => __( 'Soluciones Hoteleras, Residenciales y Corporativas', 'textdomain' ),
            'panel' => 'smartbuildingClima',
            'priority' => 1,
        ));
            /** Setting título climatización 1 **/
            $wp_customize->add_setting( 'clima1', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('clima1', array(
                'label' => __( 'Ingrese título', 'textdomain' ),
                'section' => 'Clima',
                'priority' => 1,
                'type' => 'textarea',
            ));
            /** Setting título climatización 2 **/
            $wp_customize->add_setting( 'clima2', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('clima2', array(
                'label' => __( 'Ingrese descripción', 'textdomain' ),
                'section' => 'Clima',
                'priority' => 2,
                'type' => 'textarea',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'Climat', array(
            'title' => __( 'Soluciones industriales', 'textdomain' ),
            'panel' => 'smartbuildingClima',
            'priority' => 1,
        ));
            /** Setting título climatizaciónt 1 **/
            $wp_customize->add_setting( 'climat1', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('climat1', array(
                'label' => __( 'Ingrese título', 'textdomain' ),
                'section' => 'Climat',
                'priority' => 1,
                'type' => 'textarea',
            ));
            /** Setting título climatizaciónt 2 **/
            $wp_customize->add_setting( 'climat2', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('climat2', array(
                'label' => __( 'Ingrese descripción', 'textdomain' ),
                'section' => 'Climat',
                'priority' => 2,
                'type' => 'textarea',
            ));

    /*SECCIÓN PARA SOLUCIONES RESIDENCIALES - INTERNAS**
    ***************************************************/
    $wp_customize->add_panel( 'smartbuilding', array(
        'title' => 'Soluciones residenciales',
        'description' => 'Opciones personalizadas',
        'priority' => 174,
    ));
    
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'residenciales_agua', array(
            'title' => __( 'Agua caliente', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 1,
        ));
            /** Setting TEXT TITULO**********/
            $wp_customize->add_setting( 'titulo-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo-aguas', array(
                'label' => __( 'Ingrese título', 'textdomain' ),
                'section' => 'residenciales_agua',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO*****/
            $wp_customize->add_setting( 'contenido-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido-aguas', array(
                'label' => __( 'Ingrese descripción', 'textdomain' ),
                'section' => 'residenciales_agua',
                'priority' => 2,
                'type' => 'textarea',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'residenciales_post', array(
            'title' => __( 'Primer post', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 2,
        ));
            /** Setting TEXT TITULO POST**********/
            $wp_customize->add_setting( 'titulo-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo-aguas-post', array(
                'label' => __( 'Ingrese título del post', 'textdomain' ),
                'section' => 'residenciales_post',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'contenido-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido-aguas-post', array(
                'label' => __( 'Ingrese contenido del post', 'textdomain' ),
                'section' => 'residenciales_post',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'img-aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua1.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'img-aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'residenciales_post',
                'settings'   => 'img-aguas',
                'priority'   => 3,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'url-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('url-aguas', array(
                'label' => __( 'Url para el post', 'textdomain' ),
                'section' => 'residenciales_post',
                'priority' => 4,
                'type' => 'text',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'residenciales-post', array(
            'title' => __( 'Segundo post', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 3,
        ));
                /** Setting TEXT TITULO POST**********/
                $wp_customize->add_setting( 'titulo-aguas-posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo-aguas-posts', array(
                'label' => __( 'Título del post', 'textdomain' ),
                'section' => 'residenciales-post',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'contenido-aguas-posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido-aguas-posts', array(
                'label' => __( 'Contenido del post', 'textdomain' ),
                'section' => 'residenciales-post',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'imge-aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua2.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imge-aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'residenciales-post',
                'settings'   => 'imge-aguas',
                'priority'   => 3,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'durl-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('durl-aguas', array(
                'label' => __( 'Url del post', 'textdomain' ),
                'section' => 'residenciales-post',
                'priority' => 4,
                'type' => 'text',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        /*$wp_customize->add_section( 'residenciales__post', array(
            'title' => __( 'Tercer post', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 4,
        ));*/
                /** Setting TEXT TITULO POST**********/
            /*$wp_customize->add_setting( 'titulo-aguas__posts', array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo-aguas__posts', array(
                'label' => __( 'Título del post', 'textdomain' ),
                'section' => 'residenciales__post',
                'priority' => 1,
                'type' => 'text',
            ));*/
            /** Setting TEXT-AREA CONTENIDO POST*****/
            /*$wp_customize->add_setting( 'contenido-aguas__posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido-aguas__posts', array(
                'label' => __( 'Contenido del post', 'textdomain' ),
                'section' => 'residenciales__post',
                'priority' => 2,
                'type' => 'textarea',
            ));*/
            /** Setting Imagen para post **/
            /*$wp_customize->add_setting( 'imge__aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua3.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'imge__aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'residenciales__post',
                'settings'   => 'imge__aguas',
                'priority'   => 3,
            )));*/
            /** Setting URL para el post **/
            /*$wp_customize->add_setting( 'durl__aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('durl__aguas', array(
                'label' => __( 'Url del post', 'textdomain' ),
                'section' => 'residenciales__post',
                'priority' => 4,
                'type' => 'text',
            ));*/
    $wp_customize->add_panel( 'SmartBuilding', array(
        'title' => 'Soluciones hoteleras',
        'description' => 'Opciones personalizadas',
        'priority' => 175,
    ));
    /****SECCIÓN PARA SOLUCIONES HOTELERAS - INTERNAS****
    ****************************************************/        
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'hoteleras_agua', array(
            'title' => __( 'Agua caliente', 'textdomain' ),
            'panel' => 'SmartBuilding',
            'priority' => 1,
        ));
            /** Setting TEXT TITULO**********/
            $wp_customize->add_setting( 'htitulo-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('htitulo-aguas', array(
                'label' => __( 'Ingrese título', 'textdomain' ),
                'section' => 'hoteleras_agua',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO*****/
            $wp_customize->add_setting( 'hcontenido-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'hcontenido-aguas', array(
                'label' => __( 'Ingrese descripción', 'textdomain' ),
                'section' => 'hoteleras_agua',
                'priority' => 2,
                'type' => 'textarea',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'hoteleras_post', array(
            'title' => __( 'Primer post', 'textdomain' ),
            'panel' => 'SmartBuilding',
            'priority' => 2,
        ));
            /** Setting TEXT TITULO POST**********/
            $wp_customize->add_setting( 'htitulo-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('htitulo-aguas-post', array(
                'label' => __( 'Ingrese título del post', 'textdomain' ),
                'section' => 'hoteleras_post',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'hcontenido-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'hcontenido-aguas-post', array(
                'label' => __( 'Ingrese contenido del post', 'textdomain' ),
                'section' => 'hoteleras_post',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'himg-aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua1.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'himg-aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'hoteleras_post',
                'settings'   => 'himg-aguas',
                'priority'   => 3,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'hurl-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('hurl-aguas', array(
                'label' => __( 'Url para el post', 'textdomain' ),
                'section' => 'hoteleras_post',
                'priority' => 4,
                'type' => 'text',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        $wp_customize->add_section( 'hoteleras-post', array(
            'title' => __( 'Segundo post', 'textdomain' ),
            'panel' => 'SmartBuilding',
            'priority' => 3,
        ));
                /** Setting TEXT TITULO POST**********/
                $wp_customize->add_setting( 'htitulo-aguas-posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('htitulo-aguas-posts', array(
                'label' => __( 'Título del post', 'textdomain' ),
                'section' => 'hoteleras-post',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'hcontenido-aguas-posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'hcontenido-aguas-posts', array(
                'label' => __( 'Contenido del post', 'textdomain' ),
                'section' => 'hoteleras-post',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'himge-aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua2.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'himge-aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'hoteleras-post',
                'settings'   => 'himge-aguas',
                'priority'   => 3,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'hdurl-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('hdurl-aguas', array(
                'label' => __( 'Url del post', 'textdomain' ),
                'section' => 'hoteleras-post',
                'priority' => 4,
                'type' => 'text',
            ));
        /*INICIO SECCION*
        *****************
        *****************
        ****************/
        /*$wp_customize->add_section( 'hoteleras__post', array(
            'title' => __( 'Tercer post', 'textdomain' ),
            'panel' => 'SmartBuilding',
            'priority' => 4,
        ));
            /** Setting TEXT TITULO POST**********/
            /*$wp_customize->add_setting( 'htitulo-aguas__posts', array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('htitulo-aguas__posts', array(
                'label' => __( 'Título del post', 'textdomain' ),
                'section' => 'hoteleras__post',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            /*$wp_customize->add_setting( 'hcontenido-aguas__posts', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'hcontenido-aguas__posts', array(
                'label' => __( 'Contenido del post', 'textdomain' ),
                'section' => 'hoteleras__post',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            /*$wp_customize->add_setting( 'himge__aguas', array (
                'default'        => get_template_directory_uri() . '/img/Soluciones/agua3.jpg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'himge__aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'hoteleras__post',
                'settings'   => 'himge__aguas',
                'priority'   => 3,
            )));
            /** Setting URL para el post **/
            /*$wp_customize->add_setting( 'hdurl__aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('hdurl__aguas', array(
                'label' => __( 'Url del post', 'textdomain' ),
                'section' => 'hoteleras__post',
                'priority' => 4,
                'type' => 'text',
            ));

    /** Panel OPCIONES SMART BUILDING FOOTER para el personalizador **
    ****************************************************************
    ***************************************************************/
    $wp_customize->add_panel( 'smart building', array(
        'title' => 'Personalizar Footer',
        'description' => 'Opciones personalizadas',
        'priority' => 176,
    ));
        /******* SECCIÓN PARA RED SOCIAL - 1 FOOTER **********/
        $wp_customize->add_section( 'Red social - 1', array(
            'title' => __( 'Red Social - 1', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 2,
        ));
            /** Setting red social - 1 -> Icono FOOTER **/
            $wp_customize->add_setting( 'logored1', array (
                'default'        => get_template_directory_uri() . '/img/linked-in.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'link', array(
                'label'      => __( 'Icono Red social - 1', 'textdomain' ),
                'section'    => 'Red social - 1',
                'settings'   => 'logored1',
                'priority'   => 1,
            )));
            /** Setting red social - 1 -> Url FOOTER **/
            $wp_customize->add_setting( 'urlred1', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('urlred1', array(
                'label' => __( 'Perfil red social - 1', 'textdomain' ),
                'section' => 'Red social - 1',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA FACEBOOK FOOTER **********/
        $wp_customize->add_section( 'Red social - 2', array(
            'title' => __( 'Red Social - 2', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 3,
        ));

            /** Setting Face Icono FOOTER **/
            $wp_customize->add_setting( 'logored2', array (
                'default'        => get_template_directory_uri() . '/img/facebook.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'face', array(
                'label'      => __( 'Icono Red social - 2', 'textdomain' ),
                'section'    => 'Red social - 2',
                'settings'   => 'logored2',
                'priority'   => 1,
            )));
            /** Setting FaceURL FOOTER **/
            $wp_customize->add_setting( 'urlred2', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('urlred2', array(
                'label' => __( 'Perfil Red social - 2', 'textdomain' ),
                'section' => 'Red social - 2',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA RSS FOOTER **********/
        $wp_customize->add_section( 'Red social - 3', array(
            'title' => __( 'Red Social - 3', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 4,
        ));

            /** Setting Rss Icono FOOTER **/
            $wp_customize->add_setting( 'logored3', array (
                'default'        => get_template_directory_uri() . '/img/rss.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'rss', array(
                'label'      => __( 'Icono Red social - 3', 'textdomain' ),
                'section'    => 'Red social - 3',
                'settings'   => 'logored3',
                'priority'   => 1,
            )));
            /** Setting RssURL FOOTER **/
            $wp_customize->add_setting( 'urlred3', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('urlred3', array(
                'label' => __( 'Perfil Red social - 3', 'textdomain' ),
                'section' => 'Red social - 3',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA GOOGLEPLUS FOOTER **********/
        /*$wp_customize->add_section( 'Googleplus', array(
            'title' => __( 'Googleplus', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 5,
        ));

            /** Setting Googleplus Icono FOOTER **/
            /*$wp_customize->add_setting( 'goopluslogo', array (
                'default'        => get_template_directory_uri() . '/img/gplus.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'gooplus', array(
                'label'      => __( 'Icono GooglePlus', 'textdomain' ),
                'section'    => 'Googleplus',
                'settings'   => 'goopluslogo',
                'priority'   => 1,
            )));
            /** Setting GooglePlusURL FOOTER **/
            /*$wp_customize->add_setting( 'gooplusurl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('gooplusurl', array(
                'label' => __( 'Perfil GooglePlus', 'textdomain' ),
                'section' => 'Googleplus',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA PINTEREST FOOTER **********/
        /*$wp_customize->add_section( 'Pinterest', array(
            'title' => __( 'Pinterest', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 6,
        ));

            /** Setting Pinterest Icono FOOTER **/
            /*$wp_customize->add_setting( 'pintlogo', array (
                'default'        => get_template_directory_uri() . '/img/pinterest.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'pint', array(
                'label'      => __( 'Icono Pinterest', 'textdomain' ),
                'section'    => 'Pinterest',
                'settings'   => 'pintlogo',
                'priority'   => 1,
            )));
            /** Setting PinterestURL FOOTER **/
            /*$wp_customize->add_setting( 'pinturl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('pinturl', array(
                'label' => __( 'Perfil Pinterest', 'textdomain' ),
                'section' => 'Pinterest',
                'priority' => 2,
                'type' => 'text',
            ));*/
        /******* SECCIÓN PARA QUIÉNES SOMOS FOOTER **********/
        $wp_customize->add_section( 'Quienes', array(
            'title' => __( '¿Quiénes somos?', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 1,
        ));
            /** Setting ¿Quiénes somos? FOOTER **/
            $wp_customize->add_setting( 'quienes', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('quienes', array(
                'label' => __( 'Coloque el texto', 'textdomain' ),
                'section' => 'Quienes',
                'priority' => 2,
                'type' => 'textarea',
            ));
        /******* SECCIÓN PARA DIRECCIÓN FOOTER **********/
        $wp_customize->add_section( 'Direccion', array(
            'title' => __( 'Dirección', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 7,
        ));
            /** Setting Dirección FOOTER **/
            $wp_customize->add_setting( 'direccion', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('direccion', array(
                'label' => __( 'Indique su dirección', 'textdomain' ),
                'section' => 'Direccion',
                'priority' => 1,
                'type' => 'textarea',
            ));
        /******* SECCIÓN PARA TELÉFONO FOOTER **********/
        $wp_customize->add_section( 'Telefono', array(
            'title' => __( 'Teléfono', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 8,
        ));
            /** Setting Teléfono FOOTER **/
            $wp_customize->add_setting( 'telefono', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('telefono', array(
                'label' => __( 'Indique su telélefono', 'textdomain' ),
                'section' => 'Telefono',
                'priority' => 1,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA CORREO FOOTER **********/
        $wp_customize->add_section( 'Correo', array(
            'title' => __( 'Dirección email', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 9,
        ));
            /** Setting Correo FOOTER **/
            $wp_customize->add_setting( 'correo', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('correo', array(
                'label' => __( 'Indique su email', 'textdomain' ),
                'section' => 'Correo',
                'priority' => 1,
                'type' => 'text',
            ));
     /** Panel OPCIONES SMART BUILDING HEADER para el personalizador **
    ****************************************************************
    ***************************************************************/
    $wp_customize->add_panel( 'smartbuild-ing', array(
        'title' => 'Aplicar SEO en header',
        'description' => 'Opciones personalizadas',
        'priority' => 61,
    ));
        /******* SECCIÓN PARA H1 HEADER **********/
        $wp_customize->add_section( 'h1', array(
            'title' => __( 'Título H1', 'textdomain' ),
            'panel' => 'smartbuild-ing',
            'priority' => 1,
        ));
            /** Setting H1 HEADER **/
            $wp_customize->add_setting( 'h1', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('h1', array(
                'label' => __( 'Indique el texto para el H1', 'textdomain' ),
                'section' => 'h1',
                'priority' => 1,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA ATRIBUTO ALT HEADER **********/
        $wp_customize->add_section( 'alt', array(
            'title' => __( 'Atributo alt', 'textdomain' ),
            'panel' => 'smartbuild-ing',
            'priority' => 2,
        ));
            /** Setting ALT HEADER **/
            $wp_customize->add_setting( 'alt', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('alt', array(
                'label' => __( 'Indique el texto para atributo alt', 'textdomain' ),
                'section' => 'alt',
                'priority' => 1,
                'type' => 'text',
            ));
}


/*Ejecución de acciones o funciones definidas*/
add_action('wp_enqueue_scripts', 'smartbuilding_cssjs'); 				    // CCS
add_action( 'wp_enqueue_scripts', 'smartbuilding_enqueue_scripts' );		// Scripts Javas	
add_action('after_setup_theme', 'smartbuilding_setup');					    // Colocar título, logo de la página e imagen destacada desde wordpress
add_action('after_setup_theme', 'smartbuilding_register_menu');			    // Menú
add_action( 'customize_register', 'custom_smartbuilding_register' );		// Personalizador
add_action( 'excerpt_length' , 'custom_excerpt_length', 999 );	            // Extracto
add_action( 'add_meta_boxes', 'descrip' );                                  //Metaboxes para POST
add_action('save_post', 'guardar_descripcion');
add_action('publish_post', 'guardar_descripcion');
add_action('save_post', 'guardar_icono');
add_action('publish_post', 'guardar_icono');

add_action( 'add_meta_boxes', 'subtitulo' );                    //Metaboxes para PAGE
add_action( 'save_post', 'guardar_subtitulo' );                 //guardar subtitulo metabox en PAGE
add_action( 'publish_post', 'guardar_subtitulo' );              //Publicar subtitulo metabox en PAGE
add_action('save_post', 'guardar_sub_titulo');                  //guardar sub_titulo metabox en PAGE
add_action('publish_post', 'guardar_sub_titulo');               //Publicar sub_titulo metabox en PAGE