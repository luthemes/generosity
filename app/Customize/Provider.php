<?php
/**
 * Customize service provider.
 *
 * Bootstraps the customize component.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity\Customize;

use Backdrop\Tools\Collection;
use Backdrop\Core\ServiceProvider;

use Generosity\Image;
use Generosity\Layout;
use Generosity\Footer;

/**
 * Customize service provider.
 *
 * @since  0.0.1
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds customize component to the container.
	 *
	 * @since  0.0.1
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->app->singleton( Component::class, function() {
			return new Component( [
				Image\Customize::class,
				Footer\Customize::class,
				Layout\Customize::class,
			] );
		} );
	}

	/**
	 * Bootstrap the customize component.
	 *
	 * @since  0.0.1
	 * @access public
	 * @return void
	 */
	public function boot() {
		$this->app->resolve( Component::class )->boot();
	}
}