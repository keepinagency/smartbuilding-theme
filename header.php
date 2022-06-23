<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/485d462403.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WXDVPSDKHY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
	gtag('config', 'G-WXDVPSDKHY');
</script>
</head>

<body
 <?php body_class(); ?> class="p-0 m-0">
 
 <script type="text/javascript" src="https://clientify.net/web-marketing/webforms/script/72198.js"></script>
<div class="container-fluid p-0 m-0 h-100">
    <div class="header p-0 m-0 row">

        <nav class="navbar navbar-expand-lg navbar-light col-12 p-0 m-0 ">

            <div class="container-fluid p-0 m-0 my-3">
                
                <!--a class="p-0 mt-lg-2 ms-lg-3 pe-1 ps-lg-2 pe-lg-3 border-end d-none d-sm-block d-sm-none d-md-block"
                    href="https://build-review.com/issues/construction-and-engineering-awards-2021/72/" 
                    target="_blank">

                    <img class="img-award p-0 m-0"
                            src="<?= smartbuilding_IMG. '2021-Construction-Engineering-Awards-SmartBuilding100.png'?>"/>
                </a-->
                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                 ?>
                    <a class="navbar-brand p-0 m-0 col-lg-6 py-lg-0 ps-lg-5" href="<?php echo get_home_url(); ?>">
                        <img class="logo m-0 p-0 ms-lg-2 my-2 ps-1" 
                            src="<?=esc_url( $custom_logo_url )?>" 
                            alt="SmartBuilding.cl - Eficiencia energética y construcción sustentable"
                            title="SmartBuilding.cl - Eficiencia energética y construcción sustentable"
                        >
                    </a>
                <button class="navbar-toggler h-100 me-1" type="button" 
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
                        'container_class' => 'collapse navbar-collapse p-0 m-0 pt-3 d-lg-block col-6',
                        'container_id'    => 'menusmartbuilding',
                        'depth' => 2,
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
