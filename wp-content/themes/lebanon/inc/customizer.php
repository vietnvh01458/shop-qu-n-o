<?php

/**
 * Lebanon Theme Customizer.
 *
 * @package Lebanon
 */

/**
 * Add refresh support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lebanon_customize_register( $wp_customize ) {

    // *********************************************
    // ****************** General ******************
    // *********************************************
    
    $wp_customize->add_panel( 'logo', array (
        'title' => __( 'Header bar', 'lebanon' ),
        'description' => __( 'set the logo image, site title, description and site icon favicon', 'lebanon' ),
        'priority' => 10
    ) );
    
    $wp_customize->add_panel( 'general', array (
        'title' => __( 'General', 'lebanon' ),
        'description' => __( 'General settings for your site, such as title, favicon and more', 'lebanon' ),
        'priority' => 10
    ) );

    
    // *********************************************
    // ****************** Homepage *****************
    // *********************************************
    $wp_customize->add_panel( 'homepage', array (
        'title'                 => __( 'Frontpage', 'lebanon' ),
        'description'           => __( 'Customize the appearance of your homepage', 'lebanon' ),
        'priority'              => 10
    ) );

    $wp_customize->add_section( 'homepage_jumbotron', array (
        'title'                 => __( 'Featured Post/Page/Product', 'lebanon' ),
        'panel'                 => 'homepage',
    ) );
    
            $wp_customize->add_setting( 'lebanon_the_featured_post', array (
                'default'               => 1,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'lebanon_sanitize_post',
            ) );
            $wp_customize->add_control( 'lebanon_the_featured_post', array(
                'type'                  => 'select',
                'section'               => 'homepage_jumbotron',
                'label'                 => __( 'Select the Featured Post', 'lebanon' ),
                'choices'               => lebanon_all_posts_array(),
            ) );
    
            $wp_customize->add_setting( 'lebanon_the_featured_post_button', array (
                'default'               => __( 'Read More', 'lebanon' ),
                'transport'             => 'refresh',
                'sanitize_callback'     => 'lebanon_sanitize_text',
            ) );
            $wp_customize->add_control( 'lebanon_the_featured_post_button', array(
                'type'                  => 'text',
                'section'               => 'homepage_jumbotron',
                'label'                 => __( 'Button Text', 'lebanon' ),
            ) );
            
    

    $wp_customize->add_section( 'homepage_topa', array (
        'title'                 => __( 'Top A - Featured Page/Post/Product', 'lebanon' ),
        'panel'                 => 'homepage',
    ) );
    
            $wp_customize->add_setting( 'lebanon_the_featured_post2', array (
                'default'               => 1,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'lebanon_sanitize_post',
            ) );
            $wp_customize->add_control( 'lebanon_the_featured_post2', array(
                'type'                  => 'select',
                'section'               => 'homepage_topa',
                'label'                 => __( 'Select the Featured Post', 'lebanon' ),
                'choices'               => lebanon_all_posts_array(),
            ) );

    

    $wp_customize->add_section( 'homepage_widget', array (
        'title'                 => __( 'Top B - Homepage Widget', 'lebanon' ),
        'panel'                 => 'homepage',
    ) );
    

        $wp_customize->add_setting( 'homepage_widget_bool', array (
            'default'               => 'on',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'lebanon_radio_sanitize_onoff'
        ) );

       $wp_customize->add_control( 'homepage_widget_bool', array(
            'label'   => __( 'Enable Homepage Top B Widget', 'lebanon' ),
            'section' => 'homepage_widget',
            'type'    => 'radio',
            'choices'    => array(
                'on'    => __( 'Show', 'lebanon' ),
                'off'    => __( 'Hide', 'lebanon' )
            )
        ));
    
        $wp_customize->add_setting( 'homepage_widget_background', array (
            'default'               => get_template_directory_uri() . '/inc/images/widget.jpg',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control5', array (
            'label' =>              __( 'Widget Background', 'lebanon' ),
            'section'               => 'homepage_widget',
            'mime_type'             => 'image',
            'settings'              => 'homepage_widget_background',
            'description'           => __( 'Select the image file that you would like to use as the background image', 'lebanon' ),        
        ) ) );
    
    

    $wp_customize->add_section( 'homepage_overlay', array (
        'title'                 => __( 'Frontpage Overlay', 'lebanon' ),
        'panel'                 => 'homepage',
    ) );

    $wp_customize->add_section( 'static_front_page', array (
        'title' => __( 'Static Front Page', 'lebanon' ),
        'panel' => 'homepage',
    ) );
    
    $wp_customize->add_section( 'title_tagline', array (
        'title' => __( 'Logo, Title, Tagline & Favicon', 'lebanon' ),
        'panel' => 'logo',
    ) );
    
    $wp_customize->add_setting( 'overlay_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_radio_sanitize_onoff'
    ) );
    
   $wp_customize->add_control( 'overlay_bool', array(
        'label'   => __( 'Enable Homepage Overlay Widget', 'lebanon' ),
        'section' => 'homepage_overlay',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'lebanon' ),
            'off'    => __( 'Hide', 'lebanon' )
        )
    ));

    $wp_customize->add_setting( 'overlay_icon', array (
        'default'               => 'fa fa-question-circle',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_icon'
    ) );
    
   $wp_customize->add_control( 'overlay_icon', array(
        'label'   => __( 'Overlay Trigger Icon', 'lebanon' ),
        'section' => 'homepage_overlay',
        'type'    => 'select',
        'choices'    => lebanon_icons()
    ));
    
    $wp_customize->add_setting( 'homepage_widget_color', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'
    ) );
    
    $wp_customize->add_control( 
            new WP_Customize_Color_Control( 
            $wp_customize, 
            'homepage_widget_color', 
            array(
                    'label'      => __( 'Overlay Trigger Color', 'lebanon' ),
                    'section'    => 'homepage_overlay',
                    'settings'   => 'homepage_widget_color',
            ) ) 
    );
   
    // *********************************************
    // ****************** Apperance *****************
    // *********************************************
    $wp_customize->add_panel( 'appearance', array (
        'title'                 => __( 'Appearance', 'lebanon' ),
        'description'           => __( 'Customize your site colros, fonts and other appearance settings', 'lebanon' ),
        'priority'              => 10
    ) );
    

    
    $wp_customize->add_section( 'color', array (
        'title'                 => __( 'Skin Color', 'lebanon' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'lebanon' ),
        'panel'                 => 'appearance',
    ) );

    // Logo Bool
    $wp_customize->add_setting( 'logo_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_radio_sanitize_onoff'
    ) );

    $wp_customize->add_control( 'logo_bool', array(
        'type'                  => 'radio',
        'section'               => 'logo',
        'label'                 => __( 'Display Logo', 'lebanon' ),
        'description'           => __( 'If you do not use a logo, the site title will be displayed', 'lebanon' ),  
        'choices'               => array(
            'on'              => __( 'Yes', 'lebanon'),
            'off'             => __( 'No', 'lebanon'),
        )
    ) );
    
    // Logo Image
    $wp_customize->add_setting( 'logo', array (
        'default'               => get_template_directory_uri() . '/inc/images/logo.png',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'lebanon' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'logo',
        'description'           => __( 'Image for your site', 'lebanon' ),        
    ) ) );
    
    $wp_customize->add_setting( 'theme_color', array (
        'default'               => 'pink',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_theme_color'
    ) );
    
    $wp_customize->add_control( 'theme_color', array(
        'type'                  => 'radio',
        'section'               => 'color',
        'label'                 => __( 'Theme Skin Color', 'lebanon' ),
        'description'           => __( 'Select the theme main color', 'lebanon' ),
        'choices'               => lebanon_theme_colors()
        
    ) );
    
    $wp_customize->add_setting( 'header_font', array (
        'default'               => 'Montserrat, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_font'
    ) );
    
    $wp_customize->add_control( 'header_font', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Headers Font', 'lebanon' ),
        'description'           => __( 'Applies to the slider header, callouts headers, post page & widget titles etc..', 'lebanon' ),
        'choices'               => lebanon_fonts()
        
    ) );
    
    $wp_customize->add_setting( 'theme_font', array (
        'default'               => 'Lato, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_font'
    ) );
    
    $wp_customize->add_control( 'theme_font', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'General font for the site body', 'lebanon' ),
        'choices'               => lebanon_fonts()
        
    ) );
    
    
    $wp_customize->add_setting( 'menu_font_size', array (
        'default'               => '14px',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_font_size'
    ) );
    
    $wp_customize->add_control( 'menu_font_size', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Menu Font Size', 'lebanon' ),
        'choices'               => lebanon_font_sizes()
        
    ) );
    
    $wp_customize->add_setting( 'theme_font_size', array (
        'default'               => '14px',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_font_size'
    ) );
    
    $wp_customize->add_control( 'theme_font_size', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Content Font Size', 'lebanon' ),
        'choices'               => lebanon_font_sizes()
        
    ) );
    
    
    // *********************************************
    // ****************** Footer *****************
    // *********************************************
    $wp_customize->add_panel( 'footer', array (
        'title'                 => __( 'Footer', 'lebanon' ),
        'description'           => __( 'Customize the site footer', 'lebanon' ),
        'priority'              => 10
    ) );
    
    $wp_customize->add_section( 'footer_background', array (
        'title'                 => __( 'Footer Background', 'lebanon' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'footer_background_image', array (
        'default'               => get_template_directory_uri() . '/inc/images/footer.jpg',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control3', array (
        'label' =>              __( 'Footer Background Image ( Parallax )', 'lebanon' ),
        'section'               => 'footer_background',
        'mime_type'             => 'image',
        'settings'              => 'footer_background_image',
        'description'           => __( 'Select the image file that you would like to use as the footer background', 'lebanon' ),        
    ) ) );
    
    $wp_customize->add_section( 'footer_text', array (
        'title'                 => __( 'Copyright Text', 'lebanon' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'copyright_text', array (
        'default'               => __( 'Copyright Company Name', 'lebanon' ) . date( 'Y' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'lebanon_sanitize_text'
    ) );
    
    $wp_customize->add_control( 'copyright_text', array(
        'type'                  => 'text',
        'section'               => 'footer_text',
        'label'                 => __( 'Copyright Text', 'lebanon' )
        
    ) );
    
    $wp_customize->add_section( 'social_links', array (
        'title'                 => __( 'Social Icons & Links', 'lebanon' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'facebook_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'facebook_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Facebook URL', 'lebanon' )
        
    ) );
    
    $wp_customize->add_setting( 'gplus_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'gplus_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Google Plus URL', 'lebanon' )
        
    ) );
    
    $wp_customize->add_setting( 'instagram_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'instagram_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Instagram URL', 'lebanon' )
        
    ) );
    
    $wp_customize->add_setting( 'linkedin_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'linkedin_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Linkedin URL', 'lebanon' )
        
    ) );
    
    $wp_customize->add_setting( 'pinterest_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'pinterest_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Pinterest URL', 'lebanon' )
        
    ) );
    
    $wp_customize->add_setting( 'twitter_url', array (
        'default'               => '#',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'twitter_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Twitter URL', 'lebanon' )
        
    ) );
    
    // *********************************************
    // ****************** Social Icons *****************
    // *********************************************
    $wp_customize->add_panel( 'social', array (
        'title'                 => __( 'Social', 'lebanon' ),
        'description'           => __( 'Social Icons, Links & Location', 'lebanon' ),
        'priority'              => 10
    ) );
   
    
    $wp_customize->get_setting( 'blogname' )->transport             = 'refresh';
    $wp_customize->get_setting( 'blogdescription' )->transport      = 'refresh';

    
}

add_action( 'customize_register', 'lebanon_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function lebanon_customize_enqueue() {
    
    wp_enqueue_script( 'lebanon-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
    
}
add_action( 'customize_controls_enqueue_scripts', 'lebanon_customize_enqueue' );

function lebanon_customize_preview_js() {
    wp_enqueue_script( 'lebanon_customizer', get_template_directory_uri() . '/js/customizer.js', array ( 'customize-preview' ), LEBANON_VERSION, true );
}

add_action( 'customize_preview_init', 'lebanon_customize_preview_js' );


function lebanon_icons(){
    
    return array( 
        'fa fa-clock' => __( 'Select One', 'lebanon'), 
        'fa fa-500px' => __( ' 500px', 'lebanon'), 
        'fa fa-amazon' => __( ' amazon', 'lebanon'), 
        'fa fa-balance-scale' => __( ' balance-scale', 'lebanon'), 'fa fa-battery-0' => __( ' battery-0', 'lebanon'), 'fa fa-battery-1' => __( ' battery-1', 'lebanon'), 'fa fa-battery-2' => __( ' battery-2', 'lebanon'), 'fa fa-battery-3' => __( ' battery-3', 'lebanon'), 'fa fa-battery-4' => __( ' battery-4', 'lebanon'), 'fa fa-battery-empty' => __( ' battery-empty', 'lebanon'), 'fa fa-battery-full' => __( ' battery-full', 'lebanon'), 'fa fa-battery-half' => __( ' battery-half', 'lebanon'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'lebanon'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'lebanon'), 'fa fa-black-tie' => __( ' black-tie', 'lebanon'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'lebanon'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'lebanon'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'lebanon'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'lebanon'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'lebanon'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'lebanon'), 'fa fa-chrome' => __( ' chrome', 'lebanon'), 'fa fa-clone' => __( ' clone', 'lebanon'), 'fa fa-commenting' => __( ' commenting', 'lebanon'), 'fa fa-commenting-o' => __( ' commenting-o', 'lebanon'), 'fa fa-contao' => __( ' contao', 'lebanon'), 'fa fa-creative-commons' => __( ' creative-commons', 'lebanon'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'lebanon'), 'fa fa-firefox' => __( ' firefox', 'lebanon'), 'fa fa-fonticons' => __( ' fonticons', 'lebanon'), 'fa fa-genderless' => __( ' genderless', 'lebanon'), 'fa fa-get-pocket' => __( ' get-pocket', 'lebanon'), 'fa fa-gg' => __( ' gg', 'lebanon'), 'fa fa-gg-circle' => __( ' gg-circle', 'lebanon'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'lebanon'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'lebanon'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'lebanon'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'lebanon'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'lebanon'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'lebanon'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'lebanon'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'lebanon'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'lebanon'), 'fa fa-hourglass' => __( ' hourglass', 'lebanon'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'lebanon'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'lebanon'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'lebanon'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'lebanon'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'lebanon'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'lebanon'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'lebanon'), 'fa fa-houzz' => __( ' houzz', 'lebanon'), 'fa fa-i-cursor' => __( ' i-cursor', 'lebanon'), 'fa fa-industry' => __( ' industry', 'lebanon'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'lebanon'), 'fa fa-map' => __( ' map', 'lebanon'), 'fa fa-map-o' => __( ' map-o', 'lebanon'), 'fa fa-map-pin' => __( ' map-pin', 'lebanon'), 'fa fa-map-signs' => __( ' map-signs', 'lebanon'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'lebanon'), 'fa fa-object-group' => __( ' object-group', 'lebanon'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'lebanon'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'lebanon'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'lebanon'), 'fa fa-opencart' => __( ' opencart', 'lebanon'), 'fa fa-opera' => __( ' opera', 'lebanon'), 'fa fa-optin-monster' => __( ' optin-monster', 'lebanon'), 'fa fa-registered' => __( ' registered', 'lebanon'), 'fa fa-safari' => __( ' safari', 'lebanon'), 'fa fa-sticky-note' => __( ' sticky-note', 'lebanon'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'lebanon'), 'fa fa-television' => __( ' television', 'lebanon'), 'fa fa-trademark' => __( ' trademark', 'lebanon'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'lebanon'), 'fa fa-tv' => __( ' tv', 'lebanon'), 'fa fa-vimeo' => __( ' vimeo', 'lebanon'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'lebanon'), 'fa fa-y-combinator' => __( ' y-combinator', 'lebanon'), 'fa fa-yc' => __( ' yc', 'lebanon'), 'fa fa-adjust' => __( ' adjust', 'lebanon'), 'fa fa-anchor' => __( ' anchor', 'lebanon'), 'fa fa-archive' => __( ' archive', 'lebanon'), 'fa fa-area-chart' => __( ' area-chart', 'lebanon'), 'fa fa-arrows' => __( ' arrows', 'lebanon'), 'fa fa-arrows-h' => __( ' arrows-h', 'lebanon'), 'fa fa-arrows-v' => __( ' arrows-v', 'lebanon'), 'fa fa-asterisk' => __( ' asterisk', 'lebanon'), 'fa fa-at' => __( ' at', 'lebanon'), 'fa fa-automobile' => __( ' automobile', 'lebanon'), 'fa fa-balance-scale' => __( ' balance-scale', 'lebanon'), 'fa fa-ban' => __( ' ban', 'lebanon'), 'fa fa-bank' => __( ' bank', 'lebanon'), 'fa fa-bar-chart' => __( ' bar-chart', 'lebanon'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'lebanon'), 'fa fa-barcode' => __( ' barcode', 'lebanon'), 'fa fa-bars' => __( ' bars', 'lebanon'), 'fa fa-battery-0' => __( ' battery-0', 'lebanon'), 'fa fa-battery-1' => __( ' battery-1', 'lebanon'), 'fa fa-battery-2' => __( ' battery-2', 'lebanon'), 'fa fa-battery-3' => __( ' battery-3', 'lebanon'), 'fa fa-battery-4' => __( ' battery-4', 'lebanon'), 'fa fa-battery-empty' => __( ' battery-empty', 'lebanon'), 'fa fa-battery-full' => __( ' battery-full', 'lebanon'), 'fa fa-battery-half' => __( ' battery-half', 'lebanon'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'lebanon'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'lebanon'), 'fa fa-bed' => __( ' bed', 'lebanon'), 'fa fa-beer' => __( ' beer', 'lebanon'), 'fa fa-bell' => __( ' bell', 'lebanon'), 'fa fa-bell-o' => __( ' bell-o', 'lebanon'), 'fa fa-bell-slash' => __( ' bell-slash', 'lebanon'), 'fa fa-bell-slash-o' => __( ' bell-slash-o', 'lebanon'), 'fa fa-bicycle' => __( ' bicycle', 'lebanon'), 'fa fa-binoculars' => __( ' binoculars', 'lebanon'), 'fa fa-birthday-cake' => __( ' birthday-cake', 'lebanon'), 'fa fa-bolt' => __( ' bolt', 'lebanon'), 'fa fa-bomb' => __( ' bomb', 'lebanon'), 'fa fa-book' => __( ' book', 'lebanon'), 'fa fa-bookmark' => __( ' bookmark', 'lebanon'), 'fa fa-bookmark-o' => __( ' bookmark-o', 'lebanon'), 'fa fa-briefcase' => __( ' briefcase', 'lebanon'), 'fa fa-bug' => __( ' bug', 'lebanon'), 'fa fa-building' => __( ' building', 'lebanon'), 'fa fa-building-o' => __( ' building-o', 'lebanon'), 'fa fa-bullhorn' => __( ' bullhorn', 'lebanon'), 'fa fa-bullseye' => __( ' bullseye', 'lebanon'), 'fa fa-bus' => __( ' bus', 'lebanon'), 'fa fa-cab' => __( ' cab', 'lebanon'), 'fa fa-calculator' => __( ' calculator', 'lebanon'), 'fa fa-calendar' => __( ' calendar', 'lebanon'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'lebanon'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'lebanon'), 'fa fa-calendar-o' => __( ' calendar-o', 'lebanon'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'lebanon'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'lebanon'), 'fa fa-camera' => __( ' camera', 'lebanon'), 'fa fa-camera-retro' => __( ' camera-retro', 'lebanon'), 'fa fa-car' => __( ' car', 'lebanon'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'lebanon'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'lebanon'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'lebanon'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'lebanon'), 'fa fa-cart-arrow-down' => __( ' cart-arrow-down', 'lebanon'), 'fa fa-cart-plus' => __( ' cart-plus', 'lebanon'), 'fa fa-cc' => __( ' cc', 'lebanon'), 'fa fa-certificate' => __( ' certificate', 'lebanon'), 'fa fa-check' => __( ' check', 'lebanon'), 'fa fa-check-circle' => __( ' check-circle', 'lebanon'), 'fa fa-check-circle-o' => __( ' check-circle-o', 'lebanon'), 'fa fa-check-square' => __( ' check-square', 'lebanon'), 'fa fa-check-square-o' => __( ' check-square-o', 'lebanon'), 'fa fa-child' => __( ' child', 'lebanon'), 'fa fa-circle' => __( ' circle', 'lebanon'), 'fa fa-circle-o' => __( ' circle-o', 'lebanon'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'lebanon'), 'fa fa-circle-thin' => __( ' circle-thin', 'lebanon'), 'fa fa-clock-o' => __( ' clock-o', 'lebanon'), 'fa fa-clone' => __( ' clone', 'lebanon'), 'fa fa-close' => __( ' close', 'lebanon'), 'fa fa-cloud' => __( ' cloud', 'lebanon'), 'fa fa-cloud-download' => __( ' cloud-download', 'lebanon'), 'fa fa-cloud-upload' => __( ' cloud-upload', 'lebanon'), 'fa fa-code' => __( ' code', 'lebanon'), 'fa fa-code-fork' => __( ' code-fork', 'lebanon'), 'fa fa-coffee' => __( ' coffee', 'lebanon'), 'fa fa-cog' => __( ' cog', 'lebanon'), 'fa fa-cogs' => __( ' cogs', 'lebanon'), 'fa fa-comment' => __( ' comment', 'lebanon'), 'fa fa-comment-o' => __( ' comment-o', 'lebanon'), 'fa fa-commenting' => __( ' commenting', 'lebanon'), 'fa fa-commenting-o' => __( ' commenting-o', 'lebanon'), 'fa fa-comments' => __( ' comments', 'lebanon'), 'fa fa-comments-o' => __( ' comments-o', 'lebanon'), 'fa fa-compass' => __( ' compass', 'lebanon'), 'fa fa-copyright' => __( ' copyright', 'lebanon'), 'fa fa-creative-commons' => __( ' creative-commons', 'lebanon'), 'fa fa-credit-card' => __( ' credit-card', 'lebanon'), 'fa fa-crop' => __( ' crop', 'lebanon'), 'fa fa-crosshairs' => __( ' crosshairs', 'lebanon'), 'fa fa-cube' => __( ' cube', 'lebanon'), 'fa fa-cubes' => __( ' cubes', 'lebanon'), 'fa fa-cutlery' => __( ' cutlery', 'lebanon'), 'fa fa-dashboard' => __( ' dashboard', 'lebanon'), 'fa fa-database' => __( ' database', 'lebanon'), 'fa fa-desktop' => __( ' desktop', 'lebanon'), 'fa fa-diamond' => __( ' diamond', 'lebanon'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'lebanon'), 'fa fa-download' => __( ' download', 'lebanon'), 'fa fa-edit' => __( ' edit', 'lebanon'), 'fa fa-ellipsis-h' => __( ' ellipsis-h', 'lebanon'), 'fa fa-ellipsis-v' => __( ' ellipsis-v', 'lebanon'), 'fa fa-envelope' => __( ' envelope', 'lebanon'), 'fa fa-envelope-o' => __( ' envelope-o', 'lebanon'), 'fa fa-envelope-square' => __( ' envelope-square', 'lebanon'), 'fa fa-eraser' => __( ' eraser', 'lebanon'), 'fa fa-exchange' => __( ' exchange', 'lebanon'), 'fa fa-exclamation' => __( ' exclamation', 'lebanon'), 'fa fa-exclamation-circle' => __( ' exclamation-circle', 'lebanon'), 'fa fa-exclamation-triangle' => __( ' exclamation-triangle', 'lebanon'), 'fa fa-external-link' => __( ' external-link', 'lebanon'), 'fa fa-external-link-square' => __( ' external-link-square', 'lebanon'), 'fa fa-eye' => __( ' eye', 'lebanon'), 'fa fa-eye-slash' => __( ' eye-slash', 'lebanon'), 'fa fa-eyedropper' => __( ' eyedropper', 'lebanon'), 'fa fa-fax' => __( ' fax', 'lebanon'), 'fa fa-feed' => __( ' feed', 'lebanon'), 'fa fa-female' => __( ' female', 'lebanon'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'lebanon'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'lebanon'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'lebanon'), 'fa fa-file-code-o' => __( ' file-code-o', 'lebanon'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'lebanon'), 'fa fa-file-image-o' => __( ' file-image-o', 'lebanon'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'lebanon'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'lebanon'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'lebanon'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'lebanon'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'lebanon'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'lebanon'), 'fa fa-file-video-o' => __( ' file-video-o', 'lebanon'), 'fa fa-file-word-o' => __( ' file-word-o', 'lebanon'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'lebanon'), 'fa fa-film' => __( ' film', 'lebanon'), 'fa fa-filter' => __( ' filter', 'lebanon'), 'fa fa-fire' => __( ' fire', 'lebanon'), 'fa fa-fire-extinguisher' => __( ' fire-extinguisher', 'lebanon'), 'fa fa-flag' => __( ' flag', 'lebanon'), 'fa fa-flag-checkered' => __( ' flag-checkered', 'lebanon'), 'fa fa-flag-o' => __( ' flag-o', 'lebanon'), 'fa fa-flash' => __( ' flash', 'lebanon'), 'fa fa-flask' => __( ' flask', 'lebanon'), 'fa fa-folder' => __( ' folder', 'lebanon'), 'fa fa-folder-o' => __( ' folder-o', 'lebanon'), 'fa fa-folder-open' => __( ' folder-open', 'lebanon'), 'fa fa-folder-open-o' => __( ' folder-open-o', 'lebanon'), 'fa fa-frown-o' => __( ' frown-o', 'lebanon'), 'fa fa-futbol-o' => __( ' futbol-o', 'lebanon'), 'fa fa-gamepad' => __( ' gamepad', 'lebanon'), 'fa fa-gavel' => __( ' gavel', 'lebanon'), 'fa fa-gear' => __( ' gear', 'lebanon'), 'fa fa-gears' => __( ' gears', 'lebanon'), 'fa fa-gift' => __( ' gift', 'lebanon'), 'fa fa-glass' => __( ' glass', 'lebanon'), 'fa fa-globe' => __( ' globe', 'lebanon'), 'fa fa-graduation-cap' => __( ' graduation-cap', 'lebanon'), 'fa fa-group' => __( ' group', 'lebanon'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'lebanon'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'lebanon'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'lebanon'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'lebanon'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'lebanon'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'lebanon'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'lebanon'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'lebanon'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'lebanon'), 'fa fa-hdd-o' => __( ' hdd-o', 'lebanon'), 'fa fa-headphones' => __( ' headphones', 'lebanon'), 'fa fa-heart' => __( ' heart', 'lebanon'), 'fa fa-heart-o' => __( ' heart-o', 'lebanon'), 'fa fa-heartbeat' => __( ' heartbeat', 'lebanon'), 'fa fa-history' => __( ' history', 'lebanon'), 'fa fa-home' => __( ' home', 'lebanon'), 'fa fa-hotel' => __( ' hotel', 'lebanon'), 'fa fa-hourglass' => __( ' hourglass', 'lebanon'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'lebanon'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'lebanon'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'lebanon'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'lebanon'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'lebanon'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'lebanon'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'lebanon'), 'fa fa-i-cursor' => __( ' i-cursor', 'lebanon'), 'fa fa-image' => __( ' image', 'lebanon'), 'fa fa-inbox' => __( ' inbox', 'lebanon'), 'fa fa-industry' => __( ' industry', 'lebanon'), 'fa fa-info' => __( ' info', 'lebanon'), 'fa fa-info-circle' => __( ' info-circle', 'lebanon'), 'fa fa-institution' => __( ' institution', 'lebanon'), 'fa fa-key' => __( ' key', 'lebanon'), 'fa fa-keyboard-o' => __( ' keyboard-o', 'lebanon'), 'fa fa-language' => __( ' language', 'lebanon'), 'fa fa-laptop' => __( ' laptop', 'lebanon'), 'fa fa-leaf' => __( ' leaf', 'lebanon'), 'fa fa-legal' => __( ' legal', 'lebanon'), 'fa fa-lemon-o' => __( ' lemon-o', 'lebanon'), 'fa fa-level-down' => __( ' level-down', 'lebanon'), 'fa fa-level-up' => __( ' level-up', 'lebanon'), 'fa fa-life-bouy' => __( ' life-bouy', 'lebanon'), 'fa fa-life-buoy' => __( ' life-buoy', 'lebanon'), 'fa fa-life-ring' => __( ' life-ring', 'lebanon'), 'fa fa-life-saver' => __( ' life-saver', 'lebanon'), 'fa fa-lightbulb-o' => __( ' lightbulb-o', 'lebanon'), 'fa fa-line-chart' => __( ' line-chart', 'lebanon'), 'fa fa-location-arrow' => __( ' location-arrow', 'lebanon'), 'fa fa-lock' => __( ' lock', 'lebanon'), 'fa fa-magic' => __( ' magic', 'lebanon'), 'fa fa-magnet' => __( ' magnet', 'lebanon'), 'fa fa-mail-forward' => __( ' mail-forward', 'lebanon'), 'fa fa-mail-reply' => __( ' mail-reply', 'lebanon'), 'fa fa-mail-reply-all' => __( ' mail-reply-all', 'lebanon'), 'fa fa-male' => __( ' male', 'lebanon'), 'fa fa-map' => __( ' map', 'lebanon'), 'fa fa-map-marker' => __( ' map-marker', 'lebanon'), 'fa fa-map-o' => __( ' map-o', 'lebanon'), 'fa fa-map-pin' => __( ' map-pin', 'lebanon'), 'fa fa-map-signs' => __( ' map-signs', 'lebanon'), 'fa fa-meh-o' => __( ' meh-o', 'lebanon'), 'fa fa-microphone' => __( ' microphone', 'lebanon'), 'fa fa-microphone-slash' => __( ' microphone-slash', 'lebanon'), 'fa fa-minus' => __( ' minus', 'lebanon'), 'fa fa-minus-circle' => __( ' minus-circle', 'lebanon'), 'fa fa-minus-square' => __( ' minus-square', 'lebanon'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'lebanon'), 'fa fa-mobile' => __( ' mobile', 'lebanon'), 'fa fa-mobile-phone' => __( ' mobile-phone', 'lebanon'), 'fa fa-money' => __( ' money', 'lebanon'), 'fa fa-moon-o' => __( ' moon-o', 'lebanon'), 'fa fa-mortar-board' => __( ' mortar-board', 'lebanon'), 'fa fa-motorcycle' => __( ' motorcycle', 'lebanon'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'lebanon'), 'fa fa-music' => __( ' music', 'lebanon'), 'fa fa-navicon' => __( ' navicon', 'lebanon'), 'fa fa-newspaper-o' => __( ' newspaper-o', 'lebanon'), 'fa fa-object-group' => __( ' object-group', 'lebanon'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'lebanon'), 'fa fa-paint-brush' => __( ' paint-brush', 'lebanon'), 'fa fa-paper-plane' => __( ' paper-plane', 'lebanon'), 'fa fa-paper-plane-o' => __( ' paper-plane-o', 'lebanon'), 'fa fa-paw' => __( ' paw', 'lebanon'), 'fa fa-pencil' => __( ' pencil', 'lebanon'), 'fa fa-pencil-square' => __( ' pencil-square', 'lebanon'), 'fa fa-pencil-square-o' => __( ' pencil-square-o', 'lebanon'), 'fa fa-phone' => __( ' phone', 'lebanon'), 'fa fa-phone-square' => __( ' phone-square', 'lebanon'), 'fa fa-photo' => __( ' photo', 'lebanon'), 'fa fa-picture-o' => __( ' picture-o', 'lebanon'), 'fa fa-pie-chart' => __( ' pie-chart', 'lebanon'), 'fa fa-plane' => __( ' plane', 'lebanon'), 'fa fa-plug' => __( ' plug', 'lebanon'), 'fa fa-plus' => __( ' plus', 'lebanon'), 'fa fa-plus-circle' => __( ' plus-circle', 'lebanon'), 'fa fa-plus-square' => __( ' plus-square', 'lebanon'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'lebanon'), 'fa fa-power-off' => __( ' power-off', 'lebanon'), 'fa fa-print' => __( ' print', 'lebanon'), 'fa fa-puzzle-piece' => __( ' puzzle-piece', 'lebanon'), 'fa fa-qrcode' => __( ' qrcode', 'lebanon'), 'fa fa-question' => __( ' question', 'lebanon'), 'fa fa-question-circle' => __( ' question-circle', 'lebanon'), 'fa fa-quote-left' => __( ' quote-left', 'lebanon'), 'fa fa-quote-right' => __( ' quote-right', 'lebanon'), 'fa fa-random' => __( ' random', 'lebanon'), 'fa fa-recycle' => __( ' recycle', 'lebanon'), 'fa fa-refresh' => __( ' refresh', 'lebanon'), 'fa fa-registered' => __( ' registered', 'lebanon'), 'fa fa-remove' => __( ' remove', 'lebanon'), 'fa fa-reorder' => __( ' reorder', 'lebanon'), 'fa fa-reply' => __( ' reply', 'lebanon'), 'fa fa-reply-all' => __( ' reply-all', 'lebanon'), 'fa fa-retweet' => __( ' retweet', 'lebanon'), 'fa fa-road' => __( ' road', 'lebanon'), 'fa fa-rocket' => __( ' rocket', 'lebanon'), 'fa fa-rss' => __( ' rss', 'lebanon'), 'fa fa-rss-square' => __( ' rss-square', 'lebanon'), 'fa fa-search' => __( ' search', 'lebanon'), 'fa fa-search-minus' => __( ' search-minus', 'lebanon'), 'fa fa-search-plus' => __( ' search-plus', 'lebanon'), 'fa fa-send' => __( ' send', 'lebanon'), 'fa fa-send-o' => __( ' send-o', 'lebanon'), 'fa fa-server' => __( ' server', 'lebanon'), 'fa fa-share' => __( ' share', 'lebanon'), 'fa fa-share-alt' => __( ' share-alt', 'lebanon'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'lebanon'), 'fa fa-share-square' => __( ' share-square', 'lebanon'), 'fa fa-share-square-o' => __( ' share-square-o', 'lebanon'), 'fa fa-shield' => __( ' shield', 'lebanon'), 'fa fa-ship' => __( ' ship', 'lebanon'), 'fa fa-shopping-cart' => __( ' shopping-cart', 'lebanon'), 'fa fa-sign-in' => __( ' sign-in', 'lebanon'), 'fa fa-sign-out' => __( ' sign-out', 'lebanon'), 'fa fa-signal' => __( ' signal', 'lebanon'), 'fa fa-sitemap' => __( ' sitemap', 'lebanon'), 'fa fa-sliders' => __( ' sliders', 'lebanon'), 'fa fa-smile-o' => __( ' smile-o', 'lebanon'), 'fa fa-soccer-ball-o' => __( ' soccer-ball-o', 'lebanon'), 'fa fa-sort' => __( ' sort', 'lebanon'), 'fa fa-sort-alpha-asc' => __( ' sort-alpha-asc', 'lebanon'), 'fa fa-sort-alpha-desc' => __( ' sort-alpha-desc', 'lebanon'), 'fa fa-sort-amount-asc' => __( ' sort-amount-asc', 'lebanon'), 'fa fa-sort-amount-desc' => __( ' sort-amount-desc', 'lebanon'), 'fa fa-sort-asc' => __( ' sort-asc', 'lebanon'), 'fa fa-sort-desc' => __( ' sort-desc', 'lebanon'), 'fa fa-sort-down' => __( ' sort-down', 'lebanon'), 'fa fa-sort-numeric-asc' => __( ' sort-numeric-asc', 'lebanon'), 'fa fa-sort-numeric-desc' => __( ' sort-numeric-desc', 'lebanon'), 'fa fa-sort-up' => __( ' sort-up', 'lebanon'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'lebanon'), 'fa fa-spinner' => __( ' spinner', 'lebanon'), 'fa fa-spoon' => __( ' spoon', 'lebanon'), 'fa fa-square' => __( ' square', 'lebanon'), 'fa fa-square-o' => __( ' square-o', 'lebanon'), 'fa fa-star' => __( ' star', 'lebanon'), 'fa fa-star-half' => __( ' star-half', 'lebanon'), 'fa fa-star-half-empty' => __( ' star-half-empty', 'lebanon'), 'fa fa-star-half-full' => __( ' star-half-full', 'lebanon'), 'fa fa-star-half-o' => __( ' star-half-o', 'lebanon'), 'fa fa-star-o' => __( ' star-o', 'lebanon'), 'fa fa-sticky-note' => __( ' sticky-note', 'lebanon'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'lebanon'), 'fa fa-street-view' => __( ' street-view', 'lebanon'), 'fa fa-suitcase' => __( ' suitcase', 'lebanon'), 'fa fa-sun-o' => __( ' sun-o', 'lebanon'), 'fa fa-support' => __( ' support', 'lebanon'), 'fa fa-tablet' => __( ' tablet', 'lebanon'), 'fa fa-tachometer' => __( ' tachometer', 'lebanon'), 'fa fa-tag' => __( ' tag', 'lebanon'), 'fa fa-tags' => __( ' tags', 'lebanon'), 'fa fa-tasks' => __( ' tasks', 'lebanon'), 'fa fa-taxi' => __( ' taxi', 'lebanon'), 'fa fa-television' => __( ' television', 'lebanon'), 'fa fa-terminal' => __( ' terminal', 'lebanon'), 'fa fa-thumb-tack' => __( ' thumb-tack', 'lebanon'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'lebanon'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'lebanon'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'lebanon'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'lebanon'), 'fa fa-ticket' => __( ' ticket', 'lebanon'), 'fa fa-times' => __( ' times', 'lebanon'), 'fa fa-times-circle' => __( ' times-circle', 'lebanon'), 'fa fa-times-circle-o' => __( ' times-circle-o', 'lebanon'), 'fa fa-tint' => __( ' tint', 'lebanon'), 'fa fa-toggle-down' => __( ' toggle-down', 'lebanon'), 'fa fa-toggle-left' => __( ' toggle-left', 'lebanon'), 'fa fa-toggle-off' => __( ' toggle-off', 'lebanon'), 'fa fa-toggle-on' => __( ' toggle-on', 'lebanon'), 'fa fa-toggle-right' => __( ' toggle-right', 'lebanon'), 'fa fa-toggle-up' => __( ' toggle-up', 'lebanon'), 'fa fa-trademark' => __( ' trademark', 'lebanon'), 'fa fa-trash' => __( ' trash', 'lebanon'), 'fa fa-trash-o' => __( ' trash-o', 'lebanon'), 'fa fa-tree' => __( ' tree', 'lebanon'), 'fa fa-trophy' => __( ' trophy', 'lebanon'), 'fa fa-truck' => __( ' truck', 'lebanon'), 'fa fa-tty' => __( ' tty', 'lebanon'), 'fa fa-tv' => __( ' tv', 'lebanon'), 'fa fa-umbrella' => __( ' umbrella', 'lebanon'), 'fa fa-university' => __( ' university', 'lebanon'), 'fa fa-unlock' => __( ' unlock', 'lebanon'), 'fa fa-unlock-alt' => __( ' unlock-alt', 'lebanon'), 'fa fa-unsorted' => __( ' unsorted', 'lebanon'), 'fa fa-upload' => __( ' upload', 'lebanon'), 'fa fa-user' => __( ' user', 'lebanon'), 'fa fa-user-plus' => __( ' user-plus', 'lebanon'), 'fa fa-user-secret' => __( ' user-secret', 'lebanon'), 'fa fa-user-times' => __( ' user-times', 'lebanon'), 'fa fa-users' => __( ' users', 'lebanon'), 'fa fa-video-camera' => __( ' video-camera', 'lebanon'), 'fa fa-volume-down' => __( ' volume-down', 'lebanon'), 'fa fa-volume-off' => __( ' volume-off', 'lebanon'), 'fa fa-volume-up' => __( ' volume-up', 'lebanon'), 'fa fa-warning' => __( ' warning', 'lebanon'), 'fa fa-wheelchair' => __( ' wheelchair', 'lebanon'), 'fa fa-wifi' => __( ' wifi', 'lebanon'), 'fa fa-wrench' => __( ' wrench', 'lebanon'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'lebanon'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'lebanon'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'lebanon'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'lebanon'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'lebanon'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'lebanon'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'lebanon'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'lebanon'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'lebanon'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'lebanon'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'lebanon'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'lebanon'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'lebanon'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'lebanon'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'lebanon'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'lebanon'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'lebanon'), 'fa fa-ambulance' => __( ' ambulance', 'lebanon'), 'fa fa-automobile' => __( ' automobile', 'lebanon'), 'fa fa-bicycle' => __( ' bicycle', 'lebanon'), 'fa fa-bus' => __( ' bus', 'lebanon'), 'fa fa-cab' => __( ' cab', 'lebanon'), 'fa fa-car' => __( ' car', 'lebanon'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'lebanon'), 'fa fa-motorcycle' => __( ' motorcycle', 'lebanon'), 'fa fa-plane' => __( ' plane', 'lebanon'), 'fa fa-rocket' => __( ' rocket', 'lebanon'), 'fa fa-ship' => __( ' ship', 'lebanon'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'lebanon'), 'fa fa-subway' => __( ' subway', 'lebanon'), 'fa fa-taxi' => __( ' taxi', 'lebanon'), 'fa fa-train' => __( ' train', 'lebanon'), 'fa fa-truck' => __( ' truck', 'lebanon'), 'fa fa-wheelchair' => __( ' wheelchair', 'lebanon'), 'fa fa-genderless' => __( ' genderless', 'lebanon'), 'fa fa-intersex' => __( ' intersex', 'lebanon'), 'fa fa-mars' => __( ' mars', 'lebanon'), 'fa fa-mars-double' => __( ' mars-double', 'lebanon'), 'fa fa-mars-stroke' => __( ' mars-stroke', 'lebanon'), 'fa fa-mars-stroke-h' => __( ' mars-stroke-h', 'lebanon'), 'fa fa-mars-stroke-v' => __( ' mars-stroke-v', 'lebanon'), 'fa fa-mercury' => __( ' mercury', 'lebanon'), 'fa fa-neuter' => __( ' neuter', 'lebanon'), 'fa fa-transgender' => __( ' transgender', 'lebanon'), 'fa fa-transgender-alt' => __( ' transgender-alt', 'lebanon'), 'fa fa-venus' => __( ' venus', 'lebanon'), 'fa fa-venus-double' => __( ' venus-double', 'lebanon'), 'fa fa-venus-mars' => __( ' venus-mars', 'lebanon'), 'fa fa-file' => __( ' file', 'lebanon'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'lebanon'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'lebanon'), 'fa fa-file-code-o' => __( ' file-code-o', 'lebanon'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'lebanon'), 'fa fa-file-image-o' => __( ' file-image-o', 'lebanon'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'lebanon'), 'fa fa-file-o' => __( ' file-o', 'lebanon'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'lebanon'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'lebanon'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'lebanon'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'lebanon'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'lebanon'), 'fa fa-file-text' => __( ' file-text', 'lebanon'), 'fa fa-file-text-o' => __( ' file-text-o', 'lebanon'), 'fa fa-file-video-o' => __( ' file-video-o', 'lebanon'), 'fa fa-file-word-o' => __( ' file-word-o', 'lebanon'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'lebanon'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'lebanon'), 'fa fa-cog' => __( ' cog', 'lebanon'), 'fa fa-gear' => __( ' gear', 'lebanon'), 'fa fa-refresh' => __( ' refresh', 'lebanon'), 'fa fa-spinner' => __( ' spinner', 'lebanon'), 'fa fa-check-square' => __( ' check-square', 'lebanon'), 'fa fa-check-square-o' => __( ' check-square-o', 'lebanon'), 'fa fa-circle' => __( ' circle', 'lebanon'), 'fa fa-circle-o' => __( ' circle-o', 'lebanon'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'lebanon'), 'fa fa-minus-square' => __( ' minus-square', 'lebanon'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'lebanon'), 'fa fa-plus-square' => __( ' plus-square', 'lebanon'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'lebanon'), 'fa fa-square' => __( ' square', 'lebanon'), 'fa fa-square-o' => __( ' square-o', 'lebanon'), 'fa fa-cc-amex' => __( ' cc-amex', 'lebanon'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'lebanon'), 'fa fa-cc-discover' => __( ' cc-discover', 'lebanon'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'lebanon'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'lebanon'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'lebanon'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'lebanon'), 'fa fa-cc-visa' => __( ' cc-visa', 'lebanon'), 'fa fa-credit-card' => __( ' credit-card', 'lebanon'), 'fa fa-google-wallet' => __( ' google-wallet', 'lebanon'), 'fa fa-paypal' => __( ' paypal', 'lebanon'), 'fa fa-area-chart' => __( ' area-chart', 'lebanon'), 'fa fa-bar-chart' => __( ' bar-chart', 'lebanon'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'lebanon'), 'fa fa-line-chart' => __( ' line-chart', 'lebanon'), 'fa fa-pie-chart' => __( ' pie-chart', 'lebanon'), 'fa fa-bitcoin' => __( ' bitcoin', 'lebanon'), 'fa fa-btc' => __( ' btc', 'lebanon'), 'fa fa-cny' => __( ' cny', 'lebanon'), 'fa fa-dollar' => __( ' dollar', 'lebanon'), 'fa fa-eur' => __( ' eur', 'lebanon'), 'fa fa-euro' => __( ' euro', 'lebanon'), 'fa fa-gbp' => __( ' gbp', 'lebanon'), 'fa fa-gg' => __( ' gg', 'lebanon'), 'fa fa-gg-circle' => __( ' gg-circle', 'lebanon'), 'fa fa-ils' => __( ' ils', 'lebanon'), 'fa fa-inr' => __( ' inr', 'lebanon'), 'fa fa-jpy' => __( ' jpy', 'lebanon'), 'fa fa-krw' => __( ' krw', 'lebanon'), 'fa fa-money' => __( ' money', 'lebanon'), 'fa fa-rmb' => __( ' rmb', 'lebanon'), 'fa fa-rouble' => __( ' rouble', 'lebanon'), 'fa fa-rub' => __( ' rub', 'lebanon'), 'fa fa-ruble' => __( ' ruble', 'lebanon'), 'fa fa-rupee' => __( ' rupee', 'lebanon'), 'fa fa-shekel' => __( ' shekel', 'lebanon'), 'fa fa-sheqel' => __( ' sheqel', 'lebanon'), 'fa fa-try' => __( ' try', 'lebanon'), 'fa fa-turkish-lira' => __( ' turkish-lira', 'lebanon'), 'fa fa-usd' => __( ' usd', 'lebanon'), 'fa fa-won' => __( ' won', 'lebanon'), 'fa fa-yen' => __( ' yen', 'lebanon'), 'fa fa-align-center' => __( ' align-center', 'lebanon'), 'fa fa-align-justify' => __( ' align-justify', 'lebanon'), 'fa fa-align-left' => __( ' align-left', 'lebanon'), 'fa fa-align-right' => __( ' align-right', 'lebanon'), 'fa fa-bold' => __( ' bold', 'lebanon'), 'fa fa-chain' => __( ' chain', 'lebanon'), 'fa fa-chain-broken' => __( ' chain-broken', 'lebanon'), 'fa fa-clipboard' => __( ' clipboard', 'lebanon'), 'fa fa-columns' => __( ' columns', 'lebanon'), 'fa fa-copy' => __( ' copy', 'lebanon'), 'fa fa-cut' => __( ' cut', 'lebanon'), 'fa fa-dedent' => __( ' dedent', 'lebanon'), 'fa fa-eraser' => __( ' eraser', 'lebanon'), 'fa fa-file' => __( ' file', 'lebanon'), 'fa fa-file-o' => __( ' file-o', 'lebanon'), 'fa fa-file-text' => __( ' file-text', 'lebanon'), 'fa fa-file-text-o' => __( ' file-text-o', 'lebanon'), 'fa fa-files-o' => __( ' files-o', 'lebanon'), 'fa fa-floppy-o' => __( ' floppy-o', 'lebanon'), 'fa fa-font' => __( ' font', 'lebanon'), 'fa fa-header' => __( ' header', 'lebanon'), 'fa fa-indent' => __( ' indent', 'lebanon'), 'fa fa-italic' => __( ' italic', 'lebanon'), 'fa fa-link' => __( ' link', 'lebanon'), 'fa fa-list' => __( ' list', 'lebanon'), 'fa fa-list-alt' => __( ' list-alt', 'lebanon'), 'fa fa-list-ol' => __( ' list-ol', 'lebanon'), 'fa fa-list-ul' => __( ' list-ul', 'lebanon'), 'fa fa-outdent' => __( ' outdent', 'lebanon'), 'fa fa-paperclip' => __( ' paperclip', 'lebanon'), 'fa fa-paragraph' => __( ' paragraph', 'lebanon'), 'fa fa-paste' => __( ' paste', 'lebanon'), 'fa fa-repeat' => __( ' repeat', 'lebanon'), 'fa fa-rotate-left' => __( ' rotate-left', 'lebanon'), 'fa fa-rotate-right' => __( ' rotate-right', 'lebanon'), 'fa fa-save' => __( ' save', 'lebanon'), 'fa fa-scissors' => __( ' scissors', 'lebanon'), 'fa fa-strikethrough' => __( ' strikethrough', 'lebanon'), 'fa fa-subscript' => __( ' subscript', 'lebanon'), 'fa fa-superscript' => __( ' superscript', 'lebanon'), 'fa fa-table' => __( ' table', 'lebanon'), 'fa fa-text-height' => __( ' text-height', 'lebanon'), 'fa fa-text-width' => __( ' text-width', 'lebanon'), 'fa fa-th' => __( ' th', 'lebanon'), 'fa fa-th-large' => __( ' th-large', 'lebanon'), 'fa fa-th-list' => __( ' th-list', 'lebanon'), 'fa fa-underline' => __( ' underline', 'lebanon'), 'fa fa-undo' => __( ' undo', 'lebanon'), 'fa fa-unlink' => __( ' unlink', 'lebanon'), 'fa fa-angle-double-down' => __( ' angle-double-down', 'lebanon'), 'fa fa-angle-double-left' => __( ' angle-double-left', 'lebanon'), 'fa fa-angle-double-right' => __( ' angle-double-right', 'lebanon'), 'fa fa-angle-double-up' => __( ' angle-double-up', 'lebanon'), 'fa fa-angle-down' => __( ' angle-down', 'lebanon'), 'fa fa-angle-left' => __( ' angle-left', 'lebanon'), 'fa fa-angle-right' => __( ' angle-right', 'lebanon'), 'fa fa-angle-up' => __( ' angle-up', 'lebanon'), 'fa fa-arrow-circle-down' => __( ' arrow-circle-down', 'lebanon'), 'fa fa-arrow-circle-left' => __( ' arrow-circle-left', 'lebanon'), 'fa fa-arrow-circle-o-down' => __( ' arrow-circle-o-down', 'lebanon'), 'fa fa-arrow-circle-o-left' => __( ' arrow-circle-o-left', 'lebanon'), 'fa fa-arrow-circle-o-right' => __( ' arrow-circle-o-right', 'lebanon'), 'fa fa-arrow-circle-o-up' => __( ' arrow-circle-o-up', 'lebanon'), 'fa fa-arrow-circle-right' => __( ' arrow-circle-right', 'lebanon'), 'fa fa-arrow-circle-up' => __( ' arrow-circle-up', 'lebanon'), 'fa fa-arrow-down' => __( ' arrow-down', 'lebanon'), 'fa fa-arrow-left' => __( ' arrow-left', 'lebanon'), 'fa fa-arrow-right' => __( ' arrow-right', 'lebanon'), 'fa fa-arrow-up' => __( ' arrow-up', 'lebanon'), 'fa fa-arrows' => __( ' arrows', 'lebanon'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'lebanon'), 'fa fa-arrows-h' => __( ' arrows-h', 'lebanon'), 'fa fa-arrows-v' => __( ' arrows-v', 'lebanon'), 'fa fa-caret-down' => __( ' caret-down', 'lebanon'), 'fa fa-caret-left' => __( ' caret-left', 'lebanon'), 'fa fa-caret-right' => __( ' caret-right', 'lebanon'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'lebanon'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'lebanon'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'lebanon'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'lebanon'), 'fa fa-caret-up' => __( ' caret-up', 'lebanon'), 'fa fa-chevron-circle-down' => __( ' chevron-circle-down', 'lebanon'), 'fa fa-chevron-circle-left' => __( ' chevron-circle-left', 'lebanon'), 'fa fa-chevron-circle-right' => __( ' chevron-circle-right', 'lebanon'), 'fa fa-chevron-circle-up' => __( ' chevron-circle-up', 'lebanon'), 'fa fa-chevron-down' => __( ' chevron-down', 'lebanon'), 'fa fa-chevron-left' => __( ' chevron-left', 'lebanon'), 'fa fa-chevron-right' => __( ' chevron-right', 'lebanon'), 'fa fa-chevron-up' => __( ' chevron-up', 'lebanon'), 'fa fa-exchange' => __( ' exchange', 'lebanon'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'lebanon'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'lebanon'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'lebanon'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'lebanon'), 'fa fa-long-arrow-down' => __( ' long-arrow-down', 'lebanon'), 'fa fa-long-arrow-left' => __( ' long-arrow-left', 'lebanon'), 'fa fa-long-arrow-right' => __( ' long-arrow-right', 'lebanon'), 'fa fa-long-arrow-up' => __( ' long-arrow-up', 'lebanon'), 'fa fa-toggle-down' => __( ' toggle-down', 'lebanon'), 'fa fa-toggle-left' => __( ' toggle-left', 'lebanon'), 'fa fa-toggle-right' => __( ' toggle-right', 'lebanon'), 'fa fa-toggle-up' => __( ' toggle-up', 'lebanon'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'lebanon'), 'fa fa-backward' => __( ' backward', 'lebanon'), 'fa fa-compress' => __( ' compress', 'lebanon'), 'fa fa-eject' => __( ' eject', 'lebanon'), 'fa fa-expand' => __( ' expand', 'lebanon'), 'fa fa-fast-backward' => __( ' fast-backward', 'lebanon'), 'fa fa-fast-forward' => __( ' fast-forward', 'lebanon'), 'fa fa-forward' => __( ' forward', 'lebanon'), 'fa fa-pause' => __( ' pause', 'lebanon'), 'fa fa-play' => __( ' play', 'lebanon'), 'fa fa-play-circle' => __( ' play-circle', 'lebanon'), 'fa fa-play-circle-o' => __( ' play-circle-o', 'lebanon'), 'fa fa-random' => __( ' random', 'lebanon'), 'fa fa-step-backward' => __( ' step-backward', 'lebanon'), 'fa fa-step-forward' => __( ' step-forward', 'lebanon'), 'fa fa-stop' => __( ' stop', 'lebanon'), 'fa fa-youtube-play' => __( ' youtube-play', 'lebanon'), 'fa fa-500px' => __( ' 500px', 'lebanon'), 'fa fa-adn' => __( ' adn', 'lebanon'), 'fa fa-amazon' => __( ' amazon', 'lebanon'), 'fa fa-android' => __( ' android', 'lebanon'), 'fa fa-angellist' => __( ' angellist', 'lebanon'), 'fa fa-apple' => __( ' apple', 'lebanon'), 'fa fa-behance' => __( ' behance', 'lebanon'), 'fa fa-behance-square' => __( ' behance-square', 'lebanon'), 'fa fa-bitbucket' => __( ' bitbucket', 'lebanon'), 'fa fa-bitbucket-square' => __( ' bitbucket-square', 'lebanon'), 'fa fa-bitcoin' => __( ' bitcoin', 'lebanon'), 'fa fa-black-tie' => __( ' black-tie', 'lebanon'), 'fa fa-btc' => __( ' btc', 'lebanon'), 'fa fa-buysellads' => __( ' buysellads', 'lebanon'), 'fa fa-cc-amex' => __( ' cc-amex', 'lebanon'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'lebanon'), 'fa fa-cc-discover' => __( ' cc-discover', 'lebanon'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'lebanon'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'lebanon'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'lebanon'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'lebanon'), 'fa fa-cc-visa' => __( ' cc-visa', 'lebanon'), 'fa fa-chrome' => __( ' chrome', 'lebanon'), 'fa fa-codepen' => __( ' codepen', 'lebanon'), 'fa fa-connectdevelop' => __( ' connectdevelop', 'lebanon'), 'fa fa-contao' => __( ' contao', 'lebanon'), 'fa fa-css3' => __( ' css3', 'lebanon'), 'fa fa-dashcube' => __( ' dashcube', 'lebanon'), 'fa fa-delicious' => __( ' delicious', 'lebanon'), 'fa fa-deviantart' => __( ' deviantart', 'lebanon'), 'fa fa-digg' => __( ' digg', 'lebanon'), 'fa fa-dribbble' => __( ' dribbble', 'lebanon'), 'fa fa-dropbox' => __( ' dropbox', 'lebanon'), 'fa fa-drupal' => __( ' drupal', 'lebanon'), 'fa fa-empire' => __( ' empire', 'lebanon'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'lebanon'), 'fa fa-facebook' => __( ' facebook', 'lebanon'), 'fa fa-facebook-f' => __( ' facebook-f', 'lebanon'), 'fa fa-facebook-official' => __( ' facebook-official', 'lebanon'), 'fa fa-facebook-square' => __( ' facebook-square', 'lebanon'), 'fa fa-firefox' => __( ' firefox', 'lebanon'), 'fa fa-flickr' => __( ' flickr', 'lebanon'), 'fa fa-fonticons' => __( ' fonticons', 'lebanon'), 'fa fa-forumbee' => __( ' forumbee', 'lebanon'), 'fa fa-foursquare' => __( ' foursquare', 'lebanon'), 'fa fa-ge' => __( ' ge', 'lebanon'), 'fa fa-get-pocket' => __( ' get-pocket', 'lebanon'), 'fa fa-gg' => __( ' gg', 'lebanon'), 'fa fa-gg-circle' => __( ' gg-circle', 'lebanon'), 'fa fa-git' => __( ' git', 'lebanon'), 'fa fa-git-square' => __( ' git-square', 'lebanon'), 'fa fa-github' => __( ' github', 'lebanon'), 'fa fa-github-alt' => __( ' github-alt', 'lebanon'), 'fa fa-github-square' => __( ' github-square', 'lebanon'), 'fa fa-gittip' => __( ' gittip', 'lebanon'), 'fa fa-google' => __( ' google', 'lebanon'), 'fa fa-google-plus' => __( ' google-plus', 'lebanon'), 'fa fa-google-plus-square' => __( ' google-plus-square', 'lebanon'), 'fa fa-google-wallet' => __( ' google-wallet', 'lebanon'), 'fa fa-gratipay' => __( ' gratipay', 'lebanon'), 'fa fa-hacker-news' => __( ' hacker-news', 'lebanon'), 'fa fa-houzz' => __( ' houzz', 'lebanon'), 'fa fa-html5' => __( ' html5', 'lebanon'), 'fa fa-instagram' => __( ' instagram', 'lebanon'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'lebanon'), 'fa fa-ioxhost' => __( ' ioxhost', 'lebanon'), 'fa fa-joomla' => __( ' joomla', 'lebanon'), 'fa fa-jsfiddle' => __( ' jsfiddle', 'lebanon'), 'fa fa-lastfm' => __( ' lastfm', 'lebanon'), 'fa fa-lastfm-square' => __( ' lastfm-square', 'lebanon'), 'fa fa-leanpub' => __( ' leanpub', 'lebanon'), 'fa fa-linkedin' => __( ' linkedin', 'lebanon'), 'fa fa-linkedin-square' => __( ' linkedin-square', 'lebanon'), 'fa fa-linux' => __( ' linux', 'lebanon'), 'fa fa-maxcdn' => __( ' maxcdn', 'lebanon'), 'fa fa-meanpath' => __( ' meanpath', 'lebanon'), 'fa fa-medium' => __( ' medium', 'lebanon'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'lebanon'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'lebanon'), 'fa fa-opencart' => __( ' opencart', 'lebanon'), 'fa fa-openid' => __( ' openid', 'lebanon'), 'fa fa-opera' => __( ' opera', 'lebanon'), 'fa fa-optin-monster' => __( ' optin-monster', 'lebanon'), 'fa fa-pagelines' => __( ' pagelines', 'lebanon'), 'fa fa-paypal' => __( ' paypal', 'lebanon'), 'fa fa-pied-piper' => __( ' pied-piper', 'lebanon'), 'fa fa-pied-piper-alt' => __( ' pied-piper-alt', 'lebanon'), 'fa fa-pinterest' => __( ' pinterest', 'lebanon'), 'fa fa-pinterest-p' => __( ' pinterest-p', 'lebanon'), 'fa fa-pinterest-square' => __( ' pinterest-square', 'lebanon'), 'fa fa-qq' => __( ' qq', 'lebanon'), 'fa fa-ra' => __( ' ra', 'lebanon'), 'fa fa-rebel' => __( ' rebel', 'lebanon'), 'fa fa-reddit' => __( ' reddit', 'lebanon'), 'fa fa-reddit-square' => __( ' reddit-square', 'lebanon'), 'fa fa-renren' => __( ' renren', 'lebanon'), 'fa fa-safari' => __( ' safari', 'lebanon'), 'fa fa-sellsy' => __( ' sellsy', 'lebanon'), 'fa fa-share-alt' => __( ' share-alt', 'lebanon'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'lebanon'), 'fa fa-shirtsinbulk' => __( ' shirtsinbulk', 'lebanon'), 'fa fa-simplybuilt' => __( ' simplybuilt', 'lebanon'), 'fa fa-skyatlas' => __( ' skyatlas', 'lebanon'), 'fa fa-skype' => __( ' skype', 'lebanon'), 'fa fa-slack' => __( ' slack', 'lebanon'), 'fa fa-slideshare' => __( ' slideshare', 'lebanon'), 'fa fa-soundcloud' => __( ' soundcloud', 'lebanon'), 'fa fa-spotify' => __( ' spotify', 'lebanon'), 'fa fa-stack-exchange' => __( ' stack-exchange', 'lebanon'), 'fa fa-stack-overflow' => __( ' stack-overflow', 'lebanon'), 'fa fa-steam' => __( ' steam', 'lebanon'), 'fa fa-steam-square' => __( ' steam-square', 'lebanon'), 'fa fa-stumbleupon' => __( ' stumbleupon', 'lebanon'), 'fa fa-stumbleupon-circle' => __( ' stumbleupon-circle', 'lebanon'), 'fa fa-tencent-weibo' => __( ' tencent-weibo', 'lebanon'), 'fa fa-trello' => __( ' trello', 'lebanon'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'lebanon'), 'fa fa-tumblr' => __( ' tumblr', 'lebanon'), 'fa fa-tumblr-square' => __( ' tumblr-square', 'lebanon'), 'fa fa-twitch' => __( ' twitch', 'lebanon'), 'fa fa-twitter' => __( ' twitter', 'lebanon'), 'fa fa-twitter-square' => __( ' twitter-square', 'lebanon'), 'fa fa-viacoin' => __( ' viacoin', 'lebanon'), 'fa fa-vimeo' => __( ' vimeo', 'lebanon'), 'fa fa-vimeo-square' => __( ' vimeo-square', 'lebanon'), 'fa fa-vine' => __( ' vine', 'lebanon'), 'fa fa-vk' => __( ' vk', 'lebanon'), 'fa fa-wechat' => __( ' wechat', 'lebanon'), 'fa fa-weibo' => __( ' weibo', 'lebanon'), 'fa fa-weixin' => __( ' weixin', 'lebanon'), 'fa fa-whatsapp' => __( ' whatsapp', 'lebanon'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'lebanon'), 'fa fa-windows' => __( ' windows', 'lebanon'), 'fa fa-wordpress' => __( ' wordpress', 'lebanon'), 'fa fa-xing' => __( ' xing', 'lebanon'), 'fa fa-xing-square' => __( ' xing-square', 'lebanon'), 'fa fa-y-combinator' => __( ' y-combinator', 'lebanon'), 'fa fa-y-combinator-square' => __( ' y-combinator-square', 'lebanon'), 'fa fa-yahoo' => __( ' yahoo', 'lebanon'), 'fa fa-yc' => __( ' yc', 'lebanon'), 'fa fa-yc-square' => __( ' yc-square', 'lebanon'), 'fa fa-yelp' => __( ' yelp', 'lebanon'), 'fa fa-youtube' => __( ' youtube', 'lebanon'), 'fa fa-youtube-play' => __( ' youtube-play', 'lebanon'), 'fa fa-youtube-square' => __( ' youtube-square', 'lebanon'), 'fa fa-ambulance' => __( ' ambulance', 'lebanon'), 'fa fa-h-square' => __( ' h-square', 'lebanon'), 'fa fa-heart' => __( ' heart', 'lebanon'), 'fa fa-heart-o' => __( ' heart-o', 'lebanon'), 'fa fa-heartbeat' => __( ' heartbeat', 'lebanon'), 'fa fa-hospital-o' => __( ' hospital-o', 'lebanon'), 'fa fa-medkit' => __( ' medkit', 'lebanon'), 'fa fa-plus-square' => __( ' plus-square', 'lebanon'), 'fa fa-stethoscope' => __( ' stethoscope', 'lebanon'), 'fa fa-user-md' => __( ' user-md', 'lebanon'), 'fa fa-wheelchair' => __( ' wheelchair', 'lebanon') );
    
}

function lebanon_font_sizes(){
    
    $font_size_array = array(
        '10px' => '10 px',
        '12px' => '12 px',
        '14px' => '14 px',
        '16px' => '16 px',
        '18px' => '18 px',
        '20px' => '20 px',
        '24px' => '24 px',
    );
    
    return $font_size_array;
    
}

   function lebanon_slider_transition_sanitize($input) {
      $valid_keys = array(
        'true' => __('Fade', 'lebanon'),
        'false' => __('Slide', 'lebanon'),
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
   
   function lebanon_radio_sanitize_enabledisable($input) {
      $valid_keys = array(
        'enable'=>__('Enable', 'lebanon'),
        'disable'=>__('Disable', 'lebanon')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
   function lebanon_radio_sanitize_yesno($input) {
    $valid_keys = array(
      'yes'=>__('Yes', 'lebanon'),
      'no'=>__('No', 'lebanon')
      );
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
 }
   
   function lebanon_sanitize_sidebar_location($input) {
    $valid_keys = array(
      'left'=>__('Left', 'lebanon'),
      'right'=>__('Right', 'lebanon'),
      'none'=>__('None', 'lebanon')
      );
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
 }
   
   function lebanon_radio_sanitize_onoff($input) {
    $valid_keys = array(
      'on'=>__('On', 'lebanon'),
      'off'=>__('Off', 'lebanon')
      );
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
 }
   
// checkbox sanitization
function lebanon_checkbox_sanitize($input) {
   if ( $input == 1 ) {
      return 1;
   } else {
      return '';
   }
}

//integer sanitize
function lebanon_integer_sanitize($input){
     return intval( $input );
}
   
function lebanon_fonts() {

    $font_family_array = array(
        'Bad Script, cursive' => 'Bad+Script',
        'Lobster Two, cursive' => 'Lobster+Two',
        'Josefin Sans, sans-serif' => 'Josefin',
        'Open Sans, sans-serif' => 'Open Sans',
        'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
        'Source Sans Pro, sans-serif' => 'Source Sans Pro',
        'Abel, sans-serif' => 'Abel',
        'Bangers, cursive' => 'Bangers',
        'Lobster Two, cursive' => 'Lobster+Two',
        'Josefin Sans, sans-serif' => 'Josefin+Sans:300,400,600,700',
        'Montserrat, sans-serif' => 'Montserrat:400,700',
        'Poiret One, cursive' => 'Poiret+One',
        'Source Sans Pro, sans-serif' => 'Source+Sans+Pro:200,400,600',
        'Lato, sans-serif' => 'Lato:100,300,400,700,900,300italic,400italic',
        'Raleway, sans-serif' => 'Raleway:400,300,500,700',
        'Shadows Into Light, cursive' => 'Shadows+Into+Light',
        'Orbitron, sans-serif' => 'Orbitron',
        'PT Sans Narrow, sans-serif' => 'PT+Sans+Narrow',
        'Lora, serif' => 'Lora',
        'Abel, sans-serif' => 'Abel',
        'Yellowtail, cursive' => 'Yellowtail',
        'Corben, cursive' => 'Corben'
    );

    return $font_family_array;
    

}
function lebanon_all_posts_array() {

    $posts = get_posts( array(
        'post_type'        => array( 'post', 'page', 'product' ),
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'             => 'ASC',
    ));

    $posts_array = array();

    foreach ( $posts as $post ) :

        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;

    endforeach;

    return $posts_array;

}
function lebanon_sanitize_integer( $input ) {
    return intval( $input );
}

function lebanon_sanitize_icon( $input ) {
    $valid_keys = lebanon_icons();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
}

function lebanon_sanitize_post( $input ) {
    $valid_keys = lebanon_all_posts_array();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
}

function lebanon_sanitize_text($input){
    return sanitize_text_field( $input );
}

function lebanon_sanitize_theme_color( $input ){
    $valid_keys = lebanon_theme_colors();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }    
}

function lebanon_sanitize_font( $input ){
    $valid_keys = lebanon_fonts();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }    
}

function lebanon_sanitize_font_size( $input ){
    $valid_keys = lebanon_font_sizes();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }    
}

function lebanon_theme_colors(){
    return array(
            'green'             => __( 'Green', 'lebanon' ),
            'blue'              => __( 'Blue', 'lebanon' ),
            'red'               => __( 'Red', 'lebanon' ),
            'pink'              => __( 'Pink', 'lebanon' ),
            'yellow'            => __( 'Yellow', 'lebanon' ),
            'darkblue'          => __( 'Dark Blue', 'lebanon' ),
        );
}