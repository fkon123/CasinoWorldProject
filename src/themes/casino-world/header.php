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
                $casino_entities_table = $wpdb->prefix . 'casino_entities';
                $casino_entities = $wpdb->get_results("SELECT * FROM {$casino_entities_table}");

                foreach ($casino_entities as $casino_entity) {
                    $casino_url = esc_url($casino_entity->url);
                    $casino_name = esc_html($casino_entity->name);

                    echo '<li><a href="' . $casino_url . '" class="block px-4 py-2 hover:bg-gray-200">' . $casino_name . '</a></li>';
                }
                ?>
            </ul>
        </li>

        <?php
        $casino_menus_table = $wpdb->prefix . 'navbar_items';
        $casino_menus = $wpdb->get_results("SELECT * FROM {$casino_menus_table}");

        foreach ($casino_menus as $casino_menu) {
            $menu_url = esc_url($casino_menu->url);
            $menu_title = esc_html($casino_menu->title);

            echo '<li><a href="' . $menu_url . '">' . $menu_title . '</a></li>';
        }
        ?>
    </ul>
</nav>


    </div>
</header>
