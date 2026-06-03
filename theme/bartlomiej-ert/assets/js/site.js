/* BARTŁOMIEJ ERT — site.js — vanilla, no deps */
(() => {
  'use strict';
  const isCoarse = matchMedia('(pointer:coarse)').matches;
  const reduce   = matchMedia('(prefers-reduced-motion:reduce)').matches;
  const $  = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* 1. LOADER */
  const loader = $('#loader');
  if (loader) {
    const finish = () => setTimeout(() => loader.classList.add('done'), 600);
    document.readyState === 'complete' ? finish() : addEventListener('load', finish);
  }

  /* 2. CURSOR */
  if (!isCoarse) {
    const dot  = document.createElement('div'); dot.className = 'cursor-dot';
    const ring = document.createElement('div'); ring.className = 'cursor-ring';
    document.body.append(dot, ring);
    let mx = innerWidth/2, my = innerHeight/2, dx = mx, dy = my, rx = mx, ry = my;
    addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
    addEventListener('mousedown', () => document.body.classList.add('c-down'));
    addEventListener('mouseup',   () => document.body.classList.remove('c-down'));
    (function tick(){
      dx += (mx-dx)*.55; dy += (my-dy)*.55;
      rx += (mx-rx)*.18; ry += (my-ry)*.18;
      dot.style.transform  = `translate(${dx}px,${dy}px) translate(-50%,-50%)`;
      ring.style.transform = `translate(${rx}px,${ry}px) translate(-50%,-50%)`;
      requestAnimationFrame(tick);
    })();
    const hov = 'a,button,.svc-card,.case,.ci-card,.faq-q,.stat,.offer,.form-input,.form-select,.form-textarea';
    document.addEventListener('mouseover', e => { if (e.target.closest(hov)) document.body.classList.add('c-hover'); });
    document.addEventListener('mouseout',  e => { if (e.target.closest(hov)) document.body.classList.remove('c-hover'); });
    $$('.btn,[data-magnetic]').forEach(el => {
      const s = parseFloat(el.dataset.magnetic) || 16;
      el.addEventListener('mousemove', e => {
        const r = el.getBoundingClientRect();
        el.style.transform = `translate(${(e.clientX-r.left-r.width/2)/r.width*s}px,${(e.clientY-r.top-r.height/2)/r.height*s}px)`;
      });
      el.addEventListener('mouseleave', () => { el.style.transform = ''; });
    });
  }

  /* 3. NAV */
  const nav = $('#mainNav');
  if (nav) {
    let lastY = scrollY;
    addEventListener('scroll', () => {
      const y = scrollY;
      nav.classList.toggle('scrolled', y > 30);
      nav.classList.toggle('hide', y > 200 && y > lastY);
      lastY = y;
    }, { passive: true });

    const toggle = $('#navToggle');
    const menu   = $('#mobileMenu');
    if (toggle && menu) {
      const closeMenu = () => {
        menu.classList.remove('open');
        toggle.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('menu-open');
      };
      const openMenu = () => {
        menu.classList.add('open');
        toggle.classList.add('open');
        toggle.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-hidden', 'false');
        document.body.classList.add('menu-open');
      };
      toggle.addEventListener('click', () => {
        menu.classList.contains('open') ? closeMenu() : openMenu();
      });
      // Close on internal link click
      menu.addEventListener('click', e => {
        const a = e.target.closest('a');
        if (a && !a.target) {
          // Krótka pauza dla animacji wyjścia
          setTimeout(closeMenu, 50);
        }
      });
      // ESC closes menu
      document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && menu.classList.contains('open')) closeMenu();
      });
    }
  }

  /* 4. REVEAL */
  const io = new IntersectionObserver(entries => {
    entries.forEach(en => { if (en.isIntersecting) { en.target.classList.add('visible'); io.unobserve(en.target); } });
  }, { threshold: .1, rootMargin: '0px 0px -50px 0px' });
  $$('[data-reveal]').forEach(el => io.observe(el));

  /* 5. SKILL BARS */
  const sio = new IntersectionObserver(entries => {
    entries.forEach(en => { if (en.isIntersecting) { en.target.style.width = (en.target.dataset.w||80)+'%'; sio.unobserve(en.target); } });
  }, { threshold: .3 });
  $$('.skill-fill').forEach(s => sio.observe(s));

  /* 6. COUNTER */
  const cio = new IntersectionObserver(entries => {
    entries.forEach(en => {
      if (!en.isIntersecting) return;
      const el = en.target, target = parseFloat(el.dataset.count), suffix = el.dataset.suffix||'', dec = parseInt(el.dataset.decimals)||0;
      const start = performance.now();
      const ease  = t => 1 - Math.pow(1-t, 3);
      const step  = now => {
        const t = Math.min((now-start)/1600, 1);
        el.textContent = (target*ease(t)).toFixed(dec) + suffix;
        if (t < 1) requestAnimationFrame(step); else el.textContent = target.toFixed(dec) + suffix;
      };
      requestAnimationFrame(step);
      cio.unobserve(el);
    });
  }, { threshold: .4 });
  $$('[data-count]').forEach(c => cio.observe(c));

  /* 7. CARD GLOW */
  $$('.svc-card,.offer,.case').forEach(card => {
    card.addEventListener('mousemove', e => {
      const r = card.getBoundingClientRect();
      card.style.setProperty('--mx', ((e.clientX-r.left)/r.width*100)+'%');
      card.style.setProperty('--my', ((e.clientY-r.top)/r.height*100)+'%');
    });
  });

  /* 8. FAQ */
  $$('.faq-q').forEach(q => {
    q.addEventListener('click', () => {
      const item = q.closest('.faq-item'), was = item.classList.contains('open');
      $$('.faq-item').forEach(i => i.classList.remove('open'));
      if (!was) item.classList.add('open');
    });
  });

  /* 9. CONTACT FORM */
  const form = $('#contactForm');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const wrap = $('#formWrap'), succ = $('#formSuccess');
      if (wrap) wrap.style.display = 'none';
      if (succ) succ.classList.add('show');
    });
  }

  /* 10. PARTICLES */
  if (!reduce) {
    const canvas = $('.bg-canvas');
    if (canvas) {
      const ctx = canvas.getContext('2d', { alpha: true });
      let W, H, particles = [];
      const COUNT = Math.min(55, Math.floor(innerWidth/30));
      const resize = () => {
        const dpr = Math.min(devicePixelRatio||1, 2);
        W = canvas.width  = innerWidth  * dpr; H = canvas.height = innerHeight * dpr;
        canvas.style.width = innerWidth+'px'; canvas.style.height = innerHeight+'px';
        ctx.scale(dpr, dpr);
      };
      const init = () => { particles = Array.from({length:COUNT}, () => ({
        x:Math.random()*innerWidth, y:Math.random()*innerHeight,
        r:Math.random()*1.4+.3, vx:(Math.random()-.5)*.25, vy:(Math.random()-.5)*.25,
        a:Math.random()*.6+.2, hue:Math.random()<.82?207:285
      })); };
      let mouseX=-9999, mouseY=-9999;
      addEventListener('mousemove', e => { mouseX=e.clientX; mouseY=e.clientY; });
      const draw = () => {
        ctx.clearRect(0,0,innerWidth,innerHeight);
        for (const p of particles) {
          p.x+=p.vx; p.y+=p.vy;
          if(p.x<0) p.x=innerWidth; else if(p.x>innerWidth) p.x=0;
          if(p.y<0) p.y=innerHeight; else if(p.y>innerHeight) p.y=0;
          const dx=p.x-mouseX, dy=p.y-mouseY, d2=dx*dx+dy*dy;
          if(d2<14400){const f=(14400-d2)/14400*.04; p.x+=dx*f; p.y+=dy*f;}
          ctx.beginPath(); ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
          ctx.fillStyle=`hsla(${p.hue},100%,70%,${p.a})`;
          ctx.shadowBlur=8; ctx.shadowColor=`hsla(${p.hue},100%,70%,.6)`;
          ctx.fill();
        }
        ctx.shadowBlur=0;
        for(let i=0;i<particles.length;i++) for(let j=i+1;j<particles.length;j++){
          const a=particles[i],b=particles[j],dx=a.x-b.x,dy=a.y-b.y,d2=dx*dx+dy*dy;
          if(d2<16000){ctx.strokeStyle=`hsla(207,100%,70%,${(1-d2/16000)*.12})`;ctx.lineWidth=.5;ctx.beginPath();ctx.moveTo(a.x,a.y);ctx.lineTo(b.x,b.y);ctx.stroke();}
        }
        requestAnimationFrame(draw);
      };
      resize(); init();
      addEventListener('resize', ()=>{resize();init();});
      requestAnimationFrame(draw);
    }
  }

  /* 11. PAGE FADE */
  document.documentElement.style.cssText += ';opacity:0;transition:opacity .5s ease';
  addEventListener('load', () => requestAnimationFrame(() => { document.documentElement.style.opacity='1'; }));

  /* 12. PAGE TRANSITION */
  document.addEventListener('click', e => {
    const a = e.target.closest('a');
    if (!a) return;
    const href = a.getAttribute('href');
    if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
    if (a.target==='_blank' || e.metaKey || e.ctrlKey) return;
    // Skip lang toggles & menu links (handled separately)
    if (a.closest('.lang-toggle, .mm-lang, .footer-lang, #mobileMenu')) return;
    try {
      const url = new URL(a.href, location.href);
      if (url.origin !== location.origin) return;
      e.preventDefault();
      document.documentElement.style.opacity = '0';
      setTimeout(() => { location.href = a.href; }, 360);
    } catch {}
  });

})();
