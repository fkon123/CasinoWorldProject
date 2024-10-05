<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body class="bg-purple-900" <?php body_class(); ?>>
<header class="bg-purple-900 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl">Casino <span class="font-bold">World</span></h1>

        <nav>
            <ul class="flex space-x-6 text-lg">
                <li class="relative group">
                    <a href="#" class="inline-block">Online Casinos</a>

                    <ul class="absolute left-0 top-full hidden group-hover:block bg-white text-black rounded shadow-lg w-48 z-20">
                        <?php
                        global $wpdb;
                        $casino_menus = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}casino_entities");
                        foreach ($casino_menus as $casino_menu) {
                            echo '<li><a href="' . esc_url($casino_menu->url) . '" class="block px-4 py-2 hover:bg-gray-200">' . esc_html($casino_menu->name) . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="#">Slots</a></li>
                <li><a href="#">Software</a></li>
                <li><a href="#">Bonuses</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Blackjack</a></li>
                <li><a href="#">Roulette</a></li>
                <li><a href="#">Live Casino</a></li>
                <li><a href="#">Poker</a></li>
                <li><a href="#">Extra</a></li>
            </ul>
        </nav>
    </div>
</header>
