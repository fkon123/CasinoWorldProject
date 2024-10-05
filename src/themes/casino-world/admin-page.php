<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!current_user_can('manage_options')) {
    return;
}

global $wpdb;


if (isset($_POST['submit_menu'])) {
    $menu_name = sanitize_text_field($_POST['menu_name']);
    $menu_url = esc_url($_POST['menu_url']);
    $table_name = $prefix . 'navbar_items';
    $wpdb->insert(
        $table_name,
        array(
            'title' => $menu_name,
            'url' => $menu_url
        ),
        array(
            '%s',
            '%s'
        )
    );
    echo '<div class="updated"><p>Menu item added successfully!</p></div>';
}

if (isset($_POST['submit_entity'])) {
    $casino_name = sanitize_text_field($_POST['casino_name']);
    $casino_rating = floatval($_POST['casino_rating']);
    $casino_code = sanitize_text_field($_POST['casino_code']);
    $casino_bonus_percent = intval($_POST['casino_bonus_percent']);
    $casino_bonus_amount_limit = intval($_POST['casino_bonus_amount_limit']);
    $casino_is_enabled = isset($_POST['casino_is_enabled']) ? 1 : 0;
    $casino_url = esc_url($_POST['casino_url']);
    $casino_imageurl = esc_url($_POST['casino_imageurl']);
    $casino_description = sanitize_textarea_field($_POST['casino_description']);
    $casino_review = sanitize_textarea_field($_POST['casino_review']);

    $table_name = $prefix . 'casino_entities';

    $wpdb->insert(
        $table_name,
        array(
            'name' => $casino_name,
            'rating' => $casino_rating,
            'code' => $casino_code,
            'bonus_percent' => $casino_bonus_percent,
            'bonus_amount_limit' => $casino_bonus_amount_limit,
            'is_enabled' => $is_enabled,
            'url' => $casino_url,
            'image_url' => $casino_imageurl,
            'description' => $casino_description,
            'review_text' => $casino_review
        ),
        array(
            '%s', 
            '%f',
            '%s',
            '%d',
            '%d',
            '%d',
            '%s',
            '%s',
            '%s',
            '%s'
        )
    );
    echo '<div class="updated"><p>Casino entity added successfully!</p></div>';
}

?>


<h1 class="text-3xl font-bold mb-5">Casino World Admin Page</h1>
<div class="wrap max-w-3xl mx-auto">

    <form method="post" action="" class="space-y-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Add New Menu Item</h2>
            <div class="mb-4">
                <label for="menu_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="menu_name" id="menu_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="menu_url" class="block text-gray-700 text-sm font-bold mb-2">URL:</label>
                <input type="text" name="menu_url" id="menu_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" name="submit_menu" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Menu Item</button>
        </div>
    </form>

    <form method="post" action="" class="space-y-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Add New Casino Entity</h2>
            <div class="mb-4">
                <label for="casino_name" class="block text-gray-700 text-sm font-bold mb-2">Casino Name:</label>
                <input type="text" name="casino_name" id="casino_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                <input type="number" step="0.1" name="casino_rating" id="casino_rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_code" class="block text-gray-700 text-sm font-bold mb-2">Code:</label>
                <input type="text" name="casino_code" id="casino_code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_bonus_percent" class="block text-gray-700 text-sm font-bold mb-2">Bonus Percent:</label>
                <input type="number" name="casino_bonus_percent" id="casino_bonus_percent" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_bonus_amount_limit" class="block text-gray-700 text-sm font-bold mb-2">Bonus Amount Limit:</label>
                <input type="number" name="casino_bonus_amount_limit" id="casino_bonus_amount_limit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_is_enabled" class="block text-gray-700 text-sm font-bold mb-2">Is Enabled:</label>
                <input type="checkbox" name="casino_is_enabled" id="casino_is_enabled" class="leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="casino_url" class="block text-gray-700 text-sm font-bold mb-2">Casino URL:</label>
                <input type="text" name="casino_url" id="casino_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_imageurl" class="block text-gray-700 text-sm font-bold mb-2">Image URL:</label>
                <input type="text" name="casino_imageurl" id="casino_imageurl" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="casino_description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="casino_description" id="casino_description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <div class="mb-4">
                <label for="casino_review" class="block text-gray-700 text-sm font-bold mb-2">Review Text:</label>
                <textarea name="casino_review"
                id="casino_review" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <button type="submit" name="submit_entity" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Casino</button>
        </div>
    </form>
</div>

