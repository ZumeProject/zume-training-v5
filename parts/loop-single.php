<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <section class="entry-content" itemprop="articleBody">
        <?php the_post_thumbnail( 'full' ); ?>
        <?php the_content(); ?>
    </section> <!-- end article section -->

    <footer class="article-footer">
        <?php wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zume' ),
            'after'  => '</div>'
        ) ); ?>
        <p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'zume' ) . '</span> ', ', ', '' ); ?></p>
    </footer> <!-- end article footer -->

    <?php comments_template(); ?>

</article> <!-- end article -->
