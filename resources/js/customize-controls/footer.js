/**
 * Footer controls.
 *
 * Activates or deactivates the footer credit section based on whether the
 * "powered by" setting is true/false.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

/*
 * Custom Credit isn't used while the random credit text is on, so hide it then.
 *
 * Both settings use postMessage, so the preview doesn't reload and send new active
 * states. Toggle a class instead (hidden in customize-controls.scss), which the
 * active state the preview sends when it loads can't undo.
 */
wp.customize.bind( 'ready', function() {
	wp.customize( 'theme_footer_powered_by', function( poweredBy ) {
		wp.customize.control( 'theme_footer_custom_credit', function( control ) {
			var sync = function( to ) {
				control.container.toggleClass( 'generosity-control-hidden', !! to );
			};

			sync( poweredBy.get() );
			poweredBy.bind( sync );
		} );
	} );
} );
