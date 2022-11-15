<?php
/**
 * Remove core block patterns
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 * @see https://wpblockz.com/tutorial/remove-default-block-patterns-from-wordpress/
 */
function my_remove_patterns()
{
    remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'my_remove_patterns');


/**
 * Remove code view for non-administrators
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 * @see https://developer.wordpress.org/reference/hooks/block_editor_settings_all/
 */
function customEditorSettings($settings, $post)
{
    if (!current_user_can('administrator')) {
        $settings['codeEditingEnabled'] = false;
    }

    return $settings;
}
add_filter('block_editor_settings_all', 'customEditorSettings', 10, 2);

/**
 * Disable gutenberg front end styles
 *
 * @package Blocks
 * @category Gutenberg Supports
 * @version 1.0
 */
// function dequeue_gutenberg_library()
// {
//     wp_dequeue_style('wp-block-library'); // Wordpress core
//     wp_dequeue_style('wp-block-library-theme'); // Wordpress core
//     wp_dequeue_style('wc-block-style'); // WooCommerce
//     wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
// }
// add_action('wp_print_styles', 'dequeue_gutenberg_library', 100);
