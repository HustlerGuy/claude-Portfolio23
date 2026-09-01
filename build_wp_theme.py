#!/usr/bin/env python3
# Konwerter: statyczna strona HTML -> motyw WordPress (katalog bartlomiej-ert/).
# Uruchamiac w katalogu glownym repozytorium. Biblioteka standardowa + opcjonalnie Pillow (screenshot).
import os, re, shutil

PAGES = ['uslugi', 'proces', 'realizacje', 'o-mnie', 'kontakt']
SITE_OLD = 'https://hustlerguy.github.io/claude-Portfolio23/'
FONTS = 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap'
THEME = 'bartlomiej-ert'

def php_home(p=''):
    return "<?php echo esc_url( home_url( '" + p + "' ) ); ?>"

def php_tdir(p=''):
    return "<?php echo esc_url( get_template_directory_uri() . '/" + p + "' ); ?>"

def conv_links(t, prefix):
    t = re.sub(r'\s*aria-current="page"', '', t)
    for slug in PAGES:
        for pat in ['href="%s%s/"' % (prefix, slug), 'href="/claude-Portfolio23/%s/"' % slug]:
            t = t.replace(pat, 'href="%s"' % php_home('/%s/' % slug))
        t = t.replace(SITE_OLD + slug + '/', php_home('/%s/' % slug))
    t = t.replace('href="%s"' % prefix, 'href="%s"' % php_home('/'))
    t = t.replace('href="./"', 'href="%s"' % php_home('/'))
    t = t.replace('href="/claude-Portfolio23/"', 'href="%s"' % php_home('/'))
    t = t.replace(SITE_OLD, php_home('/'))
    t = t.replace('href="%sfavicon.svg"' % prefix, 'href="%s"' % php_tdir('favicon.svg'))
    t = t.replace('href="/claude-Portfolio23/favicon.svg"', 'href="%s"' % php_tdir('favicon.svg'))
    t = t.replace('src="../img/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/')
    t = t.replace('src="./img/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/')
    t = t.replace('src="img/', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/')
    t = re.sub(r'<link rel="stylesheet" href="[^"]*style\.css">\s*', '', t)
    t = re.sub(r'<script src="[^"]*app\.js"></script>\s*', '', t)
    return t

def split_page(html):
    head = re.search(r'<head>(.*?)</head>', html, re.S).group(1)
    inline = re.search(r'<style>.*?</style>', head, re.S)
    mm = re.search(r'<div class="mobile-menu" id="mobileMenu">.*?</div>', html, re.S)
    hdr_end = mm.end() if mm else html.index('</header>') + len('</header>')
    ftr = html.index('<footer class="footer">')
    return head, (inline.group(0) if inline else ''), html[html.index('<!DOCTYPE'):hdr_end], html[hdr_end:ftr].strip(), html[ftr:]

def clean_extra_head(head):
    t = head
    for pat in [r'<title>.*?</title>\s*', r'<meta name="description"[^>]*>\s*', r'<link rel="canonical"[^>]*>\s*',
                r'<meta property="og:[^"]*"[^>]*>\s*', r'<link rel="icon"[^>]*>\s*', r'<link rel="stylesheet"[^>]*>\s*',
                r'<link href="https://fonts\.googleapis\.com/css2[^>]*>\s*', r'<link rel="preconnect"[^>]*>\s*',
                r'<style>.*?</style>\s*', r'<meta charset[^>]*>\s*', r'<meta name="viewport"[^>]*>\s*']:
        t = re.sub(pat, '', t, flags=re.S)
    return t.strip()

def extract_meta(head):
    def grab(p):
        m = re.search(p, head, re.S)
        return m.group(1).strip() if m else ''
    return grab(r'<title>(.*?)</title>'), grab(r'<meta name="description" content="(.*?)"')

PHP_HEAD = '''<?php
$be_meta = wp_parse_args( isset( $be_meta ) ? $be_meta : array(), array(
    'title'       => get_bloginfo( 'name' ),
    'description' => '',
    'path'        => '/',
) );
$be_canonical = home_url( $be_meta['path'] );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_html( $be_meta['title'] ); ?></title>
<meta name="description" content="<?php echo esc_attr( $be_meta['description'] ); ?>">
<link rel="canonical" href="<?php echo esc_url( $be_canonical ); ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:title" content="<?php echo esc_attr( $be_meta['title'] ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $be_meta['description'] ); ?>">
<meta property="og:url" content="<?php echo esc_url( $be_canonical ); ?>">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.svg' ); ?>" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
__EXTRA__
<?php wp_head(); ?>
<?php if ( ! empty( $be_inline_css ) ) { echo $be_inline_css . "\\n"; } ?>
</head>
<body <?php body_class(); ?>>
'''

def make_header(html, prefix):
    _, _, header, _, _ = split_page(html)
    header = re.sub(r'<!DOCTYPE.*?</head>', '', header, flags=re.S)
    header = re.sub(r'<body[^>]*>', '', header)
    header = conv_links(header, prefix)
    nav = re.search(r'<nav aria-label="Nawigacja główna">(.*?)</nav>', header, re.S)
    if nav:
        header = header.replace(nav.group(0), '<nav aria-label="Nawigacja główna">\n<?php wp_nav_menu( array( \'theme_location\' => \'primary\', \'container\' => false, \'menu_class\' => \'nav-links\', \'fallback_cb\' => \'be_nav_fallback\', \'depth\' => 1 ) ); ?>\n</nav>')
    extra = conv_links(clean_extra_head(re.search(r'<head>(.*?)</head>', html, re.S).group(1)), prefix)
    return PHP_HEAD.replace('__EXTRA__', extra) + header.strip() + "\n"

def make_footer(html, prefix):
    *_, footer = split_page(html)
    return conv_links(footer, prefix).replace('</body>', "<?php wp_footer(); ?>\n</body>").strip() + "\n"

def make_template(html, prefix, slug, name=None):
    head, inline, _, content, _ = split_page(html)
    title, desc = extract_meta(head)
    out = ['<?php']
    if name:
        out.append('/* Template Name: %s */' % name)
    out.append('$be_meta = array(')
    out.append("    'title'       => '%s'," % title.replace("'", "\\'"))
    out.append("    'description' => '%s'," % desc.replace("'", "\\'"))
    out.append("    'path'        => '%s'," % ('/' if slug == 'front' else '/%s/' % slug))
    out.append(');')
    if inline:
        out.append("$be_inline_css = <<<'BE_CSS'")
        out.append(inline)
        out.append('BE_CSS;')
    out.append('get_header();')
    out.append('?>')
    out.append(conv_links(content, prefix))
    out.append('<?php get_footer();')
    return '\n'.join(out) + '\n'

def make_404(t):
    for m in list(re.finditer(r'<script[^>]*>.*?</script>\s*', t, re.S)):
        if 'location.pathname' in m.group(0):
            t = t.replace(m.group(0), '')
    t = re.sub(r'<link[^>]*id="cssLink"[^>]*>', '<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>">', t)
    t = t.replace('href="/claude-Portfolio23/favicon.svg"', 'href="%s"' % php_tdir('favicon.svg'))
    t = t.replace('<html lang="pl">', '<html <?php language_attributes(); ?>>')
    t = t.replace('<meta charset="UTF-8">', '<meta charset="<?php bloginfo( \'charset\' ); ?>">')
    for lid, slug in [('lHome','/'), ('lUslugi','/uslugi/'), ('lProces','/proces/'), ('lReal','/realizacje/'), ('lAbout','/o-mnie/'), ('lKontakt','/kontakt/')]:
        t = re.sub(r'(<a[^>]*id="%s"[^>]*href=")[^"]*(")' % lid, r'\1%s\2' % php_home(slug), t)
    t = t.replace('</body>', "<?php wp_footer(); ?>\n</body>")
    return '<?php status_header( 404 ); ?>\n' + t

def make_screenshot(path):
    try:
        from PIL import Image, ImageDraw, ImageFont
        img = Image.new('RGB', (1200, 900), (4, 7, 15))
        d = ImageDraw.Draw(img)
        d.rectangle([0, 840, 1200, 900], fill=(77, 159, 255))
        fp = '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf'
        try:
            f1, f2, f3 = ImageFont.truetype(fp, 300), ImageFont.truetype(fp, 64), ImageFont.truetype(fp, 40)
        except Exception:
            f1 = f2 = f3 = ImageFont.load_default()
        d.text((80, 180), 'BE', font=f1, fill=(56, 224, 240))
        d.text((80, 520), 'Bartlomiej Ert', font=f2, fill=(220, 233, 251))
        d.text((80, 620), 'Marketing Strategiczny - motyw WordPress', font=f3, fill=(100, 125, 160))
        img.save(path)
    except Exception as e:
        print('screenshot pominiety:', e)

STYLE_HEADER = '''/*
Theme Name: Bartłomiej Ert — Portfolio
Theme URI: https://github.com/HustlerGuy/claude-Portfolio23
Author: Bartłomiej Ert
Author URI: https://github.com/HustlerGuy
Description: Motyw portfolio dla specjalisty ds. marketingu (Google Ads / Meta Ads). Podstrony: Usługi, Proces, Realizacje, O mnie, Kontakt. Skonwertowany ze statycznego HTML.
Version: 1.0.1
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bartlomiej-ert
*/

'''

FUNCTIONS_PHP = '''<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'after_setup_theme', function () {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    register_nav_menus( array( 'primary' => 'Menu główne' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'be-fonts', '__FONTS__', array(), null );
    wp_enqueue_style( 'bartlomiej-ert', get_stylesheet_uri(), array( 'be-fonts' ), $ver );
    wp_enqueue_script( 'be-app', get_template_directory_uri() . '/app.js', array(), $ver, true );
} );

function be_nav_fallback() {
    $items = array( 'uslugi' => 'Usługi', 'proces' => 'Proces', 'realizacje' => 'Realizacje', 'o-mnie' => 'O mnie' );
    echo '<ul class="nav-links">';
    foreach ( $items as $slug => $label ) {
        printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $slug . '/' ) ), esc_html( $label ) );
    }
    echo '</ul>';
}
'''.replace('__FONTS__', FONTS)

INDEX_PHP = '''<?php
get_header();
?>
<main id="main">
<section class="section"><div class="wrap">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
</article>
<?php endwhile; endif; ?>
</div></section>
</main>
<?php get_footer();
'''

README_TXT = '''=== Bartłomiej Ert — Portfolio (motyw WordPress) ===

INSTALACJA
1. Kokpit -> Wygląd -> Motywy -> Dodaj nowy -> Wyślij motyw -> wybierz ZIP -> Zainstaluj -> Włącz.
   UWAGA: pobierz plik bartlomiej-ert.zip z release\'u, NIE "Source code"!

KONFIGURACJA STRON
2. Utwórz strony ze slugami i szablonami (treść wpisu może być pusta — renderuje ją szablon):
   - uslugi -> szablon "Usługi"
   - proces -> szablon "Proces"
   - realizacje -> szablon "Realizacje"
   - o-mnie -> szablon "O mnie"
   - kontakt -> szablon "Kontakt"
3. Ustawienia -> Bezpośrednie odnośniki -> "Nazwa wpisu" -> Zapisz.
4. Strona główna (front-page.php) działa automatycznie.

MENU
Wygląd -> Menu -> utwórz menu i przypisz do "Menu główne".
Bez menu wyświetli się domyślna, gotowa lista linków.

FORMULARZ KONTAKTOWY
Działa przez mailto: (jak w oryginale). Dla wysyłki serwerowej: Contact Form 7 / WPForms
i podmiana formularza w template-kontakt.php.

OBRAZKI (Realizacje)
Wgraj zrzuty paneli reklamowych do katalogu img/ motywu:
gads-marzec-2026.png, gads-czerwiec-2026.png, gads-przeglad.png
(nazwy zgodne z src w template-realizacje.php).

UWAGI
- Tytuły, meta-opisy, canonical i OG są wpisane w szablony (zgodnie z oryginałem SEO).
- Motyw nie wymaga obrazków poza opcjonalnymi zrzutami w img/.
- To motyw-wizytówka: aktywacja zmienia wygląd CAŁEJ witryny. Nie instaluj go na
  istniejącej stronie firmowej — postaw osobną instalację WordPress (np. subdomena).
'''

IMG_README = '''Wgraj tutaj zrzuty ekranu z paneli reklamowych (PNG/JPG):
gads-marzec-2026.png, gads-czerwiec-2026.png, gads-przeglad.png
Nazwy zgodne z atrybutami src w pliku template-realizacje.php.
'''

def build(root='.'):
    shutil.rmtree(THEME, ignore_errors=True)
    os.makedirs(THEME)
    os.makedirs(os.path.join(THEME, 'img'))
    def rd(p):
        with open(os.path.join(root, p), encoding='utf-8') as f:
            return f.read()
    root_html = rd('index.html')
    files = {
        'style.css': STYLE_HEADER + rd('style.css'),
        'functions.php': FUNCTIONS_PHP,
        'index.php': INDEX_PHP,
        'page.php': INDEX_PHP,
        'header.php': make_header(root_html, ''),
        'footer.php': make_footer(root_html, ''),
        'front-page.php': make_template(root_html, '', 'front'),
        '404.php': make_404(rd('404.html')),
        'app.js': rd('app.js'),
        'favicon.svg': rd('favicon.svg'),
        'readme.txt': README_TXT,
        'img/README.md': IMG_README,
    }
    for slug, label in {'uslugi': 'Usługi', 'proces': 'Proces', 'realizacje': 'Realizacje', 'o-mnie': 'O mnie', 'kontakt': 'Kontakt'}.items():
        files['template-%s.php' % slug] = make_template(rd('%s/index.html' % slug), '../', slug, label)
    for rel, content in files.items():
        with open(os.path.join(THEME, rel), 'w', encoding='utf-8') as f:
            f.write(content)
    make_screenshot(os.path.join(THEME, 'screenshot.png'))
    print('OK — wygenerowano motyw:', THEME)

if __name__ == '__main__':
    build()
