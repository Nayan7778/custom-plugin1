<?php

/**
 * Class Input_Field
 *
 * Provides a reusable method for generating form input fields.
 */
class Input_Field
{

    /**
     * Generate an input field.
     *
     * @param string $type  Input type (e.g., text, email).
     * @param string $name  Field name attribute.
     * @param string $label Field label.
     * @param string $value Default value (optional).
     *
     * @return string HTML output for the input field.
     */
    public static function render($type, $name, $label, $value = '')
    {
        ob_start();
?>
        <div class="form__field form__field--<?php echo esc_attr($name); ?>">
            <label class="form__label" for="<?php echo esc_attr($name); ?>">
                <?php echo esc_html($label); ?>
            </label>
            <input class="form__input" type="<?php echo esc_attr($type); ?>" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>">
        </div>
<?php
        return ob_get_clean();
    }
}
