<?php
/**
 * EN/PL translations dictionary
 * Wywołanie: be_t('key')
 *
 * Logika języka:
 *  - ?lang=en w URL ustawia cookie 'be_lang' = 'en'
 *  - ?lang=pl resetuje
 *  - domyślnie: pl
 */
defined('ABSPATH') || exit;

function be_lang() {
    static $lang = null;
    if ($lang !== null) return $lang;

    if (isset($_GET['lang'])) {
        $l = sanitize_key($_GET['lang']);
        if (in_array($l, ['en', 'pl'], true)) {
            setcookie('be_lang', $l, time() + 60*60*24*365, COOKIEPATH ?: '/', COOKIE_DOMAIN);
            $_COOKIE['be_lang'] = $l;
            $lang = $l;
            return $lang;
        }
    }
    if (!empty($_COOKIE['be_lang']) && in_array($_COOKIE['be_lang'], ['en', 'pl'], true)) {
        $lang = $_COOKIE['be_lang'];
        return $lang;
    }
    $lang = 'pl';
    return $lang;
}

function be_translations() {
    return [
        // ── NAV ──
        'nav.uslugi'      => ['pl' => 'Usługi',           'en' => 'Services'],
        'nav.proces'      => ['pl' => 'Proces',           'en' => 'Process'],
        'nav.realizacje'  => ['pl' => 'Realizacje',       'en' => 'Case Studies'],
        'nav.o_mnie'      => ['pl' => 'O mnie',           'en' => 'About'],
        'nav.kontakt'     => ['pl' => 'Kontakt',          'en' => 'Contact'],
        'nav.cta'         => ['pl' => 'Darmowa wycena ->', 'en' => 'Free quote ->'],
        'nav.subtitle'    => ['pl' => 'Marketing · Paid Ads', 'en' => 'Marketing · Paid Ads'],
        'nav.menu'        => ['pl' => 'Menu',             'en' => 'Menu'],
        'nav.close'       => ['pl' => 'Zamknij',          'en' => 'Close'],
        'nav.lang_label'  => ['pl' => 'Język',            'en' => 'Language'],

        // ── HERO ──
        'hero.badge'      => ['pl' => 'Dostępny do nowych projektów', 'en' => 'Available for new projects'],
        'hero.title1'     => ['pl' => 'Marketing który',  'en' => 'Marketing that'],
        'hero.title2'     => ['pl' => 'generuje wyniki.', 'en' => 'gets results.'],
        'hero.sub'        => [
            'pl' => 'Reklamy w <strong>Meta i Google Search</strong>, GEO, strategia marketingowa i kompleksowe wsparcie. Pomagam firmom z usługami lokalnymi rosnąć - bez przepalania budżetu.',
            'en' => 'Ads on <strong>Meta and Google Search</strong>, GEO, marketing strategy and full-service support. I help local service businesses grow - without burning budget.'
        ],
        'hero.cta1'       => ['pl' => 'Darmowa wycena',   'en' => 'Free quote'],
        'hero.cta2'       => ['pl' => 'Zobacz realizacje', 'en' => 'See case studies'],
        'hero.scroll'     => ['pl' => 'Scroll',           'en' => 'Scroll'],
        'hero.exp'        => ['pl' => 'Lat doświadczenia', 'en' => 'Years of experience'],
        'hero.projects'   => ['pl' => 'Projektów zrealizowanych', 'en' => 'Projects delivered'],
        'hero.roas'       => ['pl' => 'Średni ROAS kampanii',     'en' => 'Average campaign ROAS'],
        'hero.cpa'        => ['pl' => 'Średnia redukcja CPA',     'en' => 'Average CPA reduction'],

        // ── SECTIONS ──
        'sec.services'    => ['pl' => 'Usługi',            'en' => 'Services'],
        'sec.results'     => ['pl' => 'Realizacje',        'en' => 'Case Studies'],
        'sec.contact'     => ['pl' => 'Kontakt',           'en' => 'Contact'],

        // ── FOOTER ──
        'footer.tagline'  => ['pl' => 'Strategic Marketing', 'en' => 'Strategic Marketing'],
        'footer.role'     => ['pl' => 'Freelancer · PL · Remote', 'en' => 'Freelancer · PL · Remote'],
        'footer.follow'   => ['pl' => 'Znajdź mnie',       'en' => 'Follow me'],
    ];
}

function be_t($key, $fallback = '') {
    $lang = be_lang();
    $dict = be_translations();
    if (!empty($dict[$key][$lang])) return $dict[$key][$lang];
    if (!empty($dict[$key]['pl'])) return $dict[$key]['pl'];
    return $fallback ?: $key;
}

/**
 * Helper: URL z dodanym ?lang=...
 */
function be_lang_url($lang) {
    $current = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current = remove_query_arg('lang', $current);
    return add_query_arg('lang', $lang, $current);
}
