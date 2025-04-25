<?php

/**
 * Template: Form Layout
 *
 * This file outputs the form for front-end display.
 *
 * Available variables:
 *  - $form_fields: An associative array of form fields (e.g., [ 'name' => 'Name', 'email' => 'Email' ]).
 */

if (! defined('ABSPATH')) {
    exit;
}

// Start form markup.
?>
<form action="#" method="post" class="form">
    <?php

    wp_nonce_field('custom_plugin_action', 'custom_plugin_nonce');

    foreach ($form_fields as $field_name => $field_label) {

        include plugin_dir_path(__FILE__) . 'form-field.php';
    }

   

    ?>
    <div class="form__submit">
        <input class="form__button" type="submit" value="<?php echo esc_attr__('Submit', 'custom_plugin'); ?>">
    </div>
</form>