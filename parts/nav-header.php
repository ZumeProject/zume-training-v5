<!-- By default, this menu will use off-canvas for small
     and a topbar for medium-up -->

<?php
$zume_is_logged_in = is_user_logged_in();
?>

<div class="grid-x top-bar" id="top-bar">

    <!-- Desktop-->
    <div class="cell small-3 hide-for-small show-for-large">
        <a href="<?php echo esc_url( zume_home_url() ) ?>">
            <div class="zume-logo-in-top-bar"></div>
        </a>
    </div>
    <div class="cell small-6 hide-for-small show-for-large center" id="top-full-menu-div-wrapper">
        <div id="top-full-menu-div">
            <?php zume_top_nav(); ?>
        </div>
    </div>
    <div class="cell small-3 hide-for-small show-for-large" >
        <div style="width:50px; float:right; padding: 5px;">
            <?php do_shortcode('[zume_logon_button]' ); ?>
        </div>
        <div style="width:120px; float:right; padding:10px;">
            <a href="javascript:void(0)" data-open="language-menu-reveal"><img alt="language" src="<?php echo esc_url( zume_images_uri() ) ?>language.svg" style="width:15px;height:15px;" /> <?php esc_html_e( "Language", 'zume' ) ?></a>
        </div>
    </div>

    <!-- Mobile -->
    <div class="cell small-4 show-for-small hide-for-large" id="top-logo-div">
        <a href="<?php echo esc_url( zume_home_url() ) ?>">
            <div class="zume-logo-in-top-bar"></div>
        </a>
    </div>
    <div class="cell small-4 show-for-small hide-for-large center" >
        <div>
            <a href="javascript:void(0)" data-open="language-menu-reveal"><img alt="language" src="<?php echo esc_url( zume_images_uri() ) ?>language.svg" style="width:15px;height:15px;" /> <?php esc_html_e( "Language", 'zume' ) ?></a>
        </div>
    </div>
    <div class="cell small-4 show-for-small hide-for-large" id="top-mobile-menu-div">
        <div class="mobile-menu" style="width:50px; float:right;">
            <a data-toggle="off-canvas" style="cursor:pointer; float: right; font-size: 32px;"><img src="<?php echo esc_url( zume_images_uri() . 'hamburger.svg' ) ?>" alt="menu" /></a>
        </div>
    </div>

</div>
