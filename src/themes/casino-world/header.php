<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body class="font-montserrat overflow-x-hidden" <?php body_class(); ?>>

<header class="bg-primary-purple text-primary-white py-8 relative z-10">

    <!-- Ellipse Background - Keep this inside the header but behind the logo and nav -->
    <div class="absolute" style="top: -105px; left: 155px; width: 598px; height: 598px; background: linear-gradient(180deg, #69458E 0%, #462667 100%); opacity: 0.7; border-radius: 50%; z-index: 0;"></div>

    <!-- Header Content Container -->
    <div class="container mx-auto flex justify-between items-center relative z-10 px-4 sm:px-6 md:px-8">
        <!-- Logo Section -->
        <div class="flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Logo/Logo.svg" alt="Logo Casino World" class="h-6">
        </div>

        <!-- Navigation Menu -->
        <nav>
            <ul class="flex flex-wrap space-y-2 sm:space-y-0 sm:space-x-6 text-lg">
                <?php
                global $wpdb;
                $casino_menus_table = $wpdb->prefix . 'navbar_items';
                $casino_menus = $wpdb->get_results("SELECT * FROM {$casino_menus_table}");

                foreach ($casino_menus as $casino_menu) {
                    $menu_url = esc_url($casino_menu->url);
                    $menu_title = esc_html($casino_menu->title);

                    if (strtolower($menu_title) === 'online casinos') {
                        echo '<li class="relative group">';
                        echo '<a href="' . $menu_url . '" class="inline-flex items-center">' . $menu_title;
                        echo '<img src="' . get_template_directory_uri() . '/images/Arrow/Arrow.png" class="inline-block ml-2" alt="Dropdown Arrow" style="width:12px; height:auto;">';
                        echo '</a>';
                        echo '<ul class="absolute left-0 top-full hidden group-hover:block bg-white text-black rounded shadow-lg w-48 z-20 mt-2">';
                        
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
                        echo '<li><a href="' . $menu_url . '" class="inline-block hover:text-gray-300 transition-colors duration-300">' . $menu_title . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

<?php wp_footer(); ?>
</body>
</html>
