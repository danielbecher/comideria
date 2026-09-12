<?php
/**
 * Arquivo genérico: tags, autor, data — tudo que não tem um template mais
 * específico (category.php cobre as categorias, que são o grosso do conteúdo).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="section wrap">
	<?php comideria_breadcrumbs(); ?>

	<div class="section-heading">
		<h1><?php the_archive_title(); ?></h1>
	</div>

	<?php
	$archive_desc = get_the_archive_description();
	if ( $archive_desc ) :
		?>
		<div class="card-excerpt"><?php echo wp_kses_post( $archive_desc ); ?></div>
	<?php endif; ?>

	<?php comideria_blog_loop(); ?>
</section>
<?php
get_footer();
