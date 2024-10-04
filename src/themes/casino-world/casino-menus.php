<div>
    <?php
    global $wpdb;
    $casinos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}casino_entities");
    foreach ($casinos as $casino) {
        ?>
        <div>
            <img src="<?php echo esc_url($casino->image_url); ?>" alt="<?php echo esc_attr($casino->name); ?>">
            <h2><?php echo esc_html($casino->name); ?></h2>
            <p><?php echo esc_html($casino->bonus); ?></p>
            <p><?php echo esc_html($casino->description); ?></p>
            <a href="<?php echo esc_url($casino->url); ?>">Activate Bonus</a>
        </div>
        <?php
    }
    ?>
</div>