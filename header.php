<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="p-0 m-0">
<div class="container-fluid p-0 m-0 h-100">
    <div class="header p-0 m-0 row">
        <nav class="navbar navbar-light col-12">
            <div class="col-10 ps-5 col-lg-4 d-lg-flex justify-content-lg-around">
                <a class="navbar-brand m-0 p-0"  href="<?php echo get_home_url(); ?>">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                        echo '<img class="imglogo" src="' . esc_url( $custom_logo_url ) . '" alt="Logo ">';
                    ?>
                </a>
            </div>

            <div class="col-2 d-flex justify-content-center d-lg-none">
                <button class="navbar-toggler d-md-block d-lg-none p-2"  type="button"
                        data-toggle="collapse" 
                        data-target="#menukeepin" 
                        aria-controls="menukeepin" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>
            
            <!--Area menu   area-menu   -->
            <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-around navbar-expand-lg navbar-light m-0 p-0">         
                <?php
                    wp_nav_menu( array(
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse d-lg-block 
                                              h-100 navbar-expand-lg navbar-light',
                        'container_id'    => 'menukeepin',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav mt-0 mt-lg-0 align-content-center">%3$s</ul>',
                        'theme_location'  => 'header-menu',
                        'menu_class'      => 'header-menu',
                        'walker'          => new WP_Bootstrap_Navwalker())
                    );
                ?>
            </div>
        </nav>
    </div><!-- header -->
