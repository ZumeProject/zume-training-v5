<?php
/*
Template Name: Three-Month Plan
*/

?>

<?php get_header(); ?>

<div id="content">

    <div id="inner-content">

        <div id="main" role="main">

            <div class="max-content-width grid-x grid-margin-x">
                <div class="cell center">
                    <h1 class="primary-color-text"><?php esc_html_e( 'Three-Month Plan', 'zume' ) ?></h1>
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

            <div class="large-8 medium-8 small-12 grid-margin-x cell" style="max-width: 900px; margin: 0 auto">

                <p><?php esc_attr_e( 'The Three Month Plan is part of the Session 9 training. It is designed to help you identify specific action steps post Zúme Training. Further instructions about the Three Month Plan are found in Session 9.', 'zume' ) ?></p>
                <p><?php esc_attr_e( 'You can connect your Three Month Plan to a group by adding the group key. Click on your group name below the "Link to a Group with a Group Key" field or check with your group leader to get the 5 digit code.', 'zume' ) ?></p>
                <p><?php esc_attr_e( 'If you have completed a live training event, you can use the group key your trainer gives you to connect your plan with your training group.', 'zume' ) ?></p>
                <hr>


            </div>

        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div><!-- end #content -->

<?php do_action( 'zume_movement_log_3mplan', [ 'language' => zume_current_language() ] ) ?>

<?php get_footer(); ?>
