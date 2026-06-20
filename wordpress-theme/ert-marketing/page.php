<?php
/**
 * Ogólny szablon strony (fallback dla stron bez dedykowanego szablonu).
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
			<span><?php the_title(); ?></span>
		</div>
		<h1 class="page-title"><?php the_title(); ?></h1>
	</div>
</div>

<section class="section">
	<div class="about-text-block" style="max-width:760px;">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();
