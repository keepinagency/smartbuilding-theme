<?php
/* Libreria bootstrap para Nav - Menu */
require_once('class-wp-bootstrap-navwalker.php');

/*** Área para SetUp GENERAL de la página según ajustes de WordPress: Título, etc. ***/
function keepin_wp_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
}


/*** Carga de Archivos CSS y Js para el site ***/
function keepin_enqueue_styles() {

    /*** Archivos CSS Bootstrap ***/
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
	wp_enqueue_style( 'keepin-style', get_stylesheet_uri(), $dependencies ); 

}
            
function keepin_enqueue_scripts() {

    /*** Archivos JS BootStrap y sus dependencias ***/
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );

}

/*** Registro de áreas para menús de WP ***/
function keepin_register_menu() {

    register_nav_menu( 'header-menu', __('Header Menu'));
    register_nav_menu( 'footer-menu', __('Footer Menu'));

}

/*** Registro de areas 'Widgetizables' ***/
function keepin_widgets_init() {
    
    /*** Area en Footer widgetizable ***/
    register_sidebar( array(
        'name'          => 'Footer - Copyright Text',
        'id'            => 'footer_copyright_text',
        'before_widget' => '<div class="footer_copyright_text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    /*** Area en SideBar widgetizable 1 ***/
    register_sidebar( array(
        'name'          => 'Sidebar - Inset',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-module sidebar-module-inset">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    /*** Area en SideBar widgetizable 2 ***/
    register_sidebar( array(
        'name'          => 'Sidebar - Default',
        'id'            => 'sidebar-2',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
 
}

/*** Añadir acciones en base a las funciones definidas ***/ 
add_action( 'wp_enqueue_scripts', 'keepin_enqueue_styles' );    // Css
add_action( 'wp_enqueue_scripts', 'keepin_enqueue_scripts' );   // Scripts Javas
add_action( 'after_setup_theme', 'keepin_wp_setup' );           // Colocar título de la página desde desde wordpress
add_action( 'after_setup_theme', 'keepin_register_menu' );      // Menús
add_action( 'widgets_init', 'keepin_widgets_init' );            // Registro de areas "Widgetizables"
?>