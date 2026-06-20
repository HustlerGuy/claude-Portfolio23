<?php
/**
 * Nagłówek motywu (head + nawigacja).
 *
 * @package ert-marketing
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<nav>
	<a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="nav-logo-icon"><span>BE</span></div>
		<span class="nav-logo-text"><?php bloginfo( 'name' ); ?></span>
	</a>
	<ul class="nav-links">
		<li><a href="<?php echo esc_url( ert_url( 'uslugi' ) ); ?>" class="<?php echo esc_attr( ert_active( 'uslugi' ) ); ?>">Usługi</a></li>
		<li><a href="<?php echo esc_url( ert_url( 'proces' ) ); ?>" class="<?php echo esc_attr( ert_active( 'proces' ) ); ?>">Proces</a></li>
		<li><a href="<?php echo esc_url( ert_url( 'realizacje' ) ); ?>" class="<?php echo esc_attr( ert_active( 'realizacje' ) ); ?>">Realizacje</a></li>
		<li><a href="<?php echo esc_url( ert_url( 'o-mnie' ) ); ?>" class="<?php echo esc_attr( ert_active( 'o-mnie' ) ); ?>">O mnie</a></li>
		<li><a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="nav-cta <?php echo esc_attr( ert_active( 'kontakt' ) ); ?>">Darmowa wycena</a></li>
	</ul>
</nav>
