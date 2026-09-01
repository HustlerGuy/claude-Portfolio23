<?php
/**
 * Nagłówek motywu.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav>
	<a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
			<div class="nav-logo-icon"><span><?php echo esc_html( be_get( 'brand_short' ) ); ?></span></div>
		<?php endif; ?>
		<span class="nav-logo-text"><?php echo esc_html( be_get( 'brand_name' ) ); ?></span>
	</a>

	<button class="nav-toggle" aria-label="<?php esc_attr_e( 'Otwórz menu', 'bartlomiej-ert' ); ?>" aria-expanded="false" aria-controls="be-primary-menu">
		<span></span><span></span><span></span>
	</button>

	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav-links',
			'menu_id'        => 'be-primary-menu',
			'depth'          => 1,
			'fallback_cb'    => 'be_primary_menu_fallback',
		) );
	} else {
		be_primary_menu_fallback();
	}
	?>
</nav>
