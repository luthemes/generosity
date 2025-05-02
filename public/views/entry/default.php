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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Backdrop\Post\display_title(); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_author( [ 'before' => Generosity\Tools\Svg::display( 'meta-icons', 'user' ) ] ); ?>
		 	<?php Backdrop\Post\display_date( [ 'before' => Generosity\Tools\Svg::display( 'meta-icons', 'calendar' ) ] ); ?>
			<?php Backdrop\Post\display_comments_link( [ 'before' => Generosity\Tools\Svg::display( 'meta-icons', 'comment' ) ] ); ?>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<picture class="post-thumbnail">
			<?php the_post_thumbnail( Generosity\Tools\Mod::get( 'theme_content_feature_image' ) ); ?>
		</picture>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
</article>
