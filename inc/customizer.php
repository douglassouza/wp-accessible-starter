<?php
/**
 * WP Accessible Starter Theme Customizer
 *
 * @package WP_Bootstrap_Starter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function wp_accessible_starter_customize_register( $wp_customize ) {

    //Style Preset
    $wp_customize->add_section(
        'typography',
        array(
            'title' => __( 'Preset Styles', 'wp-accessible-starter' ),
            //'description' => __( 'This is a section for the typography', 'wp-accessible-starter' ),
            'priority' => 20,
        )
    );

    //Theme Option
    $wp_customize->add_setting( 'preset_style_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
        'label' => __( 'Typography', 'wp-accessible-starter' ),
        'section'    => 'typography',
        'settings'   => 'preset_style_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'arbutusslab-opensans' => 'Arbutus Slab / Opensans',
            'montserrat-merriweather' => 'Montserrat / Merriweather',
            'montserrat-opensans' => 'Montserrat / Opensans',
            'oswald-muli' => 'Oswald / Muli',
            'opensans-opensans' => 'Opensans / Opensans',
            'poppins-lora' => 'Poppins / Lora',
            'poppins-poppins' => 'Poppins / Poppins',
            'roboto-roboto' => 'Roboto / Roboto',
            'robotoslab-roboto' => 'Roboto Slab / Roboto',
        )
    ) ) );

    $wp_customize->add_setting(
        'navbar_bg_color_setting',
        array(
            'default'     => '#563d7c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'navbar_bg_color',
            array(
                'label'      => __( 'Navigation Background Color', 'wp-accessible-starter' ),
                'section'    => 'typography',
                'settings'   => 'navbar_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting(
        'navbar_text_color_setting',
        array(
            'default'     => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'navbar_text_color',
            array(
                'label'      => __( 'Navigation Text Color', 'wp-accessible-starter' ),
                'section'    => 'typography',
                'settings'   => 'navbar_text_color_setting',
            ) )
    );

    $wp_customize->add_setting(
        'footer_bg_color_setting',
        array(
            'default'     => '#f7f7f7',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label'      => __( 'Footer Background Color', 'wp-accessible-starter' ),
                'section'    => 'typography',
                'settings'   => 'footer_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting(
        'footer_text_color_setting',
        array(
            'default'     => '#99979c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'      => __( 'Footer Text Color', 'wp-accessible-starter' ),
                'section'    => 'typography',
                'settings'   => 'footer_text_color_setting',
            ) )
    );

    $wp_customize->add_setting( 'navigation_full_width', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'navigation_full_width', array(
        'settings' => 'navigation_full_width',
        'label'    => __('Enable navigation full-width', 'wp-accessible-starter'),
        'section'    => 'typography',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'sidebar_page_disable', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'sidebar_page_disable', array(
        'settings' => 'sidebar_page_disable',
        'label'    => __('Disable sidebar at page', 'wp-accessible-starter'),
        'section'    => 'typography',
        'type'     => 'checkbox',
    ) ) );


    /*Banner*/
    $wp_customize->add_section(
        'header_image',
        array(
            'title' => __( 'Header Banner', 'wp-accessible-starter' ),
            'priority' => 30,
            'description' => __( 'To enable the carousel add 2 images or more:', 'wp-accessible-starter' ),
        )
    );


    $wp_customize->add_control(
        'header_img',
        array(
            'label' => __( 'Header Image', 'wp-accessible-starter' ),
            'section' => 'header_images',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'header_bg_color_setting',
        array(
            'default'     => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'      => __( 'Header Banner Background Color', 'wp-accessible-starter' ),
                'section'    => 'header_image',
                'settings'   => 'header_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting( 'header_banner_title_setting', array(
        'default' => __( 'WP Bootstrap Framework', 'wp-accessible-starter' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __( 'Banner Title', 'wp-accessible-starter' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_title_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_banner_tagline_setting', array(
        'default' => __( 'To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize','wp-accessible-starter' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_tagline_setting', array(
        'label' => __( 'Banner Tagline', 'wp-accessible-starter' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_tagline_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'header_banner_visibility', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_visibility', array(
        'settings' => 'header_banner_visibility',
        'label'    => __('Remove Header Banner', 'wp-accessible-starter'),
        'section'    => 'header_image',
        'type'     => 'checkbox',
    ) ) );

    //Accessibility
   $wp_customize->add_section(
        'accessibility',
        array(
            'title' => __( 'Accessibility', 'wp-accessible-starter' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wp-accessible-starter' ),
            'priority' => 110,
        )
    );

    $wp_customize->add_setting( 'navbar_acessibility', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'navbar_acessibility', array(
        'settings' => 'navbar_acessibility',
        'label'    => __('Enable accessible navigation bar', 'wp-accessible-starter'),
        'section'    => 'accessibility',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'vlibras', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'vlibras', array(
        'settings' => 'vlibras',
        'label'    => __('Enable VLibras', 'wp-accessible-starter'),
        'section'    => 'accessibility',
        'type'     => 'checkbox',
    ) ) );


    //Site Name Text Color
   $wp_customize->add_section(
        'site_name_text_color',
        array(
            'title' => __( 'Other Customizations', 'wp-accessible-starter' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wp-accessible-starter' ),
            'priority' => 40,
        )
    );
    $wp_customize->add_section(
        'colors',
        array(
            'title' => __( 'Background Color', 'wp-accessible-starter' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wp-accessible-starter' ),
            'priority' => 50,
            'panel' => 'styling_option_panel',
        )
    );
    $wp_customize->add_section(
        'background_image',
        array(
            'title' => __( 'Background Image', 'wp-accessible-starter' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wp-accessible-starter' ),
            'priority' => 60,
            'panel' => 'styling_option_panel',
        )
    );

    // Bootstrap and Fontawesome Option
    $wp_customize->add_setting( 'cdn_assets_setting', array(
        'default' => __( 'no','wp-accessible-starter' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 
        'cdn_assets',
        array(
            'label' => __( 'Use CDN for Assets', 'wp-accessible-starter' ),
            'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'wp-accessible-starter' ),
            'section' => 'site_name_text_color',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'wp-accessible-starter' ),
	            'no' => __( 'No', 'wp-accessible-starter' ),
        	)
        )
    );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_control( 'header_textcolor'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_image'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_color'  )->section = 'site_name_text_color';

    // Add control for logo uploader
    $wp_customize->add_setting( 'wp_accessible_starter_logo', array(
        //'default' => __( '', 'wp-accessible-starter' ),
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_accessible_starter_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'wp-accessible-starter' ),
        'section'  => 'title_tagline',
        'settings' => 'wp_accessible_starter_logo',
    ) ) );

}
add_action( 'customize_register', 'wp_accessible_starter_customize_register' );

add_action( 'wp_head', 'wp_accessible_starter_customizer_css');
function wp_accessible_starter_customizer_css()

{
    $header_bg_color = get_theme_mod('header_bg_color_setting', '#fff');
    $navbar_bg_color = get_theme_mod('navbar_bg_color_setting', '#563d7c');
    $navbar_text_color = get_theme_mod('navbar_text_color_setting', '#fff');
    $footer_bg_color = get_theme_mod('footer_bg_color_setting', '#f7f7f7');
    $footer_text_color = get_theme_mod('footer_text_color_setting', '#99979c');

    ?>
    <style type="text/css">
        #page-sub-header {
            background-color: <?php echo esc_attr( $header_bg_color ); ?>; 
        }

        footer#colophon,
        #nav-accessibility { 
            background-color: <?php echo esc_attr( $footer_bg_color ); ?>;
            color: <?php echo esc_attr( $footer_text_color ); ?>; 
        }

        header#masthead { 
            background-color: <?php echo esc_attr( $navbar_bg_color ); ?>;
            color: <?php echo esc_attr( $navbar_text_color ); ?>;
            border-bottom: 2px solid <?php echo esc_attr( $footer_bg_color ); ?>;
        }
    </style>
    <?php
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_accessible_starter_customize_preview_js() {
    wp_enqueue_script( 'wp_accessible_starter_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_accessible_starter_customize_preview_js' );
