<?php
/**
 * Szablon podstrony: Kontakt.
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
			<span>Kontakt</span>
		</div>
		<h1 class="page-title">Zacznijmy <span class="acc">współpracę</span></h1>
		<p class="page-subtitle">Pierwsza konsultacja i wycena są bezpłatne. Opisz swój projekt — odpiszę w ciągu 24 godzin.</p>
	</div>
</div>

<section class="section">
	<div class="contact-grid">

		<!-- FORM -->
		<div class="form-card reveal">
			<div id="formWrap">
				<h2 class="form-title">Napisz do mnie</h2>
				<p class="form-sub">Wypełnij formularz lub napisz bezpośrednio na <a href="mailto:bartlomiej@ert.pl" style="color:var(--cyan);text-decoration:none;">bartlomiej@ert.pl</a></p>
				<form id="contactForm" novalidate>
					<div class="form-row">
						<div class="form-group">
							<label class="form-label">Imię i nazwisko *</label>
							<input type="text" class="form-input" placeholder="Jan Kowalski" required>
						</div>
						<div class="form-group">
							<label class="form-label">Firma</label>
							<input type="text" class="form-input" placeholder="Nazwa firmy">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group">
							<label class="form-label">E-mail *</label>
							<input type="email" class="form-input" placeholder="jan@firma.pl" required>
						</div>
						<div class="form-group">
							<label class="form-label">Telefon</label>
							<input type="tel" class="form-input" placeholder="+48 000 000 000">
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Interesująca usługa *</label>
						<select class="form-select form-input" required>
							<option value="" disabled selected>Wybierz usługę...</option>
							<option>Promocje w Social Mediach (Meta/Instagram/LinkedIn)</option>
							<option>Google Search Ads</option>
							<option>Kompleksowe wsparcie marketingowe</option>
							<option>Kilka usług naraz</option>
							<option>Nie wiem — potrzebuję konsultacji</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Miesięczny budżet reklamowy</label>
						<select class="form-select form-input">
							<option value="" disabled selected>Wybierz przedział...</option>
							<option>Do 2 000 zł</option>
							<option>2 000 – 5 000 zł</option>
							<option>5 000 – 15 000 zł</option>
							<option>15 000 – 50 000 zł</option>
							<option>Powyżej 50 000 zł</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Opisz swój projekt *</label>
						<textarea class="form-textarea" placeholder="Czym zajmuje się Twoja firma? Jaki jest główny cel kampanii? Co już próbowałeś/aś? Im więcej napiszesz, tym szybciej przygotuję trafną propozycję." required></textarea>
					</div>
					<label class="form-check">
						<input type="checkbox" required>
						<span class="form-check-label">Wyrażam zgodę na przetwarzanie danych osobowych w celu odpowiedzi na zapytanie. *</span>
					</label>
					<button type="submit" class="btn-primary form-submit">
						<span>Wyślij wiadomość →</span>
					</button>
					<p class="form-note">* Pola wymagane · Odpowiadam w ciągu 24 godzin</p>
				</form>
			</div>
			<div class="form-success" id="formSuccess">
				<div class="success-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
				</div>
				<div class="success-title">Wiadomość wysłana!</div>
				<p class="success-text">Dziękuję za kontakt. Odezwę się w ciągu 24 godzin na podany adres e-mail.<br><br>Do zobaczenia wkrótce.</p>
			</div>
		</div>

		<!-- SIDEBAR -->
		<div class="contact-sidebar reveal d2">
			<a href="mailto:bartlomiej@ert.pl" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
				</div>
				<div class="ci-label">E-mail</div>
				<span class="ci-val">bartlomiej@ert.pl</span>
				<div class="ci-note">Najszybszy sposób kontaktu</div>
			</a>
			<a href="tel:+48000000000" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 9.91a16 16 0 0 0 6.09 6.09l1.27-.85a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 17z"/></svg>
				</div>
				<div class="ci-label">Telefon</div>
				<span class="ci-val">+48 000 000 000</span>
				<div class="ci-note">Pon–Pt, 9:00 – 17:00</div>
			</a>
			<a href="https://linkedin.com" target="_blank" rel="noopener" class="contact-info-card" style="display:block;text-decoration:none;">
				<div class="ci-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
				</div>
				<div class="ci-label">LinkedIn</div>
				<span class="ci-val">Bartłomiej Ert</span>
				<div class="ci-note">Zapraszam do kontaktu</div>
			</a>
			<div class="avail-card">
				<div class="avail-dot">Dostępny do projektów</div>
				<p class="avail-text">Aktualnie przyjmuję nowych klientów. Wolne miejsca są ograniczone — nie odkładaj kontaktu na później.</p>
			</div>
			<div style="margin-top:24px;background:var(--card);border:1px solid var(--border);padding:24px;">
				<div class="ci-label" style="margin-bottom:12px;">Czego możesz się spodziewać</div>
				<div style="display:flex;flex-direction:column;gap:10px;">
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);">
						<span style="color:var(--cyan);font-family:var(--mono);">01</span> Odpowiedź w ciągu 24h
					</div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);">
						<span style="color:var(--cyan);font-family:var(--mono);">02</span> Bezpłatna konsultacja 30–60 min
					</div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);">
						<span style="color:var(--cyan);font-family:var(--mono);">03</span> Indywidualna propozycja i wycena
					</div>
					<div style="display:flex;align-items:center;gap:10px;font-size:0.85rem;color:var(--muted);">
						<span style="color:var(--cyan);font-family:var(--mono);">04</span> Brak zobowiązań — decyzja należy do Ciebie
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
