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
    <div class="loader-label">Bartłomiej Ert · Marketing</div>
  </div>
</div>

<!-- BG -->
<div class="aurora" aria-hidden="true"></div>
<canvas class="bg-canvas" aria-hidden="true"></canvas>
<div class="grain" aria-hidden="true"></div>

<!-- NAV -->
<nav class="nav" id="mainNav">
  <a class="nav-logo" href="<?php echo esc_url(home_url('/')); ?>">
    <div class="nav-logo-mark"><span>BE</span></div>
    <div>
      <div class="nav-logo-text">Bartłomiej Ert</div>
      <span class="nav-logo-sub">Marketing · Paid Ads</span>
    </div>
  </a>

  <button class="nav-toggle" id="navToggle" aria-label="Menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>

  <ul class="nav-links" id="navLinks">
    <li><a href="<?php echo esc_url(home_url('/uslugi/')); ?>"<?php echo (is_page('uslugi') ? ' class="active"' : ''); ?>>Usługi</a></li>
    <li><a href="<?php echo esc_url(home_url('/proces/')); ?>"<?php echo (is_page('proces') ? ' class="active"' : ''); ?>>Proces</a></li>
    <li><a href="<?php echo esc_url(home_url('/realizacje/')); ?>"<?php echo (is_page('realizacje') ? ' class="active"' : ''); ?>>Realizacje</a></li>
    <li><a href="<?php echo esc_url(home_url('/o-mnie/')); ?>"<?php echo (is_page('o-mnie') ? ' class="active"' : ''); ?>>O mnie</a></li>
    <li><a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="nav-cta<?php echo (is_page('kontakt') ? ' active' : ''); ?>">Darmowa wycena →</a></li>
  </ul>
</nav>
