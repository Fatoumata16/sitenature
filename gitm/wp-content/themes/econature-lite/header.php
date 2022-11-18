<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Econature Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'econature-lite' ); ?>
</a>

<?php
	/*****************************
	** Get Header Top
	*****************************/
	get_template_part('header/header','top');
?>
<header id="header" class="header">
	<div class="container">
		<div class="flex-box">
			<div class="head-left">
				<div class="site-logo">
					<?php if ( has_custom_logo() ) { ?>
						<div class="custom-logo">
							<?php econature_lite_the_custom_logo(); ?>
						</div><!-- cutom logo -->
					<?php } ?>
					<div class="site-title-desc">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
						</h1>
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								echo '<p class="site-description">'.esc_html($description).'</p>';
							endif;
						?>
					</div><!-- site-title-desc -->
				</div><!-- site-logo -->
			</div>
			
			<div class="head-right">
				<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','econature-lite'); ?></a>
				</div><!-- toggle --> 	
				<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
				</nav>
			</div><!-- header right -->
			
			<?php if( !empty( get_theme_mod('nature_cta_lbl') || get_theme_mod('nature_cta_link') ) ){ ?>
			<div class="header-btn">
				<a href="<?php echo esc_url(get_theme_mod('nature_cta_link'));?>"><?php echo esc_html(get_theme_mod('nature_cta_lbl')); ?></a>
			</div><!-- header btn -->
			<?php } ?>
			
		</div><!-- flex-box -->
	</div><!-- wrap -->
</header><!-- header -->

<div id="navigation">
	<div class="container">
		
	</div>
</div><!-- navigation -->