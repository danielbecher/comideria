<?php
/**
 * Arquivo de categoria — usado tanto pelas categorias-pai ("Review",
 * "Receitas") quanto pelas subcategorias históricas de cozinha e cidade
 * (ex: /category/review/sushi-review/, /category/review/porto-alegre-review/).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();

$term = get_queried_object();
?>
<section class="section wrap">
	<?php comideria_breadcrumbs(); ?>

	<div class="section-heading section-heading--stacked">
		<h1><?php echo esc_html( $term->name ); ?></h1>
		<?php if ( ! empty( $term->description ) ) : ?>
			<p class="card-excerpt"><?php echo wp_kses_post( wpautop( $term->description ) ); ?></p>
		<?php endif; ?>
	</div>

	<?php comideria_category_chips( $term ); ?>

	<?php comideria_blog_loop(); ?>
</section>
<?php
get_footer();
