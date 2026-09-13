<?php
/**
 * Homepage editorial: destaque, últimas experiências, explorar e receitas.
 *
 * Todas as seções são construídas a partir da taxonomia real do site
 * (categorias "Review", "Receitas" e "Destaque"), sem nada hardcoded — se o
 * conteúdo mudar, a home acompanha automaticamente.
 *
 * front-page.php é usado pelo WordPress tanto com "Página inicial estática"
 * quanto com "Seus posts mais recentes" (que é a configuração atual do
 * site). Como is_front_page() continua verdadeiro nas páginas seguintes da
 * paginação (/page/2/, /page/3/...), a partir da página 2 este template
 * volta a ser um arquivo cronológico simples — as URLs de paginação que já
 * existem continuam funcionando exatamente como hoje.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( is_paged() ) :
	?>
	<section class="section wrap">
		<?php comideria_blog_loop(); ?>
	</section>
	<?php
	get_footer();
	return;
endif;

$review_term   = get_category_by_slug( 'review' );
$receitas_term = get_category_by_slug( 'receitas' );
$destaque_term = get_category_by_slug( 'destaque' );

// 1) Destaque principal: post mais recente da categoria "Destaque",
// com fallback para o post mais recente do site inteiro.
$highlight_query = null;
if ( $destaque_term ) {
	$highlight_query = new WP_Query(
		array(
			'cat'                 => $destaque_term->term_id,
			'posts_per_page'      => 1,
			'ignore_sticky_posts' => true,
		)
	);
}
if ( ! $highlight_query || ! $highlight_query->have_posts() ) {
	$highlight_query = new WP_Query(
		array(
			'posts_per_page'      => 1,
			'ignore_sticky_posts' => true,
		)
	);
}

$highlight_id = 0;
if ( $highlight_query->have_posts() ) {
	$highlight_query->the_post();
	$highlight_id = get_the_ID();
	?>
	<section class="section hero-feature-wrap wrap">
		<article class="hero-feature">
			<a class="card-media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php
				comideria_the_post_media(
					'comideria-hero',
					array(
						'loading'       => 'eager',
						'fetchpriority' => 'high',
					)
				);
				?>
			</a>
			<div class="hero-copy">
				<?php comideria_the_kicker(); ?>
				<h1><a class="hero-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
				<a class="btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Ler a experiência completa', 'comideria' ); ?></a>
			</div>
		</article>
	</section>
	<?php
	wp_reset_postdata();
}

// 2) Últimas experiências: posts recentes da árvore "Review", excluindo o destaque.
if ( $review_term ) :
	$latest_query = new WP_Query(
		array(
			'cat'                 => $review_term->term_id,
			'posts_per_page'      => 10,
			'post__not_in'        => array( $highlight_id ),
			'ignore_sticky_posts' => true,
		)
	);
	if ( $latest_query->have_posts() ) :
		?>
		<section class="section wrap">
			<div class="section-heading">
				<h2><?php esc_html_e( 'Últimas experiências', 'comideria' ); ?></h2>
				<a class="see-all" href="<?php echo esc_url( get_category_link( $review_term ) ); ?>"><?php esc_html_e( 'Ver todas', 'comideria' ); ?></a>
			</div>
			<div class="post-grid">
				<?php
				while ( $latest_query->have_posts() ) :
					$latest_query->the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
endif;

// 3) Explorar: principais subcategorias de "Review" (cozinhas e cidades),
// ordenadas pela quantidade real de posts.
if ( $review_term ) :
	$explore_cats = get_categories(
		array(
			'parent'     => $review_term->term_id,
			'hide_empty' => true,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'number'     => 10,
		)
	);
	if ( ! empty( $explore_cats ) ) :
		?>
		<section class="section wrap">
			<div class="section-heading">
				<h2><?php esc_html_e( 'Explorar', 'comideria' ); ?></h2>
			</div>
			<nav class="category-chips" aria-label="<?php esc_attr_e( 'Explorar categorias', 'comideria' ); ?>">
				<?php foreach ( $explore_cats as $cat ) : ?>
					<a href="<?php echo esc_url( get_category_link( $cat ) ); ?>">
						<?php echo esc_html( $cat->name ); ?> <span class="chip-count"><?php echo (int) $cat->count; ?></span>
					</a>
				<?php endforeach; ?>
			</nav>
		</section>
		<?php
	endif;
endif;

// 4) Receitas: bloco menor, só aparece se a categoria existir e tiver posts.
if ( $receitas_term && $receitas_term->count > 0 ) :
	$recipes_query = new WP_Query(
		array(
			'cat'                 => $receitas_term->term_id,
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
		)
	);
	if ( $recipes_query->have_posts() ) :
		?>
		<section class="section wrap">
			<div class="section-heading">
				<h2><?php esc_html_e( 'Receitas', 'comideria' ); ?></h2>
				<a class="see-all" href="<?php echo esc_url( get_category_link( $receitas_term ) ); ?>"><?php esc_html_e( 'Ver todas', 'comideria' ); ?></a>
			</div>
			<div class="post-grid">
				<?php
				while ( $recipes_query->have_posts() ) :
					$recipes_query->the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
endif;

get_footer();
