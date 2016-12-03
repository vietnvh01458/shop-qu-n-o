<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lebanon
 */
get_header();
?>


<div id="primary" class="content-area">

    <main id="main" class="site-main lebanon-blog-page" role="main">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'lebanon'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </div>
            
        </div>
        
        <div class="row">

            <?php get_sidebar('left'); ?>

            <div class="lebanon-blog-content col-sm-<?php echo esc_attr( lebanon_main_width() ); ?>">
                <?php if (have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/content-blog', get_post_format()); ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
        <div class="clear"></div>
        <div class="lebanon-pagination">
            <?php echo paginate_links(); ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>