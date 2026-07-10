<?php
/**
 * Stopka motywu.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$be_year     = gmdate( 'Y' );
$be_name     = be_get( 'brand_name' );
$be_tagline  = be_get( 'brand_tagline' );
$be_location = be_get( 'location' );
?>

<footer>
	<span>&copy; <?php echo esc_html( $be_year . ' ' . $be_name ); ?> <span class="footer-dot">//</span> <?php echo esc_html( $be_tagline ); ?></span>

	<?php
	if ( has_nav_menu( 'footer' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => false,
			'menu_class'     => 'footer-links',
			'depth'          => 1,
			'fallback_cb'    => 'be_footer_menu_fallback',
		) );
	} else {
		be_footer_menu_fallback();
	}
	?>

	<span><?php esc_html_e( 'Freelancer', 'bartlomiej-ert' ); ?> <span class="footer-dot">&middot;</span> <?php echo esc_html( $be_location ); ?> <span class="footer-dot">&middot;</span> Remote</span>
</footer>

<?php wp_footer(); ?>
</body>
</html>
