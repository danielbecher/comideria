<?php
/**
 * Post único — reviews de restaurante e receitas usam a mesma estrutura,
 * já que nenhum dos dois tem um post type próprio: o que muda é a categoria.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$primary_cat = comideria_get_primary_category();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
		<?php comideria_breadcrumbs(); ?>

		<header class="entry-header">
			<?php comideria_the_kicker(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta">
				<?php comideria_posted_on(); ?>
				<span><?php echo esc_html( comideria_reading_time() ); ?></span>
			</div>
		</header>

		<div class="featured-media">
			<?php
			comideria_the_post_media(
				'comideria-hero',
				array(
					'loading'       => 'eager',
					'fetchpriority' => 'high',
				)
			);
			?>
		</div>

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

		<?php
		/**
		 * Ponto de extensão: se no futuro o post tiver campos estruturados de
		 * receita (tempo de preparo, porções, ingredientes — hoje o conteúdo
		 * histórico é só texto corrido, sem esses campos), um plugin ou
		 * child theme pode preencher esta lista via filtro para exibi-los
		 * aqui, sem exigir nenhuma mudança de template.
		 */
		$recipe_meta = apply_filters( 'comideria_recipe_meta_items', array(), get_the_ID() );
		if ( ! empty( $recipe_meta ) ) :
			?>
			<ul class="entry-meta" aria-label="<?php esc_attr_e( 'Informações da receita', 'comideria' ); ?>">
				<?php foreach ( $recipe_meta as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php
		$tags = get_the_tags();
		if ( $tags ) :
			?>
			<nav class="entry-tags" aria-label="<?php esc_attr_e( 'Tags', 'comideria' ); ?>">
				<?php foreach ( $tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php
		$author_bio = get_the_author_meta( 'description' );
		if ( $author_bio ) :
			?>
			<div class="author-box">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', '', array( 'loading' => 'lazy' ) ); ?>
				<div>
					<p><strong><?php the_author(); ?></strong></p>
					<p><?php echo esc_html( $author_bio ); ?></p>
				</div>
			</div>
		<?php endif; ?>
	</article>

	<?php if ( $primary_cat ) : ?>
		<?php
		$related = new WP_Query(
			array(
				'cat'                 => $primary_cat->term_id,
				'post__not_in'        => array( get_the_ID() ),
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => true,
				'orderby'             => 'date',
				'order'               => 'DESC',
			)
		);
		if ( $related->have_posts() ) :
			?>
			<section class="related-posts" aria-labelledby="related-heading">
				<div class="section-heading">
					<h2 id="related-heading"><?php esc_html_e( 'Continue explorando', 'comideria' ); ?></h2>
				</div>
				<div class="post-grid">
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						get_template_part( 'template-parts/content', 'card' );
					endwhile;
					?>
				</div>
			</section>
			<?php
			wp_reset_postdata();
		endif;
		?>
	<?php endif; ?>

	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile;

get_footer();
