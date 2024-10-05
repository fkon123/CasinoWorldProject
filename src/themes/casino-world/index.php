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

                    $is_featured = $index === 1;
                    ?>
                    <div class="<?php echo $is_featured ? 'w-1/3 bg-white shadow-lg rounded-lg p-6 transform scale-110' : 'w-1/4 bg-purple-800 text-white rounded-lg p-6'; ?>">
                        <div class="text-center">
                        <img src="' . get_template_directory_uri() . '/images/Arrow/Arrow.png" class="inline-block ml-2" alt="Dropdown Arrow" style="width:12px; height:auto;">
                            <img src="<?php echo esc_url($casino->imageurl); ?>" alt="<?php echo esc_attr($casino->name); ?>" class="mx-auto mb-4 h-20 w-20 rounded-full">
                            <h3 class="text-xl font-bold"><?php echo esc_html($casino->name); ?></h3>
                            <p class="mt-2 text-sm"><?php echo esc_html($casino->bonus); ?></p>
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