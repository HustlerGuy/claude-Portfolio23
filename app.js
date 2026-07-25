/* ═══════════════════════════════════════════════════════════════
   BARTŁOMIEJ ERT — shared interactions
   Custom cursor · scroll progress · reveal · counters · tilt ·
   nav behaviour · mobile menu · FAQ · magnetic buttons
═══════════════════════════════════════════════════════════════ */
(() => {
  'use strict';
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const fine   = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* ── Ambient background injection ── */
  if (!$('.fx-bg')) {
    const bg = document.createElement('div');
    bg.className = 'fx-bg';
    bg.innerHTML =
      '<div class="fx-aurora a1"></div><div class="fx-aurora a2"></div>' +
      '<div class="fx-aurora a3"></div><div class="fx-grid"></div><div class="fx-noise"></div>';
    document.body.prepend(bg);
  }

  /* ── Scroll progress bar ── */
  const bar = document.createElement('div');
  bar.className = 'scroll-progress';
  document.body.appendChild(bar);
  const onScrollProgress = () => {
    const h = document.documentElement;
    const p = h.scrollTop / (h.scrollHeight - h.clientHeight || 1);
    bar.style.width = (p * 100).toFixed(2) + '%';
  };

  /* ── Custom cursor ── */
  if (fine && !reduce) {
    const dot = document.createElement('div');  dot.className = 'cursor-dot';
    const ring = document.createElement('div'); ring.className = 'cursor-ring';
    document.body.append(dot, ring);
    let mx = innerWidth / 2, my = innerHeight / 2, rx = mx, ry = my;
    addEventListener('mousemove', e => {
      mx = e.clientX; my = e.clientY;
      dot.style.transform = `translate(${mx}px,${my}px) translate(-50%,-50%)`;
    });
    const loop = () => {
      rx += (mx - rx) * 0.18; ry += (my - ry) * 0.18;
      ring.style.transform = `translate(${rx}px,${ry}px) translate(-50%,-50%)`;
      requestAnimationFrame(loop);
    };
    loop();
    const hoverSel = 'a, button, .card, .faq-q, input, textarea, select, [data-tilt]';
    document.addEventListener('mouseover', e => { if (e.target.closest(hoverSel)) ring.classList.add('hover'); });
    document.addEventListener('mouseout',  e => { if (e.target.closest(hoverSel)) ring.classList.remove('hover'); });
  }

  /* ── Reveal on scroll ── */
  const revObs = new IntersectionObserver((entries) => {
    entries.forEach(en => {
      if (en.isIntersecting) {
        en.target.classList.add('in');
        // fire counters/skill bars contained within
        en.target.querySelectorAll?.('[data-count]').forEach(runCounter);
        en.target.querySelectorAll?.('[data-bar]').forEach(el => el.style.width = el.dataset.bar + '%');
        revObs.unobserve(en.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
  $$('.reveal').forEach(el => revObs.observe(el));

  /* ── Animated counters ── */
  function runCounter(el) {
    if (el.dataset.done) return; el.dataset.done = '1';
    const target = parseFloat(el.dataset.count);
    if (isNaN(target)) return;
    const dec = (el.dataset.count.split('.')[1] || '').length;
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    const dur = 1500; const t0 = performance.now();
    const ease = t => 1 - Math.pow(1 - t, 3);
    const step = (t) => {
      const p = Math.min((t - t0) / dur, 1);
      const v = (target * ease(p)).toFixed(dec);
      el.textContent = prefix + Number(v).toLocaleString('pl-PL') + suffix;
      if (p < 1) requestAnimationFrame(step);
    };
    if (reduce) { el.textContent = prefix + target.toLocaleString('pl-PL') + suffix; }
    else requestAnimationFrame(step);
  }
  // standalone counters (not inside .reveal)
  const cObs = new IntersectionObserver((e) => e.forEach(x => { if (x.isIntersecting) { runCounter(x.target); cObs.unobserve(x.target); } }), { threshold: 0.5 });
  $$('[data-count]').forEach(el => { if (!el.closest('.reveal')) cObs.observe(el); });

  /* ── Card pointer glow (border spotlight) ── */
  if (fine) {
    $$('.card').forEach(card => {
      card.addEventListener('pointermove', e => {
        const r = card.getBoundingClientRect();
        card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
        card.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100) + '%');
      });
    });
  }

  /* ── 3D tilt ── */
  if (fine && !reduce) {
    $$('[data-tilt]').forEach(el => {
      const max = parseFloat(el.dataset.tilt) || 8;
      el.style.transformStyle = 'preserve-3d';
      el.addEventListener('pointermove', e => {
        const r = el.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        el.style.transform = `perspective(900px) rotateY(${px * max}deg) rotateX(${-py * max}deg) translateZ(0)`;
      });
      el.addEventListener('pointerleave', () => { el.style.transform = ''; });
    });
  }

  /* ── Magnetic buttons ── */
  if (fine && !reduce) {
    $$('[data-magnetic]').forEach(el => {
      el.addEventListener('pointermove', e => {
        const r = el.getBoundingClientRect();
        el.style.transform = `translate(${(e.clientX - r.left - r.width/2) * 0.25}px, ${(e.clientY - r.top - r.height/2) * 0.35}px)`;
      });
      el.addEventListener('pointerleave', () => { el.style.transform = ''; });
    });
  }

  /* ── Nav: hide on scroll down, glass on scroll ── */
  const nav = $('.nav');
  let lastY = 0;
  const onScrollNav = () => {
    const y = scrollY;
    if (nav) {
      nav.classList.toggle('scrolled', y > 20);
      if (y > lastY && y > 400 && !$('.mobile-menu.open')) nav.classList.add('hidden');
      else nav.classList.remove('hidden');
    }
    lastY = y;
  };

  addEventListener('scroll', () => { onScrollProgress(); onScrollNav(); }, { passive: true });
  onScrollProgress();

  /* ── Mobile menu ── */
  const burger = $('.nav-burger'), menu = $('.mobile-menu');
  if (burger && menu) {
    const toggle = (open) => {
      burger.classList.toggle('open', open);
      menu.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.setAttribute('aria-label', open ? 'Zamknij menu' : 'Otwórz menu');
      document.body.style.overflow = open ? 'hidden' : '';
    };
    burger.addEventListener('click', () => toggle(!menu.classList.contains('open')));
    menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => toggle(false)));
    // Close on Escape
    addEventListener('keydown', e => { if (e.key === 'Escape' && menu.classList.contains('open')) { toggle(false); burger.focus(); } });
  }

  /* ── FAQ accordion (mouse + keyboard) ── */
  const toggleFaq = (q) => {
    const item = q.closest('.faq-item');
    const open = item.classList.contains('open');
    $$('.faq-item').forEach(i => { i.classList.remove('open'); i.querySelector('.faq-q')?.setAttribute('aria-expanded', 'false'); });
    if (!open) { item.classList.add('open'); q.setAttribute('aria-expanded', 'true'); }
  };
  $$('.faq-q').forEach(q => {
    q.setAttribute('aria-expanded', 'false');
    if (!q.hasAttribute('tabindex')) q.setAttribute('tabindex', '0');
    if (!q.hasAttribute('role')) q.setAttribute('role', 'button');
    q.addEventListener('click', () => toggleFaq(q));
    q.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleFaq(q); }
    });
  });

  /* ── Hero grid parallax glow following cursor ── */
  const spot = $('[data-spotlight]');
  if (spot && fine && !reduce) {
    spot.addEventListener('pointermove', e => {
      const r = spot.getBoundingClientRect();
      spot.style.setProperty('--sx', ((e.clientX - r.left) / r.width * 100) + '%');
      spot.style.setProperty('--sy', ((e.clientY - r.top) / r.height * 100) + '%');
    });
  }

  /* ── Contact form ──
     Static hosting has no backend, so the form composes a pre-filled e-mail
     and hands it to the user's mail client. The success screen always shows a
     copy-paste fallback plus direct e-mail/phone, so a request is never lost. */
  const RECIPIENT = 'scaleert@gmail.com';
  const form = $('#contactForm');
  if (form) {
    const val = (n) => (form.elements[n]?.value || '').trim();

    // Inline validation feedback
    const markField = (el, ok) => el.closest('.field, .check')?.classList.toggle('invalid', !ok);
    form.querySelectorAll('input, select, textarea').forEach(el => {
      el.addEventListener('blur', () => { if (el.required) markField(el, el.checkValidity()); });
      el.addEventListener('input', () => { if (el.closest('.field, .check')?.classList.contains('invalid')) markField(el, el.checkValidity()); });
    });

    const buildMessage = () => {
      const lines = [
        'Nowe zapytanie ze strony',
        '',
        'Imię i nazwisko: ' + val('name'),
        'Firma: ' + (val('company') || '—'),
        'E-mail: ' + val('email'),
        'Telefon: ' + (val('phone') || '—'),
        'Usługa: ' + val('service'),
        'Budżet reklamowy: ' + (val('budget') || 'nie określono'),
        '',
        'Opis sytuacji:',
        val('message')
      ];
      return lines.join('\n');
    };

    const buildMailto = () => {
      const subject = 'Zapytanie ze strony — ' + (val('company') || val('name') || 'nowy kontakt');
      return 'mailto:' + RECIPIENT +
             '?subject=' + encodeURIComponent(subject) +
             '&body=' + encodeURIComponent(buildMessage());
    };

    form.addEventListener('submit', e => {
      e.preventDefault();

      // Validate every required field, show all errors at once
      let firstInvalid = null;
      form.querySelectorAll('[required]').forEach(el => {
        const ok = el.checkValidity();
        markField(el, ok);
        if (!ok && !firstInvalid) firstInvalid = el;
      });
      if (firstInvalid) {
        firstInvalid.focus();
        firstInvalid.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
        return;
      }

      const href = buildMailto();
      const fallback = $('#mailFallback');
      if (fallback) fallback.value = buildMessage();
      const retry = $('#mailRetry');
      if (retry) retry.href = href;

      $('#formWrap').style.display = 'none';
      const ok = $('#formSuccess');
      ok.style.display = 'block';
      ok.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });

      // Hand off to the mail client
      window.location.href = href;
    });
  }

  /* ── Year stamp ── */
  $$('[data-year]').forEach(el => el.textContent = new Date().getFullYear());
})();
