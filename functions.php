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
		'width'       => 400,
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
    //wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', $dependencies, '', true );
    //wp_enqueue_script('smartbuildingjs', get_template_directory_uri() . '/js/smartbuilding.js', '', '', true );

}

/*Registro Menú Header and Footer*/
function smartbuilding_register_menu() {
	register_nav_menu( 'header-menu', __('Header Menu'));
    register_nav_menu( 'footer-menu', __('Footer Menu'));
    /*register_nav_menu( 'softfree-menu', __('Soft Free'));*/
}
/****************FUNCION PARA EXTRACTO***********************/
function custom_excerpt_length( $length){
	return 40;
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
	add_meta_box( 'descrip','Indique la Descripción a ser usado para esta página.','la_descripcion','post','normal','high' );  
}
function la_descripcion() {
    global $wpdb, $post;
    $descrip  = get_post_meta($post->ID, 'descripcion', true);
    echo '<label"><strong>Descripci&oacute;n:</strong></label>
    <textarea type="text" name="descripcion" id="descripcion" value="'.htmlspecialchars($descrip).' "rows="5" cols="50"   /></textarea></br>';
}
function guardar_descripcion() {
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    $price= $_POST['descripcion'];
    update_post_meta($post_id, 'descripcion', $price);
}

function subtitulo() { 
	add_meta_box( 'subtitulo','Indique el Subtitulo a ser usado para esta página.','el_subtitulo','page','normal','high' );  
}
function el_subtitulo() {
    global $wpdb, $post;
    $subfirst  = get_post_meta($post->ID, 'subtitulo', true);
    $subsecond = get_post_meta($post->ID, 'sub_titulo', true);

    echo '<label"><strong>Titulo:</strong></label>
    <input type="text" name="subtitulo" id="subtitulo" value="'.htmlspecialchars($subfirst).'" style="width: 300px;" /></br>';
    echo '<label"><strong>Sub Titulo:</strong></label>
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

/***** FUNCIONES CUSTOM PARA EL PERSONZALIDOR *******
*****************************************************/
function custom_smartbuilding_register( $wp_customize ) {

	/** Panel OPCIONES SMARTBUILDING HOME para el personalizador **/
    $wp_customize->add_panel( 'smartbuilding', array(
        'title' => 'Personalizador',
        'description' => 'Opciones personalizadas',
        'priority' => 1,
    ));
        /******* SECCIÓN PARA TÍTULO HOME *********
        ******************************************/
        $wp_customize->add_section( 'titulohome', array(
            'title' => __( 'Personalizar Footer', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 1,
        ));
            /** Setting TÍTULO *********
            ***    HOME       ********/
            $wp_customize->add_setting( 'home-título', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'home-título', array(
                'label' => __( 'Ingrese título para el Home', 'textdomain' ),
                'section' => 'titulohome',
                'priority' => 1,
                'type' => 'textarea',
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

add_action( 'add_meta_boxes', 'subtitulo' );                    //Metaboxes para PAGE
add_action( 'save_post', 'guardar_subtitulo' );                 //guardar subtitulo metabox en PAGE
add_action( 'publish_post', 'guardar_subtitulo' );              //Publicar subtitulo metabox en PAGE
add_action('save_post', 'guardar_sub_titulo');                  //guardar sub_titulo metabox en PAGE
add_action('publish_post', 'guardar_sub_titulo');               //Publicar sub_titulo metabox en PAGE