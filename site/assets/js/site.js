/* ═══════════════════════════════════════════════════════════════
   BARTŁOMIEJ ERT — IMPOSSIBLY BEAUTIFUL EDITION
   site.js · vanilla, no dependencies
═══════════════════════════════════════════════════════════════ */

(() => {
  'use strict';

  const isCoarse = matchMedia('(pointer: coarse)').matches;
  const reduce   = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* ─────────────────────────────────────────
     1. LOADER
  ───────────────────────────────────────── */
  const loader = $('.loader');
  if (loader) {
    const finish = () => {
      setTimeout(() => loader.classList.add('done'), 650);
    };
    if (document.readyState === 'complete') finish();
    else window.addEventListener('load', finish);
  }

  /* ─────────────────────────────────────────
     2. CUSTOM CURSOR (with magnetic + hover state)
  ───────────────────────────────────────── */
  if (!isCoarse) {
    const dot  = document.createElement('div'); dot.className = 'cursor-dot';
    const ring = document.createElement('div'); ring.className = 'cursor-ring';
    document.body.append(dot, ring);

    let mx = innerWidth / 2, my = innerHeight / 2;
    let dx = mx, dy = my, rx = mx, ry = my;

    addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
    addEventListener('mousedown', () => document.body.classList.add('c-down'));
    addEventListener('mouseup',   () => document.body.classList.remove('c-down'));

    (function tick(){
      dx += (mx - dx) * .55;
      dy += (my - dy) * .55;
      rx += (mx - rx) * .18;
      ry += (my - ry) * .18;
      dot.style.transform  = `translate(${dx}px, ${dy}px) translate(-50%,-50%)`;
      ring.style.transform = `translate(${rx}px, ${ry}px) translate(-50%,-50%)`;
      requestAnimationFrame(tick);
    })();

    const hoverables = 'a, button, .svc-card, .case, .ci-card, .faq-q, .stat, [data-magnetic], .form-input, .form-select, .form-textarea, .form-check, .nav-toggle';
    document.addEventListener('mouseover', e => {
      if (e.target.closest(hoverables)) document.body.classList.add('c-hover');
    });
    document.addEventListener('mouseout', e => {
      if (e.target.closest(hoverables)) document.body.classList.remove('c-hover');
    });

    /* Magnetic effect */
    const magnetic = $$('.btn, [data-magnetic]');
    magnetic.forEach(el => {
      const strength = parseFloat(el.dataset.magnetic) || 18;
      el.addEventListener('mousemove', e => {
        const r = el.getBoundingClientRect();
        const cx = r.left + r.width / 2;
        const cy = r.top  + r.height / 2;
        const dx = (e.clientX - cx) / r.width  * strength;
        const dy = (e.clientY - cy) / r.height * strength;
        el.style.transform = `translate(${dx}px, ${dy}px)`;
      });
      el.addEventListener('mouseleave', () => { el.style.transform = ''; });
    });
  }

  /* ─────────────────────────────────────────
     3. NAV scroll behaviour + mobile toggle
  ───────────────────────────────────────── */
  const nav = $('.nav');
  if (nav) {
    let lastY = scrollY;
    const onScroll = () => {
      const y = scrollY;
      nav.classList.toggle('scrolled', y > 30);
      if (y > 200 && y > lastY) nav.classList.add('hide');
      else nav.classList.remove('hide');
      lastY = y;
    };
    addEventListener('scroll', onScroll, { passive: true });

    const toggle = $('.nav-toggle');
    const links  = $('.nav-links');
    if (toggle && links) {
      toggle.addEventListener('click', () => {
        toggle.classList.toggle('open');
        links.classList.toggle('open');
        document.body.style.overflow = links.classList.contains('open') ? 'hidden' : '';
      });
      links.addEventListener('click', e => {
        if (e.target.closest('a')) {
          toggle.classList.remove('open');
          links.classList.remove('open');
          document.body.style.overflow = '';
        }
      });
    }
  }

  /* ─────────────────────────────────────────
     4. REVEAL on intersection
  ───────────────────────────────────────── */
  const revealEls = $$('[data-reveal], .split');
  if (revealEls.length) {
    const io = new IntersectionObserver(entries => {
      entries.forEach(en => {
        if (en.isIntersecting) {
          en.target.classList.add('visible');
          io.unobserve(en.target);
        }
      });
    }, { threshold: .1, rootMargin: '0px 0px -50px 0px' });
    revealEls.forEach(el => io.observe(el));
  }

  /* ─────────────────────────────────────────
     5. SPLIT TEXT
  ───────────────────────────────────────── */
  $$('[data-split]').forEach(el => {
    const text = el.textContent.trim();
    el.innerHTML = '';
    el.classList.add('split');
    text.split(/\s+/).forEach(w => {
      const word = document.createElement('span');
      word.className = 'word';
      const inner = document.createElement('span');
      inner.className = 'inner';
      inner.textContent = w;
      word.append(inner);
      el.append(word);
    });
  });

  /* ─────────────────────────────────────────
     6. COUNTER animation
  ───────────────────────────────────────── */
  const counters = $$('[data-count]');
  if (counters.length) {
    const cio = new IntersectionObserver(entries => {
      entries.forEach(en => {
        if (en.isIntersecting) {
          const el = en.target;
          const target = parseFloat(el.dataset.count);
          const suffix = el.dataset.suffix || '';
          const decimals = (el.dataset.decimals && parseInt(el.dataset.decimals)) || 0;
          const duration = 1600;
          const start = performance.now();
          const ease = t => 1 - Math.pow(1 - t, 3);
          const step = now => {
            const t = Math.min((now - start) / duration, 1);
            const v = target * ease(t);
            el.textContent = v.toFixed(decimals) + suffix;
            if (t < 1) requestAnimationFrame(step);
            else el.textContent = target.toFixed(decimals) + suffix;
          };
          requestAnimationFrame(step);
          cio.unobserve(el);
        }
      });
    }, { threshold: .4 });
    counters.forEach(c => cio.observe(c));
  }

  /* ─────────────────────────────────────────
     7. SKILL bars
  ───────────────────────────────────────── */
  const skills = $$('.skill-fill');
  if (skills.length) {
    const sio = new IntersectionObserver(entries => {
      entries.forEach(en => {
        if (en.isIntersecting) {
          const w = en.target.dataset.w || 80;
          requestAnimationFrame(() => { en.target.style.width = w + '%'; });
          sio.unobserve(en.target);
        }
      });
    }, { threshold: .3 });
    skills.forEach(s => sio.observe(s));
  }

  /* ─────────────────────────────────────────
     8. SVC card mouse glow
  ───────────────────────────────────────── */
  $$('.svc-card, .offer, .case').forEach(card => {
    card.addEventListener('mousemove', e => {
      const r = card.getBoundingClientRect();
      card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
      card.style.setProperty('--my', ((e.clientY - r.top)  / r.height * 100) + '%');
    });
  });

  /* ─────────────────────────────────────────
     9. FAQ
  ───────────────────────────────────────── */
  $$('.faq-q').forEach(q => {
    q.addEventListener('click', () => {
      const item = q.closest('.faq-item');
      const wasOpen = item.classList.contains('open');
      $$('.faq-item').forEach(i => i.classList.remove('open'));
      if (!wasOpen) item.classList.add('open');
    });
  });

  /* ─────────────────────────────────────────
     10. CONTACT form
  ───────────────────────────────────────── */
  const form = $('#contactForm');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      $('#formWrap')?.style.setProperty('display', 'none');
      $('#formSuccess')?.classList.add('show');
    });
  }

  /* ─────────────────────────────────────────
     11. PARTICLES canvas (background)
  ───────────────────────────────────────── */
  if (!reduce) {
    const canvas = $('.bg-canvas');
    if (canvas) {
      const ctx = canvas.getContext('2d', { alpha: true });
      let W, H, dpr, particles = [];
      const COUNT = Math.min(60, Math.floor(innerWidth / 28));

      const resize = () => {
        dpr = Math.min(devicePixelRatio || 1, 2);
        W = canvas.width  = innerWidth  * dpr;
        H = canvas.height = innerHeight * dpr;
        canvas.style.width  = innerWidth  + 'px';
        canvas.style.height = innerHeight + 'px';
        ctx.scale(dpr, dpr);
      };
      const init = () => {
        particles = [];
        for (let i = 0; i < COUNT; i++) {
          particles.push({
            x: Math.random() * innerWidth,
            y: Math.random() * innerHeight,
            r: Math.random() * 1.4 + .3,
            vx: (Math.random() - .5) * .25,
            vy: (Math.random() - .5) * .25,
            a: Math.random() * .6 + .2,
            hue: Math.random() < .82 ? 207 : 285  // mostly cyan, some magenta
          });
        }
      };

      let mouseX = -9999, mouseY = -9999;
      addEventListener('mousemove', e => { mouseX = e.clientX; mouseY = e.clientY; });

      const draw = () => {
        ctx.clearRect(0, 0, innerWidth, innerHeight);
        for (const p of particles) {
          p.x += p.vx; p.y += p.vy;
          if (p.x < 0) p.x = innerWidth;  else if (p.x > innerWidth)  p.x = 0;
          if (p.y < 0) p.y = innerHeight; else if (p.y > innerHeight) p.y = 0;

          // mouse repel
          const dx = p.x - mouseX, dy = p.y - mouseY;
          const d2 = dx*dx + dy*dy;
          if (d2 < 14400) {
            const f = (14400 - d2) / 14400 * .04;
            p.x += dx * f; p.y += dy * f;
          }

          ctx.beginPath();
          ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
          ctx.fillStyle = `hsla(${p.hue}, 100%, 70%, ${p.a})`;
          ctx.shadowBlur = 8;
          ctx.shadowColor = `hsla(${p.hue}, 100%, 70%, .6)`;
          ctx.fill();
        }
        // connect close particles
        ctx.shadowBlur = 0;
        for (let i = 0; i < particles.length; i++) {
          for (let j = i + 1; j < particles.length; j++) {
            const a = particles[i], b = particles[j];
            const dx = a.x - b.x, dy = a.y - b.y;
            const d2 = dx*dx + dy*dy;
            if (d2 < 16000) {
              ctx.strokeStyle = `hsla(207, 100%, 70%, ${(1 - d2/16000) * .12})`;
              ctx.lineWidth = .5;
              ctx.beginPath();
              ctx.moveTo(a.x, a.y);
              ctx.lineTo(b.x, b.y);
              ctx.stroke();
            }
          }
        }
        requestAnimationFrame(draw);
      };

      resize(); init();
      addEventListener('resize', () => { resize(); init(); });
      requestAnimationFrame(draw);
    }
  }

  /* ─────────────────────────────────────────
     12. PARALLAX on hero (subtle)
  ───────────────────────────────────────── */
  const parallaxEls = $$('[data-parallax]');
  if (parallaxEls.length && !reduce) {
    addEventListener('scroll', () => {
      const y = scrollY;
      parallaxEls.forEach(el => {
        const speed = parseFloat(el.dataset.parallax) || .15;
        el.style.transform = `translate3d(0, ${y * speed}px, 0)`;
      });
    }, { passive: true });
  }

  /* ─────────────────────────────────────────
     13. PAGE FADE-IN on load
  ───────────────────────────────────────── */
  document.documentElement.style.opacity = '0';
  document.documentElement.style.transition = 'opacity .6s ease';
  addEventListener('load', () => {
    requestAnimationFrame(() => { document.documentElement.style.opacity = '1'; });
  });

  /* ─────────────────────────────────────────
     14. PAGE TRANSITION on internal link click
  ───────────────────────────────────────── */
  document.addEventListener('click', e => {
    const a = e.target.closest('a');
    if (!a) return;
    const href = a.getAttribute('href');
    if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
    if (a.target === '_blank' || e.metaKey || e.ctrlKey) return;
    // only same-origin internal hrefs
    try {
      const url = new URL(a.href, location.href);
      if (url.origin !== location.origin) return;
      e.preventDefault();
      document.documentElement.style.opacity = '0';
      setTimeout(() => { location.href = a.href; }, 380);
    } catch {}
  });

})();
