<?php
/**
 * Opcje motywu w Customizerze (Wygląd → Dostosuj).
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Rejestracja sekcji i ustawień.
 *
 * @param WP_Customize_Manager $wp_customize Obiekt Customizera.
 */
function be_customize_register( $wp_customize ) {
	$defaults = be_defaults();

	// ── Sekcja: Marka ──
	$wp_customize->add_section( 'be_brand', array(
		'title'    => __( 'Marka i logo', 'bartlomiej-ert' ),
		'priority' => 30,
	) );

	$brand_fields = array(
		'brand_short'   => __( 'Skrót w logo (np. BE)', 'bartlomiej-ert' ),
		'brand_name'    => __( 'Nazwa / imię i nazwisko', 'bartlomiej-ert' ),
		'brand_tagline' => __( 'Tagline (podpis w stopce)', 'bartlomiej-ert' ),
		'location'      => __( 'Lokalizacja (stopka)', 'bartlomiej-ert' ),
	);
	foreach ( $brand_fields as $key => $label ) {
		$wp_customize->add_setting( 'be_' . $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'be_' . $key, array(
			'label'   => $label,
			'section' => 'be_brand',
			'type'    => 'text',
		) );
	}

	// ── Sekcja: Kontakt ──
	$wp_customize->add_section( 'be_contact', array(
		'title'    => __( 'Dane kontaktowe', 'bartlomiej-ert' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'be_email', array(
		'default'           => $defaults['email'],
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'be_email', array(
		'label'   => __( 'Adres e-mail', 'bartlomiej-ert' ),
		'section' => 'be_contact',
		'type'    => 'email',
	) );

	$contact_text = array(
		'phone'         => __( 'Telefon', 'bartlomiej-ert' ),
		'phone_hours'   => __( 'Godziny (pod telefonem)', 'bartlomiej-ert' ),
		'linkedin_name' => __( 'Nazwa na LinkedIn', 'bartlomiej-ert' ),
	);
	foreach ( $contact_text as $key => $label ) {
		$wp_customize->add_setting( 'be_' . $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'be_' . $key, array(
			'label'   => $label,
			'section' => 'be_contact',
			'type'    => 'text',
		) );
	}

	$wp_customize->add_setting( 'be_linkedin_url', array(
		'default'           => $defaults['linkedin_url'],
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'be_linkedin_url', array(
		'label'   => __( 'Adres URL profilu LinkedIn', 'bartlomiej-ert' ),
		'section' => 'be_contact',
		'type'    => 'url',
	) );

	// ── Sekcja: Metryki / statystyki ──
	$wp_customize->add_section( 'be_metrics', array(
		'title'       => __( 'Metryki i statystyki', 'bartlomiej-ert' ),
		'description' => __( 'Liczby wyświetlane w sekcji hero i na podstronie „O mnie”. Zostaw „—”, jeśli nie chcesz podawać.', 'bartlomiej-ert' ),
		'priority'    => 32,
	) );

	$metric_fields = array(
		'metric_years' => __( 'Lat doświadczenia', 'bartlomiej-ert' ),
		'metric_proj'  => __( 'Liczba projektów', 'bartlomiej-ert' ),
		'metric_roas'  => __( 'Średni ROAS kampanii', 'bartlomiej-ert' ),
		'metric_cpa'   => __( 'Średni CPA vs. przed', 'bartlomiej-ert' ),
	);
	foreach ( $metric_fields as $key => $label ) {
		$wp_customize->add_setting( 'be_' . $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'be_' . $key, array(
			'label'   => $label,
			'section' => 'be_metrics',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'be_customize_register' );
