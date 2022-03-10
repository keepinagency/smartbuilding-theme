<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script src="https://kit.fontawesome.com/485d462403.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="p-0 m-0">
<div class="container-fluid p-0 m-0 h-100">
    <div class="header p-0 m-0 row">

        <nav class="navbar navbar-expand-lg navbar-light col-12 p-0 m-0">

            <div class="container-fluid p-0 m-0 pb-2">
                
                <a class="navbar-brand p-2 ps-lg-5 p-0 m-0 py-lg-2 col-8 col-lg-5"  
                    href="<?php echo get_home_url(); ?>">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                    ?>
                    <img class=""
                            src="<?=esc_url( $custom_logo_url )?>" 
                            alt="Logo ">
                </a>

                <button class="navbar-toggler h-100 me-3" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#menusmartbuilding" 
                        aria-controls="menusmartbuilding" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!--Area menu   area-menu   -->
                <?php
                    /*
                        d-lg-block 
                    */
                    wp_nav_menu( array(
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse p-0 m-0 pt-2 d-lg-block ',
                        'container_id'    => 'menusmartbuilding',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav w-100 
                                                                mt-0 mt-lg-0 pe-lg-5
                                                                d-lg-flex justify-content-end
                                                                align-content-center">%3$s</ul>',
                        'theme_location'  => 'header-menu',
                        'menu_class'      => 'header-menu',
                        'walker'          => new WP_Bootstrap_Navwalker())
                    );
                ?>
            </div>
        </nav>
    </div><!-- header -->
