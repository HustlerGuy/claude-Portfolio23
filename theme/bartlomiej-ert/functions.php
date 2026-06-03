<?php
// ── BARTŁOMIEJ ERT PORTFOLIO THEME ──────────────────────────────
defined('ABSPATH') || exit;

// 1. ENQUEUE fonts, CSS, JS
add_action('wp_enqueue_scripts', function () {
    // Google Fonts – Barlow Condensed (latin-ext!), Outfit, Fraunces, JetBrains Mono
    wp_enqueue_style(
        'be-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Outfit:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300;1,9..144,400&family=JetBrains+Mono:wght@300;400;500&subset=latin,latin-ext&display=swap',
        [],
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'be-style',
        get_stylesheet_uri(),
        ['be-fonts'],
        wp_get_theme()->get('Version')
    );

    // Main JS
    wp_enqueue_script(
        'be-site',
        get_template_directory_uri() . '/assets/js/site.js',
        [],
        wp_get_theme()->get('Version'),
        true // footer
    );
});

// 2. Add preconnect for Google Fonts in <head>
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

    // Register nav menu
    register_nav_menus([
        'primary' => 'Menu główne',
    ]);
});

// 4. Remove WP default padding-top on admin bar
add_action('wp_head', function () { ?>
<style>
  html { margin-top: 0 !important; }
  #wpadminbar { display: none !important; }
  @media screen and (min-width: 601px) {
    #wpadminbar { display: block !important; }
    body.admin-bar .nav { top: 32px; }
  }
</style>
<?php }, 99);

// 5. Clean up wp_head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
