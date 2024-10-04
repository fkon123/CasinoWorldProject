<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino World</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav>
        <h1  class="bg-blue-500">Casino World</h1>
    </nav>
</header>
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

