<footer class="footer">
  <div class="footer-mark" aria-hidden="true">Bartłomiej Ert</div>

  <div class="footer-grid">

    <!-- Column 1: Brand -->
    <div class="footer-col">
      <div class="footer-brand">
        <div class="nav-logo-mark"><span>BE</span></div>
        <div>
          <div style="font-size:1rem;font-weight:600">Bartłomiej Ert</div>
          <div class="nav-logo-sub"><?php echo esc_html(be_t('footer.tagline')); ?></div>
        </div>
      </div>
      <p class="footer-desc">
        <?php if (be_lang() === 'en'): ?>
          Strategic marketing, paid ads and GEO for local service businesses.
        <?php else: ?>
          Marketing strategiczny, paid ads i GEO dla firm z usługami lokalnymi.
        <?php endif; ?>
      </p>
      <div class="footer-socials">
        <a href="https://www.instagram.com/baertlomiej/" target="_blank" rel="noopener noreferrer" class="footer-social" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </a>
        <a href="https://www.facebook.com/profile.php?id=61589728433435" target="_blank" rel="noopener noreferrer" class="footer-social" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
      </div>
    </div>

    <!-- Column 2: Sitemap -->
    <div class="footer-col">
      <div class="footer-col-title"><?php echo esc_html(be_t('sec.services')); ?></div>
      <ul class="footer-list">
        <li><a href="<?php echo esc_url(home_url('/uslugi/')); ?>"><?php echo esc_html(be_t('nav.uslugi')); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/proces/')); ?>"><?php echo esc_html(be_t('nav.proces')); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/realizacje/')); ?>"><?php echo esc_html(be_t('nav.realizacje')); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/o-mnie/')); ?>"><?php echo esc_html(be_t('nav.o_mnie')); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/kontakt/')); ?>"><?php echo esc_html(be_t('nav.kontakt')); ?></a></li>
      </ul>
    </div>

    <!-- Column 3: Contact -->
    <div class="footer-col">
      <div class="footer-col-title"><?php echo esc_html(be_t('sec.contact')); ?></div>
      <ul class="footer-list footer-list-contact">
        <li><a href="mailto:bartlomiej@scalert.pl">bartlomiej@scalert.pl</a></li>
        <li><a href="tel:+48600555867">+48 600 555 867</a></li>
        <li class="footer-urgent">
          <span class="footer-urgent-lbl"><?php echo (be_lang() === 'en') ? 'Urgent matters' : 'Pilne sprawy'; ?></span>
          <a href="mailto:bartlomiejert@wp.pl">bartlomiejert@wp.pl</a>
        </li>
      </ul>
    </div>

    <!-- Column 4: Lang -->
    <div class="footer-col">
      <div class="footer-col-title"><?php echo esc_html(be_t('nav.lang_label')); ?></div>
      <div class="footer-lang">
        <a href="<?php echo esc_url(be_lang_url('pl')); ?>" class="lang-btn<?php echo (be_lang() === 'pl' ? ' active' : ''); ?>">Polski</a>
        <a href="<?php echo esc_url(be_lang_url('en')); ?>" class="lang-btn<?php echo (be_lang() === 'en' ? ' active' : ''); ?>">English</a>
      </div>
    </div>

  </div>

  <div class="footer-row">
    <span>© <?php echo date('Y'); ?> Bartłomiej Ert <span class="dot">//</span> <?php echo esc_html(be_t('footer.tagline')); ?></span>
    <span><?php echo esc_html(be_t('footer.role')); ?></span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
