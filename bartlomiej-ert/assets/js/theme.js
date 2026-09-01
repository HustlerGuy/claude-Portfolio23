/**
 * Bartłomiej Ert — skrypt motywu.
 * Obsługa: nawigacja mobilna, animacje reveal, FAQ, paski umiejętności.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {

		/* ── Nawigacja mobilna (hamburger) ── */
		var toggle = document.querySelector( '.nav-toggle' );
		if ( toggle ) {
			toggle.addEventListener( 'click', function () {
				var open = document.body.classList.toggle( 'nav-open' );
				toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
			} );

			// Zamknij menu po kliknięciu w link.
			document.querySelectorAll( '.nav-links a' ).forEach( function ( link ) {
				link.addEventListener( 'click', function () {
					document.body.classList.remove( 'nav-open' );
					toggle.setAttribute( 'aria-expanded', 'false' );
				} );
			} );
		}

		/* ── Animacje reveal ── */
		var revealEls = document.querySelectorAll( '.reveal' );
		if ( revealEls.length && 'IntersectionObserver' in window ) {
			var obs = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( x ) {
					if ( x.isIntersecting ) {
						x.target.classList.add( 'visible' );
						obs.unobserve( x.target );
					}
				} );
			}, { threshold: 0.06 } );
			revealEls.forEach( function ( el ) {
				obs.observe( el );
			} );
		} else {
			revealEls.forEach( function ( el ) {
				el.classList.add( 'visible' );
			} );
		}

		/* ── FAQ (akordeon) ── */
		document.querySelectorAll( '.faq-q' ).forEach( function ( q ) {
			q.addEventListener( 'click', function () {
				var item     = q.closest( '.faq-item' );
				var wasOpen  = item.classList.contains( 'open' );
				document.querySelectorAll( '.faq-item' ).forEach( function ( i ) {
					i.classList.remove( 'open' );
				} );
				if ( ! wasOpen ) {
					item.classList.add( 'open' );
				}
			} );
		} );

		/* ── Paski umiejętności ── */
		var skillSections = document.querySelectorAll( '.skills-section' );
		if ( skillSections.length && 'IntersectionObserver' in window ) {
			var barObs = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.querySelectorAll( '.skill-fill' ).forEach( function ( bar ) {
							bar.style.width = ( bar.dataset.w || 0 ) + '%';
						} );
						barObs.unobserve( entry.target );
					}
				} );
			}, { threshold: 0.3 } );
			skillSections.forEach( function ( el ) {
				barObs.observe( el );
			} );
		}

		/* ── Przewinięcie do komunikatu formularza po wysyłce ── */
		if ( window.location.hash === '#kontakt-form' ) {
			var formCard = document.getElementById( 'kontakt-form' );
			if ( formCard ) {
				setTimeout( function () {
					formCard.scrollIntoView( { behavior: 'smooth', block: 'center' } );
				}, 200 );
			}
		}
	} );
} )();
