<?php
/*
Template Name: Zume Course
*/

$session_id = 1;
if ( isset( $_GET['session'] ) ) {
    $session_id = sanitize_text_field( wp_unslash( $_GET['session'] ) );
}
$group = false;
$members = 1;
if ( isset( $_GET['group'] ) ) {

}

?>

<?php get_header(); ?>

<?php do_action( 'zume_movement_log_course', [
    'language' => zume_current_language(),
    'session' => $session_id,
    'members' => $members
] ) ?>

<?php get_footer(); ?>
