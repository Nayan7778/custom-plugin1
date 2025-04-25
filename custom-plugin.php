<?php

/**
 * Plugin Name: Custom Plugin
 * Version: 1.0.0
 * Author: Nayan Punani
 */

if (! defined('ABSPATH')) { 
    exit;
}

define('CUSTOM_PLUGIN_DIR', plugin_dir_path(__FILE__));
    

// Include required classes.
require_once CUSTOM_PLUGIN_DIR . 'includes/class-custom-plugin.php';
require_once CUSTOM_PLUGIN_DIR . 'includes/class-custom-plugin-form.php';
require_once CUSTOM_PLUGIN_DIR . 'includes/class-custom-plugin-input-field.php';
require_once CUSTOM_PLUGIN_DIR . 'includes/class-custom-plugin-admin.php';

function custom_plugin_init()
{
    $plugin = new custom_plugin();
    $plugin->run();
}
custom_plugin_init();

add_action('admin_enqueue_scripts', 'custom_form_plugin_admin_styles');
function custom_form_plugin_admin_styles($hook)
{
    global $post_type;
    if ('custom_plugin' === $post_type) {
        wp_enqueue_style(
            'custom-form-admin-style',
            plugin_dir_url(__FILE__) . 'assets/css/style.css',
            array(),
            '1.0.0'
        );
    }
}

add_filter('custom_plugin_fields', 'add_custom_fields_to_form');
function add_custom_fields_to_form($fields)
{
    $fields['last_name'] = 'Last Name :';
    $fields['phone'] = 'Phone Number :';
    $fields['message'] = 'Your Message :';
    return $fields;
}
