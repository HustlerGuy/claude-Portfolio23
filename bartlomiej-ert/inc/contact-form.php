<?php
/**
 * Obsługa formularza kontaktowego (wysyłka e-mail przez wp_mail).
 *
 * Formularz wysyła dane metodą POST do admin-post.php (akcja be_contact).
 * Po przetworzeniu następuje przekierowanie z parametrem statusu.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Przetwarza wysyłkę formularza kontaktowego.
 */
function be_handle_contact_form() {
	$redirect = wp_get_referer();
	if ( ! $redirect ) {
		$redirect = home_url( '/' );
	}

	// Weryfikacja nonce.
	if ( ! isset( $_POST['be_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['be_contact_nonce'] ) ), 'be_contact_action' ) ) {
		wp_safe_redirect( add_query_arg( 'be_contact', 'error', $redirect ) . '#kontakt-form' );
		exit;
	}

	// Honeypot — jeśli wypełniony, to bot. Udajemy sukces, ale nic nie wysyłamy.
	if ( ! empty( $_POST['be_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'be_contact', 'sent', $redirect ) . '#kontakt-form' );
		exit;
	}

	$name    = isset( $_POST['be_name'] ) ? sanitize_text_field( wp_unslash( $_POST['be_name'] ) ) : '';
	$company = isset( $_POST['be_company'] ) ? sanitize_text_field( wp_unslash( $_POST['be_company'] ) ) : '';
	$email   = isset( $_POST['be_email'] ) ? sanitize_email( wp_unslash( $_POST['be_email'] ) ) : '';
	$phone   = isset( $_POST['be_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['be_phone'] ) ) : '';
	$service = isset( $_POST['be_service'] ) ? sanitize_text_field( wp_unslash( $_POST['be_service'] ) ) : '';
	$budget  = isset( $_POST['be_budget'] ) ? sanitize_text_field( wp_unslash( $_POST['be_budget'] ) ) : '';
	$message = isset( $_POST['be_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['be_message'] ) ) : '';
	$consent = ! empty( $_POST['be_consent'] );

	// Walidacja wymaganych pól.
	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) || empty( $message ) || ! $consent ) {
		wp_safe_redirect( add_query_arg( 'be_contact', 'error', $redirect ) . '#kontakt-form' );
		exit;
	}

	$to      = be_get( 'email' );
	$subject = sprintf( __( 'Nowe zapytanie z formularza — %s', 'bartlomiej-ert' ), $name );

	$body  = __( 'Nowe zapytanie z formularza kontaktowego:', 'bartlomiej-ert' ) . "\n\n";
	$body .= __( 'Imię i nazwisko: ', 'bartlomiej-ert' ) . $name . "\n";
	$body .= __( 'Firma: ', 'bartlomiej-ert' ) . $company . "\n";
	$body .= __( 'E-mail: ', 'bartlomiej-ert' ) . $email . "\n";
	$body .= __( 'Telefon: ', 'bartlomiej-ert' ) . $phone . "\n";
	$body .= __( 'Usługa: ', 'bartlomiej-ert' ) . $service . "\n";
	$body .= __( 'Budżet: ', 'bartlomiej-ert' ) . $budget . "\n\n";
	$body .= __( 'Wiadomość:', 'bartlomiej-ert' ) . "\n" . $message . "\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		sprintf( 'Reply-To: %s <%s>', $name, $email ),
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	$status = $sent ? 'sent' : 'error';
	wp_safe_redirect( add_query_arg( 'be_contact', $status, $redirect ) . '#kontakt-form' );
	exit;
}
add_action( 'admin_post_nopriv_be_contact', 'be_handle_contact_form' );
add_action( 'admin_post_be_contact', 'be_handle_contact_form' );

/**
 * Zwraca aktualny status wysyłki formularza (z parametru GET).
 *
 * @return string '', 'sent' lub 'error'.
 */
function be_contact_status() {
	if ( isset( $_GET['be_contact'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$status = sanitize_text_field( wp_unslash( $_GET['be_contact'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( in_array( $status, array( 'sent', 'error' ), true ) ) {
			return $status;
		}
	}
	return '';
}
