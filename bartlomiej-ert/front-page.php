<?php
/**
 * Strona główna.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$be_kontakt    = be_page_url( 'kontakt' );
$be_uslugi     = be_page_url( 'uslugi' );
$be_realizacje = be_page_url( 'realizacje' );
$be_o_mnie     = be_page_url( 'o-mnie' );
?>

<style>
	/* HERO GŁÓWNA */
	#hero { min-height:100vh; display:flex; align-items:center; padding:100px 60px 80px; position:relative; overflow:hidden;
		background: radial-gradient(ellipse 70% 60% at 60% 40%, rgba(77,166,255,0.06) 0%, transparent 65%),
					radial-gradient(ellipse 40% 40% at 10% 80%, rgba(60,80,200,0.05) 0%, transparent 60%);
	}
	.hero-grid { position:absolute; inset:0; pointer-events:none; background-image:linear-gradient(var(--border) 1px,transparent 1px),linear-gradient(90deg,var(--border) 1px,transparent 1px); background-size:60px 60px; mask-image:radial-gradient(ellipse 80% 70% at 50% 50%,black 30%,transparent 100%); }
	.hero-glow { position:absolute; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle,rgba(77,166,255,0.07) 0%,transparent 70%); top:50%; left:45%; transform:translate(-50%,-50%); pointer-events:none; animation:glowPulse 6s ease-in-out infinite; }
	.hero-inner { position:relative; z-index:2; max-width:900px; }
	.hero-badge { display:inline-flex; align-items:center; gap:10px; border:1px solid var(--border2); background:var(--cyan-dim); padding:7px 18px; margin-bottom:36px; opacity:0; animation:slideIn 0.8s ease 0.2s forwards; }
	.hero-badge-dot { width:6px; height:6px; border-radius:50%; background:var(--cyan); animation:blink 2s ease-in-out infinite; }
	.hero-badge span { font-family:var(--mono); font-size:0.66rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--cyan); }
	.hero-h1 { font-size:clamp(3rem,6.5vw,6rem); font-weight:800; line-height:1.0; letter-spacing:-0.03em; color:var(--text); margin-bottom:28px; opacity:0; animation:slideIn 0.9s ease 0.4s forwards; }
	.hero-h1 .accent { color:var(--cyan); position:relative; }
	.hero-h1 .accent::after { content:''; position:absolute; bottom:4px; left:0; right:0; height:3px; background:linear-gradient(90deg,var(--cyan),transparent); }
	.hero-sub { font-size:1.1rem; font-weight:300; line-height:1.7; color:var(--muted); max-width:560px; margin-bottom:48px; opacity:0; animation:slideIn 0.9s ease 0.6s forwards; }
	.hero-sub strong { color:var(--text); font-weight:500; }
	.hero-actions { display:flex; gap:16px; align-items:center; opacity:0; animation:slideIn 0.9s ease 0.8s forwards; flex-wrap:wrap; }
	.hero-metrics { display:flex; gap:60px; margin-top:72px; padding-top:40px; border-top:1px solid var(--border); opacity:0; animation:slideIn 0.9s ease 1s forwards; }
	.metric-val { font-size:2.4rem; font-weight:800; color:var(--cyan); letter-spacing:-0.03em; line-height:1; }
	.metric-label { font-family:var(--mono); font-size:0.62rem; letter-spacing:0.14em; text-transform:uppercase; color:var(--muted); margin-top:6px; }
	@media(max-width:900px){
		#hero{padding:90px 24px 60px}
		.hero-metrics{gap:28px;flex-wrap:wrap}
	}
</style>

<?php
// Przygotowanie metryk (jeśli wartość to „—”, wyświetlamy przygaszony myślnik).
$be_metrics = array(
	array( 'val' => be_get( 'metric_years' ), 'label' => __( 'Lat doświadczenia', 'bartlomiej-ert' ) ),
	array( 'val' => be_get( 'metric_proj' ),  'label' => __( 'Projektów', 'bartlomiej-ert' ) ),
	array( 'val' => be_get( 'metric_roas' ),  'label' => __( 'Śr. ROAS kampanii', 'bartlomiej-ert' ) ),
	array( 'val' => be_get( 'metric_cpa' ),   'label' => __( 'Śr. CPA vs. przed', 'bartlomiej-ert' ) ),
);
?>

