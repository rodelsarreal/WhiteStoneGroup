<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Displays a notice in the WP Dashboard if the GutenKit plugin is not activated.
 *
 * @return void
 * @since 1.0.0
 * @link https://developer.wordpress.org/reference/hooks/admin_notices/
 */
if ( ! function_exists( 'hello_blocks_fail_load_admin_notice' ) ) {

	function hello_blocks_fail_load_admin_notice() {
		$screen = get_current_screen();
		if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
			return;
		}

		if ( get_option('_hello_blocks_dismiss_install_notice') ) {
			return;
		}

		$plugin                = 'gutenkit-blocks-addon/gutenkit-blocks-addon.php';
		$installed_plugins     = get_plugins();
		$is_gutenkit_installed = isset( $installed_plugins[ $plugin ] );
		$message               = esc_html__( 'The Hello Blocks Theme is a lightweight starter theme that works perfectly with the GutenKit plugin.', 'hello-blocks' );

		if ( $is_gutenkit_installed ) {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			$message    .= ' ' . esc_html__( 'Once you activate the plugin, you are only one click away from building an amazing website.', 'hello-blocks' );
			$button_text = esc_html__( 'Activate GutenKit', 'hello-blocks' );
			$button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
		} else {
			if ( ! current_user_can( 'install_plugins' ) ) {
				return;
			}

			$message    .= ' ' . esc_html__( 'Once you download and activate the plugin, you are only one click away from building an amazing website.', 'hello-blocks' );
			$button_text = esc_html__( 'Install GutenKit', 'hello-blocks' );
			$button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=gutenkit-blocks-addon' ), 'install-plugin_gutenkit-blocks-addon' );
		}

		?>
		<style>
			/* Custom styles for the GutenKit admin notice */
			.notice.hello-blocks-notice {
				border: 1px solid #ccd0d4;
				border-inline-start: 4px solid #3B67FE !important;
				box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
				display: flex;
				padding: 0;
			}

			.notice.hello-blocks-notice.hello-blocks-install-gutenkit {
				padding: 0;
			}

			.notice.hello-blocks-notice .hello-blocks-notice-aside {
				display: flex;
				align-items: start;
				justify-content: center;
				padding: 20px 10px;
				background: rgba(59, 103, 254, 0.04);
			}

			.notice.hello-blocks-notice .hello-blocks-notice-aside img {
				width: 1.5rem;
			}

			.notice.hello-blocks-notice .hello-blocks-notice-content {
				display: flex;
				flex-direction: column;
				gap: 5px;
				padding: 20px;
				width: 100%;
			}

			.notice.hello-blocks-notice .hello-blocks-notice-content h3,
			.notice.hello-blocks-notice .hello-blocks-notice-content p {
				padding: 0;
				margin: 0;
			}

			.notice.hello-blocks-notice .hello-blocks-information-link {
				align-self: start;
				color: #3B67FE;
			}

			.notice.hello-blocks-notice .hello-blocks-install-button {
				align-self: start;
				background-color: #3B67FE;
				border-radius: 3px;
				color: #fff;
				text-decoration: none;
				height: auto;
				line-height: 20px;
				padding: 0.4375rem 0.75rem;
				margin-block-start: 15px;
			}

			.notice.hello-blocks-notice .hello-blocks-install-button:active {
				transform: translateY(1px);
			}

			@media (max-width: 767px) {
				.notice.hello-blocks-notice .hello-blocks-notice-aside {
					padding: 10px;
				}

				.notice.hello-blocks-notice .hello-blocks-notice-content {
					gap: 10px;
					padding: 10px;
				}
			}
		</style>
		<script>
			/**
			* Handles the dismiss button click and sends AJAX request to update user meta.
			*/
			window.addEventListener('load', () => {
				const dismissNotice = document.querySelector('.notice.hello-blocks-install-gutenkit button.notice-dismiss');
				if (dismissNotice) {
					dismissNotice.addEventListener('click', async (event) => {
						event.preventDefault();

						const formData = new FormData();
						formData.append('action', 'hello_blocks_set_admin_notice_viewed');
						formData.append('dismiss_nonce', '<?php echo esc_js( wp_create_nonce( 'hello_blocks_dismiss_install_notice' ) ); ?>');

						try {
							await fetch(ajaxurl, {
								method: 'POST',
								body: formData
							});
						} catch (error) {
							console.error('Error dismissing notice:', error);
						}
					});
				}
			});
		</script>
		<div class="notice updated is-dismissible hello-blocks-notice hello-blocks-install-gutenkit">
			<div class="hello-blocks-notice-aside">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gutenkit-icon.svg' ); ?>" alt="<?php echo esc_attr__( 'Get GutenKit', 'hello-blocks' ); ?>" />
			</div>
			<div class="hello-blocks-notice-content">
				<h3><?php echo esc_html__( 'Thanks for installing the Hello Blocks Theme!', 'hello-blocks' ); ?></h3>
				<p><?php echo esc_html( $message ); ?></p>
				<a class="hello-blocks-information-link" href="https://wpmet.com/plugin/gutenkit/" target="_blank"><?php echo esc_html__( 'Explore Gutenkit Builder Block', 'hello-blocks' ); ?></a>
				<a class="hello-blocks-install-button" href="<?php echo esc_attr( $button_link ); ?>"><?php echo esc_html( $button_text ); ?></a>
			</div>
		</div>
		<?php
	}

	if ( ! did_action( 'gutenkit/init' ) ) {
		add_action( 'admin_notices', 'hello_blocks_fail_load_admin_notice' );
	}

}

/**
 * Handles the AJAX request to mark the GutenKit admin notice as viewed.
 *
 * @return void
 * @since 1.0.0
 * @link https://developer.wordpress.org/reference/functions/update_user_meta/
 * @link https://developer.wordpress.org/reference/functions/check_ajax_referer/
 */
if ( ! function_exists( 'hello_blocks_ajax_set_admin_notice_viewed' ) ) {

	function hello_blocks_ajax_set_admin_notice_viewed() {
		check_ajax_referer( 'hello_blocks_dismiss_install_notice', 'dismiss_nonce' );
		update_option( '_hello_blocks_dismiss_install_notice', true );
		wp_die(); // Ensures proper termination of the AJAX request.
	}

	add_action( 'wp_ajax_hello_blocks_set_admin_notice_viewed', 'hello_blocks_ajax_set_admin_notice_viewed' );

}