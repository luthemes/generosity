<!doctype html>
<html <?php Backdrop\Attr\display( 'html' ); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php Backdrop\Attr\display( 'body' ); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'generosity' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-header__container">
			<div class="site-header__branding">
				<?php Backdrop\Site\display_title( [
					'class' => 'site-header__title',
					'link_class' => 'site-header__title-link'
				] ); ?>
				<?php
					$tagline = get_bloginfo( 'description' );

					if ( ! empty( $tagline ) ) {
						if ( $sep = Generosity\Tools\Mod::get( 'branding_sep' ) ) : ?>
							<span class="site-header__sep" aria-hidden="true"><?php echo esc_html( $sep ) ?></span>
						<?php endif;
						Backdrop\Site\display_description( [ 'class' => 'site-header__description' ] ); 
					}
				?>
			</div>
			<?php Backdrop\View\display( 'menu', 'primary', [ 'location' => 'primary'] ); ?>
		</div>
		<?php the_custom_header_markup(); ?>
	</header>
