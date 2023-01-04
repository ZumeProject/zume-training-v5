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
        _ = _ || window.lodash
        jQuery('#form-container').html(`
             <div class="grid-x grid-padding-x" >
                <dv class="cell medium-6">
                    <i class="fi-torsos-all secondary-color" style="font-size:4em; vertical-align: middle;"></i>
                    &nbsp;<span class="coach-title">${_.escape( i18n.str.x62 )/*Coaches*/}</span>
                    <p class="coach-body">${_.escape( i18n.str.x63 )/*Our network of volunteer coaches are people like you, people who are passionate about loving God, loving others, and obeying the Great Commission.*/}</p>
                </dv>

                <div class="cell medium-6">
                    <i class="fi-compass secondary-color" style="font-size:4em; vertical-align: middle;"></i>
                    &nbsp;<span class="coach-title">${_.escape( i18n.str.x64 )/*Advocates*/}</span>
                    <p class="coach-body">${_.escape( i18n.str.x65 )/*A coach is someone who will come alongside you as you implement the Zúme tools and training.*/}</p>
                </div>

                <div class="cell medium-6">
                    <i class="fi-map secondary-color" style="font-size:4em; vertical-align: middle;"></i>
                    &nbsp;<span class="coach-title">${_.escape( i18n.str.x66 )/*Local*/}</span>
                    <p class="coach-body">${_.escape( i18n.str.x67 )/*On submitting this request, we will do our best to connect you with a coach near you.*/}</p>
                </div>

                <div class="cell medium-6">
                    <i class="fi-dollar secondary-color coach-icon" style="font-size:4em; vertical-align: middle;"></i>
                    &nbsp;<span class="coach-title">${_.escape( i18n.str.x68 )/*It's Free*/}</span>
                    <p class="coach-body">${_.escape( i18n.str.x69 )/*Coaching is free. You can opt out at any time.*/}</p>
                </div>
            </div>
            <hr>
            <div class="grid-x">
                <div class="cell center">
                    <button type="button" id="send_coach_request" class="button">Get a Coach</button>
                </div>
            </div>
        `)

        jQuery('#send_coach_request').on('click', function() {
            window.api_remote_post('jwt-auth/v1/token/validate')
                .done(function(data){
                    console.log(data)
                })
        })
    })
</script>

<?php get_footer(); ?>
