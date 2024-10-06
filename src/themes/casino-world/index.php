<?php get_header(); ?>

<!-- Main Content -->
<div class="bg-primary-purple text-white py-20 relative z-1 overflow-x-hidden">

    <div class="relative overflow-hidden">

        <!-- Text Section -->
        <div class="py-4 relative z-10">
            <div class="container mx-auto text-center max-w-screen-md px-4 sm:px-6 md:px-8">
                <h2 class="text-4xl md:text-5xl font-bold text-primary-white leading-tight">
                    Best <span class="text-title-bold-purple">Online Casino</span> Guide
                </h2>
                <p class="mt-4 leading-relaxed">
                    Welcome to Casino World - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fermentum pharetra urna non faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed et sapien vel nisi venenatis pellentesque. Praesent vestibulum enim non tortor sagittis lacinia. Aenean sed euismod nibh, at tempor leo. Morbi malesuada consectetur sapien in bibendum.
                </p>
            </div>
        </div>

        <!-- Casino Cards Section -->
        <div class="container mx-auto py-12 relative z-10 px-4 sm:px-6 md:px-8">
            <div class="flex flex-wrap justify-center items-start space-y-6 sm:space-y-0 sm:space-x-2">
                <?php
                global $wpdb;

                $casinos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}casino_entities LIMIT 3");

                foreach ($casinos as $index => $casino) {
                    $is_enabled = $casino->is_enabled;

                    if ($is_enabled) {
                        $container_class = 'w-full sm:w-1/2 md:w-1/3 bg-primary-white text-active-card-bold-title shadow-lg rounded-lg p-6 transform relative';
                        $great_offer_image = '<div class="relative block mt-4">
                            <img src="' . get_template_directory_uri() . '/images/GreatOffer/GreatOffer.png" alt="Great Offer" class="absolute top-10 w-32 h-16">
                        </div>';
                        $activate_button = '<a href="' . esc_url($casino->url) . '" class="mt-6 inline-block px-6 py-2 bg-active-btn-bg hover:bg-active-btn-bg-hover text-white font-bold rounded-full">Activate Bonus</a>';
                    } else {
                        $container_class = 'w-full sm:w-1/2 md:w-1/4 bg-cards-purple text-white rounded-lg p-6 relative';
                        $great_offer_image = '';
                        $activate_button = '<a href="' . esc_url($casino->url) . '" class="mt-6 inline-block px-6 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded-full">Activate Bonus</a>';
                    }
                ?>
                    <div class="<?php echo $container_class; ?>">
                        <div class="flex items-center relative">
                          
                            <img src="<?php echo get_template_directory_uri() . esc_url($casino->image_url); ?>" alt="<?php echo esc_attr($casino->name); ?>" class="mb-4 h-20 w-20 mr-4">

                    
                            <div>
                                <h3 class="text-xl font-bold"><?php echo esc_html($casino->name); ?></h3>
                                <p class="text-sm text-gray-500 mt-1"><?php echo esc_html($casino->code); ?></p>
                            </div>
                        </div>
                        <hr class="border-t-2 border-black opacity-15 my-4">

                        <!-- Star rating -->
                        <span class="absolute top-4 right-4 text-white rounded-full px-2 py-1 text-sm font-bold">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Star/Star.png" alt="Star" class="inline-block h-4 w-4 mr-1">
                            <?php echo esc_html($casino->rating); ?>
                        </span>

                        <?php echo $great_offer_image; ?>

                        <div class="my-6 text-center">
                            <span class="block text-purple-500 text-lg font-bold"><?php echo esc_html($casino->bonus_percent); ?>% up to</span>
                            <span class="block text-4xl font-extrabold text-gray-900">£<?php echo esc_html($casino->bonus_amount_limit); ?></span>
                            <span class="text-xs text-gray-400 mt-2">---------------</span>
                            <p class="text-xs text-gray-400 mt-2">T&C</p>
                        </div>

                        <p class="mt-4 text-gray-300 text-center">
                            <?php 
                                $truncated_description = substr(esc_html($casino->description), 0, 80);
                                echo $truncated_description . '...';
                            ?>
                        </p>

                        <div class="text-center">
                            <?php echo $activate_button; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

</div>

<?php get_footer(); ?>
