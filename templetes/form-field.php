<?php

/**
 * Template: Form Field
 *
 * Renders an individual form field.
 *
 * Variables expected:
 *   - $field_name: The key/name for the field.
 *   - $field_label: The label for the field.
 */
if (! defined('ABSPATH')) {
    exit;
}

if (! isset($field_name, $field_label)) {
    // Optionally handle the error or assign default values.
    $field_name  = 'default_name';
    $field_label = 'Default Label';
}

echo Input_Field::render(('email' === $field_name ? 'email' : 'text'), $field_name, $field_label);
