<?php
/**
 * Theme functions and definitions
 *
 * @package Hello Blocks
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_BLOCKS_VERSION', '1.0.3' );

require get_template_directory() . '/includes/theme-support.php';
require get_template_directory() . '/includes/enqueue-assets.php';


/**
 * Displays a notice in the WP Dashboard if the GutenKit plugin is not activated.
 * @since 1.0.0
 */
if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-notice.php';
}

