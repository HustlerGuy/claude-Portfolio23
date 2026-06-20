<?php
/**
 * Szablon podstrony: O mnie.
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
			<span>O mnie</span>
		</div>
		<h1 class="page-title">Bartłomiej <span class="acc">Ert</span></h1>
		<p class="page-subtitle">Marketing Strategist &amp; Paid Ads Specialist z ponad 8-letnim doświadczeniem w budowaniu kampanii, które realnie sprzedają.</p>
	</div>
</div>

<section class="section">
	<div class="about-grid">
		<div class="profile-card reveal">
			<div class="profile-bg"></div>
			<div class="profile-initial">BE</div>
			<div class="profile-info">
				<div class="profile-name">Bartłomiej Ert</div>
				<div class="profile-role">Marketing Strategist &amp; Paid Ads Specialist</div>
			</div>
			<div class="profile-badges">
				<span class="profile-badge">Meta Blueprint Cert.</span>
				<span class="profile-badge">Google Ads Cert.</span>
				<span class="profile-badge">Freelancer</span>
				<span class="profile-badge">Remote / Polska</span>
			</div>
			<div style="position:relative;z-index:1;">
				<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-primary" style="width:100%;justify-content:center;margin-bottom:12px;">Napisz do mnie →</a>
				<a href="<?php echo esc_url( ert_url( 'realizacje' ) ); ?>" class="btn-ghost" style="width:100%;justify-content:center;">Zobacz realizacje</a>
			</div>
			<div class="profile-stat-row">
				<div class="profile-stat"><div class="profile-stat-val">—</div><div class="profile-stat-lbl">Lat exp.</div></div>
				<div class="profile-stat"><div class="profile-stat-val">15</div><div class="profile-stat-lbl">Projektów</div></div>
				<div class="profile-stat"><div class="profile-stat-val">7.99×</div><div class="profile-stat-lbl">Najlepszy ROAS</div></div>
				<div class="profile-stat"><div class="profile-stat-val">−45%</div><div class="profile-stat-lbl">Śr. CPA</div></div>
			</div>
		</div>

		<div>
			<div class="about-text-block reveal">
				<div class="s-label" style="margin-bottom:16px;"><div class="s-label-line"></div><span>Kim jestem</span></div>
				<p>Jestem freelancerem specjalizującym się w <strong>płatnych kampaniach reklamowych i marketingu strategicznym</strong>. Od ponad 8 lat pomagam firmom e-commerce, B2B i usługowym przyciągać klientów przez Meta Ads, Google Search i LinkedIn.</p>
				<p>Zaczynałem w agencjach marketingowych, gdzie zarządzałem kampaniami dla kilkudziesięciu klientów jednocześnie. W 2019 roku zdecydowałem się pracować na własny rachunek — żeby mieć pełny wpływ na wyniki i budować naprawdę partnerskie relacje z klientami.</p>
				<p>Nie wierzę w szablony. Każda firma ma inne cele, inny rynek i inny budżet — dlatego <strong>każda kampania jest projektowana od zera</strong>, z myślą o konkretnych liczbach do osiągnięcia.</p>
			</div>

			<div class="skills-section reveal">
				<div class="s-label" style="margin-bottom:24px;"><div class="s-label-line"></div><span>Kompetencje</span></div>
				<div class="skills-grid">
					<div class="skill-row">
						<span class="skill-name">Meta Ads</span>
						<div class="skill-bar"><div class="skill-fill" data-w="95"></div></div>
					</div>
					<div class="skill-row">
						<span class="skill-name">Google Search Ads</span>
						<div class="skill-bar"><div class="skill-fill" data-w="92"></div></div>
					</div>
					<div class="skill-row">
						<span class="skill-name">LinkedIn Ads</span>
						<div class="skill-bar"><div class="skill-fill" data-w="82"></div></div>
					</div>
					<div class="skill-row">
						<span class="skill-name">Strategia marketingowa</span>
						<div class="skill-bar"><div class="skill-fill" data-w="90"></div></div>
					</div>
					<div class="skill-row">
						<span class="skill-name">Google Analytics 4</span>
						<div class="skill-bar"><div class="skill-fill" data-w="88"></div></div>
					</div>
					<div class="skill-row">
						<span class="skill-name">Analiza danych</span>
						<div class="skill-bar"><div class="skill-fill" data-w="85"></div></div>
					</div>
				</div>
			</div>

			<div class="reveal">
				<div class="s-label" style="margin-bottom:24px;"><div class="s-label-line"></div><span>Wartości w pracy</span></div>
				<div class="values-grid" style="margin-bottom:32px;">
					<div class="value-card">
						<div class="value-icon">📊</div>
						<div class="value-title">Dane, nie opinie</div>
						<div class="value-desc">Każda decyzja jest poparta liczbami. Nie zgaduję — testuję, mierzę i optymalizuję na podstawie faktycznych wyników.</div>
					</div>
					<div class="value-card">
						<div class="value-icon">🎯</div>
						<div class="value-title">Twoje cele = moje cele</div>
						<div class="value-desc">Rozliczam się z wyników, nie z godzin. Zależy mi na długoterminowej współpracy, więc muszę dostarczać realną wartość.</div>
					</div>
					<div class="value-card">
						<div class="value-icon">🔍</div>
						<div class="value-title">Pełna transparentność</div>
						<div class="value-desc">Zawsze wiesz, co dzieje się z Twoim budżetem. Żadnych ukrytych opłat, żargonu ani pustych obietnic.</div>
					</div>
					<div class="value-card">
						<div class="value-icon">⚡</div>
						<div class="value-title">Szybkość i komunikacja</div>
						<div class="value-desc">Odpowiadam w ciągu jednego dnia roboczego. Proaktywnie informuję o zmianach i szansach — nie czekam, aż zapytasz.</div>
					</div>
				</div>
				<div class="excl-box">
					<svg class="excl-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
					<div>
						<div class="excl-title">Wykluczenie branżowe</div>
						<p class="excl-text">Nie obsługuję branży gastronomicznej — restauracji, kawiarni, barów i podobnych lokali. Skupiam się na sektorach, w których mogę dostarczyć najwyższą jakość i mierzalne wyniki.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section section-alt">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3>Porozmawiajmy o <span class="acc">Twoim projekcie</span></h3>
			<p>Pierwsza konsultacja jest bezpłatna. Dowiedz się, co mogę zrobić dla Twojej firmy.</p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( ert_url( 'kontakt' ) ); ?>" class="btn-primary">Skontaktuj się →</a>
			<a href="<?php echo esc_url( ert_url( 'uslugi' ) ); ?>" class="btn-ghost">Zobacz usługi</a>
		</div>
	</div>
</section>

<?php
get_footer();
