<?php
/*
Plugin Name: Casino World Admin
Description: Handling custom DB tables for casino menu & casino entities
Version: 1.0.0
Author: Fil123
*/

function create_custom_tables() {

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $casino_menu_table = $wpdb->prefix . 'casino_menu';
    $casino_entities_table = $wpdb->prefix . 'casino_entities';

    $casino_menu_table_script = "CREATE TABLE IF NOT EXISTS `$casino_menu_table` (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    $casino_entities_table_script = "CREATE TABLE IF NOT EXISTS `$casino_entities_table` (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        rating FLOAT NOT NULL,
        code VARCHAR(255) NOT NULL,
        bonus VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        imageurl VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    $create_script_list = array($casino_menu_table_script, $casino_entities_table_script);

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($create_script_list);
}

register_activation_hook(__FILE__, 'create_custom_tables');
