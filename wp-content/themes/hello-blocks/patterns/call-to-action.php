<?php

/**
 * Title: Call to action
 * Slug: hello-blocks/cta
 * Categories: featured
 * Keywords: Call to action
 * Block Types: core/buttons
 * Description: Left-aligned text with a CTA button and a separator.
 */
?>
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large"} -->
		<p class="has-x-large-font-size" style="line-height:1.2"><?php echo esc_html_x( 'Got any book recommendations?', 'sample content for call to action', 'hello-blocks' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"small"} -->
			<div class="wp-block-button has-custom-font-size has-small-font-size">
				<a class="wp-block-button__link wp-element-button">
					<?php echo esc_html_x( 'Get In Touch', 'sample content for call to action button', 'hello-blocks' ); ?>
				</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:separator {"className":"is-style-wide"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
		<!-- /wp:separator -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->