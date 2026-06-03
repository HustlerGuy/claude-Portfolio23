<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#04080f">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- LOADER -->
<div class="loader" id="loader">
  <div class="loader-inner">
    <div class="loader-mark">BE</div>
    <div class="loader-bar"></div>
    <div class="loader-label">Bartłomiej Ert · Strategic Marketing</div>
  </div>
</div>

<!-- BG LAYERS -->
<div class="aurora" aria-hidden="true"></div>
<canvas class="bg-canvas" aria-hidden="true"></canvas>
<div class="grain" aria-hidden="true"></div>

<!-- ============================ NAV ============================ -->
<nav class="nav" id="mainNav">
  <a class="nav-logo" href="<?php echo esc_url(home_url('/')); ?>">
    <div class="nav-logo-mark"><span>BE</span></div>
    <div>
      <div class="nav-logo-text">Bartłomiej Ert</div>
      <span class="nav-logo-sub"><?php echo esc_html(be_t('nav.subtitle')); ?></span>
    </div>
  </a>

  <!-- DESKTOP LINKS (>=981px) -->
  <ul class="nav-links nav-links-desktop">
    <li><a href="<?php echo esc_url(home_url('/uslugi/')); ?>"<?php echo (is_page('uslugi') ? ' class="active"' : ''); ?>><?php echo esc_html(be_t('nav.uslugi')); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('/proces/')); ?>"<?php echo (is_page('proces') ? ' class="active"' : ''); ?>><?php echo esc_html(be_t('nav.proces')); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('/realizacje/')); ?>"<?php echo (is_page('realizacje') ? ' class="active"' : ''); ?>><?php echo esc_html(be_t('nav.realizacje')); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('/o-mnie/')); ?>"<?php echo (is_page('o-mnie') ? ' class="active"' : ''); ?>><?php echo esc_html(be_t('nav.o_mnie')); ?></a></li>
  </ul>

  <!-- DESKTOP RIGHT -->
  <div class="nav-right">
    <!-- Lang toggle desktop -->
    <div class="lang-toggle" role="group" aria-label="<?php echo esc_attr(be_t('nav.lang_label')); ?>">
      <a href="<?php echo esc_url(be_lang_url('pl')); ?>" class="lang-btn<?php echo (be_lang() === 'pl' ? ' active' : ''); ?>">PL</a>
      <span class="lang-divider">/</span>
      <a href="<?php echo esc_url(be_lang_url('en')); ?>" class="lang-btn<?php echo (be_lang() === 'en' ? ' active' : ''); ?>">EN</a>
    </div>

    <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="nav-cta<?php echo (is_page('kontakt') ? ' active' : ''); ?>">
      <?php echo esc_html(be_t('nav.cta')); ?>
    </a>

    <!-- HAMBURGER -->
    <button class="nav-toggle" id="navToggle" aria-label="Menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ============================ MOBILE MENU ============================ -->
<div class="mobile-menu" id="mobileMenu" aria-hidden="true">

  <!-- Animated background -->
  <div class="mm-bg" aria-hidden="true">
    <div class="mm-glow mm-glow-1"></div>
    <div class="mm-glow mm-glow-2"></div>
    <div class="mm-grid"></div>
  </div>

  <!-- Top bar inside mobile menu -->
  <div class="mm-top">
    <div class="mm-mark">BE</div>
    <div class="mm-lang">
      <a href="<?php echo esc_url(be_lang_url('pl')); ?>" class="mm-lang-btn<?php echo (be_lang() === 'pl' ? ' active' : ''); ?>">PL</a>
      <span class="mm-lang-sep">/</span>
      <a href="<?php echo esc_url(be_lang_url('en')); ?>" class="mm-lang-btn<?php echo (be_lang() === 'en' ? ' active' : ''); ?>">EN</a>
    </div>
  </div>

  <!-- Big nav links -->
  <nav class="mm-nav">
    <a href="<?php echo esc_url(home_url('/uslugi/')); ?>" class="mm-link<?php echo (is_page('uslugi') ? ' is-active' : ''); ?>" style="--i:1">
      <span class="mm-num">01</span>
      <span class="mm-text"><?php echo esc_html(be_t('nav.uslugi')); ?></span>
      <span class="mm-arrow">-></span>
    </a>
    <a href="<?php echo esc_url(home_url('/proces/')); ?>" class="mm-link<?php echo (is_page('proces') ? ' is-active' : ''); ?>" style="--i:2">
      <span class="mm-num">02</span>
      <span class="mm-text"><?php echo esc_html(be_t('nav.proces')); ?></span>
      <span class="mm-arrow">-></span>
    </a>
    <a href="<?php echo esc_url(home_url('/realizacje/')); ?>" class="mm-link<?php echo (is_page('realizacje') ? ' is-active' : ''); ?>" style="--i:3">
      <span class="mm-num">03</span>
      <span class="mm-text"><?php echo esc_html(be_t('nav.realizacje')); ?></span>
      <span class="mm-arrow">-></span>
    </a>
    <a href="<?php echo esc_url(home_url('/o-mnie/')); ?>" class="mm-link<?php echo (is_page('o-mnie') ? ' is-active' : ''); ?>" style="--i:4">
      <span class="mm-num">04</span>
      <span class="mm-text"><?php echo esc_html(be_t('nav.o_mnie')); ?></span>
      <span class="mm-arrow">-></span>
    </a>
    <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="mm-link mm-link-cta<?php echo (is_page('kontakt') ? ' is-active' : ''); ?>" style="--i:5">
      <span class="mm-num">05</span>
      <span class="mm-text"><?php echo esc_html(be_t('nav.kontakt')); ?></span>
      <span class="mm-arrow">-></span>
    </a>
  </nav>

  <!-- Bottom: contact + socials -->
  <div class="mm-bottom">
    <div class="mm-contact">
      <a href="mailto:bartlomiej@scalert.pl" class="mm-contact-item">
        <span class="mm-contact-lbl">Email</span>
        <span class="mm-contact-val">bartlomiej@scalert.pl</span>
      </a>
      <a href="tel:+48600555867" class="mm-contact-item">
        <span class="mm-contact-lbl">Tel</span>
        <span class="mm-contact-val">+48 600 555 867</span>
      </a>
    </div>

    <div class="mm-socials">
      <a href="https://www.instagram.com/baertlomiej/" target="_blank" rel="noopener noreferrer" class="mm-social" aria-label="Instagram">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        <span>Instagram</span>
      </a>
      <a href="https://www.facebook.com/profile.php?id=61589728433435" target="_blank" rel="noopener noreferrer" class="mm-social" aria-label="Facebook">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        <span>Facebook</span>
      </a>
    </div>
  </div>
</div>
