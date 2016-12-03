<div id="lebanon-homepage-widget" data-parallax="scroll" style="background-image: url(<?php echo esc_url( get_theme_mod( 'homepage_widget_background', get_template_directory_uri() . '/inc/images/widget.jpg' ) ); ?>)">

    <div>
        <div class="row">
            <div class="widget-area">
            <?php
                if ( is_active_sidebar( 'sidebar-homepage' ) ) {
                    dynamic_sidebar( 'sidebar-homepage' );
                }else{
                    the_widget('WP_Widget_Recent_Posts');
                }
            ?>

            </div>
        </div>            
    </div>

</div>

