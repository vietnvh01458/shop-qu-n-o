<?php

/**
 * 
 * Lebanon WordPress Theme
 * 
 * This file contains most of the work done by Lebanon
 * It's pretty straight forward, feel free to edit if you're comfortable with basic PHP
 * 
 * If you got here, thank you for using this theme ! Hack away at it as you see fit.
 * Please take a minute to leave us a review on WordPress.org
 * 
 * 
 */


function lebanon_scripts() {

    wp_enqueue_style('lebanon-style', get_stylesheet_uri());

    wp_enqueue_script('lebanon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('lebanon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    $fonts = lebanon_fonts();
    
    if( array_key_exists ( get_theme_mod('header_font', 'Montserrat, sans-serif'), $fonts ) ) :
        wp_enqueue_style('lebanon-font-header', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('header_font', 'Montserrat, sans-serif')], array(), LEBANON_VERSION );
    endif;
    
    if( array_key_exists ( get_theme_mod('theme_font', 'Lato, sans-serif'), $fonts ) ) :
        wp_enqueue_style('lebanon-font-general', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('theme_font', 'Lato, sans-serif')], array(), LEBANON_VERSION );
    endif;
    

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), LEBANON_VERSION);
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css', array(), LEBANON_VERSION);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.css', array(), LEBANON_VERSION);
    wp_enqueue_style('lebanon-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), LEBANON_VERSION);
    wp_enqueue_style('lebanon-animations', get_template_directory_uri() . '/inc/css/animate.css', array(), LEBANON_VERSION);
    wp_enqueue_style('lebanon-slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), LEBANON_VERSION);
    wp_enqueue_style('lebanon-template', get_template_directory_uri() . '/inc/css/temps/' . esc_attr(get_theme_mod('theme_color', 'pink')) . '.css', array(), LEBANON_VERSION);
    wp_enqueue_script('lebanon-easing', get_template_directory_uri() . '/inc/js/easing.js', array('jquery'), LEBANON_VERSION, true);
    wp_enqueue_script('slicknav', get_template_directory_uri() . '/inc/js/slicknav.min.js', array('jquery'), LEBANON_VERSION, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/inc/js/wow.js', array('jquery'), LEBANON_VERSION, true);

    wp_enqueue_script('lebanon-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-masonry'), LEBANON_VERSION);
}

add_action('wp_enqueue_scripts', 'lebanon_scripts');

function lebanon_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'lebanon'),
        'id' => 'sidebar-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'lebanon'),
        'id' => 'sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar ( WooCommerce )', 'lebanon'),
        'id' => 'sidebar-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer', 'lebanon'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-4">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Frontpage Overlay', 'lebanon'),
        'id' => 'sidebar-overlay',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Top B - Homepage widget', 'lebanon'),
        'id' => 'sidebar-homepage',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'lebanon_widgets_init');



function lebanon_do_left_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'left' ) :
        
        echo '<div class="col-sm-4" id="lebanon-sidebar">' .
        get_sidebar() . '</div>';
        
    endif;
    
    
}
add_action('lebanon-sidebar-left', 'lebanon_do_left_sidebar');

function lebanon_do_right_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'right' ) :
        
        echo '<div class="col-sm-4" id="lebanon-sidebar">';
    
        get_sidebar();
        
        echo '</div>';
        
    endif;
    
    
}
add_action('lebanon-sidebar-right', 'lebanon_do_right_sidebar');

