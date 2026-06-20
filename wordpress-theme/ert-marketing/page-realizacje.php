<?php
/**
 * Szablon podstrony: Realizacje.
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
			<span>Realizacje</span>
		</div>
		<h1 class="page-title">Realizacje <span class="acc">&amp; wyniki</span></h1>
		<p class="page-subtitle">Realne kampanie, realne liczby — poparte zrzutami ekranu z paneli reklamowych. Zero zmyślonych danych.</p>
	</div>
</div>

<!-- STATYSTYKI ZBIORCZE -->
<section class="section section-alt">
	<div class="s-label reveal"><div class="s-label-line"></div><span>Wyniki zbiorcze</span></div>
	<h2 class="s-title reveal">Liczby mówią <span class="acc">same za siebie</span></h2>

	<div class="stat-grid reveal">
		<div class="stat-box">
			<div class="stat-val" style="font-size:2rem;">7.99×</div>
			<div class="stat-lbl">Najlepszy ROAS kampanii</div>
		</div>
		<div class="stat-box">
			<div class="stat-val" style="font-size:2rem;">−45%</div>
			<div class="stat-lbl">Średnia redukcja CPA</div>
		</div>
		<div class="stat-box">
			<div class="stat-val" style="font-size:2rem;">11</div>
			<div class="stat-lbl">Stron zbudowanych</div>
		</div>
		<div class="stat-box">
			<div class="stat-val" style="font-size:2rem;">15</div>
			<div class="stat-lbl">Projektów łącznie</div>
		</div>
	</div>
</section>

<!-- CASE STUDIES -->
<section class="section">
	<div class="s-label reveal"><div class="s-label-line"></div><span>Case studies</span></div>
	<h2 class="s-title reveal">Projekty <span class="acc">ze zrzutami ekranu</span></h2>
	<p class="s-sub reveal">Każdy projekt zawiera screenshoty z Google Ads, Meta Ads Manager lub Google Analytics. Dane wrażliwe zanonimizowane na życzenie klienta.</p>

	<!-- ══════════════════════════ CASE #1 ══════════════════════════ -->
	<div class="case-card reveal">
		<div class="case-top">
			<div>
				<div class="case-num">001 / <!-- Branża np. E-commerce --></div>
				<div class="case-title"><!-- Tytuł projektu --></div>
				<div class="case-industry"><!-- Branża · Platforma · Kanał --></div>
			</div>
			<span class="case-status-badge"><!-- Aktywna współpraca / Zakończony --></span>
		</div>
		<div class="case-body">
			<div class="case-desc">
				<div class="case-desc-text">
					<p><!-- Opis projektu: cel, wyzwanie, działania. --></p>
					<p><!-- Efekty, co zadziałało. --></p>
				</div>
				<div class="case-metrics">
					<div class="case-metric">
						<div class="case-metric-val"><!-- np. 3.8× --></div>
						<div class="case-metric-lbl"><!-- np. ROAS --></div>
					</div>
					<div class="case-metric">
						<div class="case-metric-val"><!-- np. −41% --></div>
						<div class="case-metric-lbl"><!-- np. CPA --></div>
					</div>
					<div class="case-metric">
						<div class="case-metric-val"><!-- np. 12 400 --></div>
						<div class="case-metric-lbl"><!-- np. Kliknięcia/mies. --></div>
					</div>
					<div class="case-metric">
						<div class="case-metric-val"><!-- np. 8.2% --></div>
						<div class="case-metric-lbl"><!-- np. CTR --></div>
					</div>
				</div>
				<div class="case-tags">
					<span class="svc-tag"><!-- np. Meta Ads --></span>
					<span class="svc-tag"><!-- np. Google Search --></span>
					<span class="svc-tag"><!-- np. Retargeting --></span>
				</div>
			</div>
			<div class="case-media">
				<div class="media-label">Wyniki kampanii — zrzut ekranu</div>
				<div class="screenshot-slot">
					<img src="" alt="Wyniki kampanii">
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
					<div class="slot-text">Screenshot z panelu<br>Google Ads / Meta Ads</div>
					<div class="slot-hint">np. wykres ROAS, konwersji, kosztu kliknięcia</div>
				</div>

				<div class="media-label">Dodatkowe zrzuty (struktury, GA4, kreacje)</div>
				<div class="screenshots-grid">
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
						<div class="slot-text">Zrzut 2</div>
						<div class="slot-hint">np. struktura konta</div>
					</div>
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
						<div class="slot-text">Zrzut 3</div>
						<div class="slot-hint">np. GA4 konwersje</div>
					</div>
				</div>

				<div class="media-label">Live dashboard — Looker Studio / GA4 (opcjonalnie)</div>
				<div class="iframe-slot">
					<iframe src="" title="Dashboard kampanii" allowfullscreen></iframe>
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></div>
					<div class="slot-text">Wklej link do dashboardu<br>Looker Studio lub embed GA4</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ══════════════════════════ CASE #2 ══════════════════════════ -->
	<div class="case-card reveal">
		<div class="case-top">
			<div>
				<div class="case-num">002 / </div>
				<div class="case-title"></div>
				<div class="case-industry"></div>
			</div>
			<span class="case-status-badge"></span>
		</div>
		<div class="case-body">
			<div class="case-desc">
				<div class="case-desc-text"><p></p><p></p></div>
				<div class="case-metrics">
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
				</div>
				<div class="case-tags">
					<span class="svc-tag"></span><span class="svc-tag"></span><span class="svc-tag"></span>
				</div>
			</div>
			<div class="case-media">
				<div class="media-label">Wyniki kampanii — zrzut ekranu</div>
				<div class="screenshot-slot">
					<img src="" alt="">
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
					<div class="slot-text">Screenshot z panelu<br>Google Ads / Meta Ads</div>
					<div class="slot-hint">np. wykres ROAS, konwersji</div>
				</div>
				<div class="media-label">Dodatkowe zrzuty</div>
				<div class="screenshots-grid">
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
						<div class="slot-text">Zrzut 2</div>
					</div>
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
						<div class="slot-text">Zrzut 3</div>
					</div>
				</div>
				<div class="media-label">Live dashboard (opcjonalnie)</div>
				<div class="iframe-slot">
					<iframe src="" title="Dashboard" allowfullscreen></iframe>
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></div>
					<div class="slot-text">Wklej link do dashboardu</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ══════════════════════════ CASE #3 ══════════════════════════ -->
	<div class="case-card reveal">
		<div class="case-top">
			<div>
				<div class="case-num">003 / </div>
				<div class="case-title"></div>
				<div class="case-industry"></div>
			</div>
			<span class="case-status-badge"></span>
		</div>
		<div class="case-body">
			<div class="case-desc">
				<div class="case-desc-text"><p></p><p></p></div>
				<div class="case-metrics">
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
					<div class="case-metric"><div class="case-metric-val"></div><div class="case-metric-lbl"></div></div>
				</div>
				<div class="case-tags">
					<span class="svc-tag"></span><span class="svc-tag"></span>
				</div>
			</div>
			<div class="case-media">
				<div class="media-label">Wyniki kampanii — zrzut ekranu</div>
				<div class="screenshot-slot">
					<img src="" alt="">
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
					<div class="slot-text">Screenshot z panelu<br>Google Ads / Meta Ads</div>
					<div class="slot-hint">np. wykres ROAS, konwersji</div>
				</div>
				<div class="media-label">Dodatkowe zrzuty</div>
				<div class="screenshots-grid">
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
						<div class="slot-text">Zrzut 2</div>
					</div>
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
						<div class="slot-text">Zrzut 3</div>
					</div>
				</div>
				<div class="media-label">Live dashboard (opcjonalnie)</div>
				<div class="iframe-slot">
					<iframe src="" title="Dashboard" allowfullscreen></iframe>
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></div>
					<div class="slot-text">Wklej link do dashboardu</div>
				</div>
			</div>
		</div>
	</div>

	<!-- INSTRUKCJA DLA WŁAŚCICIELA -->
	<div class="editor-note reveal" style="margin-top:48px;">
		<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
		<div>
			<div class="editor-note-title">Jak uzupełnić realizacje — instrukcja</div>
			<p class="editor-note-text">
				<strong style="color:var(--text);">Metryki:</strong> wpisz liczby bezpośrednio w znaczniki <code>.case-metric-val</code> w pliku <code>page-realizacje.php</code>.<br>
				<strong style="color:var(--text);">Screenshot:</strong> wgraj plik w Mediach WordPress, wstaw jego adres do <code>src</code> w <code>&lt;img&gt;</code> i dodaj klasę <code>has-image</code> do <code>.screenshot-slot</code>.<br>
				<strong style="color:var(--text);">Iframe (Looker/GA4):</strong> wstaw <code>src="URL"</code> do <code>&lt;iframe&gt;</code> i dodaj klasę <code>has-iframe</code> do <code>.iframe-slot</code>.<br>
				<strong style="color:var(--text);">Nowy projekt:</strong> skopiuj blok <code>&lt;div class="case-card"&gt;</code>, wklej za ostatnim, zmień numer.<br>
				<strong style="color:var(--text);">Gotowe:</strong> usuń bloki <code>.editor-note</code> przed publikacją.
			</p>
		</div>
	</div>
</section>

<section class="section section-alt">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3>Chcesz być <span class="acc">kolejnym case study?</span></h3>
			<p>Napisz do mnie — bezpłatnie omówimy, jak osiągnąć podobne wyniki dla Twojej firmy.</p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-primary">Darmowa wycena →</a>
		</div>
	</div>
</section>

<?php
get_footer();
