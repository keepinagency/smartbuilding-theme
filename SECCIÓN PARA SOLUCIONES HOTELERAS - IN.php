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
     