function lebanon_main_width(){
    
    $width = 12;
    
    if( is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right') ) :
        
        $width = 6;
        
    elseif( is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right') ) :
        $width = 9;
    else:
        $width = 12;
    endif;
    
    
    return $width;
}


function lebanon_get_image() {

    echo wp_get_attachment_url($POST['id']);

    exit();
}

add_action('wp_ajax_lebanon_get_image', 'lebanon_get_image');

function lebanon_customize_nav($items) {

    $items .= '<li class="menu-item"><a class="lebanon-search" href="#search" role="button" data-toggle="modal"><span class="fa fa-search"></span></a></li>';
    
    if( class_exists( 'WooCommerce' ) ) :
        $items .= '<li><a class="lebanon-cart" href="' . esc_url( WC()->cart->get_cart_url() ) . '"><span class="fa fa-shopping-cart"></span> ' . WC()->cart->get_cart_total() . '</a></li>';
    endif;
    
    
    
    return $items;
}

add_filter('wp_nav_menu_items', 'lebanon_customize_nav');


function lebanon_custom_css() {
    ?>
    <style type="text/css">


        body{
            font-size: <?php echo esc_attr( get_theme_mod( 'theme_font_size', '14px') ); ?>;
            font-family: <?php echo esc_attr( get_theme_mod( 'theme_font', 'Raleway, sans-serif' ) ); ?>;

        }
        h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.lebanon-title, .widget-title,.entry-title, .product_title{
            font-family: <?php echo esc_attr( get_theme_mod('header_font', 'Raleway, sans-serif' ) ); ?>;
        }
        
        ul.lebanon-nav > li.menu-item a{
            font-size: <?php echo esc_attr( get_theme_mod('menu_font_size', '14px' ) ); ?>;
        }
        
        #lebanon-overlay-trigger{
            background: <?php echo esc_attr( get_theme_mod('homepage_widget_color' ) ); ?>;
        }
        
    </style>
    <?php
}

add_action('wp_head', 'lebanon_custom_css');



function lebanon_featured_post() { ?>
    
    <div id="lebanon-featured-post">
        <div id="lebanon-slider" class="hero">
            <?php $post_id = get_theme_mod( 'lebanon_the_featured_post', 1 ); ?>
            
            <?php if( $post_id ) : ?>
            
            <div id="slide1" style="background-image: url(<?php echo esc_url(lebanon_get_post_thumb( $post_id ) ); ?>)">

                <div class="overlay"></div>
                <div class="row">
                    <div class="col-sm-12 slide-details">

                        <a href="<?php echo get_the_permalink( $post_id ) ? esc_url( get_the_permalink( $post_id ) ) : null; ?>">
                            <h2 class="header-text animated fadeInDown slide1-header"><?php echo ( get_the_title( $post_id ) ? esc_attr( get_the_title( $post_id ) ) : '' ); ?></h2>
                        </a>

                        <a href="<?php echo get_the_permalink( $post_id ) ? esc_url( get_the_permalink( $post_id ) ) : null; ?>" 
                           class="animated fadeInUp delay3 lebanon-button primary">
                            <?php echo esc_attr( get_theme_mod( 'lebanon_the_featured_post_button', __( 'Continue reading', 'lebanon' )  ) ); ?>
                        </a>


                    </div>

                </div>
                
                <div class="slider-bottom">
                    <div>
                        <span class="fa fa-chevron-down scroll-down animated slideInUp delay-long"></span>
                    </div>
                </div>

            </div>
            <?php endif; ?>
            
        </div>
    </div>


    <div class="clear"></div>
    
<?php }

function lebanon_render_homepage() { 
    
    lebanon_featured_post();
    
    ?>
    
    <?php $post_id = get_theme_mod( 'lebanon_the_featured_post2', 1 ); ?>
    <?php $the_post = $post_id ? get_post( $post_id ) : null; ?>
    <?php if( $the_post ) : ?>
    <div id="lebanon-topa">
        
        <div class="row text-center">
            <div class="col-sm-12">
                
                <h3 class="heading"><?php echo esc_attr( $the_post->post_title ); ?></h3>
                
                <p class="description">
                    <?php echo esc_html( wp_trim_words( $the_post->post_content, 40 ) ); ?>
                </p>
                
            </div>            
        </div>
        
        <div class="row text-center">
            <div class="col-sm-12">
                <a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><?php echo get_the_post_thumbnail( $post_id ); ?></a>
            </div>
        </div>        

    </div>
    
    <div class="clear"></div>
    <?php endif; ?>
    
    <?php if( get_theme_mod('homepage_widget_bool', 'on' ) == 'on' ) : ?>
    <div id="lebanon-topb">
        <?php get_sidebar('homepage'); ?>
    </div>
    
    <div class="clear"></div>
    <?php endif; ?>
    
    

    
    <?php
}

add_action( 'lebanon_homepage', 'lebanon_render_homepage' );


function lebanon_get_post_thumb( $post_id ) {
    
    if( $post_id == 'nopost' ) :
        return get_template_directory_uri() . '/inc/images/lebanon1.jpg';
    endif;
    
    if( has_post_thumbnail( $post_id ) ) :
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        return $img[0];
    endif;
    
}

function lebanon_render_tab_clicker() { ?>
    
    
    <div id="lebanon-jumbotron">
       
        

        <div id="lebanon-overlay-trigger" class="animated slideInLeft wow delay-long">

            <span class="<?php echo esc_attr( get_theme_mod( 'overlay_icon', 'fa fa-plus' ) ); ?> animated rotateIn delay3"></span>
            
        </div>


        
        
    </div>
    
<?php }
add_action( 'lebanon_tab_clicker', 'lebanon_render_tab_clicker' );

function lebanon_render_footer(){ ?>
    
    <div class="lebanon-footer" class="parallax-window" data-parallax="scroll" style="background-image: url(<?php echo esc_attr( get_theme_mod('footer_background_image', get_template_directory_uri() . '/inc/images/footer.jpg' ) ); ?>)">
        <div>
            <div class="row">
                <?php get_sidebar('footer'); ?>
            </div>            
        </div>

        
    </div>
    
    <div class="clear"></div>
    
    <div class="site-info">
        
        <div class="row">
            
            <div class="lebanon-copyright">
                <?php echo esc_html( get_theme_mod( 'copyright_text' ) ); ?>
            </div>
            
            <div id="authica-social">
                
                <?php if( get_theme_mod( 'facebook_url' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_url' ) ); ?>" target="_BLANK" class="lebanon-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'gplus_url' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'gplus_url' ) ); ?>" target="_BLANK" class="lebanon-gplus">
                    <span class="fa fa-google-plus"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'instagram_url' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_url' ) ); ?>" target="_BLANK" class="lebanon-instagram">
                    <span class="fa fa-instagram"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'linkedin_url' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url' ) ); ?>" target="_BLANK" class="lebanon-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'pinterest_url' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'pinterest_url' ) ); ?>" target="_BLANK" class="lebanon-pinterest">
                    <span class="fa fa-pinterest"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'twitter_url' ) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'twitter_url' ) ); ?>" target="_BLANK" class="lebanon-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <?php endif; ?>
                
            </div>

            <?php $menu = wp_nav_menu( array ( 
                'theme_location'    => 'footer', 
                'menu_id'           => 'footer-menu', 
                'menu_class'        => 'lebanon-footer-nav' ,

                ) ); ?>
            <br>

            <a href="https://smartcatdesign.net" rel="designer" style="display: block !important" class="rel">
                <?php _e( 'Design by' , 'lebanon' ); echo ' Smart' . 'cat'; ?>
                <img src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo_mini.png'?>"/>
            </a>
            
            
        </div>
        
        <div class="scroll-top alignright">
            <span class="fa fa-chevron-up"></span>
        </div>
        

        
    </div><!-- .site-info -->
    
    
<?php }
add_action( 'lebanon_footer', 'lebanon_render_footer' );

