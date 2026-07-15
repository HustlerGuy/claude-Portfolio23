<?php
/**
 * Bartłomiej Ert — Marketing Strategiczny
 * Główny plik funkcji motywu.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Brak bezpośredniego dostępu.
}

if ( ! defined( 'BE_THEME_VERSION' ) ) {
	define( 'BE_THEME_VERSION', '1.0.0' );
}

/**
 * Konfiguracja motywu.
 */
function be_theme_setup() {
	load_theme_textdomain( 'bartlomiej-ert', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 40,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Menu główne', 'bartlomiej-ert' ),
		'footer'  => __( 'Menu w stopce', 'bartlomiej-ert' ),
	) );
}
add_action( 'after_setup_theme', 'be_theme_setup' );

/**
 * Rejestracja i ładowanie zasobów (CSS/JS/fonty).
 */
function be_enqueue_assets() {
	// Google Fonts (Outfit + JetBrains Mono).
	wp_enqueue_style(
		'be-fonts',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@300;400&display=swap',
		array(),
		null
	);

	// Główny arkusz stylów motywu (style.css w katalogu głównym).
	wp_enqueue_style(
		'be-style',
		get_stylesheet_uri(),
		array( 'be-fonts' ),
		BE_THEME_VERSION
	);

	// Skrypt motywu (nawigacja mobilna, animacje, FAQ, formularz).
	wp_enqueue_script(
		'be-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		BE_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'be_enqueue_assets' );

/**
 * Dołączane pliki.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/contact-form.php';
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Fallback menu głównego — gdy użytkownik nie ustawił jeszcze menu,
 * wyświetlamy zestaw domyślnych linków w tym samym stylu co oryginał.
 */
function be_primary_menu_fallback() {
	$items = array(
		array( 'title' => __( 'Usługi', 'bartlomiej-ert' ),    'slug' => 'uslugi',    'cta' => false ),
		array( 'title' => __( 'Proces', 'bartlomiej-ert' ),    'slug' => 'proces',    'cta' => false ),
		array( 'title' => __( 'Realizacje', 'bartlomiej-ert' ), 'slug' => 'realizacje', 'cta' => false ),
		array( 'title' => __( 'O mnie', 'bartlomiej-ert' ),    'slug' => 'o-mnie',    'cta' => false ),
		array( 'title' => __( 'Darmowa wycena', 'bartlomiej-ert' ), 'slug' => 'kontakt', 'cta' => true ),
	);

	echo '<ul class="nav-links">';
	foreach ( $items as $item ) {
		$page       = get_page_by_path( $item['slug'] );
		$url        = $page ? get_permalink( $page ) : home_url( '/' . $item['slug'] . '/' );
		$is_current = is_page( $item['slug'] );
		$li_class   = $item['cta'] ? 'menu-item-cta' : '';
		if ( $is_current ) {
			$li_class .= ' current-menu-item';
		}
		$a_class = $item['cta'] ? 'nav-cta' : '';
		if ( $is_current && ! $item['cta'] ) {
			$a_class = 'active';
		}
		printf(
			'<li class="%1$s"><a href="%2$s" class="%3$s">%4$s</a></li>',
			esc_attr( trim( $li_class ) ),
			esc_url( $url ),
			esc_attr( $a_class ),
			esc_html( $item['title'] )
		);
	}
	echo '</ul>';
}

/**
 * Fallback menu w stopce.
 */
function be_footer_menu_fallback() {
	$items = array(
		'uslugi'     => __( 'Usługi', 'bartlomiej-ert' ),
		'realizacje' => __( 'Realizacje', 'bartlomiej-ert' ),
		'o-mnie'     => __( 'O mnie', 'bartlomiej-ert' ),
		'kontakt'    => __( 'Kontakt', 'bartlomiej-ert' ),
	);
	echo '<ul class="footer-links">';
	foreach ( $items as $slug => $title ) {
		$page = get_page_by_path( $slug );
		$url  = $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $url ), esc_html( $title ) );
	}
	echo '</ul>';
}
