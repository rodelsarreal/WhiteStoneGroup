<?php

/**
 * Enqueues assets for the block editor.
 *
 * This function is responsible for enqueueing the necessary JavaScript and CSS assets
 * for the block editor in the Hello Blocks theme.
 *
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/advanced-topics/build-process/#loading-scripts-and-styles
 */
if ( ! function_exists( 'hello_blocks_editor_assets' ) ) {

	function hello_blocks_editor_assets() {
		$script_asset = include get_theme_file_path( 'public/js/editor.asset.php' );
		$style_asset  = include get_theme_file_path( 'public/css/editor.asset.php' );

		wp_enqueue_script(
			'hello-blocks-editor',
			get_theme_file_uri( 'public/js/editor.js' ),
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_enqueue_style(
			'hello-blocks-editor',
			get_theme_file_uri( 'public/css/editor.css' ),
			$style_asset['dependencies'],
			$style_asset['version']
		);
	}

	add_action( 'enqueue_block_editor_assets', 'hello_blocks_editor_assets' );

}

/**
 * Enqueues the assets for the Hello Blocks theme.
 *
 * This function is responsible for enqueueing the necessary CSS assets for the Hello Blocks theme.
 * It checks if the function 'hello_blocks_assets' does not already exist before defining it.
 *
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/advanced-topics/build-process/#loading-scripts-and-styles
 */
if ( ! function_exists( 'hello_blocks_assets' ) ) {

	function hello_blocks_assets() {
		$asset = include get_theme_file_path( 'public/css/screen.asset.php' );

		wp_enqueue_style(
			'hello-blocks-style',
			get_theme_file_uri( 'public/css/screen.css' ),
			$asset['dependencies'],
			$asset['version']
		);
	}

	add_action( 'wp_enqueue_scripts', 'hello_blocks_assets' );
	
}