<section id="hero">
	<div class="hero-grid"></div>
	<div class="hero-glow"></div>
	<div class="hero-inner">
		<div class="hero-badge">
			<div class="hero-badge-dot"></div>
			<span><?php esc_html_e( 'Dostępny do nowych projektów', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="hero-h1"><?php esc_html_e( 'Marketing, który', 'bartlomiej-ert' ); ?><br><span class="accent"><?php esc_html_e( 'generuje wyniki', 'bartlomiej-ert' ); ?></span></h1>
		<p class="hero-sub"><?php
			printf(
				/* translators: %s: pogrubiony fragment */
				esc_html__( 'Reklamy w social mediach, Google Search Ads i kompleksowe wsparcie marketingowe. Pomagam firmom rosnąć — %s.', 'bartlomiej-ert' ),
				'<strong>' . esc_html__( 'bez przepalania budżetu', 'bartlomiej-ert' ) . '</strong>'
			);
		?></p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Darmowa wycena →', 'bartlomiej-ert' ); ?></a>
			<a href="<?php echo esc_url( $be_realizacje ); ?>" class="btn-ghost"><?php esc_html_e( 'Zobacz realizacje', 'bartlomiej-ert' ); ?></a>
		</div>
		<div class="hero-metrics">
			<?php foreach ( $be_metrics as $m ) :
				$is_empty = ( '—' === trim( $m['val'] ) || '' === trim( $m['val'] ) );
				?>
				<div>
					<div class="metric-val"<?php echo $is_empty ? ' style="font-size:1.4rem;opacity:0.4;"' : ''; ?>><?php echo esc_html( $is_empty ? '—' : $m['val'] ); ?></div>
					<div class="metric-label"><?php echo esc_html( $m['label'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<div class="ticker">
	<div class="ticker-track">
		<?php
		$be_ticker = array( 'Meta Ads', 'Google Search Ads', 'LinkedIn Ads', 'Strategia Social Media', 'Retargeting', 'Performance Marketing', 'Remarketing', 'Brand Awareness' );
		// Dwa przebiegi dla płynnej pętli.
		for ( $i = 0; $i < 2; $i++ ) {
			foreach ( $be_ticker as $t ) {
				echo '<div class="ticker-item">' . esc_html( $t ) . '</div>';
			}
		}
		?>
	</div>
</div>

<!-- USŁUGI PREVIEW -->
<section class="section">
	<div class="s-label reveal"><div class="s-label-line"></div><span><?php esc_html_e( 'Usługi', 'bartlomiej-ert' ); ?></span></div>
	<h2 class="s-title reveal"><?php esc_html_e( 'Nasze', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'specjalizacje', 'bartlomiej-ert' ); ?></span></h2>
	<p class="s-sub reveal"><?php esc_html_e( 'Skupiam się na kanałach, które realnie przynoszą klientów.', 'bartlomiej-ert' ); ?></p>
	<div class="svc-grid-2" style="margin-bottom:40px;">
		<div class="svc-card reveal d1">
			<span class="svc-num">001</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M8 12h8M12 8v8"/></svg>
			</div>
			<h3 class="svc-title"><?php esc_html_e( 'Promocje w Social Mediach', 'bartlomiej-ert' ); ?></h3>
			<p class="svc-desc"><?php esc_html_e( 'Kampanie na Facebooku, Instagramie i LinkedIn, które docierają do właściwych osób we właściwym momencie.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag">Meta Ads</span><span class="svc-tag">Instagram</span><span class="svc-tag">LinkedIn</span></div>
		</div>
		<div class="svc-card reveal d2">
			<span class="svc-num">002</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
			</div>
			<h3 class="svc-title">Google Search Ads</h3>
			<p class="svc-desc"><?php esc_html_e( 'Kampanie w wyszukiwarce nastawione na konwersję. Płacisz tylko za kliknięcie od zainteresowanego użytkownika.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag">Search Ads</span><span class="svc-tag">Remarketing</span><span class="svc-tag">Shopping</span></div>
		</div>
		<div class="svc-card reveal d3">
			<span class="svc-num">003</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
			</div>
			<h3 class="svc-title"><?php esc_html_e( 'Kompleksowe Wsparcie', 'bartlomiej-ert' ); ?></h3>
			<p class="svc-desc"><?php esc_html_e( 'Pełna opieka nad marketingiem firmy — strategia, budżetowanie, wdrożenie i raportowanie w jednym miejscu.', 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag"><?php esc_html_e( 'Strategia', 'bartlomiej-ert' ); ?></span><span class="svc-tag">Omnichannel</span><span class="svc-tag">Consulting</span></div>
		</div>
		<div class="svc-card reveal d1">
			<span class="svc-num">004</span>
			<div class="svc-icon-wrap">
				<svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
			</div>
			<h3 class="svc-title"><?php esc_html_e( 'Tworzenie Stron Internetowych', 'bartlomiej-ert' ); ?></h3>
			<p class="svc-desc"><?php esc_html_e( "Nowoczesne strony i landing page'e zoptymalizowane pod konwersję, szybkość i SEO — fundament każdej kampanii.", 'bartlomiej-ert' ); ?></p>
			<div class="svc-tags"><span class="svc-tag">Landing Pages</span><span class="svc-tag">WordPress</span><span class="svc-tag">SEO on-site</span></div>
		</div>
	</div>
	<div class="reveal" style="text-align:center;"><a href="<?php echo esc_url( $be_uslugi ); ?>" class="btn-ghost"><?php esc_html_e( 'Wszystkie usługi →', 'bartlomiej-ert' ); ?></a></div>
</section>

<!-- REALIZACJE PREVIEW -->
<section class="section section-alt">
	<div class="s-label reveal"><div class="s-label-line"></div><span><?php esc_html_e( 'Realizacje', 'bartlomiej-ert' ); ?></span></div>
	<h2 class="s-title reveal"><?php esc_html_e( 'Wybrane', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'wyniki', 'bartlomiej-ert' ); ?></span></h2>
	<p class="s-sub reveal"><?php esc_html_e( 'Liczby mówią same za siebie.', 'bartlomiej-ert' ); ?></p>
	<div class="stat-grid reveal">
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;"><?php esc_html_e( 'Wkrótce', 'bartlomiej-ert' ); ?></div><div class="stat-lbl"><?php esc_html_e( 'Rekordowy ROAS', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;"><?php esc_html_e( 'Wkrótce', 'bartlomiej-ert' ); ?></div><div class="stat-lbl"><?php esc_html_e( 'Redukcja CPA', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;"><?php esc_html_e( 'Wkrótce', 'bartlomiej-ert' ); ?></div><div class="stat-lbl"><?php esc_html_e( 'Wzrost zasięgu', 'bartlomiej-ert' ); ?></div></div>
		<div class="stat-box"><div class="stat-val" style="font-size:1.6rem;"><?php esc_html_e( 'Wkrótce', 'bartlomiej-ert' ); ?></div><div class="stat-lbl"><?php esc_html_e( 'Wzrost zapytań', 'bartlomiej-ert' ); ?></div></div>
	</div>
	<div class="reveal" style="text-align:center;margin-top:40px;"><a href="<?php echo esc_url( $be_realizacje ); ?>" class="btn-ghost"><?php esc_html_e( 'Pełne case studies →', 'bartlomiej-ert' ); ?></a></div>
</section>

<!-- CTA -->
<section class="section">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3><?php esc_html_e( 'Gotowy na', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'wzrost?', 'bartlomiej-ert' ); ?></span></h3>
			<p><?php esc_html_e( 'Pierwsza konsultacja i wycena są bezpłatne. Odpowiadam w ciągu 24 godzin.', 'bartlomiej-ert' ); ?></p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Napisz do mnie →', 'bartlomiej-ert' ); ?></a>
			<a href="<?php echo esc_url( $be_o_mnie ); ?>" class="btn-ghost"><?php esc_html_e( 'Dowiedz się więcej', 'bartlomiej-ert' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
