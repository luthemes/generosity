<?php
/**
 * Powered By Text Class.
 *
 * A simple class for randomly displaying a "powered by..." line of text in the
 * theme footer.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity\Tools;

/**
 * Powered by class.
 *
 * @since  0.0.1
 * @access public
 */
class PoweredBy {

	/**
	 * Returns an array of all the powered by quotes.
	 *
	 * @since  0.0.1
	 * @access public
	 * @return array
	 */
	public static function all() {

		return apply_filters( 'generosity/poweredby/collection', [
			esc_html__( 'Powered by heart and soul.', 'generosity' ),
			esc_html__( 'Powered by crazy ideas and passion.', 'generosity' ),
			esc_html__( 'Powered by the thing that holds all things together in the universe.', 'generosity' ),
			esc_html__( 'Powered by love.', 'generosity' ),
			esc_html__( 'Powered by the vast and endless void.', 'generosity' ),
			esc_html__( 'Powered by the code of a maniac.', 'generosity' ),
			esc_html__( 'Powered by peace and understanding.', 'generosity' ),
			esc_html__( 'Powered by coffee.', 'generosity' ),
			esc_html__( 'Powered by sleepness nights.', 'generosity' ),
			esc_html__( 'Powered by the love of all things.', 'generosity' ),
			esc_html__( 'Powered by something greater than myself.', 'generosity' ),
			esc_html__( 'Powered by whispers from the future.', 'generosity' ),
			esc_html__( 'Powered by the fusion of technology and dreams.', 'generosity' ),
			esc_html__( 'Powered by the strength found in kindness.', 'generosity' ),
			esc_html__( 'Powered by the melodies of the unseen world.', 'generosity' ),
			esc_html__( 'Powered by the courage of the unheard voices.', 'generosity' ),
			esc_html__( 'Powered by the beauty of the human spirit.', 'generosity' ),
			esc_html__( 'Powered by the quest for eternal wisdom.', 'generosity' ),
			esc_html__( 'Powered by the energy of uncharted galaxies.', 'generosity' ),
			esc_html__( 'Powered by the magic hidden in plain sight.', 'generosity' ),
			esc_html__( 'Powered by the legacy of the ancients.', 'generosity' ),
			esc_html__( 'Powered by the dance between light and darkness.', 'generosity' ),
			esc_html__( 'Powered by the touch of the morning sun.', 'generosity' ),
			esc_html__( 'Powered by the secrets of the deep ocean.', 'generosity' ),
			esc_html__( 'Powered by the echoes of laughter and joy.', 'generosity' ),
			esc_html__( 'Powered by the relentless pursuit of truth.', 'generosity' ),
		] );
	}

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  0.0.1
	 * @access public
	 * @return void
	 */
	public static function display() {

		echo esc_html( static::render() );
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  0.0.1
	 * @access public
	 * @return string
	 */
	public static function render() {

		$collection = static::all();

		return $collection[ array_rand( $collection, 1 ) ];
	}
}