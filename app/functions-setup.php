<?php
/**
 * Default theme setup.
 *
 * This is where all the add_theme_support(); will happen.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/generosity
 */

namespace Generosity;

use function Backdrop\is_classicpress;

/**
 * Set up theme support.  This is where calls to `add_theme_support()` happen.
 *
 * @since  0.0.1
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	// Sets the theme content width.
	$GLOBALS['content_width'] = 640;

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	if ( ! is_classicpress() ) {
		// Outputs HTML5 markup for core features.
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	}

	// Load theme translations.
	load_theme_textdomain( 'generosity', get_parent_theme_file_path( 'public/lang' ) );
} );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @since  0.0.1
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary' => esc_html__( 'Primary Navigation', 'generosity' )
	] );

}, 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  0.0.1
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span class="wrap">',
		'after_title'   => '</span></h3>'
	];

	$sidebars = [
		[
			'id'   => 'primary',
			'name' => esc_html__ ('Primary', 'generosity' )
		]
	];

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( array_merge( $sidebar, $args ) );
	}
}, 5 );

/**
 * Add support for custom header.
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-header',
		[
			'default-text-color' => 'ffffff',
			'default-image'      => get_theme_file_uri( '/public/images/headers/andromeda-galaxy.png' ),
			'height'             => 350,
			'width'              => 1170,
			'flex-height'        => true,
			'flex-width'         => true,
		]
	);

	$headers = [
		'sombrero-galaxy' => 'Sombrero Galaxy',
		'macbook-pro'     => 'MacBook Pro',
	];
	
	$base_url = '%s/public/images/headers/';
	
	$defaults = [];
	
	foreach ( $headers as $key => $label ) {
		$defaults[ $key ] = [
			'url'           => $base_url . $key . '.png',
			'thumbnail_url' => $base_url . $key . '.png',
		];
	}
	
	register_default_headers( $defaults );
	
} );