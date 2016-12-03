<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lebanon
 */
?>

<?php if (get_post_thumbnail_id($post->ID)) : ?>
    <div id="lebanon-page-jumbotron" class="parallax-window table-display" data-parallax="scroll" style="background-image: url(<?php echo esc_url( wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ); ?>)" >
        <div class="overlay"></div>
        
        <div class="cell-display">
            <div class="row">
                <div class="col-sm-12">
                    <header class="entry-header">
                        <?php lebanon_entry_footer(); ?>
                        <?php the_title('<h1 class="text-left entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->                
                </div>
            </div>
        </div>


    </div>
<?php endif; ?>

<div class="row">
    
    <?php get_sidebar('left'); ?>
    
    <div class="col-sm-<?php echo esc_attr( lebanon_main_width() ); ?>">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-meta">
                    <div class="meta-detail">

                        <div><span class="fa fa-calendar"></span> <?php echo lebanon_posted_on(); ?></div>

                        <div class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . esc_attr( get_the_author() ) : ' '; ?></div>

                        <div><?php echo get_comments_number() == 0 ? '<span class="fa fa-comment"></span> ' . __('No comments yet', 'lebanon') : '<span class="fa fa-comment"></span> ' . esc_attr( get_comments_number() ) . ' Comments'; ?></div>


                    </div>

                </div><!-- .entry-meta -->

            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'lebanon'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php the_post_navigation(); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </article><!-- #post-## -->

    </div>
    
    <?php get_sidebar(); ?>

</div>