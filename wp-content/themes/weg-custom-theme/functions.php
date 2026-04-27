<?php
function weg_custom_theme_setup() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'weg-custom-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'weg_custom_theme_setup' );

function weg_custom_theme_enqueue_styles() {
    wp_enqueue_style( 'weg-custom-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'weg_custom_theme_enqueue_styles' );

// Remove website field from comment form
function weg_remove_comment_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'weg_remove_comment_fields');
