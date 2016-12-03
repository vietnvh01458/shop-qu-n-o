<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lebanon
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if (get_post_thumbnail_id($post->ID)) : ?>
        <div id="lebanon-posts-image">

            <a href="<?php echo esc_url( get_the_permalink() ); ?>"> 
                <?php echo the_post_thumbnail('large'); ?>
            </a> 

        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <div class="meta-detail">

                    <span><span class="fa fa-calendar"></span> <?php echo lebanon_posted_on(); ?></span>

                    <span class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . esc_attr( get_the_author() ) : ' '; ?></span>

                    <span><?php echo get_comments_number() == 0 ? '<span class="fa fa-comment"></span> ' . __('No comments yet', 'lebanon') : esc_attr( get_comments_number() ) . ' Comments'; ?></span>

                    <span><?php lebanon_entry_footer(); ?></span>

                </div>

            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php echo wp_trim_words( get_the_content(), 50 ); ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'lebanon'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    
    <?php if ('post' === get_post_type()) : ?>
    <div class="continue-reading">
        <a class="lebanon-button primary" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php _e( 'Continue Reading', 'lebanon' ); ?></a>
    </div>
    <?php endif; ?>

    <footer class="entry-footer">
        <?php //lebanon_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
