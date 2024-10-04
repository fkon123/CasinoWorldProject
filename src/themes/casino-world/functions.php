<?php
function casino_world_register_admin_page() {
    add_menu_page(
        'Casino World Admin',              // Page title
        'Casino World Admin',              // Menu title
        'manage_options',                  // Capability
        'casino-world-admin-page',         // Menu slug (used in URL)
        'casino_world_admin_page_content', // Function to call
        '',                                // Icon URL (optional)
        23                                // Position in menu
    );
}
add_action('admin_menu', 'casino_world_register_admin_page');

function casino_world_admin_page_content() {
    require_once get_template_directory() . '/casino-world-admin.php';
}


function casino_world_enqueue_scripts() {
    wp_enqueue_style('casino-world-tailwind', get_template_directory_uri() . '/output.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'casino_world_enqueue_scripts');

function casino_world_enqueue_admin_styles() {
    wp_enqueue_style('tailwindcss-admin', get_template_directory_uri() . '/output.css', array(), '1.0.0', 'all');
}
add_action('admin_enqueue_scripts', 'casino_world_enqueue_admin_styles');


add_filter('show_admin_bar', '__return_false');





