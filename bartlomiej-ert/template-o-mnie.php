<?php
/**
 * Template Name: O mnie
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$be_kontakt    = be_page_url( 'kontakt' );
$be_realizacje = be_page_url( 'realizacje' );
$be_uslugi     = be_page_url( 'uslugi' );
$be_name       = be_get( 'brand_name' );
$be_short      = be_get( 'brand_short' );
?>

<style>
	.about-grid { display:grid; grid-template-columns:400px 1fr; gap:72px; align-items:start; }
	.profile-card { background:var(--card); border:1px solid var(--border); padding:48px; position:relative; overflow:hidden; }
	.profile-card::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,var(--cyan),transparent); }
	.profile-bg { position:absolute; inset:0; background:radial-gradient(ellipse 70% 70% at 80% 80%,var(--cyan-glow),transparent); }
	.profile-initial { font-size:7rem; font-weight:800; color:var(--cyan); line-height:1; opacity:0.1; letter-spacing:-0.05em; position:relative; z-index:1; }
	.profile-info { position:relative; z-index:1; margin-top:-20px; margin-bottom:32px; }
	.profile-name { font-size:1.8rem; font-weight:800; color:var(--text); letter-spacing:-0.02em; margin-bottom:6px; }
	.profile-role { font-family:var(--mono); font-size:0.65rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--cyan); }
	.profile-badges { display:flex; flex-wrap:wrap; gap:8px; position:relative; z-index:1; margin-bottom:32px; }
	.profile-badge { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.12em; text-transform:uppercase; color:var(--muted); border:1px solid var(--border); padding:6px 12px; }
	.profile-stat-row { display:grid; grid-template-columns:1fr 1fr; gap:2px; position:relative; z-index:1; margin-top:24px; }
	.profile-stat { background:var(--bg3); padding:16px; text-align:center; }
	.profile-stat-val { font-size:1.6rem; font-weight:800; color:var(--cyan); letter-spacing:-0.02em; line-height:1; }
	.profile-stat-lbl { font-family:var(--mono); font-size:0.55rem; letter-spacing:0.12em; text-transform:uppercase; color:var(--muted2); margin-top:4px; }
	.about-text-block { margin-bottom:48px; }
	.about-text-block p { font-size:0.95rem; line-height:1.9; color:var(--muted); margin-bottom:16px; }
	.about-text-block p strong { color:var(--text); font-weight:600; }
	.about-text-block p:last-child { margin-bottom:0; }
	.skills-section { margin-bottom:48px; }
	.skills-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
	.skill-row { display:flex; align-items:center; gap:12px; }
	.skill-name { font-size:0.88rem; color:var(--text); min-width:160px; }
	.skill-bar { flex:1; height:3px; background:var(--border); position:relative; overflow:hidden; }
	.skill-fill { height:100%; background:linear-gradient(90deg,var(--cyan),var(--cyan2)); border-radius:2px; transition:width 1.2s ease; width:0; }
	.values-grid { display:grid; grid-template-columns:1fr 1fr; gap:2px; }
	.value-card { background:var(--card); border:1px solid var(--border); padding:28px; }
	.value-icon { font-size:1.4rem; margin-bottom:12px; }
	.value-title { font-size:0.95rem; font-weight:700; color:var(--text); margin-bottom:8px; }
	.value-desc { font-size:0.85rem; line-height:1.7; color:var(--muted); }
	.excl-box { background:var(--bg3); border:1px solid var(--border); border-left:3px solid rgba(255,80,80,0.5); padding:24px 28px; display:flex; align-items:flex-start; gap:16px; }
	.excl-icon { color:rgba(255,100,100,0.7); flex-shrink:0; margin-top:2px; }
	.excl-title { font-family:var(--mono); font-size:0.62rem; letter-spacing:0.16em; text-transform:uppercase; color:rgba(255,100,100,0.7); margin-bottom:6px; }
	.excl-text { font-size:0.88rem; line-height:1.7; color:var(--muted); }
	@media(max-width:900px){ .about-grid{grid-template-columns:1fr} .skills-grid,.values-grid{grid-template-columns:1fr} }
</style>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php esc_html_e( 'O mnie', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="page-title"><?php echo esc_html( $be_name ); ?></h1>
		<p class="page-subtitle"><?php esc_html_e( 'Marketing Strategist & Paid Ads Specialist z ponad 8-letnim doświadczeniem w budowaniu kampanii, które realnie sprzedają.', 'bartlomiej-ert' ); ?></p>
	</div>
</div>

<section class="section">
	<div class="about-grid">
		<div class="profile-card reveal">
			<div class="profile-bg"></div>
			<div class="profile-initial"><?php echo esc_html( $be_short ); ?></div>
			<div class="profile-info">
				<div class="profile-name"><?php echo esc_html( $be_name ); ?></div>
				<div class="profile-role">Marketing Strategist &amp; Paid Ads Specialist</div>
			</div>
			<div class="profile-badges">
				<span class="profile-badge">Meta Blueprint Cert.</span>
				<span class="profile-badge">Google Ads Cert.</span>
				<span class="profile-badge">Freelancer</span>
				<span class="profile-badge">Remote / <?php echo esc_html( be_get( 'location' ) ); ?></span>
			</div>
			<div style="position:relative;z-index:1;">
				<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary" style="width:100%;justify-content:center;margin-bottom:12px;"><?php esc_html_e( 'Napisz do mnie →', 'bartlomiej-ert' ); ?></a>
				<a href="<?php echo esc_url( $be_realizacje ); ?>" class="btn-ghost" style="width:100%;justify-content:center;"><?php esc_html_e( 'Zobacz realizacje', 'bartlomiej-ert' ); ?></a>
			</div>
			<div class="profile-stat-row">
				<div class="profile-stat"><div class="profile-stat-val"><?php echo esc_html( be_get( 'metric_years' ) ); ?></div><div class="profile-stat-lbl"><?php esc_html_e( 'Lat exp.', 'bartlomiej-ert' ); ?></div></div>
				<div class="profile-stat"><div class="profile-stat-val"><?php echo esc_html( be_get( 'metric_proj' ) ); ?></div><div class="profile-stat-lbl"><?php esc_html_e( 'Projektów', 'bartlomiej-ert' ); ?></div></div>
				<div class="profile-stat"><div class="profile-stat-val"><?php echo esc_html( be_get( 'metric_roas' ) ); ?></div><div class="profile-stat-lbl"><?php esc_html_e( 'Śr. ROAS', 'bartlomiej-ert' ); ?></div></div>
				<div class="profile-stat"><div class="profile-stat-val"><?php echo esc_html( be_get( 'metric_cpa' ) ); ?></div><div class="profile-stat-lbl"><?php esc_html_e( 'Śr. CPA', 'bartlomiej-ert' ); ?></div></div>
			</div>
		</div>

		<div>
			<div class="about-text-block reveal">
				<div class="s-label" style="margin-bottom:16px;"><div class="s-label-line"></div><span><?php esc_html_e( 'Kim jestem', 'bartlomiej-ert' ); ?></span></div>
				<p><?php
					printf(
						esc_html__( 'Jestem freelancerem specjalizującym się w %s. Od ponad 8 lat pomagam firmom e-commerce, B2B i usługowym przyciągać klientów przez Meta Ads, Google Search i LinkedIn.', 'bartlomiej-ert' ),
						'<strong>' . esc_html__( 'płatnych kampaniach reklamowych i marketingu strategicznym', 'bartlomiej-ert' ) . '</strong>'
					);
				?></p>
				<p><?php esc_html_e( 'Zaczynałem w agencjach marketingowych, gdzie zarządzałem kampaniami dla kilkudziesięciu klientów jednocześnie. W 2019 roku zdecydowałem się pracować na własny rachunek — żeby mieć pełny wpływ na wyniki i budować naprawdę partnerskie relacje z klientami.', 'bartlomiej-ert' ); ?></p>
				<p><?php
					printf(
						esc_html__( 'Nie wierzę w szablony. Każda firma ma inne cele, inny rynek i inny budżet — dlatego %s, z myślą o konkretnych liczbach do osiągnięcia.', 'bartlomiej-ert' ),
						'<strong>' . esc_html__( 'każda kampania jest projektowana od zera', 'bartlomiej-ert' ) . '</strong>'
					);
				?></p>
			</div>

			<div class="skills-section reveal">
				<div class="s-label" style="margin-bottom:24px;"><div class="s-label-line"></div><span><?php esc_html_e( 'Kompetencje', 'bartlomiej-ert' ); ?></span></div>
				<div class="skills-grid">
					<?php
					$be_skills = array(
						'Meta Ads'                                            => 95,
						'Google Search Ads'                                   => 92,
						'LinkedIn Ads'                                        => 82,
						__( 'Strategia marketingowa', 'bartlomiej-ert' )      => 90,
						'Google Analytics 4'                                  => 88,
						__( 'Analiza danych', 'bartlomiej-ert' )              => 85,
					);
					foreach ( $be_skills as $name => $w ) :
						?>
						<div class="skill-row">
							<span class="skill-name"><?php echo esc_html( $name ); ?></span>
							<div class="skill-bar"><div class="skill-fill" data-w="<?php echo esc_attr( $w ); ?>"></div></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="reveal">
				<div class="s-label" style="margin-bottom:24px;"><div class="s-label-line"></div><span><?php esc_html_e( 'Wartości w pracy', 'bartlomiej-ert' ); ?></span></div>
				<div class="values-grid" style="margin-bottom:32px;">
					<div class="value-card">
						<div class="value-icon">📊</div>
						<div class="value-title"><?php esc_html_e( 'Dane, nie opinie', 'bartlomiej-ert' ); ?></div>
						<div class="value-desc"><?php esc_html_e( 'Każda decyzja jest poparta liczbami. Nie zgaduję — testuję, mierzę i optymalizuję na podstawie faktycznych wyników.', 'bartlomiej-ert' ); ?></div>
					</div>
					<div class="value-card">
						<div class="value-icon">🎯</div>
						<div class="value-title"><?php esc_html_e( 'Twoje cele = moje cele', 'bartlomiej-ert' ); ?></div>
						<div class="value-desc"><?php esc_html_e( 'Rozliczam się z wyników, nie z godzin. Zależy mi na długoterminowej współpracy, więc muszę dostarczać realną wartość.', 'bartlomiej-ert' ); ?></div>
					</div>
					<div class="value-card">
						<div class="value-icon">🔍</div>
						<div class="value-title"><?php esc_html_e( 'Pełna transparentność', 'bartlomiej-ert' ); ?></div>
						<div class="value-desc"><?php esc_html_e( 'Zawsze wiesz, co dzieje się z Twoim budżetem. Żadnych ukrytych opłat, żargonu ani pustych obietnic.', 'bartlomiej-ert' ); ?></div>
					</div>
					<div class="value-card">
						<div class="value-icon">⚡</div>
						<div class="value-title"><?php esc_html_e( 'Szybkość i komunikacja', 'bartlomiej-ert' ); ?></div>
						<div class="value-desc"><?php esc_html_e( 'Odpowiadam w ciągu jednego dnia roboczego. Proaktywnie informuję o zmianach i szansach — nie czekam, aż zapytasz.', 'bartlomiej-ert' ); ?></div>
					</div>
				</div>
				<div class="excl-box">
					<svg class="excl-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
					<div>
						<div class="excl-title"><?php esc_html_e( 'Wykluczenie branżowe', 'bartlomiej-ert' ); ?></div>
						<p class="excl-text"><?php esc_html_e( 'Nie obsługuję branży gastronomicznej — restauracji, kawiarni, barów i podobnych lokali. Skupiam się na sektorach, w których mogę dostarczyć najwyższą jakość i mierzalne wyniki.', 'bartlomiej-ert' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section section-alt">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3><?php esc_html_e( 'Porozmawiajmy o', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'Twoim projekcie', 'bartlomiej-ert' ); ?></span></h3>
			<p><?php esc_html_e( 'Pierwsza konsultacja jest bezpłatna. Dowiedz się, co mogę zrobić dla Twojej firmy.', 'bartlomiej-ert' ); ?></p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Skontaktuj się →', 'bartlomiej-ert' ); ?></a>
			<a href="<?php echo esc_url( $be_uslugi ); ?>" class="btn-ghost"><?php esc_html_e( 'Zobacz usługi', 'bartlomiej-ert' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
