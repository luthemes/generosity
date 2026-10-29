<?php
/**
 * Default theme scripts functions
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity;
use function Generosity\Vite\asset;

/**
 * Enqueue Scripts and Styles
 *
 * @since  0.0.1
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
add_action( 'wp_enqueue_scripts', function() {

	// Assets are enqueued by their source path. `Generosity\Vite\asset()` looks them up in Vite's
	// manifest.json, which maps them to the built files, whose names change with their contents.

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'generosity-screen', asset( 'resources/scss/screen.scss' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'generosity-app', asset( 'resources/js/app.js' ), [ 'jquery' ], null, true );

	// Screen reader text for the menu toggles. `navigation.js` sets these as plain text.
	wp_localize_script( 'generosity-app', 'generosityScreenReaderText', [
		'expandMain'    => __( 'Open the main menu', 'generosity' ),
		'collapseMain'  => __( 'Close the main menu', 'generosity' ),
		'expandChild'   => __( 'expand child menu', 'generosity' ),
		'collapseChild' => __( 'collapse child menu', 'generosity' ),
	] );

	// Loads ClassicPress' comment-reply script where appropriate.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );
