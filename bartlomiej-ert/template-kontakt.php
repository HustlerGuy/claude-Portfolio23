<?php
/**
 * Template Name: Kontakt
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$be_email        = be_get( 'email' );
$be_phone        = be_get( 'phone' );
$be_phone_hours  = be_get( 'phone_hours' );
$be_linkedin_url = be_get( 'linkedin_url' );
$be_linkedin     = be_get( 'linkedin_name' );
$be_phone_href   = 'tel:' . preg_replace( '/[^0-9+]/', '', $be_phone );
$be_status       = be_contact_status();
?>

<style>
	.contact-grid { display:grid; grid-template-columns:1fr 420px; gap:72px; align-items:start; }
	.form-card { background:var(--card); border:1px solid var(--border); padding:48px; position:relative; overflow:hidden; }
	.form-card::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,var(--cyan),transparent); }
	.form-title { font-size:1.5rem; font-weight:700; color:var(--text); letter-spacing:-0.02em; margin-bottom:8px; }
	.form-sub { font-size:0.88rem; color:var(--muted); line-height:1.6; margin-bottom:36px; }
	.form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
	.form-group { margin-bottom:20px; }
	.form-label { font-family:var(--mono); font-size:0.6rem; letter-spacing:0.16em; text-transform:uppercase; color:var(--muted); margin-bottom:8px; display:block; }
	.form-input, .form-select, .form-textarea { width:100%; background:var(--bg); border:1px solid var(--border); color:var(--text); font-family:var(--ff); font-size:0.92rem; padding:12px 16px; transition:border-color 0.25s; outline:none; appearance:none; }
	.form-input:focus, .form-select:focus, .form-textarea:focus { border-color:var(--cyan); }
	.form-input::placeholder, .form-textarea::placeholder { color:var(--muted2); }
	.form-textarea { resize:vertical; min-height:120px; line-height:1.6; }
	.form-select { background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%234a6a8c' stroke-width='1.5' fill='none'/%3E%3C/svg%3E"); background-repeat:no-repeat; background-position:right 16px center; cursor:pointer; }
	.form-select option { background:var(--bg2); }
	.form-check { display:flex; align-items:flex-start; gap:12px; margin-bottom:24px; cursor:pointer; }
	.form-check input { width:16px; height:16px; margin-top:2px; accent-color:var(--cyan); cursor:pointer; flex-shrink:0; }
	.form-check-label { font-size:0.82rem; color:var(--muted); line-height:1.6; }
	.form-submit { width:100%; }
	.form-note { font-family:var(--mono); font-size:0.58rem; letter-spacing:0.12em; color:var(--muted2); text-align:center; margin-top:16px; }
	.contact-info-card { background:var(--card); border:1px solid var(--border); padding:32px; margin-bottom:2px; transition:border-color 0.3s; }
	.contact-info-card:hover { border-color:var(--border2); }
	.ci-icon { width:44px; height:44px; background:var(--cyan-dim); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; margin-bottom:16px; }
	.ci-icon svg { width:18px; height:18px; color:var(--cyan); }
	.ci-label { font-family:var(--mono); font-size:0.58rem; letter-spacing:0.16em; text-transform:uppercase; color:var(--muted2); margin-bottom:6px; }
	.ci-val { font-size:1rem; font-weight:600; color:var(--text); text-decoration:none; transition:color 0.25s; display:block; }
	a.ci-val:hover { color:var(--cyan); }
	.ci-note { font-size:0.8rem; color:var(--muted2); margin-top:4px; }
	.avail-card { background:var(--bg3); border:1px solid var(--border2); border-left:3px solid var(--cyan); padding:24px 28px; margin-top:2px; }
	.avail-dot { display:inline-flex; align-items:center; gap:8px; font-family:var(--mono); font-size:0.62rem; letter-spacing:0.16em; text-transform:uppercase; color:var(--cyan); margin-bottom:8px; }
	.avail-dot::before { content:''; width:8px; height:8px; border-radius:50%; background:var(--cyan); animation:blink 2s ease-in-out infinite; }
	.avail-text { font-size:0.88rem; color:var(--muted); line-height:1.6; }
	@media(max-width:900px){ .contact-grid{grid-template-columns:1fr} .form-row{grid-template-columns:1fr} }
</style>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php esc_html_e( 'Kontakt', 'bartlomiej-ert' ); ?></span>
		</div>
		<h1 class="page-title"><?php esc_html_e( 'Zacznijmy', 'bartlomiej-ert' ); ?> <span class="acc"><?php esc_html_e( 'współpracę', 'bartlomiej-ert' ); ?></span></h1>
		<p class="page-subtitle"><?php esc_html_e( 'Pierwsza konsultacja i wycena są bezpłatne. Opisz swój projekt — odpiszę w ciągu 24 godzin.', 'bartlomiej-ert' ); ?></p>
	</div>
</div>

<section class="section">
	<div class="contact-grid">

		<!-- FORM -->
		<div class="form-card reveal" id="kontakt-form">
			<h2 class="form-title"><?php esc_html_e( 'Napisz do mnie', 'bartlomiej-ert' ); ?></h2>
			<p class="form-sub"><?php
				printf(
					esc_html__( 'Wypełnij formularz lub napisz bezpośrednio na %s', 'bartlomiej-ert' ),
					'<a href="mailto:' . esc_attr( $be_email ) . '" style="color:var(--cyan);text-decoration:none;">' . esc_html( $be_email ) . '</a>'
				);
			?></p>

			<?php if ( 'sent' === $be_status ) : ?>
				<div class="form-alert" role="status">
					<strong><?php esc_html_e( 'Wiadomość wysłana!', 'bartlomiej-ert' ); ?></strong><br>
					<?php esc_html_e( 'Dziękuję za kontakt. Odezwę się w ciągu 24 godzin na podany adres e-mail.', 'bartlomiej-ert' ); ?>
				</div>
			<?php elseif ( 'error' === $be_status ) : ?>
				<div class="form-alert error" role="alert">
					<?php esc_html_e( 'Nie udało się wysłać wiadomości. Sprawdź wymagane pola i spróbuj ponownie lub napisz bezpośrednio na e-mail.', 'bartlomiej-ert' ); ?>
				</div>
			<?php endif; ?>

			<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
				<input type="hidden" name="action" value="be_contact">
				<?php wp_nonce_field( 'be_contact_action', 'be_contact_nonce' ); ?>
				<!-- Honeypot (ukryte pole antyspamowe) -->
				<div class="hp-field" aria-hidden="true">
					<label><?php esc_html_e( 'Zostaw to pole puste', 'bartlomiej-ert' ); ?><input type="text" name="be_website" tabindex="-1" autocomplete="off"></label>
				</div>

				<div class="form-row">
					<div class="form-group">
						<label class="form-label" for="be_name"><?php esc_html_e( 'Imię i nazwisko *', 'bartlomiej-ert' ); ?></label>
						<input type="text" id="be_name" name="be_name" class="form-input" placeholder="Jan Kowalski" required>
					</div>
					<div class="form-group">
						<label class="form-label" for="be_company"><?php esc_html_e( 'Firma', 'bartlomiej-ert' ); ?></label>
						<input type="text" id="be_company" name="be_company" class="form-input" placeholder="<?php esc_attr_e( 'Nazwa firmy', 'bartlomiej-ert' ); ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label class="form-label" for="be_email"><?php esc_html_e( 'E-mail *', 'bartlomiej-ert' ); ?></label>
						<input type="email" id="be_email" name="be_email" class="form-input" placeholder="jan@firma.pl" required>
					</div>
					<div class="form-group">
						<label class="form-label" for="be_phone"><?php esc_html_e( 'Telefon', 'bartlomiej-ert' ); ?></label>
						<input type="tel" id="be_phone" name="be_phone" class="form-input" placeholder="+48 000 000 000">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label" for="be_service"><?php esc_html_e( 'Interesująca usługa *', 'bartlomiej-ert' ); ?></label>
					<select id="be_service" name="be_service" class="form-select form-input" required>
						<option value="" disabled selected><?php esc_html_e( 'Wybierz usługę...', 'bartlomiej-ert' ); ?></option>
						<option><?php esc_html_e( 'Promocje w Social Mediach (Meta/Instagram/LinkedIn)', 'bartlomiej-ert' ); ?></option>
						<option>Google Search Ads</option>
						<option><?php esc_html_e( 'Kompleksowe wsparcie marketingowe', 'bartlomiej-ert' ); ?></option>
						<option><?php esc_html_e( 'Kilka usług naraz', 'bartlomiej-ert' ); ?></option>
						<option><?php esc_html_e( 'Nie wiem — potrzebuję konsultacji', 'bartlomiej-ert' ); ?></option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label" for="be_budget"><?php esc_html_e( 'Miesięczny budżet reklamowy', 'bartlomiej-ert' ); ?></label>
					<select id="be_budget" name="be_budget" class="form-select form-input">
						<option value="" disabled selected><?php esc_html_e( 'Wybierz przedział...', 'bartlomiej-ert' ); ?></option>
						<option><?php esc_html_e( 'Do 2 000 zł', 'bartlomiej-ert' ); ?></option>
						<option>2 000 – 5 000 zł</option>
						<option>5 000 – 15 000 zł</option>
						<option>15 000 – 50 000 zł</option>
						<option><?php esc_html_e( 'Powyżej 50 000 zł', 'bartlomiej-ert' ); ?></option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label" for="be_message"><?php esc_html_e( 'Opisz swój projekt *', 'bartlomiej-ert' ); ?></label>
					<textarea id="be_message" name="be_message" class="form-textarea" placeholder="<?php esc_attr_e( 'Czym zajmuje się Twoja firma? Jaki jest główny cel kampanii? Co już próbowałeś/aś? Im więcej napiszesz, tym szybciej przygotuję trafną propozycję.', 'bartlomiej-ert' ); ?>" required></textarea>
				</div>
				<label class="form-check">
					<input type="checkbox" name="be_consent" value="1" required>
					<span class="form-check-label"><?php esc_html_e( 'Wyrażam zgodę na przetwarzanie danych osobowych w celu odpowiedzi na zapytanie. *', 'bartlomiej-ert' ); ?></span>
				</label>
				<button type="submit" class="btn-primary form-submit">
					<span><?php esc_html_e( 'Wyślij wiadomość →', 'bartlomiej-ert' ); ?></span>
				</button>
				<p class="form-note"><?php esc_html_e( '* Pola wymagane · Odpowiadam w ciągu 24 godzin', 'bartlomiej-ert' ); ?></p>
			</form>
		</div>

		<!-- SIDEBAR -->
		<div class="contact-sidebar reveal d2">
			<a href="mailto:<?php echo esc_attr( $be_email ); ?>" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
				<div class="ci-label">E-mail</div>
				<span class="ci-val"><?php echo esc_html( $be_email ); ?></span>
				<div class="ci-note"><?php esc_html_e( 'Najszybszy sposób kontaktu', 'bartlomiej-ert' ); ?></div>
			</a>
			<a href="<?php echo esc_attr( $be_phone_href ); ?>" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 9.91a16 16 0 0 0 6.09 6.09l1.27-.85a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 17z"/></svg></div>
				<div class="ci-label"><?php esc_html_e( 'Telefon', 'bartlomiej-ert' ); ?></div>
				<span class="ci-val"><?php echo esc_html( $be_phone ); ?></span>
				<div class="ci-note"><?php echo esc_html( $be_phone_hours ); ?></div>
			</a>
			<a href="<?php echo esc_url( $be_linkedin_url ); ?>" target="_blank" rel="noopener" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></div>
				<div class="ci-label">LinkedIn</div>
				<span class="ci-val"><?php echo esc_html( $be_linkedin ); ?></span>
				<div class="ci-note"><?php esc_html_e( 'Zapraszam do kontaktu', 'bartlomiej-ert' ); ?></div>
			</a>
			<div class="avail-card">
				<div class="avail-dot"><?php esc_html_e( 'Dostępny do projektów', 'bartlomiej-ert' ); ?></div>
				<p class="avail-text"><?php esc_html_e( 'Aktualnie przyjmuję nowych klientów. Wolne miejsca są ograniczone — nie odkładaj kontaktu na później.', 'bartlomiej-ert' ); ?></p>
			</div>
			<div style="margin-top:24px;background:var(--card);border:1px solid var(--border);padding:24px;">
				<div class="ci-label" style="margin-bottom:12px;"><?php esc_html_e( 'Czego możesz się spodziewać', 'bartlomiej-ert' ); ?></div>
				<div style="display:flex;flex-direction:column;gap:10px;">
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);"><span style="color:var(--cyan);font-family:var(--mono);">01</span> <?php esc_html_e( 'Odpowiedź w ciągu 24h', 'bartlomiej-ert' ); ?></div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);"><span style="color:var(--cyan);font-family:var(--mono);">02</span> <?php esc_html_e( 'Bezpłatna konsultacja 30–60 min', 'bartlomiej-ert' ); ?></div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);"><span style="color:var(--cyan);font-family:var(--mono);">03</span> <?php esc_html_e( 'Indywidualna propozycja i wycena', 'bartlomiej-ert' ); ?></div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);"><span style="color:var(--cyan);font-family:var(--mono);">04</span> <?php esc_html_e( 'Brak zobowiązań — decyzja należy do Ciebie', 'bartlomiej-ert' ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
