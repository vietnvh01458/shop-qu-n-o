<div id="lebanon-overlay" class="widget-area">
    
    <?php
    
    if ( is_active_sidebar( 'sidebar-overlay' ) ) {
         dynamic_sidebar( 'sidebar-overlay' );
    }else{
        the_widget('WP_Widget_Recent_Posts');
    }
    
    ?>
</div>
