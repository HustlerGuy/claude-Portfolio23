<?php
/**
 * Domyślny szablon strony (dla stron bez dedykowanego szablonu).
 *
 * @package bartlomiej-ert
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<div class="page-hero">
		<div class="page-hero-grid"></div>
		<div class="page-hero-glow"></div>
		<div class="page-hero-inner">
			<div class="page-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Start', 'bartlomiej-ert' ); ?></a>
				<span class="page-breadcrumb-sep">/</span>
				<span><?php the_title(); ?></span>
			</div>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<section class="section">
		<div class="about-text-block" style="max-width:820px;margin:0 auto;">
			<?php
			the_content();
			wp_link_pages();
			?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
