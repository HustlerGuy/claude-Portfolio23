<?php
/**
 * Stopka motywu.
 *
 * @package ert-marketing
 */
?>

<footer>
	<span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> <span class="footer-dot">//</span> Marketing Strategiczny</span>
	<div class="footer-links">
		<a href="<?php echo esc_url( ert_url( 'uslugi' ) ); ?>">Usługi</a>
		<a href="<?php echo esc_url( ert_url( 'realizacje' ) ); ?>">Realizacje</a>
		<a href="<?php echo esc_url( ert_url( 'o-mnie' ) ); ?>">O mnie</a>
		<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>">Kontakt</a>
	</div>
	<span>Freelancer <span class="footer-dot">&middot;</span> Polska <span class="footer-dot">&middot;</span> Remote</span>
</footer>

<?php wp_footer(); ?>
</body>
</html>
