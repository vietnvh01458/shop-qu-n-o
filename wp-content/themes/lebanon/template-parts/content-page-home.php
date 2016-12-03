<!-- Content Page Home -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



    <div class="entry-content">


        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header><!-- .entry-header -->



        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'lebanon'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        edit_post_link(
                sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__('Edit %s', 'lebanon'), the_title('<span class="screen-reader-text">"', '"</span>', false)
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->



</article><!-- #post-## -->