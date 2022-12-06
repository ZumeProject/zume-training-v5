<?php
// Register menus
register_nav_menus(
    array(
        'main-nav' => __( 'The Main Menu', 'zume' ),   // Main nav in header
    )
);

// The Top Menu
function zume_top_nav() {
    wp_nav_menu(array(
         'container' => false,                           // Remove nav container
         'menu_class' => 'vertical medium-horizontal menu',       // Adding custom nav class
         'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
         'theme_location' => 'main-nav',                 // Where it's located in the theme
         'depth' => 5,                                   // Limit the depth of the nav
         'fallback_cb' => false,                         // Fallback function (see below)
         'walker' => new Zume_Topbar_Menu_Walker()
    ));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Zume_Topbar_Menu_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Off Canvas Menu
function zume_off_canvas_nav() {
    wp_nav_menu(array(
         'container' => false,                           // Remove nav container
         'menu_class' => 'vertical menu top-padding is-active',       // Adding custom nav class
         'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true" aria-expanded="true">%3$s</ul>',
         'theme_location' => 'main-nav',                 // Where it's located in the theme
         'depth' => 5,                                   // Limit the depth of the nav
         'fallback_cb' => false,                         // Fallback function (see below)
         'walker' => new Zume_Off_Canvas_Menu_Walker()
    ));
}

class Zume_Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"vertical is-active menu\">\n";
    }
}

function zume_required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'zume_required_active_nav_class', 10, 2 );
