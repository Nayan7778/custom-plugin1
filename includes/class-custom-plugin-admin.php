<?php

/**
 * custom_plugin
 *
 * Handles admin-side functionality, including custom post type registration and metabox.
 */
class custom_plugin
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        // Register custom post type.
        add_action('init', array($this, 'register_custom_post_type'));

        // Add metabox to display custom fields.
        add_action('add_meta_boxes', array($this, 'add_custom_metabox'));

        // Save metabox data if needed.
        // (In this case, the metabox is read-only.)
    }

    /**
     * Registers the custom post type for form submissions.
     */
    public function register_custom_post_type()
    {
        $labels = array(
            'name'          => esc_html__('custom_plugin', 'custom_plugin'),
            'singular_name' => esc_html__('custom_plugin', 'custom_plugin'),
            'add_new'       => esc_html__('Add New', 'custom_plugin'),
            'add_new_item'  => esc_html__('Add New Submission', 'custom_plugin'),
            'edit_item'     => esc_html__('Edit Submission', 'custom_plugin'),
            'all_items'     => esc_html__('custom_plugin', 'custom_plugin'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'has_archive'        => false,
            'supports'           => array('title'),
            'menu_icon'          => 'dashicons-feedback',
        );

        register_post_type('custom_plugin', $args);
    }

    /**
     * Adds a custom metabox for displaying form fields.
     */
    public function add_custom_metabox()
    {
        add_meta_box(
            'custom_plugin_data',
            esc_html__('Submission Data', 'custom_plugin'),
            array($this, 'render_metabox'),
            'custom_plugin',
            'normal',
            'default'
        );
    }

    /**
     * Renders the metabox which displays the stored form data.
     *
     * @param WP_Post $post The current post object.
     */
    public function render_metabox($post)
    {
        $meta = get_post_meta($post->ID);

        if (! empty($meta)) {
            echo '<div class="admin-meta">';
            echo '<ul class="admin-meta__list">';

            foreach ($meta as $key => $value) {
                echo '<li class="admin-meta__item">';
                echo '<span class="admin-meta__label">' . esc_html(ucfirst($key)) . ':</span> ';
                echo '<span class="admin-meta__value">' . esc_html(maybe_unserialize($value[0])) . '</span>';
                echo '</li>';
            }

            echo '</ul>';
            echo '</div>';
        } else {
            echo '<p class="admin-meta__empty">' . esc_html__('No form data found.', 'custom_plugin') . '</p>';
        }
    }
}
