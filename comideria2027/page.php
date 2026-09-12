<?php
/**
 * Páginas estáticas (Sobre, Contato, Na Mídia).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
		<?php comideria_breadcrumbs(); ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-media">
				<?php the_post_thumbnail( 'comideria-hero', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="entry-content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<nav class="page-links">' . esc_html__( 'Páginas:', 'comideria' ),
					'after'  => '</nav>',
				)
			);
			?>
		</div>
	</article>
	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile;

get_footer();
