<?php
/**
 * Template Name: Usługi
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$be_kontakt = be_page_url( 'kontakt' );
?>

<style>
	.offer-row { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; margin-bottom: 2px; }
	.offer-big { background: var(--card); border: 1px solid var(--border); padding: 52px 48px; position: relative; overflow: hidden; transition: border-color 0.35s, background 0.35s; grid-column: span 2; }
	.offer-big::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,var(--cyan),transparent); transform:scaleX(0); transform-origin:left; transition:transform 0.45s ease; }
	.offer-big:hover { border-color:var(--border2); background:var(--card-h); }
	.offer-big:hover::before { transform:scaleX(1); }
	.offer-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; }
	.offer-head-num { font-family:var(--mono); font-size:0.62rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--muted2); margin-bottom:16px; }
	.offer-head-title { font-size:1.8rem; font-weight:800; color:var(--text); letter-spacing:-0.02em; margin-bottom:16px; line-height:1.1; }
	.offer-head-title .acc { color:var(--cyan); }
	.offer-head-desc { font-size:0.95rem; line-height:1.8; color:var(--muted); margin-bottom:28px; }
	.offer-points { list-style:none; display:flex; flex-direction:column; gap:12px; }
	.offer-points li { display:flex; align-items:flex-start; gap:12px; font-size:0.9rem; color:var(--text); line-height:1.5; }
	.offer-points li::before { content:'→'; color:var(--cyan); font-family:var(--mono); font-size:0.8rem; flex-shrink:0; margin-top:2px; }
	.offer-aside { padding-top:8px; }
	.offer-aside-label { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--muted2); margin-bottom:16px; }
	.offer-aside-tags { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:28px; }
	.offer-price-note { font-family:var(--mono); font-size:0.65rem; letter-spacing:0.1em; color:var(--muted); line-height:1.7; border-top:1px solid var(--border); padding-top:20px; }
	.offer-price-note strong { color:var(--cyan); display:block; font-size:1.1rem; font-family:var(--ff); font-weight:700; margin-bottom:4px; }
	.offer-small { background: var(--card); border: 1px solid var(--border); padding: 40px 36px; position: relative; overflow: hidden; transition: border-color 0.35s, background 0.35s; }
	.offer-small::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,var(--cyan),transparent); transform:scaleX(0); transform-origin:left; transition:transform 0.45s ease; }
	.offer-small:hover { border-color:var(--border2); background:var(--card-h); }
	.offer-small:hover::before { transform:scaleX(1); }
	.offer-small-num { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--muted2); margin-bottom:14px; }
	.offer-small-icon { width:52px; height:52px; background:var(--cyan-glow); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; margin-bottom:20px; }
	.offer-small-icon svg { width:22px; height:22px; color:var(--cyan); }
	.offer-small-title { font-size:1.15rem; font-weight:700; color:var(--text); margin-bottom:10px; letter-spacing:-0.01em; }
	.offer-small-desc { font-size:0.88rem; line-height:1.75; color:var(--muted); margin-bottom:20px; }
	.excl-box { background:var(--bg3); border:1px solid var(--border); border-left:3px solid rgba(255,80,80,0.5); padding:24px 28px; margin-top:64px; display:flex; align-items:flex-start; gap:16px; }
	.excl-icon { color:rgba(255,100,100,0.7); flex-shrink:0; margin-top:2px; }
	.excl-title { font-family:var(--mono); font-size:0.62rem; letter-spacing:0.16em; text-transform:uppercase; color:rgba(255,100,100,0.7); margin-bottom:6px; }
	.excl-text { font-size:0.88rem; line-height:1.7; color:var(--muted); }
	@media(max-width:900px){ .offer-big,.offer-row{grid-template-columns:1fr} .offer-big{grid-column:1} .offer-inner{grid-template-columns:1fr;gap:32px} }
</style>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php esc_html_e( 'Usługi', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="page-title"><?php esc_html_e( 'Nasze', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'specjalizacje', 'bartlomiej-ert' ); ?></span></h1>
		<p class="page-subtitle"><?php esc_html_e( 'Trzy obszary, w których dostarczam mierzalne wyniki. Bez rozproszenia — głęboka ekspertyza tam, gdzie to ma znaczenie.', 'bartlomiej-ert' ); ?></p>
	</div>
</div>

<section class="section">
	<!-- OFERTA 1 — Social Media -->
	<div class="offer-big reveal" style="margin-bottom:2px;">
		<div class="offer-inner">
			<div>
				<div class="offer-head-num">001 / Social Media</div>
				<h2 class="offer-head-title"><?php esc_html_e( 'Promocje Reklamowe', 'bartlomiej-ert' ); ?><br><?php esc_html_e( 'w', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'Social Mediach', 'bartlomiej-ert' ); ?></span></h2>
				<p class="offer-head-desc"><?php esc_html_e( 'Kompleksowe kampanie płatne na Facebooku, Instagramie i LinkedIn. Od strategii kreacji, przez precyzyjne targetowanie, aż po codzienną optymalizację i raportowanie wyników.', 'bartlomiej-ert' ); ?></p>
				<ul class="offer-points">
					<li><?php esc_html_e( 'Konfiguracja i audyt kont reklamowych Meta Business Suite', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Tworzenie struktury kampanii (awareness → konwersja → retargeting)', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Briefowanie kreacji lub tworzenie grafik reklamowych', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Testy A/B kreacji, copy i grup docelowych', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Cotygodniowe raporty z wnioskami i rekomendacjami', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Integracja z pikselami śledzenia i analityką', 'bartlomiej-ert' ); ?></li>
				</ul>
			</div>
			<div class="offer-aside">
				<div class="offer-aside-label"><?php esc_html_e( 'Platformy', 'bartlomiej-ert' ); ?></div>
				<div class="offer-aside-tags">
					<span class="svc-tag">Facebook Ads</span>
					<span class="svc-tag">Instagram Ads</span>
					<span class="svc-tag">LinkedIn Ads</span>
					<span class="svc-tag">Meta Pixel</span>
					<span class="svc-tag">Lookalike Audiences</span>
					<span class="svc-tag">Retargeting</span>
				</div>
				<div class="offer-aside-label" style="margin-top:20px;"><?php esc_html_e( 'Dla kogo', 'bartlomiej-ert' ); ?></div>
				<p style="font-size:0.88rem;color:var(--muted);line-height:1.7;margin-bottom:20px;"><?php esc_html_e( 'Firmy e-commerce, usługi B2C i B2B, brandy chcące zbudować zasięg lub bezpośrednią sprzedaż przez social media.', 'bartlomiej-ert' ); ?></p>
				<div class="offer-price-note"><strong><?php esc_html_e( 'Wycena indywidualna', 'bartlomiej-ert' ); ?></strong></div>
				<div style="margin-top:24px;"><a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Zapytaj o wycenę →', 'bartlomiej-ert' ); ?></a></div>
			</div>
		</div>
	</div>

	<!-- OFERTA 2 — Google -->
	<div class="offer-big reveal" style="margin-bottom:32px;">
		<div class="offer-inner">
			<div>
				<div class="offer-head-num">002 / Google Ads</div>
				<h2 class="offer-head-title">Google <span class="acc">Search Ads</span></h2>
				<p class="offer-head-desc"><?php esc_html_e( 'Kampanie w wyszukiwarce Google skierowane do użytkowników aktywnie szukających Twoich usług. Najwyższa intencja zakupowa, mierzalne konwersje, pełna kontrola nad budżetem.', 'bartlomiej-ert' ); ?></p>
				<ul class="offer-points">
					<li><?php esc_html_e( 'Badanie słów kluczowych i analiza konkurencji w Google', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Budowa i konfiguracja kampanii Search w Google Ads', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Pisanie skutecznych reklam tekstowych (RSA)', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Optymalizacja stawek, jakości i współczynnika konwersji', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Konfiguracja konwersji w Google Analytics 4 i Tag Manager', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Miesięczne raporty z wynikami i planem na kolejny miesiąc', 'bartlomiej-ert' ); ?></li>
				</ul>
			</div>
			<div class="offer-aside">
				<div class="offer-aside-label"><?php esc_html_e( 'Narzędzia', 'bartlomiej-ert' ); ?></div>
				<div class="offer-aside-tags">
					<span class="svc-tag">Google Ads</span>
					<span class="svc-tag">Search Campaigns</span>
					<span class="svc-tag">PMAX</span>
					<span class="svc-tag">GA4</span>
					<span class="svc-tag">Tag Manager</span>
					<span class="svc-tag">Merchant Center</span>
				</div>
				<div class="offer-aside-label" style="margin-top:20px;"><?php esc_html_e( 'Dla kogo', 'bartlomiej-ert' ); ?></div>
				<p style="font-size:0.88rem;color:var(--muted);line-height:1.7;margin-bottom:20px;"><?php esc_html_e( 'Usługi lokalne i ogólnopolskie, e-commerce, firmy B2B szukające leadów z wysoką intencją zakupową.', 'bartlomiej-ert' ); ?></p>
				<div class="offer-price-note"><strong><?php esc_html_e( 'Wycena indywidualna', 'bartlomiej-ert' ); ?></strong></div>
				<div style="margin-top:24px;"><a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Zapytaj o wycenę →', 'bartlomiej-ert' ); ?></a></div>
			</div>
		</div>
	</div>

	<!-- OFERTA 3 — Strony internetowe -->
	<div class="offer-big reveal" style="margin-bottom:32px;">
		<div class="offer-inner">
			<div>
				<div class="offer-head-num">003 / <?php esc_html_e( 'Strony internetowe', 'bartlomiej-ert' ); ?></div>
				<h2 class="offer-head-title"><?php esc_html_e( 'Tworzenie', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'Stron Internetowych', 'bartlomiej-ert' ); ?></span></h2>
				<p class="offer-head-desc"><?php esc_html_e( 'Projektuję i buduję strony, które nie tylko wyglądają nowocześnie — ale są zoptymalizowane pod konwersję, szybkość i SEO. Strona to fundament każdej skutecznej kampanii reklamowej.', 'bartlomiej-ert' ); ?></p>
				<ul class="offer-points">
					<li><?php esc_html_e( "Projekt i wdrożenie strony firmowej lub landing page'a", 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Optymalizacja pod kątem szybkości ładowania i Core Web Vitals', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Integracja z Google Analytics 4, Meta Pixel i Tag Manager', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Podstawowe SEO on-site: struktura, metatagi, sitemap', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Formularze kontaktowe i połączenie z systemem CRM', 'bartlomiej-ert' ); ?></li>
					<li><?php esc_html_e( 'Responsywność — perfekcyjny wygląd na mobile i desktop', 'bartlomiej-ert' ); ?></li>
				</ul>
			</div>
			<div class="offer-aside">
				<div class="offer-aside-label"><?php esc_html_e( 'Technologie', 'bartlomiej-ert' ); ?></div>
				<div class="offer-aside-tags">
					<span class="svc-tag">HTML / CSS / JS</span>
					<span class="svc-tag">WordPress</span>
					<span class="svc-tag">Landing Pages</span>
					<span class="svc-tag">Core Web Vitals</span>
					<span class="svc-tag">SEO on-site</span>
					<span class="svc-tag">GA4 / Pixel</span>
				</div>
				<div class="offer-aside-label" style="margin-top:20px;"><?php esc_html_e( 'Dla kogo', 'bartlomiej-ert' ); ?></div>
				<p style="font-size:0.88rem;color:var(--muted);line-height:1.7;margin-bottom:20px;"><?php esc_html_e( "Firmy bez strony lub z przestarzałą witryną, biznesy potrzebujące dedykowanych landing page'y pod kampanie reklamowe.", 'bartlomiej-ert' ); ?></p>
				<div class="offer-price-note"><strong><?php esc_html_e( 'Wycena indywidualna', 'bartlomiej-ert' ); ?></strong></div>
				<div style="margin-top:24px;"><a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Zapytaj o wycenę →', 'bartlomiej-ert' ); ?></a></div>
			</div>
		</div>
	</div>

	<!-- OFERTA 4 — Kompleksowa -->
	<div class="s-label reveal"><div class="s-label-line"></div><span>004 / <?php esc_html_e( 'Kompleksowe wsparcie', 'bartlomiej-ert' ); ?></span></div>
	<h2 class="s-title reveal" style="margin-bottom:12px;"><?php esc_html_e( 'Zewnętrzny Dział', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'Marketingu', 'bartlomiej-ert' ); ?></span></h2>
	<p class="s-sub reveal"><?php esc_html_e( 'Dla firm, które chcą zająć się biznesem — a marketing oddać w sprawdzone ręce.', 'bartlomiej-ert' ); ?></p>
	<div class="offer-row">
		<div class="offer-small reveal d1">
			<div class="offer-small-num">003.A</div>
			<div class="offer-small-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z"/></svg></div>
			<h3 class="offer-small-title"><?php esc_html_e( 'Strategia & Planowanie', 'bartlomiej-ert' ); ?></h3>
			<p class="offer-small-desc"><?php esc_html_e( 'Kompleksowa strategia marketingowa: analiza rynku, pozycjonowanie, dobór kanałów, budżetowanie i kwartalny roadmap działań.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag"><?php esc_html_e( 'Strategia', 'bartlomiej-ert' ); ?></span><span class="svc-tag">Briefy</span><span class="svc-tag">KPI</span></div>
		</div>
		<div class="offer-small reveal d2">
			<div class="offer-small-num">003.B</div>
			<div class="offer-small-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
			<h3 class="offer-small-title"><?php esc_html_e( 'Prowadzenie Kampanii', 'bartlomiej-ert' ); ?></h3>
			<p class="offer-small-desc"><?php esc_html_e( 'Pełna obsługa wszystkich aktywnych kanałów płatnych — Meta, Google, LinkedIn — w ramach jednej umowy i jednego punktu kontaktu.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag">Multi-channel</span><span class="svc-tag"><?php esc_html_e( 'Optymalizacja', 'bartlomiej-ert' ); ?></span></div>
		</div>
		<div class="offer-small reveal d2">
			<div class="offer-small-num">003.C</div>
			<div class="offer-small-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
			<h3 class="offer-small-title"><?php esc_html_e( 'Raportowanie & Analityka', 'bartlomiej-ert' ); ?></h3>
			<p class="offer-small-desc"><?php esc_html_e( 'Regularne raporty w czytelnej formie: co zadziałało, co zoptymalizować i jakie są priorytety na kolejny okres.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag">Dashboard</span><span class="svc-tag">GA4</span><span class="svc-tag">Looker</span></div>
		</div>
		<div class="offer-small reveal d3">
			<div class="offer-small-num">003.D</div>
			<div class="offer-small-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
			<h3 class="offer-small-title"><?php esc_html_e( 'Koordynacja Agencji', 'bartlomiej-ert' ); ?></h3>
			<p class="offer-small-desc"><?php esc_html_e( 'Jeśli współpracujesz z agencją kreatywną lub SEO — koordynuję ich działania i dbam o spójność komunikacji marketingowej.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag"><?php esc_html_e( 'Nadzór', 'bartlomiej-ert' ); ?></span><span class="svc-tag"><?php esc_html_e( 'Brief agencji', 'bartlomiej-ert' ); ?></span></div>
		</div>
	</div>

	<div class="excl-box reveal">
		<svg class="excl-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
		<div>
			<div class="excl-title"><?php esc_html_e( 'Wykluczenie branżowe', 'bartlomiej-ert' ); ?></div>
			<p class="excl-text"><?php esc_html_e( 'Nie obsługuję branży gastronomicznej — restauracji, kawiarni, barów i podobnych lokali. Skupiam się na sektorach, w których mogę zagwarantować najwyższą jakość i realnie mierzalne wyniki.', 'bartlomiej-ert' ); ?></p>
		</div>
	</div>
</section>

<section class="section section-alt">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3><?php esc_html_e( 'Nie wiesz, która usługa', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'pasuje do Ciebie?', 'bartlomiej-ert' ); ?></span></h3>
			<p><?php esc_html_e( 'Napisz — bezpłatnie omówimy Twoje potrzeby i dobierzemy optymalne rozwiązanie.', 'bartlomiej-ert' ); ?></p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Bezpłatna konsultacja →', 'bartlomiej-ert' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
