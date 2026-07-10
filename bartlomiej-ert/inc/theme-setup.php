<?php
/**
 * Automatyczna konfiguracja po aktywacji motywu.
 *
 * Tworzy podstrony z właściwymi szablonami, buduje menu główne i stopki,
 * oraz ustawia stronę startową. Dzięki temu motyw działa od razu po instalacji.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Definicja podstron tworzonych automatycznie.
 *
 * @return array
 */
function be_setup_pages_map() {
	return array(
		'uslugi'     => array(
			'title'    => __( 'Usługi', 'bartlomiej-ert' ),
			'template' => 'template-uslugi.php',
			'cta'      => false,
		),
		'proces'     => array(
			'title'    => __( 'Proces', 'bartlomiej-ert' ),
			'template' => 'template-proces.php',
			'cta'      => false,
		),
		'realizacje' => array(
			'title'    => __( 'Realizacje', 'bartlomiej-ert' ),
			'template' => 'template-realizacje.php',
			'cta'      => false,
		),
		'o-mnie'     => array(
			'title'    => __( 'O mnie', 'bartlomiej-ert' ),
			'template' => 'template-o-mnie.php',
			'cta'      => false,
		),
		'kontakt'    => array(
			'title'    => __( 'Kontakt', 'bartlomiej-ert' ),
			'template' => 'template-kontakt.php',
			'cta'      => true,
		),
	);
}

/**
 * Uruchamiane po aktywacji motywu.
 */
function be_after_switch_theme() {
	$page_ids = be_create_pages();
	be_create_menus( $page_ids );
	be_maybe_set_front_page();

	// Odświeżenie reguł przepisywania (ładne linki).
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'be_after_switch_theme' );

/**
 * Tworzy podstrony (jeśli nie istnieją) i przypisuje szablony.
 *
 * @return array Mapa slug => ID strony.
 */
function be_create_pages() {
	$map      = be_setup_pages_map();
	$page_ids = array();

	foreach ( $map as $slug => $data ) {
		$existing = get_page_by_path( $slug );

		if ( $existing ) {
			$page_id = $existing->ID;
		} else {
			$page_id = wp_insert_post( array(
				'post_title'   => $data['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			) );
		}

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			update_post_meta( $page_id, '_wp_page_template', $data['template'] );
			$page_ids[ $slug ] = $page_id;
		}
	}

	return $page_ids;
}

/**
 * Buduje menu główne oraz menu w stopce i przypisuje je do lokalizacji.
 *
 * @param array $page_ids Mapa slug => ID strony.
 */
function be_create_menus( $page_ids ) {
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( ! is_array( $locations ) ) {
		$locations = array();
	}

	// ── Menu główne ──
	$menu_name = __( 'Menu główne', 'bartlomiej-ert' );
	$menu      = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = $menu->term_id;
	}

	if ( ! is_wp_error( $menu_id ) ) {
		$existing_items = wp_get_nav_menu_items( $menu_id );
		if ( empty( $existing_items ) ) {
			$map = be_setup_pages_map();
			foreach ( $map as $slug => $data ) {
				if ( empty( $page_ids[ $slug ] ) ) {
					continue;
				}
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => $data['title'],
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_ids[ $slug ],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-classes'   => $data['cta'] ? 'menu-item-cta' : '',
				) );
			}
		}
		$locations['primary'] = $menu_id;
	}

	// ── Menu w stopce ──
	$footer_name = __( 'Stopka', 'bartlomiej-ert' );
	$footer_menu = wp_get_nav_menu_object( $footer_name );
	if ( ! $footer_menu ) {
		$footer_id = wp_create_nav_menu( $footer_name );
	} else {
		$footer_id = $footer_menu->term_id;
	}

	if ( ! is_wp_error( $footer_id ) ) {
		$existing_footer = wp_get_nav_menu_items( $footer_id );
		if ( empty( $existing_footer ) ) {
			$footer_slugs = array( 'uslugi', 'realizacje', 'o-mnie', 'kontakt' );
			$map          = be_setup_pages_map();
			foreach ( $footer_slugs as $slug ) {
				if ( empty( $page_ids[ $slug ] ) ) {
					continue;
				}
				wp_update_nav_menu_item( $footer_id, 0, array(
					'menu-item-title'     => $map[ $slug ]['title'],
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_ids[ $slug ],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
		}
		$locations['footer'] = $footer_id;
	}

	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Ustawia statyczną stronę startową, jeśli nie jest jeszcze ustawiona.
 * front-page.php i tak obsługuje front, ale ustawiamy to dla spójności.
 */
function be_maybe_set_front_page() {
	if ( 'posts' === get_option( 'show_on_front' ) ) {
		$front = get_page_by_path( 'start' );
		if ( ! $front ) {
			$front_id = wp_insert_post( array(
				'post_title'  => __( 'Start', 'bartlomiej-ert' ),
				'post_name'   => 'start',
				'post_status' => 'publish',
				'post_type'   => 'page',
			) );
		} else {
			$front_id = $front->ID;
		}
		if ( $front_id && ! is_wp_error( $front_id ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_id );
		}
	}
}
