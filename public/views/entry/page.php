<?php
/**
 * Default page/default template
 *
 * @package   rejuvenate
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014-2022. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/inheritance
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'default' ); ?>>
	<header class="entry-header">
		<?php Backdrop\Post\display_title(); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
</article>
