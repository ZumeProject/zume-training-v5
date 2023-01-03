<?php
/*
Template Name: Zume Get A Coach
*/
?>

<?php get_header(); ?>


<div id="content">

    <div id="inner-content">

        <div id="main" role="main">

            <div class="max-content-width grid-x grid-margin-x">
                <div class="cell center">
                    <h1 class="primary-color-text"><?php esc_html_e( 'Get a Coach', 'zume' ) ?></h1>
                </div>

                <div class="cell" id="form-container"></div>

            </div>

        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div><!-- end #content -->

<script>
    jQuery(document).ready(function(){
        jQuery('#coach-request').html(`

        `)
    })
</script>

<?php get_footer(); ?>
