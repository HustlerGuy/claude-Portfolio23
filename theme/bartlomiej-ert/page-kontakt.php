<?php get_header(); ?>

<header class="page-hero">
  <div class="page-hero-grid" aria-hidden="true"></div>
  <div class="page-hero-inner">
    <div class="crumb" data-reveal>
      <a href="<?php echo esc_url(home_url('/')); ?>">Start</a>
      <span class="crumb-sep">/</span><span>Kontakt</span>
    </div>
    <h1 class="page-title">Zacznijmy<br><span class="ital">współpracę.</span></h1>
    <p class="page-sub" data-reveal data-delay="2">Pierwsza konsultacja i wycena są bezpłatne. Opisz swój projekt — odpiszę w ciągu 24 godzin.</p>
  </div>
</header>

<section class="section">
  <div class="section-inner">
    <div class="contact-grid">

      <!-- FORMULARZ -->
      <div class="form-card" data-reveal>
        <div id="formWrap">
          <h2 class="form-title">Napisz do mnie</h2>
          <p class="form-sub">Wypełnij formularz lub napisz bezpośrednio na <a href="mailto:bartlomiej@ert.pl">bartlomiej@ert.pl</a></p>
          <?php
          // Wyświetl ewentualne błędy/sukcesy Contact Form 7 lub innego pluginu
          // Jeśli używasz CF7: wstaw tu [contact-form-7 id="XX"]
          // Poniżej prosty HTML form (JS submit bez backendu — zamień na CF7 shortcode jeśli wolisz)
          ?>
          <form id="contactForm" novalidate>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Imię i nazwisko *</label>
                <input type="text" name="name" class="form-input" placeholder="Jan Kowalski" required>
              </div>
              <div class="form-group">
                <label class="form-label">Firma</label>
                <input type="text" name="company" class="form-input" placeholder="Nazwa firmy">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">E-mail *</label>
                <input type="email" name="email" class="form-input" placeholder="jan@firma.pl" required>
              </div>
              <div class="form-group">
                <label class="form-label">Telefon</label>
                <input type="tel" name="phone" class="form-input" placeholder="+48 000 000 000">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Interesująca usługa *</label>
              <select name="service" class="form-select" required>
                <option value="" disabled selected>Wybierz usługę…</option>
                <option>Promocje w Social Mediach (Meta / Instagram / LinkedIn)</option>
                <option>Google Search Ads</option>
                <option>Tworzenie strony / landing page</option>
                <option>Kompleksowe wsparcie marketingowe</option>
                <option>Kilka usług naraz</option>
                <option>Nie wiem — potrzebuję konsultacji</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Miesięczny budżet reklamowy</label>
              <select name="budget" class="form-select">
                <option value="" disabled selected>Wybierz przedział…</option>
                <option>Do 2 000 zł</option>
                <option>2 000 – 5 000 zł</option>
                <option>5 000 – 15 000 zł</option>
                <option>15 000 – 50 000 zł</option>
                <option>Powyżej 50 000 zł</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Opisz swój projekt *</label>
              <textarea name="message" class="form-textarea" placeholder="Czym zajmuje się Twoja firma? Jaki jest główny cel kampanii? Co już próbowałeś/aś?" required></textarea>
            </div>
            <label class="form-check">
              <input type="checkbox" required>
              <span class="form-check-label">Wyrażam zgodę na przetwarzanie danych osobowych w celu odpowiedzi na zapytanie. *</span>
            </label>
            <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
            <button type="submit" class="btn btn-primary form-submit">
              <span>Wyślij wiadomość</span><span class="arrow">→</span>
            </button>
            <p class="form-note">* Pola wymagane · Odpowiadam w ciągu 24 godzin</p>
          </form>
        </div>

        <div class="form-success" id="formSuccess" style="display:none;text-align:center;padding:32px 0">
          <div style="width:64px;height:64px;border:1px solid var(--cyan-20);background:var(--cyan-08);border-radius:50%;display:grid;place-items:center;margin:0 auto 22px">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--cyan)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <div style="font-size:1.3rem;font-weight:700;margin-bottom:8px">Wiadomość wysłana!</div>
          <p style="font-size:.92rem;color:var(--muted);line-height:1.7">Dziękuję za kontakt. Odezwę się w ciągu 24 godzin.</p>
        </div>
      </div>

      <!-- SIDEBAR -->
      <aside data-reveal data-delay="2">
        <a href="mailto:bartlomiej@ert.pl" class="ci-card">
          <div class="ci-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div class="ci-lbl">E-mail</div>
          <div class="ci-val">bartlomiej@ert.pl</div>
          <div class="ci-note">Najszybszy sposób kontaktu</div>
        </a>

        <a href="tel:+48000000000" class="ci-card">
          <div class="ci-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 9.91a16 16 0 0 0 6.09 6.09l1.27-.85a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 17z"/></svg>
          </div>
          <div class="ci-lbl">Telefon</div>
          <div class="ci-val">+48 000 000 000</div>
          <div class="ci-note">Pon–Pt, 9:00 – 17:00</div>
        </a>

        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="ci-card">
          <div class="ci-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          </div>
          <div class="ci-lbl">LinkedIn</div>
          <div class="ci-val">Bartłomiej Ert</div>
          <div class="ci-note">Zapraszam do kontaktu</div>
        </a>

        <div class="avail-card">
          <div class="avail-pulse">Dostępny do projektów</div>
          <p class="avail-text">Aktualnie przyjmuję nowych klientów. Wolne miejsca są ograniczone.</p>
        </div>

        <div class="expect-card">
          <div class="ci-lbl mb-2">Czego możesz się spodziewać</div>
          <div class="expect-list">
            <div class="expect-item"><span>01</span> Odpowiedź w ciągu 24h</div>
            <div class="expect-item"><span>02</span> Bezpłatna konsultacja 30–60 min</div>
            <div class="expect-item"><span>03</span> Indywidualna propozycja i wycena</div>
            <div class="expect-item"><span>04</span> Brak zobowiązań — decyzja należy do Ciebie</div>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<?php get_footer(); ?>
