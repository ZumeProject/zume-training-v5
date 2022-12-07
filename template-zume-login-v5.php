<?php
/*
Template Name: Zume Login v5
*/

$zume_current_lang = zume_current_language();
$user = wp_get_current_user();
?>

<?php get_header(); ?>

<div id="content" class="grid-x grid-padding-x"><div class="cell">

        <div id="inner-content">

            <!-- Challenge -->
            <div class="grid-x grid-margin-x">
                <div class="medium-2 small-1 cell"></div>
                <div class="medium-8 small-10 cell center">
                    <h1 class="primary-color-text">
                        <strong><?php esc_html_e( 'Login', 'zume' ) ?></strong>
                    </h1>
                </div>
                <div class="medium-2 small-1 cell"></div>
            </div>

            <div class="grid-x ">
                <div class="large-2 cell"></div>
                <div class="large-8 small-12 cell">

                    <?php do_shortcode('[disciple_tools_login_widget]') ?>

                </div>
                <div class="large-2 cell"></div>
            </div>

        </div> <!-- end #inner-content -->

    </div> <!-- cell -->
</div> <!-- content -->

<?php get_footer(); ?>
