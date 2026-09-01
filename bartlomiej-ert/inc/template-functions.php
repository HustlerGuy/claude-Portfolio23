<?php
/**
 * Funkcje pomocnicze szablonów.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Zwraca wartość opcji motywu z Customizera z wartością domyślną.
 *
 * @param string $key     Klucz opcji (bez prefiksu be_).
 * @param mixed  $default Wartość domyślna.
 * @return mixed
 */
function be_opt( $key, $default = '' ) {
	return get_theme_mod( 'be_' . $key, $default );
}

/**
 * Domyślne wartości opcji motywu — używane w Customizerze i szablonach.
 *
 * @return array
 */
function be_defaults() {
	return array(
		'brand_short'   => 'BE',
		'brand_name'    => 'Bartłomiej Ert',
		'brand_tagline' => 'Marketing Strategiczny',
		'email'         => 'bartlomiej@ert.pl',
		'phone'         => '+48 000 000 000',
		'phone_hours'   => 'Pon–Pt, 9:00 – 17:00',
		'linkedin_url'  => 'https://linkedin.com',
		'linkedin_name' => 'Bartłomiej Ert',
		'location'      => 'Polska',
		// Metryki hero / statystyki (domyślnie myślnik do uzupełnienia).
		'metric_years'  => '—',
		'metric_proj'   => '—',
		'metric_roas'   => '—',
		'metric_cpa'    => '—',
	);
}

/**
 * Skrót do pobrania opcji z tablicą domyślnych wartości.
 *
 * @param string $key Klucz.
 * @return string
 */
function be_get( $key ) {
	$defaults = be_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return be_opt( $key, $default );
}

/**
 * Wygodny helper: URL podstrony po slug (z fallbackiem, gdy strona jeszcze nie istnieje).
 *
 * @param string $slug Slug podstrony.
 * @return string
 */
function be_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/**
 * Dodaje klasę body dla łatwiejszego stylowania podstron.
 *
 * @param array $classes Klasy body.
 * @return array
 */
function be_body_classes( $classes ) {
	if ( is_page() ) {
		$classes[] = 'be-page';
	}
	return $classes;
}
add_filter( 'body_class', 'be_body_classes' );
