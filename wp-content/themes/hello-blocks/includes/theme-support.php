<?php
if ( ! function_exists( 'hello_blocks_theme_support' ) ) {
	/**
	 * General Theme Settings.
	 *
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 * @return void
	 */
	function hello_blocks_theme_support() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'hello-blocks', get_template_directory() . '/languages' );

		// Add support for Post thumbnails.
		add_theme_support( 'post-thumbnails' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for Editor Styles.
		add_theme_support( 'editor-styles' );
		// Enqueue Editor Styles.
		add_editor_style( 'style-editor.css' );
		// Add support for tag.
		add_theme_support( 'title-tag' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
	add_action( 'after_setup_theme', 'hello_blocks_theme_support' );
}
