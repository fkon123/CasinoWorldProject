<?php
/*
Plugin Name: Casino World Admin
Description: Handling custom DB tables for casino menus & casino entities
Version: 1.0.0
Author: Fil123
*/

function create_custom_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    //TODO: Define custom prefix globally
    //define('DB_CUSTOM_PREFIX', 'casino_world_');
    $navbar_items_table = $wpdb->prefix . 'navbar_items';
    $casino_entities_table = $wpdb->prefix . 'casino_entities';

    // Drop tables if they exist
    $wpdb->query("DROP TABLE IF EXISTS `$navbar_items_table`;");
    $wpdb->query("DROP TABLE IF EXISTS `$casino_entities_table`;");

    // Create the tables
    $navbar_items_table_script = "CREATE TABLE IF NOT EXISTS `$navbar_items_table` (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    $casino_entities_table_script = "CREATE TABLE IF NOT EXISTS `$casino_entities_table` (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        code VARCHAR(255) NOT NULL,
        rating FLOAT NOT NULL,
        bonus_percent INT NOT NULL,
        bonus_amount_limit INT NOT NULL,
        is_enabled BOOLEAN NOT NULL,
        description TEXT NOT NULL,
        review_url VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    dbDelta($navbar_items_table_script);
    dbDelta($casino_entities_table_script);

    insert_dummy_data($navbar_items_table, $casino_entities_table);
}

// Function to insert dummy data
function insert_dummy_data($navbar_items_table, $casino_entities_table) {
    global $wpdb;

    // Insert dummy data for navbar items
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Online Casinos',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Slots',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Software',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Bonuses',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'News',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Blackjack',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Roulette',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Live Casino',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Poker',
        'url' => '#'
    ));
    $wpdb->insert($navbar_items_table, array(
        'title' => 'Extra',
        'url' => '#'
    ));

    // Insert dummy data for casino entities
    $wpdb->insert($casino_entities_table, array(
        'name' => 'Paddypower Casino',
        'code' => 'L1160657W000330',
        'rating' => 4.9,
        'bonus_percent' => 100,
        'bonus_amount_limit' => 500,
        'is_enabled' => true,
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'review_url' => '#',
        'url' => '#',
        'image_url' => 'https://example.com/images/casinoa.jpg'
    ));
    $wpdb->insert($casino_entities_table, array(
        'name' => 'Unibet Casino',
        'code' => 'L1160657W000330',
        'rating' => 4.9,
        'bonus_percent' => 100,
        'bonus_amount_limit' => 500,
        'is_enabled' => false,
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'review_url' => '#',
        'url' => '#',
        'image_url' => 'https://example.com/images/casinob.jpg'
    ));
    $wpdb->insert($casino_entities_table, array(
        'name' => 'Betano Casino',
        'code' => 'L1160657W000330',
        'rating' => 4.9,
        'bonus_percent' => 100,
        'bonus_amount_limit' => 500,
        'is_enabled' => false,
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'review_url' => '#',
        'url' => '#',
        'image_url' => 'https://example.com/images/casinob.jpg'
    ));
}

register_activation_hook(__FILE__, 'create_custom_tables');
