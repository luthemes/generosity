<?php
/**
 * Default functions template
 *
 * This file is used to bootstrap the theme.
 *
 * @package   Generosity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/generosity
 */

# ----------------------------------------------------------------------------------
# Load composer files
# ----------------------------------------------------------------------------------
#
# Please load the composer files first to ensure that any classes or functions that
# we may require are available through autoload.

if ( file_exists( get_parent_theme_file_path( '/vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( '/vendor/autoload.php' );
}
