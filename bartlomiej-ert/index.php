<?php
/**
 * Główny szablon zapasowy (fallback).
 * Używany dla wpisów, archiwów i stron bez dedykowanego szablonu.
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php echo esc_html( wp_get_document_title() ); ?></span>
		</div>
		<h1 class="page-title">
			<?php
			if ( is_home() || is_front_page() ) {
				bloginfo( 'name' );
			} elseif ( is_archive() ) {
				the_archive_title();
			} elseif ( is_search() ) {
				printf( esc_html__( 'Wyniki: %s', 'bartlomiej-ert' ), '<span class="acc">' . esc_html( get_search_query() ) . '</span>' );
			} else {
				esc_html_e( 'Blog', 'bartlomiej-ert' );
			}
			?>
		</h1>
	</div>
</div>

<section class="section">
	<?php if ( have_posts() ) : ?>
		<div class="svc-grid-2">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'svc-card' ); ?>>
					<h2 class="svc-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h2>
					<div class="svc-desc"><?php the_excerpt(); ?></div>
					<a href="<?php the_permalink(); ?>" class="btn-ghost"><?php esc_html_e( 'Czytaj dalej →', 'bartlomiej-ert' ); ?></a>
				</article>
				<?php
			endwhile;
			?>
		</div>
		<div class="reveal" style="margin-top:40px;">
			<?php the_posts_pagination(); ?>
		</div>
	<?php else : ?>
		<p class="s-sub"><?php esc_html_e( 'Brak treści do wyświetlenia.', 'bartlomiej-ert' ); ?></p>
	<?php endif; ?>
</section>

<?php
get_footer();
