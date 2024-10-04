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


