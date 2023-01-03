<?php
/*
Template Name: Zume Groups
*/
?>

<?php get_header(); ?>


    <div id="content">

        <div id="inner-content">

            <div id="main" role="main">

                <div class="max-content-width grid-x grid-margin-x">
                    <div class="cell center">
                        <h1 class="primary-color-text"><?php esc_html_e( 'Groups', 'zume' ) ?></h1>
                    </div>

                    <div class="cell">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                                the_content();
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>

            </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div><!-- end #content -->

<?php get_footer(); ?>
