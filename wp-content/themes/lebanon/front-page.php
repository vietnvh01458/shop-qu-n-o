<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lebanon
 */
get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main frontpage-main" role="main">

        <?php $front = get_option('show_on_front'); ?>
        
        <?php if( $front != 'posts' ) : ?>
        <?php do_action('lebanon_tab_clicker'); ?>
        <?php do_action('lebanon_homepage'); ?>
        <?php else : ?>
        <?php do_action('lebanon_tab_clicker'); ?>
        <?php endif; ?>
        
        <div class="row">
            
            <?php //get_sidebar('left'); ?>

            <div class="<?php echo $front == 'posts' ? 'frontpage-blog' : ''; ?> homepage-page-content col-sm-12">
                
                <?php if (have_posts()) : ?>

                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    

                    <?php echo $front == 'posts' ? '<div class="lebanon-blog-content">' : ''; ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        if ('posts' == get_option('show_on_front')) :
                            get_template_part('template-parts/content-blog', get_post_format());
                        else:
                            get_template_part('template-parts/content-page-home', get_post_format());
                        endif;
                        ?>

                    <?php endwhile; ?>
                    <?php echo $front == 'posts' ? '</div>' : ''; ?>
                    <div class="lebanon-pagination">
                        <?php echo paginate_links(); ?>
                    </div>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>

            </div>

            <?php //get_sidebar(); ?>

        </div>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>        