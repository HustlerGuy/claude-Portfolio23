<?php
/**
 * Szablon 404 — nie znaleziono.
 *
 * @package ert-marketing
 */

get_header();
?>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Start</a>
			<span class="page-breadcrumb-sep">/</span>
			<span>404</span>
		</div>
		<h1 class="page-title">Nie znaleziono <span class="acc">strony</span></h1>
		<p class="page-subtitle">Strona, której szukasz, nie istnieje lub została przeniesiona.</p>
	</div>
</div>

<section class="section">
	<div class="cta-banner">
		<div class="cta-banner-text">
			<h3>Wróćmy na <span class="acc">właściwe tory</span></h3>
			<p>Przejdź do strony głównej albo napisz do mnie bezpośrednio.</p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">Strona główna →</a>
			<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-ghost">Kontakt</a>
		</div>
	</div>
</section>

<?php
get_footer();
