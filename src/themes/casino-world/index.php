<!-- Ellipse -->
<div class="absolute" style="top: -105px; left: 155px; width: 598px; height: 598px; background: linear-gradient(180deg, #69458E 0%, #462667 100%); opacity: 0.7; border-radius: 50%;"></div>

<?php get_header(); ?>

<div class="bg-purple-900 text-white py-12">

    <div class="relative" style="overflow: hidden;">
    
        
        <div class="py-12 relative z-10">
            <div class="container mx-auto text-center">
                <h2 class="text-5xl font-bold">Best <span class="text-pink-500">Online Casino</span> Guide</h2>
                <p class="mt-4">Welcome to Casino World - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fermentum pharetra urna non faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed et sapien vel nisi venenatis pellentesque. Praesent vestibulum enim non tortor sagittis lacinia. Aenean sed euismod nibh, at tempor leo. Morbi malesuada consectetur sapien in bibendum.</p>
            </div>
        </div>

        <div class="container mx-auto py-12 relative z-10">
            <div class="flex justify-center items-start space-x-6">
                <?php
                global $wpdb;

                $casinos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}casino_entities LIMIT 3");

                foreach ($casinos as $index => $casino) {
                    // TODO: If a casino is_enabled, disable all other casinos
                    $is_enabled = $casino->is_enabled;
                
                    if ($is_enabled) {
                        // Add logic for when the casino is enabled
                        $container_class = 'w-1/3 bg-white text-black shadow-lg rounded-lg p-6 transform scale-110';
                        $great_offer_image = '<div class="relative block mt-4">
                        <img src="' . get_template_directory_uri() . '/images/GreatOffer/GreatOffer.png" alt="Great Offer" class="absolute -top-6 -left-6 w-12 h-12">
                    </div>';
                    } else {

                        $container_class = 'w-1/4 bg-purple-800 text-white rounded-lg p-6';
                        $great_offer_image = '';
                    }
                    ?>
                    <div class="<?php echo $container_class; ?>">
                        <div class="text-center">
                        <?php echo $great_offer_image; ?>
                            <img src="<?php echo get_template_directory_uri() . esc_url( $casino->image_url ); ?>" alt="<?php echo esc_attr($casino->name); ?>" class="mx-auto mb-4 h-20 w-20 rounded-full">
                            <h3 class="text-xl font-bold"><?php echo esc_html($casino->name); ?></h3>
                            <p class="mt-4 text-gray-300"><?php echo esc_html($casino->description); ?></p>
                            <a href="<?php echo esc_url($casino->url); ?>" class="mt-6 inline-block px-6 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded-full">Activate Bonus</a>
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


</body>
</html>