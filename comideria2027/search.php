<?php
/**
 * Resultados de busca.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="section wrap">
	<div class="section-heading">
		<h1>
			<?php
			printf(
				/* translators: %s: termo buscado. */
				esc_html__( 'Resultados para: %s', 'comideria' ),
				'<span>' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
	</div>

	<?php if ( have_posts() ) : ?>
		<p class="search-results-summary">
			<?php
			printf(
				/* translators: %d: número de resultados encontrados. */
				esc_html( _n( '%d resultado encontrado.', '%d resultados encontrados.', $GLOBALS['wp_query']->found_posts, 'comideria' ) ),
				(int) $GLOBALS['wp_query']->found_posts
			);
			?>
		</p>
	<?php endif; ?>

	<?php comideria_blog_loop(); ?>
</section>
<?php
get_footer();
