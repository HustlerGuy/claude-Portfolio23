<?php
/**
 * Główny szablon awaryjny (wymagany przez WordPress).
 *
 * @package ert-marketing
 */

get_header();
?>

<div class="page-hero">
	<div class="page-hero-grid"></div>
	<div class="page-hero-glow"></div>
	<div class="page-hero-inner">
		<div class="page-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Start</a>
			<span class="page-breadcrumb-sep">/</span>
			<span><?php echo esc_html( wp_get_document_title() ); ?></span>
		</div>
		<h1 class="page-title">
			<?php
			if ( is_search() ) {
				printf( 'Wyniki: <span class="acc">%s</span>', esc_html( get_search_query() ) );
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				echo 'Blog';
			}
			?>
		</h1>
	</div>
</div>

<section class="section">
	<?php if ( have_posts() ) : ?>
		<div class="svc-grid-2" style="gap:24px;">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article class="svc-card">
					<h3 class="svc-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h3>
					<p class="svc-desc"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn-ghost">Czytaj dalej →</a>
				</article>
				<?php
			endwhile;
			?>
		</div>
		<div style="margin-top:48px;"><?php the_posts_pagination(); ?></div>
	<?php else : ?>
		<p class="s-sub">Brak treści do wyświetlenia.</p>
	<?php endif; ?>
</section>

<?php
get_footer();
