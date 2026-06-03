<?php get_header(); ?>

<!-- HERO -->
<header class="hero">
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-inner">

    <div class="hero-badge" data-reveal>
      <span class="pulse"></span>
      <span>Dostępny do nowych projektów · <?php echo date('Y'); ?></span>
    </div>

    <h1 class="hero-title">
      Marketing który<br>
      <span class="ital">generuje wyniki.</span>
    </h1>

    <p class="hero-sub" data-reveal data-delay="2">
      Reklamy w <strong>Meta i Google Search</strong>, GEO, strategia marketingowa
      i kompleksowe wsparcie. Pomagam firmom z usługami lokalnymi rosnąć - bez przepalania budżetu.
    </p>

    <div class="hero-actions" data-reveal data-delay="3">
      <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary">
        <span>Darmowa wycena</span><span class="arrow">→</span>
      </a>
      <a href="<?php echo esc_url(home_url('/realizacje/')); ?>" class="btn btn-ghost">
        <span>Zobacz realizacje</span><span class="arrow">↗</span>
      </a>
    </div>

    <div class="hero-meta" data-reveal data-delay="4">
      <div class="hero-meta-item">
        <div class="hero-meta-val muted">-</div>
        <div class="hero-meta-lbl">Lat doświadczenia</div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-val muted">-</div>
        <div class="hero-meta-lbl">Projektów zrealizowanych</div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-val muted">-</div>
        <div class="hero-meta-lbl">Średni ROAS kampanii</div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-val muted">-</div>
        <div class="hero-meta-lbl">Średnia redukcja CPA</div>
      </div>
    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <span>Scroll</span>
    <div class="hero-scroll-line"></div>
  </div>
</header>

<!-- MARQUEE -->
<div class="marquee-big">
  <div class="marquee-track">
    <span class="marquee-item">Strategic Marketing</span>
    <span class="marquee-item"><span class="ital">that converts</span></span>
    <span class="marquee-item"><span class="star">✦</span></span>
    <span class="marquee-item"><span class="outline">Meta Ads</span></span>
    <span class="marquee-item">Google Search</span>
    <span class="marquee-item"><span class="ital">strategy.</span></span>
    <span class="marquee-item"><span class="star">✦</span></span>
    <span class="marquee-item">Strategic Marketing</span>
    <span class="marquee-item"><span class="ital">that converts</span></span>
    <span class="marquee-item"><span class="star">✦</span></span>
    <span class="marquee-item"><span class="outline">Meta Ads</span></span>
    <span class="marquee-item">Google Search</span>
    <span class="marquee-item"><span class="ital">strategy.</span></span>
    <span class="marquee-item"><span class="star">✦</span></span>
  </div>
</div>

<!-- TICKER -->
<div class="ticker">
  <div class="ticker-track">
    <span class="ticker-item">Meta Ads</span>
    <span class="ticker-item">Google Search</span>
    <span class="ticker-item">GEO / AI</span>
    <span class="ticker-item">Strategia</span>
    <span class="ticker-item">Retargeting</span>
    <span class="ticker-item">Performance</span>
    <span class="ticker-item">Brand Awareness</span>
    <span class="ticker-item">PMAX</span>
    <span class="ticker-item">GA4</span>
    <span class="ticker-item">Tag Manager</span>
    <span class="ticker-item">Meta Ads</span>
    <span class="ticker-item">Google Search</span>
    <span class="ticker-item">GEO / AI</span>
    <span class="ticker-item">Strategia</span>
    <span class="ticker-item">Retargeting</span>
    <span class="ticker-item">Performance</span>
    <span class="ticker-item">Brand Awareness</span>
    <span class="ticker-item">PMAX</span>
    <span class="ticker-item">GA4</span>
    <span class="ticker-item">Tag Manager</span>
  </div>
</div>

