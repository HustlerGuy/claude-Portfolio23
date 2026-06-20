<?php
/**
 * Szablon strony startowej.
 *
 * @package ert-marketing
 */

get_header();
?>

<section id="hero">
	<div class="hero-grid"></div>
	<div class="hero-glow"></div>
	<div class="hero-inner">
		<div class="hero-badge">
			<div class="hero-badge-dot"></div>
			<span>Dostępny do nowych projektów</span>
		</div>
		<h1 class="hero-h1">Marketing, który<br><span class="accent">generuje wyniki</span></h1>
		<p class="hero-sub">Reklamy w social mediach, Google Search Ads i kompleksowe wsparcie marketingowe. Pomagam firmom rosnąć — <strong>bez przepalania budżetu</strong>.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-primary">Darmowa wycena →</a>
			<a href="<?php echo esc_url( ert_url( 'realizacje' ) ); ?>" class="btn-ghost">Zobacz realizacje</a>
		</div>
		<div class="hero-metrics">
			<div><div class="metric-val" style="font-size:1.4rem;opacity:0.4;">—</div><div class="metric-label">Lat doświadczenia</div></div>
			<div><div class="metric-val">15</div><div class="metric-label">Projektów</div></div>
			<div><div class="metric-val">7.99×</div><div class="metric-label">Najlepszy ROAS</div></div>
			<div><div class="metric-val">−45%</div><div class="metric-label">Śr. CPA vs. przed</div></div>
		</div>
	</div>
</section>

<div class="ticker">
	<div class="ticker-track">
		<div class="ticker-item">Meta Ads</div><div class="ticker-item">Google Search Ads</div><div class="ticker-item">LinkedIn Ads</div><div class="ticker-item">Strategia Social Media</div><div class="ticker-item">Retargeting</div><div class="ticker-item">Performance Marketing</div><div class="ticker-item">Remarketing</div><div class="ticker-item">Brand Awareness</div>
		<div class="ticker-item">Meta Ads</div><div class="ticker-item">Google Search Ads</div><div class="ticker-item">LinkedIn Ads</div><div class="ticker-item">Strategia Social Media</div><div class="ticker-item">Retargeting</div><div class="ticker-item">Performance Marketing</div><div class="ticker-item">Remarketing</div><div class="ticker-item">Brand Awareness</div>
	</div>
</div>

<!-- USŁUGI PREVIEW -->
<section class="section">
	<div class="s-label reveal"><div class="s-label-line"></div><span>Usługi</span></div>
	<h2 class="s-title reveal">Nasze <span class="acc">specjalizacje</span></h2>
	<p class="s-sub reveal">Skupiam się na kanałach, które realnie przynoszą klientów.</p>
	<div class="svc-grid-2" style="margin-bottom:40px;">
		<div class="svc-card reveal d1">
			<span class="svc-num">001</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M8 12h8M12 8v8"/></svg>
			</div>
			<h3 class="svc-title">Promocje w Social Mediach</h3>
			<p class="svc-desc">Kampanie na Facebooku, Instagramie i LinkedIn, które docierają do właściwych osób we właściwym momencie.</p>
			<div class="svc-tags"><span class="svc-tag">Meta Ads</span><span class="svc-tag">Instagram</span><span class="svc-tag">LinkedIn</span></div>
		</div>
		<div class="svc-card reveal d2">
			<span class="svc-num">002</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
			</div>
			<h3 class="svc-title">Google Search Ads</h3>
			<p class="svc-desc">Kampanie w wyszukiwarce nastawione na konwersję. Płacisz tylko za kliknięcie od zainteresowanego użytkownika.</p>
			<div class="svc-tags"><span class="svc-tag">Search Ads</span><span class="svc-tag">Remarketing</span><span class="svc-tag">Shopping</span></div>
		</div>
		<div class="svc-card reveal d3">
			<span class="svc-num">003</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
			</div>
			<h3 class="svc-title">Kompleksowe Wsparcie</h3>
			<p class="svc-desc">Pełna opieka nad marketingiem firmy — strategia, budżetowanie, wdrożenie i raportowanie w jednym miejscu.</p>
			<div class="svc-tags"><span class="svc-tag">Strategia</span><span class="svc-tag">Omnichannel</span><span class="svc-tag">Consulting</span></div>
		</div>
		<div class="svc-card reveal d1">
			<span class="svc-num">004</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
			</div>
			<h3 class="svc-title">Tworzenie Stron Internetowych</h3>
			<p class="svc-desc">Nowoczesne strony i landing page'e zoptymalizowane pod konwersję, szybkość i SEO — fundament każdej kampanii.</p>
			<div class="svc-tags"><span class="svc-tag">Landing Pages</span><span class="svc-tag">WordPress</span><span class="svc-tag">SEO on-site</span></div>
		</div>
	</div>
	<div class="reveal" style="text-align:center;"><a href="<?php echo esc_url( ert_url( 'uslugi' ) ); ?>" class="btn-ghost">Wszystkie usługi →</a></div>
</section>

<!-- REALIZACJE PREVIEW -->
<section class="section section-alt">
	<div class="s-label reveal"><div class="s-label-line"></div><span>Realizacje</span></div>
	<h2 class="s-title reveal">Wybrane <span class="acc">wyniki</span></h2>
	<p class="s-sub reveal">Liczby mówią same za siebie.</p>
	<div class="stat-grid reveal">
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;">7.99×</div><div class="stat-lbl">Rekordowy ROAS</div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;">−45%</div><div class="stat-lbl">Redukcja CPA</div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;">Wkrótce</div><div class="stat-lbl">Wzrost zasięgu</div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;">Wkrótce</div><div class="stat-lbl">Wzrost zapytań</div></div>
	</div>
	<div class="reveal" style="text-align:center;margin-top:40px;"><a href="<?php echo esc_url( ert_url( 'realizacje' ) ); ?>" class="btn-ghost">Pełne case studies →</a></div>
</section>

<!-- CTA -->
<section class="section">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3>Gotowy na <span class="acc">wzrost?</span></h3>
			<p>Pierwsza konsultacja i wycena są bezpłatne. Odpowiadam w ciągu 24 godzin.</p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-primary">Napisz do mnie →</a>
			<a href="<?php echo esc_url( ert_url( 'o-mnie' ) ); ?>" class="btn-ghost">Dowiedz się więcej</a>
		</div>
	</div>
</section>

<?php
get_footer();
