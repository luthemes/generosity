<?php
/**
 * Customize component.
 *
 * Integrates the theme's settings into the customizer.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

namespace Generosity\Customize;

use WP_Customize_Manager;

use Backdrop\App;
use Backdrop\Contracts\Bootable;
use Generosity\Tools\Collection;

use function Backdrop\Mix\asset;

class Component implements Bootable {

		/**
		 * Array of `Customizable` components bound to the container.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    array
		 */
		protected $components = [];

		/**
		 * Sets up initial object properties.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  array  $components  Array `Customizable` component names.
		 * @return void
		 */
		public function __construct( array $components = [] ) {

			$this->components = $components;
		}

    /**
     * Adds our customizer-related actions to the appropriate hooks.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot(): void {

		// Register panels, sections, settings, controls, and partials.
		array_map( function( $callback ) {
			add_action( 'customize_register', [ $this, $callback ] );
		}, [
			'registerPanels',
			'registerSections',
			'registerSettings',
			'registerControls'
		] );

		// Enqueue scripts and styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue'] );
		add_action( 'customize_preview_init',             [ $this, 'previewEnqueue' ] );
	}

		/**
		 * Callback for registering panels.
		 *
		 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#panels
		 * @since  1.0.0
		 * @access public
		 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
		 * @return void
		 */
    public function registerPanels( WP_Customize_Manager $manager ) {
		$panels = [
				'theme_global'  => esc_html__( 'Theme: Global',  'generosity' ),
				'theme_header'  => esc_html__( 'Theme: Header',  'generosity' ),
				'theme_content' => esc_html__( 'Theme: Content', 'generosity' ),
				'theme_footer'  => esc_html__( 'Theme: Footer',  'generosity' )
		];

		foreach ( $panels as $panel => $label ) {
				$manager->add_panel( $panel, [
						'title'    => $label,
						'priority' => 100
				] );
		}

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerPanels( $manager );
		}
    }

	/**
	 * Callback for registering sections.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
    public function registerSections( WP_Customize_Manager $manager ) {

		$manager->get_section( 'custom_css' )->panel = 'theme_global';
		$manager->get_section( 'title_tagline' )->panel = 'theme_header';
		$manager->get_section( 'title_tagline' )->title = esc_html__( 'Branding', 'generosity' );
		$manager->get_section( 'static_front_page' )->panel = 'theme_content';
        $manager->remove_section( 'colors' );


		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerSections( $manager );
		}
    }

	/**
	 * Callback for registering controls.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
    public function registerSettings( WP_Customize_Manager $manager ) {

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerSettings( $manager );
		}
	}

    /**
     * Add our controls for customizer.
     *
     * @since  1.0.0
     * @access public
     * @param  WP_Customize_Manager $manager
     * @return void
     */
    public function registerControls( WP_Customize_Manager $manager ) {

		foreach ( $this->components as $component ) {

			App::resolve( $component )->registerControls( $manager );
		}
	}

	/**
	 * Register or enqueue scripts/styles for the controls that are output
	 * in the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		// Enqueue controls style.
		wp_enqueue_style( 'generosity-customize-controls', asset( 'assets/css/customize-controls.css' ), [], null );

		// Enqueue controls script.
		wp_enqueue_script( 'generosity-customize-controls', asset( 'assets/js/customize-controls.js' ), [ 'customize-controls' ], null, true );

		// Set up a new collection to store our JSON.
		$json = new Collection();

		// Register component controls JSON.
		foreach ( $this->components as $component ) {
			App::resolve( $component )->controlsJson( $json );
		}

		// Pass JSON to the controls script.
		wp_localize_script( 'generosity-customize-controls', 'generosityCustomizeControls', $json );
	}

	/**
	 * Register or enqueue scripts/styles for the live preview frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function previewEnqueue() {

		// Enqueue preview style.
		wp_enqueue_style( 'generosity-customize-preview', asset( 'assets/css/customize-preview.css' ), [], null );

		// Enqueue preview script.
		wp_enqueue_script( 'generosity-customize-preview', asset( 'assets/js/customize-preview.js' ), [ 'customize-preview' ], null, true );

		// Set up a new collection to store our JSON.
		$json = new Collection();

		// Register component preview JSON.
		foreach ( $this->components as $component ) {
			App::resolve( $component )->previewJson( $json );
		}

		// Pass JSON to the preview script.
		wp_localize_script( 'generosity-customize-preview', 'generosityCustomizePreview', $json );
	}
}