<!-- USŁUGI PREVIEW -->
<section class="section">
  <div class="section-inner">
    <div class="eyebrow" data-reveal>Usługi</div>
    <h2 class="section-title" data-reveal>Cztery <span class="acc">specjalizacje</span></h2>
    <p class="section-sub" data-reveal>Skupiam się na kanałach, które realnie przynoszą klientów dla firm z usługami lokalnymi. Bez rozproszenia, bez marketingowego bełkotu.</p>

    <div class="svc-grid">

      <article class="svc-card" data-reveal>
        <div class="svc-num">001 / Social</div>
        <div class="svc-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M8 12h8M12 8v8"/></svg>
        </div>
        <h3 class="svc-title">Promocje w Social Media</h3>
        <p class="svc-desc">Kampanie na Meta i Instagramie. Precyzyjne targetowanie, testy kreacji, codzienna optymalizacja i raporty z rekomendacjami.</p>
        <div class="svc-tags">
          <span class="tag">Meta Ads</span><span class="tag">Instagram</span><span class="tag">Retargeting</span>
        </div>
      </article>

      <article class="svc-card" data-reveal data-delay="1">
        <div class="svc-num">002 / Search</div>
        <div class="svc-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </div>
        <h3 class="svc-title">Google Search Ads</h3>
        <p class="svc-desc">Kampanie w wyszukiwarce nastawione na konwersję. Płacisz tylko za kliknięcie zainteresowanego użytkownika z najwyższą intencją zakupową.</p>
        <div class="svc-tags">
          <span class="tag">Search</span><span class="tag">PMAX</span><span class="tag">Local</span><span class="tag">Remarketing</span>
        </div>
      </article>

      <article class="svc-card" data-reveal data-delay="2">
        <div class="svc-num">003 / Web</div>
        <div class="svc-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h3 class="svc-title">Tworzenie stron internetowych</h3>
        <p class="svc-desc">Nowoczesne strony i landing page'e zoptymalizowane pod konwersję, szybkość i SEO - fundament każdej skutecznej kampanii reklamowej.</p>
        <div class="svc-tags">
          <span class="tag">Landing Pages</span><span class="tag">WordPress</span><span class="tag">SEO</span>
        </div>
      </article>

      <article class="svc-card" data-reveal data-delay="3">
        <div class="svc-num">004 / GEO</div>
        <div class="svc-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></svg>
        </div>
        <h3 class="svc-title">GEO - widoczność w AI</h3>
        <p class="svc-desc">Pozycjonowanie w odpowiedziach ChatGPT, Perplexity i Google AI Overviews. Nowy kanał - przewaga jeszcze do zdobycia.</p>
        <div class="svc-tags">
          <span class="tag">ChatGPT</span><span class="tag">Perplexity</span><span class="tag">AI Overviews</span>
        </div>
      </article>

      <article class="svc-card" data-reveal data-delay="4">
        <div class="svc-num">005 / Strategy</div>
        <div class="svc-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
        </div>
        <h3 class="svc-title">Kompleksowe wsparcie</h3>
        <p class="svc-desc">Pełna opieka nad marketingiem firmy - strategia, budżetowanie, wdrożenie i raportowanie w jednym miejscu. Twój zewnętrzny dział marketingu.</p>
        <div class="svc-tags">
          <span class="tag">Strategia</span><span class="tag">Omnichannel</span><span class="tag">Consulting</span>
        </div>
      </article>

    </div>

    <div class="text-center mt-4" data-reveal>
      <a href="<?php echo esc_url(home_url('/uslugi/')); ?>" class="btn btn-ghost">
        <span>Wszystkie usługi</span><span class="arrow">→</span>
      </a>
    </div>
  </div>
</section>

<!-- WYNIKI -->
<section class="section section-alt">
  <div class="section-inner">
    <div class="eyebrow" data-reveal>Realizacje</div>
    <h2 class="section-title" data-reveal>Wybrane <span class="acc">wyniki</span></h2>
    <p class="section-sub" data-reveal>Liczby mówią same za siebie - pełne case studies ze zrzutami z paneli reklamowych dostępne w sekcji Realizacje.</p>

    <div class="stats" data-reveal>
      <div class="stat"><div class="stat-val muted">-</div><div class="stat-lbl">Rekordowy ROAS</div></div>
      <div class="stat"><div class="stat-val muted">-</div><div class="stat-lbl">Redukcja CPA</div></div>
      <div class="stat"><div class="stat-val muted">-</div><div class="stat-lbl">Wzrost zasięgu</div></div>
      <div class="stat"><div class="stat-val muted">-</div><div class="stat-lbl">Wzrost zapytań</div></div>
    </div>

    <div class="text-center mt-4" data-reveal>
      <a href="<?php echo esc_url(home_url('/realizacje/')); ?>" class="btn btn-ghost">
        <span>Pełne case studies</span><span class="arrow">→</span>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section">
  <div class="section-inner">
    <div class="cta-banner" data-reveal>
      <div>
        <h3>Gotowy na <span class="acc">wzrost?</span></h3>
        <p>Pierwsza konsultacja i wycena są bezpłatne. Odpowiadam w ciągu 24 godzin.</p>
      </div>
      <div class="cta-banner-actions">
        <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary">
          <span>Napisz do mnie</span><span class="arrow">→</span>
        </a>
        <a href="<?php echo esc_url(home_url('/o-mnie/')); ?>" class="btn btn-ghost">
          <span>Poznaj mnie</span><span class="arrow">↗</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
