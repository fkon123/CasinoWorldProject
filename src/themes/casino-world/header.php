<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body class="font-montserrat" <?php body_class(); ?>>
<header class="bg-primary-purple text-primary-white py-8">
    <div class="container mx-auto flex justify-between items-center">

    <img src="<?php echo get_template_directory_uri(); ?>/images/Logo/Logo.svg" alt="Logo Casino World" class="pl-8">
        <nav>
            <ul class="flex space-x-6 text-lg">
                <?php
                // Fetch navigation items from the navbar_items table
                global $wpdb;
                $casino_menus_table = $wpdb->prefix . 'navbar_items';
                $casino_menus = $wpdb->get_results("SELECT * FROM {$casino_menus_table}");

                foreach ($casino_menus as $casino_menu) {
                    $menu_url = esc_url($casino_menu->url);
                    $menu_title = esc_html($casino_menu->title);

                    if (strtolower($menu_title) === 'online casinos') {
                        echo '<li class="relative group">';
                        echo '<a href="' . $menu_url . '" class="inline-block">' . $menu_title;
                        // Add the arrow image
                        echo '<img src="' . get_template_directory_uri() . '/images/Arrow/Arrow.png" class="inline-block ml-2" alt="Dropdown Arrow" style="width:12px; height:auto;">';
                        echo '</a>';

                        echo '<ul class="absolute left-0 top-full hidden group-hover:block bg-white text-black rounded shadow-lg w-48 z-20">';

                        $casino_entities_table = $wpdb->prefix . 'casino_entities';
                        $casino_entities = $wpdb->get_results("SELECT * FROM {$casino_entities_table}");

                        foreach ($casino_entities as $casino_entity) {
                            $casino_url = esc_url($casino_entity->url);
                            $casino_name = esc_html($casino_entity->name);
                            echo '<li><a href="' . $casino_url . '" class="block px-4 py-2 hover:bg-gray-200">' . $casino_name . '</a></li>';
                        }

                        echo '</ul>';
                        echo '</li>';
                    } else {
                        echo '<li><a href="' . $menu_url . '">' . $menu_title . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
