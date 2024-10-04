<?php
// Security check to prevent unauthorized access
if (!defined('ABSPATH')) {
    exit;
}

if (!current_user_can('manage_options')) {
    return;
}
?>

<div class="wrap">
    <h1 class="bg-blue-100">Casino World Admin Page</h1>
    <p>Welcome to the Casino World admin page!</p>
</div>
