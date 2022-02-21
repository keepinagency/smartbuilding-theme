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
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', $dependencies, '', true );
    wp_enqueue_script('smartbuildingjs', get_template_directory_uri() . '/js/smartbuilding.js', '', '', true );

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
        'title' => __( 'Opciones a personalizar', 'textdomain' ),
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
	/** Setting BTN-TXT *********/
    $wp_customize->add_setting( 'txt-btn', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('txt-btn', array(
        'label' => __( 'Texto Botom Home', 'textdomain' ),
        'section' => 'titulohome',
        'priority' => 1,
        'type' => 'text',
    ));
}

/*Ejecución de acciones o funciones definidas*/
add_action('wp_enqueue_scripts', 'smartbuilding_cssjs'); 				// CCS
add_action( 'wp_enqueue_scripts', 'smartbuilding_enqueue_scripts' );		// Scripts Javas	
add_action('after_setup_theme', 'smartbuilding_setup');					// Colocar título, logo de la página e imagen destacada desde wordpress
add_action('after_setup_theme', 'smartbuilding_register_menu');			// Menú
add_action( 'customize_register', 'custom_smartbuilding_register' );		// Personalizador

add_action( 'excerpt_length' , 'custom_excerpt_length', 999 );	// Extracto