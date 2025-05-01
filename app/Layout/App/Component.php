<?php
/**
 * Layout Component.
 *
 * Manages the layout component.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity\Layout\App;

use Backdrop\Contracts\Bootable;
use Generosity\Tools\Config;

/**
 * Layout component class.
 *
 * @since  1.0.0
 * @access public
 */
class Component implements Bootable {

	/**
	 * Stores the layouts object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Layouts
	 */
	protected $layouts;

	/**
	 * Creates the component object.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Layouts  $global
	 * @param  Layouts  $loop
	 * @return void
	 */
	public function __construct( Layouts $layouts ) {

		$this->layouts = $layouts;
	}

	/**
	 * Bootstraps the component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Run registration on `after_setup_theme`.
		add_action( 'after_setup_theme', [ $this, 'register' ] );

		// Register default layouts.
		add_action( 'generosity/global/layout/register', [ $this, 'registerDefaultLayouts' ] );
	}

	/**
	 * Runs the register actions.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Hook for registering custom layouts.
		do_action( 'generosity/global/layout/register', $this->layouts );
	}

	/**
	 * Registers default loop layouts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Layouts  $layouts
	 * @return void
	 */
	public function registerDefaultLayouts( $layouts ) {

		foreach ( Config::get( 'global-layouts' ) as $name => $options ) {
			$layouts->add( $name, new Layout( $name, $options ) );
		}
	}
}