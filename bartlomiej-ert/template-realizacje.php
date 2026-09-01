<?php
/**
 * Template Name: Realizacje
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
	.case-card { background: var(--card); border: 1px solid var(--border); margin-bottom: 2px; position: relative; overflow: hidden; transition: border-color 0.35s; }
	.case-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: var(--cyan); transform: scaleY(0); transform-origin: bottom; transition: transform 0.4s ease; }
	.case-card:hover { border-color: var(--border2); }
	.case-card:hover::before { transform: scaleY(1); }
	.case-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 24px; padding: 40px 48px 32px; border-bottom: 1px solid var(--border); flex-wrap: wrap; }
	.case-num { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--muted2); margin-bottom:10px; }
	.case-title { font-size:1.5rem; font-weight:800; color:var(--text); letter-spacing:-0.02em; margin-bottom:8px; min-height: 1.6em; }
	.case-industry { font-family:var(--mono); font-size:0.65rem; letter-spacing:0.14em; text-transform:uppercase; color:var(--cyan); min-height:1em; }
	.case-status-badge { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.14em; text-transform:uppercase; color:var(--cyan); background:var(--cyan-dim); border:1px solid var(--border2); padding:6px 16px; white-space:nowrap; align-self:flex-start; min-width:120px; text-align:center; }
	.case-body { display:grid; grid-template-columns:1fr 1fr; }
	.case-desc { padding: 36px 48px; border-right: 1px solid var(--border); display: flex; flex-direction: column; gap: 24px; }
	.case-desc-text { font-size:0.92rem; line-height:1.85; color:var(--muted); min-height:80px; }
	.case-desc-text p { margin-bottom:12px; }
	.case-desc-text p:last-child { margin-bottom:0; }
	.case-metrics { display:grid; grid-template-columns:1fr 1fr; gap:2px; }
	.case-metric { background:var(--bg3); border:1px solid var(--border); padding:18px 20px; }
	.case-metric-val { font-size:1.8rem; font-weight:800; color:var(--cyan); letter-spacing:-0.03em; line-height:1; min-height:2rem; }
	.case-metric-lbl { font-family:var(--mono); font-size:0.56rem; letter-spacing:0.12em; text-transform:uppercase; color:var(--muted2); margin-top:4px; }
	.case-tags { display:flex; flex-wrap:wrap; gap:7px; }
	.case-media { padding:36px 40px; display:flex; flex-direction:column; gap:16px; background:var(--bg2); }
	.media-label { font-family:var(--mono); font-size:0.58rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--muted2); margin-bottom:4px; }
	.screenshot-slot { width:100%; aspect-ratio:16/9; background:var(--bg3); border:1px dashed var(--border2); display:flex; flex-direction:column; align-items:center; justify-content:center; gap:10px; position:relative; overflow:hidden; cursor:pointer; transition:border-color 0.3s, background 0.3s; }
	.screenshot-slot:hover { border-color:var(--cyan); background:var(--card-h); }
	.screenshot-slot img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; display:none; }
	.screenshot-slot.has-image img { display:block; }
	.screenshot-slot.has-image .slot-icon, .screenshot-slot.has-image .slot-text, .screenshot-slot.has-image .slot-hint { display:none; }
	.slot-icon { color:var(--muted2); }
	.slot-icon svg { width:28px; height:28px; }
	.slot-text { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.14em; text-transform:uppercase; color:var(--muted2); text-align:center; line-height:1.6; }
	.slot-hint { font-size:0.7rem; color:var(--muted2); font-family:var(--mono); opacity:0.6; text-align:center; }
	.screenshots-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; }
	.screenshots-grid .screenshot-slot { aspect-ratio:4/3; }
	.iframe-slot { width:100%; aspect-ratio:4/3; background:var(--bg3); border:1px dashed var(--border2); display:flex; flex-direction:column; align-items:center; justify-content:center; gap:10px; position:relative; overflow:hidden; transition:border-color 0.3s; }
	.iframe-slot iframe { position:absolute; inset:0; width:100%; height:100%; border:none; display:none; }
	.iframe-slot.has-iframe iframe { display:block; }
	.iframe-slot.has-iframe .slot-icon, .iframe-slot.has-iframe .slot-text { display:none; }
	.iframe-slot .slot-icon { color:var(--muted2); }
	.iframe-slot .slot-text { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.14em; text-transform:uppercase; color:var(--muted2); text-align:center; line-height:1.6; }
	.editor-note { background:rgba(77,166,255,0.04); border:1px solid var(--border2); border-left:3px solid var(--cyan); padding:16px 20px; margin-bottom:32px; display:flex; gap:14px; align-items:flex-start; }
	.editor-note svg { color:var(--cyan); flex-shrink:0; margin-top:2px; }
	.editor-note-title { font-family:var(--mono); font-size:0.62rem; letter-spacing:0.16em; text-transform:uppercase; color:var(--cyan); margin-bottom:6px; }
	.editor-note-text { font-size:0.82rem; color:var(--muted); line-height:1.7; }
	.editor-note-text code { font-family:var(--mono); background:var(--bg3); padding:1px 6px; font-size:0.78rem; color:var(--cyan2); }
	@media(max-width:1100px){ .case-body{grid-template-columns:1fr} .case-desc{border-right:none;border-bottom:1px solid var(--border)} }
	@media(max-width:700px){ .case-top{padding:28px 24px 20px} .case-desc,.case-media{padding:24px} .screenshots-grid{grid-template-columns:1fr} }
</style>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php esc_html_e( 'Realizacje', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="page-title"><?php esc_html_e( 'Realizacje', 'bartlomiej-ert' ); ?> <span class="acc">&amp; <?php esc_html_e( 'wyniki', 'bartlomiej-ert' ); ?></span></h1>
		<p class="page-subtitle"><?php esc_html_e( 'Realne kampanie, realne liczby — poparte zrzutami ekranu z paneli reklamowych. Zero zmyślonych danych.', 'bartlomiej-ert' ); ?></p>
	</div>
</div>

<!-- STATYSTYKI ZBIORCZE -->
<section class="section section-alt">
	<div class="s-label reveal"><div class="s-label-line"></div><span><?php esc_html_e( 'Wyniki zbiorcze', 'bartlomiej-ert' ); ?></span></div>
	<h2 class="s-title reveal"><?php esc_html_e( 'Liczby mówią', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'same za siebie', 'bartlomiej-ert' ); ?></span></h2>

	<div class="editor-note reveal">
		<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
		<div>
			<div class="editor-note-title"><?php esc_html_e( 'Do uzupełnienia przez właściciela', 'bartlomiej-ert' ); ?></div>
			<p class="editor-note-text">
				<?php
				printf(
					esc_html__( 'Zamień %1$s w kafelkach statystyk na realne wartości (Google Ads, Meta, GA4). Edytuj plik szablonu %2$s w motywie, a po uzupełnieniu usuń blok %3$s.', 'bartlomiej-ert' ),
					'<code>—</code>',
					'<code>template-realizacje.php</code>',
					'<code>.editor-note</code>'
				);
				?>
			</p>
		</div>
	</div>

	<div class="stat-grid reveal">
		<div class="stat-box"><div class="stat-val" style="font-size:2rem;">—</div><div class="stat-lbl"><?php esc_html_e( 'Najlepszy ROAS kampanii', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:2rem;">—</div><div class="stat-lbl"><?php esc_html_e( 'Średnia redukcja CPA', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:2rem;">—</div><div class="stat-lbl"><?php esc_html_e( 'Budżet w zarządzaniu', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:2rem;">—</div><div class="stat-lbl"><?php esc_html_e( 'Projektów łącznie', 'bartlomiej-ert' ); ?></div></div>
	</div>
</section>

<!-- CASE STUDIES -->
<section class="section">
	<div class="s-label reveal"><div class="s-label-line"></div><span>Case studies</span></div>
	<h2 class="s-title reveal"><?php esc_html_e( 'Projekty', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'ze zrzutami ekranu', 'bartlomiej-ert' ); ?></span></h2>
	<p class="s-sub reveal"><?php esc_html_e( 'Każdy projekt zawiera screenshoty z Google Ads, Meta Ads Manager lub Google Analytics. Dane wrażliwe zanonimizowane na życzenie klienta.', 'bartlomiej-ert' ); ?></p>

	<?php for ( $c = 1; $c <= 3; $c++ ) : ?>
	<div class="case-card reveal">
		<div class="case-top">
			<div>
				<div class="case-num"><?php echo esc_html( sprintf( '%03d', $c ) ); ?> / </div>
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
				<div class="media-label"><?php esc_html_e( 'Wyniki kampanii — zrzut ekranu', 'bartlomiej-ert' ); ?></div>
				<div class="screenshot-slot">
					<img src="" alt="">
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
					<div class="slot-text"><?php esc_html_e( 'Screenshot z panelu', 'bartlomiej-ert' ); ?><br>Google Ads / Meta Ads</div>
					<div class="slot-hint"><?php esc_html_e( 'np. wykres ROAS, konwersji', 'bartlomiej-ert' ); ?></div>
				</div>
				<div class="media-label"><?php esc_html_e( 'Dodatkowe zrzuty', 'bartlomiej-ert' ); ?></div>
				<div class="screenshots-grid">
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
						<div class="slot-text"><?php esc_html_e( 'Zrzut 2', 'bartlomiej-ert' ); ?></div>
					</div>
					<div class="screenshot-slot">
						<img src="" alt="">
						<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
						<div class="slot-text"><?php esc_html_e( 'Zrzut 3', 'bartlomiej-ert' ); ?></div>
					</div>
				</div>
				<div class="media-label"><?php esc_html_e( 'Live dashboard (opcjonalnie)', 'bartlomiej-ert' ); ?></div>
				<div class="iframe-slot">
					<iframe src="" title="Dashboard" allowfullscreen></iframe>
					<div class="slot-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></div>
					<div class="slot-text"><?php esc_html_e( 'Wklej link do dashboardu', 'bartlomiej-ert' ); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php endfor; ?>

	<!-- INSTRUKCJA DLA WŁAŚCICIELA -->
	<div class="editor-note reveal" style="margin-top:48px;">
		<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
		<div>
			<div class="editor-note-title"><?php esc_html_e( 'Jak uzupełnić realizacje — instrukcja', 'bartlomiej-ert' ); ?></div>
			<p class="editor-note-text">
				<?php
				printf(
					esc_html__( 'Edytuj plik %1$s w motywie. Metryki wpisz w znaczniki %2$s. Screenshot: wstaw %3$s i dodaj klasę %4$s do %5$s. Iframe: wstaw %6$s i klasę %7$s do %8$s. Gotowe: usuń bloki %9$s przed publikacją.', 'bartlomiej-ert' ),
					'<code>template-realizacje.php</code>',
					'<code>.case-metric-val</code>',
					'<code>src="…"</code>',
					'<code>has-image</code>',
					'<code>.screenshot-slot</code>',
					'<code>src="URL"</code>',
					'<code>has-iframe</code>',
					'<code>.iframe-slot</code>',
					'<code>.editor-note</code>'
				);
				?>
			</p>
		</div>
	</div>
</section>

<section class="section section-alt">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3><?php esc_html_e( 'Chcesz być', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'kolejnym case study?', 'bartlomiej-ert' ); ?></span></h3>
			<p><?php esc_html_e( 'Napisz do mnie — bezpłatnie omówimy, jak osiągnąć podobne wyniki dla Twojej firmy.', 'bartlomiej-ert' ); ?></p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Darmowa wycena →', 'bartlomiej-ert' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
