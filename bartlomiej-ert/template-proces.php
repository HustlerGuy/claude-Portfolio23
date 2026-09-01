<?php
/**
 * Template Name: Proces
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
	.timeline { position: relative; padding-left: 48px; }
	.timeline::before { content:''; position:absolute; left:16px; top:0; bottom:0; width:1px; background:linear-gradient(180deg, var(--cyan), var(--border), transparent); }
	.tl-step { position:relative; margin-bottom:60px; }
	.tl-step:last-child { margin-bottom:0; }
	.tl-dot { position:absolute; left:-40px; top:6px; width:16px; height:16px; background:var(--bg); border:2px solid var(--cyan); border-radius:50%; z-index:2; }
	.tl-dot::after { content:''; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:6px; height:6px; background:var(--cyan); border-radius:50%; }
	.tl-num { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--cyan); margin-bottom:10px; }
	.tl-title { font-size:1.4rem; font-weight:700; color:var(--text); letter-spacing:-0.02em; margin-bottom:12px; }
	.tl-desc { font-size:0.95rem; line-height:1.8; color:var(--muted); margin-bottom:20px; max-width:560px; }
	.tl-items { display:flex; flex-wrap:wrap; gap:8px; }
	.tl-item { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.12em; text-transform:uppercase; color:var(--cyan); border:1px solid var(--border); padding:5px 12px; background:var(--cyan-glow); }
	.timeline-grid { display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:start; }
	.tl-aside { position:sticky; top:100px; }
	.tl-aside-card { background:var(--card); border:1px solid var(--border); padding:36px; margin-bottom:2px; }
	.tl-aside-card::before { content:''; display:block; width:32px; height:2px; background:var(--cyan); margin-bottom:20px; }
	.tl-aside-label { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.16em; text-transform:uppercase; color:var(--muted2); margin-bottom:8px; }
	.tl-aside-val { font-size:1.5rem; font-weight:800; color:var(--cyan); letter-spacing:-0.02em; }
	.tl-aside-note { font-size:0.82rem; line-height:1.7; color:var(--muted); margin-top:6px; }
	@media(max-width:900px){ .timeline-grid{grid-template-columns:1fr} .tl-aside{position:static} }
</style>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php esc_html_e( 'Proces', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="page-title"><?php esc_html_e( 'Jak', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'pracuję', 'bartlomiej-ert' ); ?></span></h1>
		<p class="page-subtitle"><?php esc_html_e( 'Przejrzysty, powtarzalny proces bez niespodzianek. Wiesz na każdym etapie co się dzieje, dlaczego i jakie są kolejne kroki.', 'bartlomiej-ert' ); ?></p>
	</div>
</div>

<section class="section">
	<div class="timeline-grid">
		<div class="timeline reveal">
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 01', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Bezpłatna konsultacja', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Zaczynamy od 30–60 minutowej rozmowy (zdalnie lub telefonicznie). Poznaję Twój biznes, obecne działania marketingowe, cele i budżet. Zadaję dużo pytań — im więcej wiem na starcie, tym lepsze wyniki.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item">30–60 min</span><span class="tl-item">Zoom / <?php esc_html_e( 'telefon', 'bartlomiej-ert' ); ?></span><span class="tl-item"><?php esc_html_e( 'Bezpłatnie', 'bartlomiej-ert' ); ?></span></div>
			</div>
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 02', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Audyt & analiza', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Sprawdzam obecne konta reklamowe, analitykę, stronę i komunikację. Analizuję konkurencję i szanse na rynku. Na tej podstawie identyfikuję największe dźwignie wzrostu i punkty do naprawy.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item"><?php esc_html_e( '2–5 dni roboczych', 'bartlomiej-ert' ); ?></span><span class="tl-item"><?php esc_html_e( 'Raport audytu', 'bartlomiej-ert' ); ?></span><span class="tl-item">Benchmarking</span></div>
			</div>
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 03', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Propozycja & wycena', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Przygotowuję spersonalizowaną propozycję współpracy: zakres działań, harmonogram, KPI i budżet. Omawiamy szczegóły, wprowadzamy ewentualne zmiany i podpisujemy umowę.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item"><?php esc_html_e( 'Zakres działań', 'bartlomiej-ert' ); ?></span><span class="tl-item">KPI</span><span class="tl-item"><?php esc_html_e( 'Umowa', 'bartlomiej-ert' ); ?></span></div>
			</div>
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 04', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Onboarding & setup', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Dostaję dostępy do kont reklamowych, analityki i niezbędnych narzędzi. Konfigurujemy śledzenie konwersji, piksele i integracje. Tworzymy lub przebudowujemy strukturę kont reklamowych.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item"><?php esc_html_e( 'Dostępy', 'bartlomiej-ert' ); ?></span><span class="tl-item">Meta Pixel</span><span class="tl-item">GA4 / GTM</span><span class="tl-item"><?php esc_html_e( 'Konwersje', 'bartlomiej-ert' ); ?></span></div>
			</div>
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 05', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Launch kampanii', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Starujemy z kampaniami według ustalonej strategii. Pierwsze 2 tygodnie to faza testowa — testujemy różne kreacje, grupy docelowe i komunikaty, zbierając dane do optymalizacji.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item">Testy A/B</span><span class="tl-item">Monitoring</span><span class="tl-item"><?php esc_html_e( 'Dane od dnia 1', 'bartlomiej-ert' ); ?></span></div>
			</div>
			<div class="tl-step">
				<div class="tl-dot"></div>
				<div class="tl-num"><?php esc_html_e( 'Krok 06', 'bartlomiej-ert' ); ?></div>
				<h3 class="tl-title"><?php esc_html_e( 'Optymalizacja & raportowanie', 'bartlomiej-ert' ); ?></h3>
				<p class="tl-desc"><?php esc_html_e( 'Cotygodniowa optymalizacja kampanii i miesięczne raporty z wynikami, wnioskami i planem na kolejny miesiąc. Regularne spotkania statusowe — Ty zawsze wiesz co się dzieje z Twoim budżetem.', 'bartlomiej-ert' ); ?></p>
				<div class="tl-items"><span class="tl-item"><?php esc_html_e( 'Raport co mies.', 'bartlomiej-ert' ); ?></span><span class="tl-item"><?php esc_html_e( 'Optymalizacja co tydz.', 'bartlomiej-ert' ); ?></span><span class="tl-item"><?php esc_html_e( 'Spotkania statusowe', 'bartlomiej-ert' ); ?></span></div>
			</div>
		</div>

		<div class="tl-aside reveal d2">
			<div class="tl-aside-card">
				<div class="tl-aside-label"><?php esc_html_e( 'Czas do pierwszych wyników', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-val"><?php esc_html_e( '2–4 tyg.', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-note"><?php esc_html_e( 'Od podpisania umowy do pierwszych danych z kampanii. Pełna optymalizacja i stabilne wyniki zazwyczaj po 6–8 tygodniach.', 'bartlomiej-ert' ); ?></div>
			</div>
			<div class="tl-aside-card">
				<div class="tl-aside-label"><?php esc_html_e( 'Minimalny budżet reklamowy', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-val"><?php esc_html_e( '2 000 zł', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-note"><?php esc_html_e( 'Poniżej tej kwoty trudno zebrać wystarczające dane do skutecznej optymalizacji. Rekomendowany start to 3 000–5 000 zł / mies.', 'bartlomiej-ert' ); ?></div>
			</div>
			<div class="tl-aside-card">
				<div class="tl-aside-label"><?php esc_html_e( 'Minimalny okres współpracy', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-val"><?php esc_html_e( '3 miesiące', 'bartlomiej-ert' ); ?></div>
				<div class="tl-aside-note"><?php esc_html_e( 'Marketing to nie sprint. Potrzebujemy czasu na zebranie danych, testowanie i realną optymalizację — dopiero wtedy widać pełny potencjał kampanii.', 'bartlomiej-ert' ); ?></div>
			</div>
			<div style="margin-top:24px;">
				<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary" style="width:100%;justify-content:center;"><?php esc_html_e( 'Zacznijmy współpracę →', 'bartlomiej-ert' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- FAQ -->
<section class="section section-alt">
	<div class="s-label reveal"><div class="s-label-line"></div><span>FAQ</span></div>
	<h2 class="s-title reveal"><?php esc_html_e( 'Często zadawane', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'pytania', 'bartlomiej-ert' ); ?></span></h2>
	<p class="s-sub reveal"><?php esc_html_e( 'Zebrałem odpowiedzi na pytania, które pojawiają się najczęściej przed rozpoczęciem współpracy.', 'bartlomiej-ert' ); ?></p>
	<div class="faq-list reveal">
		<?php
		$be_faq = array(
			array(
				'q' => __( 'Czy muszę mieć gotowe kreacje reklamowe?', 'bartlomiej-ert' ),
				'a' => __( 'Nie — mogę przygotować brief dla grafika lub pomóc w stworzeniu kreacji. Jeśli masz własny zespół kreatywny, koordynuję z nimi współpracę i przygotowuję szczegółowe briefy reklamowe.', 'bartlomiej-ert' ),
			),
			array(
				'q' => __( 'Jak szybko zobaczę wyniki?', 'bartlomiej-ert' ),
				'a' => __( 'Pierwsze dane pojawiają się w ciągu kilku dni od startu kampanii. Stabilne, optymalne wyniki zazwyczaj osiągamy po 6–8 tygodniach — algorytmy reklamowe potrzebują czasu na uczenie się i zbieranie danych.', 'bartlomiej-ert' ),
			),
			array(
				'q' => __( 'Czy pracujesz z firmami spoza Polski?', 'bartlomiej-ert' ),
				'a' => __( 'Tak, pracuję w 100% zdalnie i obsługuję klientów z Polski i z zagranicy. Cała komunikacja może odbywać się po polsku lub angielsku.', 'bartlomiej-ert' ),
			),
			array(
				'q' => __( 'Czy podpisujesz umowę NDA?', 'bartlomiej-ert' ),
				'a' => __( 'Tak, standardowo podpisujemy umowę o zachowaniu poufności. Wszystkie dane dotyczące Twojego biznesu, budżetów i wyników kampanii pozostają całkowicie poufne.', 'bartlomiej-ert' ),
			),
			array(
				'q' => __( 'Co się dzieje po zakończeniu umowy?', 'bartlomiej-ert' ),
				'a' => __( 'Konta reklamowe, dane i historia kampanii zawsze należą do Ciebie. Po zakończeniu współpracy przekazuję pełną dokumentację, raporty i dostępy — bez żadnych haczyków.', 'bartlomiej-ert' ),
			),
		);
		foreach ( $be_faq as $item ) :
			?>
			<div class="faq-item">
				<div class="faq-q"><?php echo esc_html( $item['q'] ); ?>
					<svg class="faq-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
				</div>
				<div class="faq-a"><div class="faq-a-inner"><?php echo esc_html( $item['a'] ); ?></div></div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="section">
	<div class="cta-banner reveal">
		<div class="cta-banner-text">
			<h3><?php esc_html_e( 'Masz jeszcze', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'pytania?', 'bartlomiej-ert' ); ?></span></h3>
			<p><?php esc_html_e( 'Napisz lub zadzwoń — chętnie omówię szczegóły Twojego projektu.', 'bartlomiej-ert' ); ?></p>
		</div>
		<div class="cta-banner-actions">
			<a href="<?php echo esc_url( $be_kontakt ); ?>" class="btn-primary"><?php esc_html_e( 'Skontaktuj się →', 'bartlomiej-ert' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
