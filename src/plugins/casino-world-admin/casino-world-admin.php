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

    //TODO = define custom prefix globally!
    //define('DB_CUSTOM_PREFIX', 'casino_world_');
    $navbar_items_table = $wpdb->prefix . 'navbar_items';
    $casino_entities_table = $wpdb->prefix . 'casino_entities';

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
        great_offer BOOLEAN NOT NULL,
        description TEXT NOT NULL,
        review_text TEXT NOT NULL,
        url VARCHAR(255) NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    //TODO dbDelta can take array of queries but it didn't work for me
    dbDelta($navbar_items_table_script);
    dbDelta($casino_entities_table_script);
}

register_activation_hook(__FILE__, 'create_custom_tables');