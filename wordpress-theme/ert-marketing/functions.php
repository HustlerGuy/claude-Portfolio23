<?php
/**
 * Bartłomiej Ert — Marketing Strategiczny
 * Theme functions.
 *
 * @package ert-marketing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bezpośredni dostęp zabroniony.
}

if ( ! defined( 'ERT_THEME_VERSION' ) ) {
	define( 'ERT_THEME_VERSION', '1.0.0' );
}

/**
 * Mapowanie podstron motywu (slug => tytuł).
 * Te strony są tworzone automatycznie przy aktywacji motywu,
 * a ich szablony to pliki page-{slug}.php.
 */
function ert_pages_map() {
	return array(
		'uslugi'     => 'Usługi',
		'proces'     => 'Proces',
		'realizacje' => 'Realizacje',
		'o-mnie'     => 'O mnie',
		'kontakt'    => 'Kontakt',
	);
}

/**
 * Podstawowa konfiguracja motywu.
 */
function ert_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	register_nav_menus(
		array(
			'primary' => __( 'Menu główne', 'ert-marketing' ),
		)
	);
	load_theme_textdomain( 'ert-marketing', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ert_setup' );

/**
 * Rejestracja i kolejkowanie stylów oraz skryptów.
 */
function ert_assets() {
	// Google Fonts (Outfit + JetBrains Mono).
	wp_enqueue_style(
		'ert-fonts',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@300;400&display=swap',
		array(),
		null
	);

	// Główny arkusz motywu (style.css).
	wp_enqueue_style(
		'ert-main',
		get_stylesheet_uri(),
		array( 'ert-fonts' ),
		ERT_THEME_VERSION
	);

	// Style specyficzne dla danej podstrony.
	$page_css = '';
	if ( is_front_page() ) {
		$page_css = 'home';
	} elseif ( is_page( 'o-mnie' ) ) {
		$page_css = 'o-mnie';
	} elseif ( is_page( 'uslugi' ) ) {
		$page_css = 'uslugi';
	} elseif ( is_page( 'realizacje' ) ) {
		$page_css = 'realizacje';
	} elseif ( is_page( 'proces' ) ) {
		$page_css = 'proces';
	} elseif ( is_page( 'kontakt' ) ) {
		$page_css = 'kontakt';
	}

	if ( $page_css ) {
		wp_enqueue_style(
			'ert-page-' . $page_css,
			get_template_directory_uri() . '/assets/css/' . $page_css . '.css',
			array( 'ert-main' ),
			ERT_THEME_VERSION
		);
	}

	// Skrypt motywu (reveal, FAQ, skill bars, formularz).
	wp_enqueue_script(
		'ert-main',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		ERT_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ert_assets' );

/**
 * Zwraca adres URL podstrony na podstawie slug-a.
 * Działa niezależnie od ustawień bezpośrednich odnośników.
 *
 * @param string $slug Slug strony (np. 'uslugi').
 * @return string
 */
function ert_url( $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page->ID );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Zwraca klasę 'active' dla aktywnej pozycji menu.
 *
 * @param string $slug Slug strony lub 'home'.
 * @return string
 */
function ert_active( $slug ) {
	if ( 'home' === $slug ) {
		return is_front_page() ? 'active' : '';
	}
	return is_page( $slug ) ? 'active' : '';
}

/**
 * Tworzy podstrony i ustawia stronę startową przy aktywacji motywu.
 */
function ert_create_pages_on_activation() {
	// 1. Strona startowa.
	$home = get_page_by_path( 'strona-glowna' );
	if ( ! $home ) {
		$home_id = wp_insert_post(
			array(
				'post_title'   => 'Strona główna',
				'post_name'    => 'strona-glowna',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
	} else {
		$home_id = $home->ID;
	}

	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	// 2. Pozostałe podstrony.
	foreach ( ert_pages_map() as $slug => $title ) {
		if ( ! get_page_by_path( $slug ) ) {
			wp_insert_post(
				array(
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
		}
	}

	// 3. Ustaw czytelne bezpośrednie odnośniki i odśwież reguły.
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ert_create_pages_on_activation' );
