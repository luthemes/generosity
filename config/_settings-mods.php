<?php
/**
 * Theme mods settings Config.
 *
 * Defines the default theme mods for the theme. Child themes can overwrite this
 * with a `config/settings-mod.php` file for changing the defaults.
 *
 * Configs are loaded early in the load process. If a default value requires PHP
 * code to execute, use a closure. It will be invoked at an appropriate time when
 * all functions/variables are set up and available for use.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2025 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/generosity
 */

return [

	# ----------------------------------------------------------------------
	# Theme: Global
	# ----------------------------------------------------------------------
	#
	# Handles the global theme mods.

	# ----------------------------------------------------------------------
	# Theme: Header
	# ----------------------------------------------------------------------
	#
	# Handles the header theme mods.

	# ----------------------------------------------------------------------
	# Theme: Content
	# ----------------------------------------------------------------------
	#
	# Handles the content theme mods.
	'theme_content_layout' => 'left-sidebar',

	# ----------------------------------------------------------------------
	# Theme: Footer
	# ----------------------------------------------------------------------
	#
	# Handles the footer theme mods.

];