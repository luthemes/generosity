<?php
/**
 * Settings Provider.
 *
 * Bootstraps the settings component.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity\Settings;

use Backdrop\Core\ServiceProvider;
use Generosity\Settings\Admin\OptionsPage;
use Generosity\Settings\Admin\Views\Views;

/**
 * Settings provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds settings component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {

		$this->app->singleton( Views::class );

		$this->app->singleton( OptionsPage::class, function() {

			return new OptionsPage(
				'generosity-settings',
				$this->app->resolve( Views::class ),
				[
					'label'      => __( 'Generosity Settings', 'generosity' ),
					'capability' => 'edit_theme_options'
				]
			);
		} );
	}

	/**
	 * Bootstrap the settings component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		if ( is_admin() ) {
			$this->app->resolve( OptionsPage::class )->boot();
		}
	}
}
