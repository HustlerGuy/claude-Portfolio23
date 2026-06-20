/* Bartłomiej Ert — Marketing Strategiczny — theme.js
   Reveal on scroll, paski umiejętności, FAQ, formularz kontaktowy. */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {

		/* ── Reveal on scroll ── */
		var revealEls = document.querySelectorAll( '.reveal' );
		if ( revealEls.length ) {
			if ( 'IntersectionObserver' in window ) {
				var obs = new IntersectionObserver( function ( entries ) {
					entries.forEach( function ( x ) {
						if ( x.isIntersecting ) {
							x.target.classList.add( 'visible' );
							obs.unobserve( x.target );
						}
					} );
				}, { threshold: 0.06 } );
				revealEls.forEach( function ( el ) { obs.observe( el ); } );
			} else {
				revealEls.forEach( function ( el ) { el.classList.add( 'visible' ); } );
			}
		}

		/* ── Skill bars (O mnie) ── */
		var skillSections = document.querySelectorAll( '.skills-section' );
		if ( skillSections.length && 'IntersectionObserver' in window ) {
			var barObs = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.querySelectorAll( '.skill-fill' ).forEach( function ( bar ) {
							bar.style.width = bar.dataset.w + '%';
						} );
						barObs.unobserve( entry.target );
					}
				} );
			}, { threshold: 0.3 } );
			skillSections.forEach( function ( el ) { barObs.observe( el ); } );
		}

		/* ── FAQ accordion (Proces) ── */
		var faqQuestions = document.querySelectorAll( '.faq-q' );
		faqQuestions.forEach( function ( q ) {
			q.addEventListener( 'click', function () {
				var item = q.closest( '.faq-item' );
				var wasOpen = item.classList.contains( 'open' );
				document.querySelectorAll( '.faq-item' ).forEach( function ( i ) {
					i.classList.remove( 'open' );
				} );
				if ( ! wasOpen ) {
					item.classList.add( 'open' );
				}
			} );
		} );

		/* ── Contact form (Kontakt) ── */
		var contactForm = document.getElementById( 'contactForm' );
		if ( contactForm ) {
			contactForm.addEventListener( 'submit', function ( e ) {
				e.preventDefault();
				var wrap = document.getElementById( 'formWrap' );
				var success = document.getElementById( 'formSuccess' );
				if ( wrap ) { wrap.style.display = 'none'; }
				if ( success ) { success.style.display = 'block'; }
			} );
		}

	} );
} )();
