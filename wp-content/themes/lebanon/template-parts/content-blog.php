<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lebanon
 */
?>
<?php if (get_post_thumbnail_id($post->ID)) : 
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(500,500) );
    $image_url = esc_url( $image[0] );
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lebanon-blog-post reveal fadeIn'); ?> style='<?php echo get_post_thumbnail_id( $post->ID ) ? "background-image: url( $image_url )" : ""; ?>'>
    
    <div class="post-panel-content">
        
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <div class="meta-detail">

                        <div><span class="fa fa-calendar"></span> <?php echo lebanon_posted_on(); ?></div>

                        <div class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . esc_attr( get_the_author() ) : ' '; ?></div>

                    </div>

                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php // echo wp_trim_words(get_the_content(), 50); ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'lebanon'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            
        </footer><!-- .entry-footer -->
    </div>
    
    
</article><!-- #post-## -->
