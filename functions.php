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
	return 25;
}

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

	/** Panel OPCIONES SMARTBUILDING PAGE para el personalizador **
    ***************************************************************
    ***************************************************************/
    $wp_customize->add_panel( 'smartbuilding', array(
        'title' => 'Personalizar Agua caliente',
        'description' => 'Opciones personalizadas',
        'priority' => 1,
    ));
        /*SECCIÓN PARA SOLUCIONES RESIDENCIALES - INTERNAS**
        ******************************************/
        $wp_customize->add_section( 'residenciales', array(
            'title' => __( 'Soluciones residenciales', 'textdomain' ),
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
                'section' => 'residenciales',
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
                'section' => 'residenciales',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting TEXT TITULO POST**********/
            $wp_customize->add_setting( 'titulo-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo-aguas-post', array(
                'label' => __( 'Ingrese título del post', 'textdomain' ),
                'section' => 'residenciales',
                'priority' => 3,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'contenido-aguas-post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido-aguas-post', array(
                'label' => __( 'Ingrese contenido del post', 'textdomain' ),
                'section' => 'residenciales',
                'priority' => 4,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'img-aguas', array (
                'default'        => get_template_directory_uri() . '/img/linked-in.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'img-aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'residenciales',
                'settings'   => 'img-aguas',
                'priority'   => 5,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'url-aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('url-aguas', array(
                'label' => __( 'Url para el post', 'textdomain' ),
                'section' => 'residenciales',
                'priority' => 6,
                'type' => 'text',
            ));
        /*SECCIÓN PARA SOLUCIONES HOTELERAS - INTERNAS**
        ******************************************/
        $wp_customize->add_section( 'hoteleras', array(
            'title' => __( 'Soluciones hoteleras', 'textdomain' ),
            'panel' => 'smartbuilding',
            'priority' => 1,
        ));
            /** Setting TEXT **********/
            $wp_customize->add_setting( 'titulo_aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo_aguas', array(
                'label' => __( 'Ingrese título', 'textdomain' ),
                'section' => 'hoteleras',
                'priority' => 1,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA *****/
            $wp_customize->add_setting( 'contenido_aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido_aguas', array(
                'label' => __( 'Ingrese descripción', 'textdomain' ),
                'section' => 'hoteleras',
                'priority' => 2,
                'type' => 'textarea',
            ));
            /** Setting TEXT TITULO POST**********/
            $wp_customize->add_setting( 'titulo_aguas_post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('titulo_aguas_post', array(
                'label' => __( 'Ingrese título del post', 'textdomain' ),
                'section' => 'hoteleras',
                'priority' => 3,
                'type' => 'text',
            ));
            /** Setting TEXT-AREA CONTENIDO POST*****/
            $wp_customize->add_setting( 'contenido_aguas_post', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control( 'contenido_aguas_post', array(
                'label' => __( 'Ingrese contenido del post', 'textdomain' ),
                'section' => 'hoteleras',
                'priority' => 4,
                'type' => 'textarea',
            ));
            /** Setting Imagen para post **/
            $wp_customize->add_setting( 'img_aguas', array (
                'default'        => get_template_directory_uri() . '/img/linked-in.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'img_aguas', array(
                'label'      => __( 'Imagen para el post', 'textdomain' ),
                'section'    => 'hoteleras',
                'settings'   => 'img_aguas',
                'priority'   => 5,
            )));
            /** Setting URL para el post **/
            $wp_customize->add_setting( 'url_aguas', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('url_aguas', array(
                'label' => __( 'Url para el post', 'textdomain' ),
                'section' => 'hoteleras',
                'priority' => 6,
                'type' => 'text',
            ));
     

    /** Panel OPCIONES SMART BUILDING FOOTER para el personalizador **
    ****************************************************************
    ***************************************************************/
    $wp_customize->add_panel( 'smart building', array(
        'title' => 'Personalizar Footer',
        'description' => 'Opciones personalizadas',
        'priority' => 2,
    ));
        /******* SECCIÓN PARA LINKEDIND FOOTER **********/
        $wp_customize->add_section( 'LinkedIn', array(
            'title' => __( 'LinkedIn', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 5,
        ));
            /** Setting Link Icono FOOTER **/
            $wp_customize->add_setting( 'linkelogo', array (
                'default'        => get_template_directory_uri() . '/img/linked-in.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'link', array(
                'label'      => __( 'Icono LinkedIn', 'textdomain' ),
                'section'    => 'LinkedIn',
                'settings'   => 'linkelogo',
                'priority'   => 1,
            )));
            /** Setting linkelogoURL FOOTER **/
            $wp_customize->add_setting( 'linkurl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('linkurl', array(
                'label' => __( 'Perfil LinkedIn', 'textdomain' ),
                'section' => 'LinkedIn',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA FACEBOOK FOOTER **********/
        $wp_customize->add_section( 'Facebook', array(
            'title' => __( 'Facebook', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 3,
        ));

            /** Setting Face Icono FOOTER **/
            $wp_customize->add_setting( 'facelogo', array (
                'default'        => get_template_directory_uri() . '/img/facebook.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'face', array(
                'label'      => __( 'Icono Facebook', 'textdomain' ),
                'section'    => 'Facebook',
                'settings'   => 'facelogo',
                'priority'   => 1,
            )));
            /** Setting FaceURL FOOTER **/
            $wp_customize->add_setting( 'faceaurl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('faceaurl', array(
                'label' => __( 'Perfil Facebook', 'textdomain' ),
                'section' => 'Facebook',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA RSS FOOTER **********/
        $wp_customize->add_section( 'Rss', array(
            'title' => __( 'Rss', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 2,
        ));

            /** Setting Rss Icono FOOTER **/
            $wp_customize->add_setting( 'rsslogo', array (
                'default'        => get_template_directory_uri() . '/img/rss.jpeg',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            ));
            $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'rss', array(
                'label'      => __( 'Icono Rss', 'textdomain' ),
                'section'    => 'Rss',
                'settings'   => 'rsslogo',
                'priority'   => 1,
            )));
            /** Setting RssURL FOOTER **/
            $wp_customize->add_setting( 'rssurl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('rssurl', array(
                'label' => __( 'Perfil Rss', 'textdomain' ),
                'section' => 'Rss',
                'priority' => 2,
                'type' => 'text',
            ));
        /******* SECCIÓN PARA GOOGLEPLUS FOOTER **********/
        $wp_customize->add_section( 'Googleplus', array(
            'title' => __( 'Googleplus', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 4,
        ));

            /** Setting Googleplus Icono FOOTER **/
            $wp_customize->add_setting( 'goopluslogo', array (
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
            $wp_customize->add_setting( 'gooplusurl', array(
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
        $wp_customize->add_section( 'Pinterest', array(
            'title' => __( 'Pinterest', 'textdomain' ),
            'panel' => 'smart building',
            'priority' => 6,
        ));

            /** Setting Pinterest Icono FOOTER **/
            $wp_customize->add_setting( 'pintlogo', array (
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
            $wp_customize->add_setting( 'pinturl', array(
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control('pinturl', array(
                'label' => __( 'Perfil Pinterest', 'textdomain' ),
                'section' => 'Pinterest',
                'priority' => 2,
                'type' => 'text',
            ));
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
            'priority' => 7,
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
            'priority' => 7,
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