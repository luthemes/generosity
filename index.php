<?php
/**
 * Index template.
 *
 * Loading this template on a website should be avoided, unless a plugin is
 * misbehaving or there is an abnormal situation. However, as a fallback
 * measure in case this file is loaded, the following code will correctly
 * load our `public/view/index.php` template.
 */

// Access the view template engine.
// The Backdrop framework isn't installed (see `app/framework-missing.php`).
if ( ! function_exists( 'Backdrop\\View\\display' ) ) {
	wp_die(
		current_user_can( 'switch_themes' ) ? wp_kses( generosity_framework_missing_message(), [ 'code' => [] ] ) : esc_html__( 'This site is temporarily unavailable.', 'generosity' ),
		esc_html__( 'Theme dependencies are missing', 'generosity' ),
		[ 'response' => 503 ]
	);
}

Backdrop\View\display( 'index' );
