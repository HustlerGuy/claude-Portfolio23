<?php
// ── BARTŁOMIEJ ERT PORTFOLIO THEME ──────────────────────────────
defined('ABSPATH') || exit;

// Translations system
require_once get_template_directory() . '/inc/translations.php';

// 1. ENQUEUE fonts, CSS, JS
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'be-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Outfit:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300;1,9..144,400&family=JetBrains+Mono:wght@300;400;500&subset=latin,latin-ext&display=swap',
        [], null
    );
    wp_enqueue_style('be-style', get_stylesheet_uri(), ['be-fonts'], wp_get_theme()->get('Version'));
    wp_enqueue_script('be-site', get_template_directory_uri() . '/assets/js/site.js', [], wp_get_theme()->get('Version'), true);
});

// 2. Preconnect for Google Fonts
add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1);

// 3. Theme supports
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('menus');
    register_nav_menus(['primary' => 'Menu główne']);
});

// 4. CUSTOM BROWSER TAB TITLE — usuwa "Strona główna - WordPress" itp.
add_filter('document_title_parts', function ($parts) {
    $brand = 'Bartłomiej Ert';
    $tagline = (be_lang() === 'en') ? 'Strategic Marketing & Paid Ads' : 'Marketing Strategiczny i Paid Ads';

    if (is_front_page()) {
        return ['title' => $brand . ' · ' . $tagline];
    }
    // Podstrony: "Tytuł · Bartłomiej Ert"
    $page_title = $parts['title'] ?? '';
    return ['title' => $page_title . ' · ' . $brand];
});

add_filter('document_title_separator', function () { return '·'; });

// 5. Remove WP from head, hide adminbar offset
add_action('wp_head', function () { ?>
<style>
  html { margin-top: 0 !important; }
  @media screen and (min-width: 601px) {
    body.admin-bar .nav { top: 32px; }
  }
</style>
<?php }, 99);

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// 6. Body class with current language
add_filter('body_class', function ($classes) {
    $classes[] = 'lang-' . be_lang();
    return $classes;
});

// 7. HTML lang attr
add_filter('language_attributes', function ($output) {
    return 'lang="' . be_lang() . '"';
});
