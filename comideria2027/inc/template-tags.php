<?php
/**
 * Funções auxiliares usadas pelos templates.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

/**
 * Ícone de busca em SVG inline (evita fonte de ícones externa).
 */
function comideria_search_icon() {
	return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
}

/**
 * Retorna a categoria "principal" de um post: a mais específica (mais funda
 * na árvore de categorias) entre as atribuídas a ele. Isso é o que permite ao
 * tema mostrar "Japonesa" em vez de apenas "Review" num card, por exemplo,
 * sem exigir nenhum campo extra nos posts antigos.
 *
 * @return WP_Term|null
 */
function comideria_get_primary_category( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$cats    = get_the_category( $post_id );

	if ( empty( $cats ) ) {
		return null;
	}

	usort(
		$cats,
		function ( $a, $b ) {
			return $b->parent <=> $a->parent;
		}
	);

	// Entre as categorias com filhos (mais específicas), prefere quem tem parent > 0.
	foreach ( $cats as $cat ) {
		if ( $cat->parent > 0 ) {
			return $cat;
		}
	}

	return $cats[0];
}

/**
 * Link da categoria principal, para usar como "kicker" (rótulo) em cards e
 * na página de post único.
 */
function comideria_the_kicker( $post_id = null ) {
	$cat = comideria_get_primary_category( $post_id );

	if ( ! $cat ) {
		return;
	}

	printf(
		'<a class="%1$s" href="%2$s">%3$s</a>',
		is_singular() ? 'entry-kicker' : 'card-kicker',
		esc_url( get_category_link( $cat ) ),
		esc_html( $cat->name )
	);
}

/**
 * Data + autor, formatados de forma acessível (com <time datetime>).
 */
function comideria_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" hidden>%4$s</time>';
	}

	$time_html = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	printf(
		'<span class="posted-on">%1$s</span><span class="byline"> %2$s <a class="author" href="%3$s">%4$s</a></span>',
		$time_html, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html_x( 'por', 'post author', 'comideria' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Tempo estimado de leitura, calculado a partir do conteúdo (sem depender de
 * nenhum campo extra — funciona igualmente em posts antigos e novos).
 */
function comideria_reading_time( $post_id = null ) {
	$post_id     = $post_id ? $post_id : get_the_ID();
	$content     = get_post_field( 'post_content', $post_id );
	$word_count  = str_word_count( wp_strip_all_tags( $content ) );
	$minutes     = max( 1, (int) ceil( $word_count / 200 ) );

	return sprintf(
		/* translators: %d: número de minutos de leitura. */
		_n( '%d min de leitura', '%d min de leitura', $minutes, 'comideria' ),
		$minutes
	);
}

/**
 * Breadcrumb visível (Início > Categoria > [Subcategoria] > Post).
 *
 * Usa microdados (schema.org via itemscope/itemprop) apenas quando nenhum
 * plugin de SEO está ativo, para não duplicar o BreadcrumbList que Rank Math
 * / Yoast já emitem em JSON-LD no site.
 */
function comideria_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$has_seo_plugin = function_exists( 'comideria_has_seo_plugin' ) && comideria_has_seo_plugin();
	$trail          = array(
		array(
			'url'  => home_url( '/' ),
			'name' => __( 'Início', 'comideria' ),
		),
	);

	if ( is_singular( 'post' ) ) {
		$cat = comideria_get_primary_category();
		if ( $cat ) {
			$ancestors = array_reverse( get_ancestors( $cat->term_id, 'category' ) );
			foreach ( $ancestors as $ancestor_id ) {
				$ancestor = get_term( $ancestor_id, 'category' );
				if ( $ancestor && ! is_wp_error( $ancestor ) ) {
					$trail[] = array(
						'url'  => get_category_link( $ancestor ),
						'name' => $ancestor->name,
					);
				}
			}
			$trail[] = array(
				'url'  => get_category_link( $cat ),
				'name' => $cat->name,
			);
		}
		$trail[] = array(
			'url'  => get_permalink(),
			'name' => get_the_title(),
		);
	} elseif ( is_category() ) {
		$term      = get_queried_object();
		$ancestors = array_reverse( get_ancestors( $term->term_id, 'category' ) );
		foreach ( $ancestors as $ancestor_id ) {
			$ancestor = get_term( $ancestor_id, 'category' );
			if ( $ancestor && ! is_wp_error( $ancestor ) ) {
				$trail[] = array(
					'url'  => get_category_link( $ancestor ),
					'name' => $ancestor->name,
				);
			}
		}
		$trail[] = array(
			'url'  => get_category_link( $term ),
			'name' => $term->name,
		);
	} elseif ( is_page() ) {
		$trail[] = array(
			'url'  => get_permalink(),
			'name' => get_the_title(),
		);
	} elseif ( is_search() ) {
		$trail[] = array(
			'url'  => '',
			'name' => sprintf( __( 'Busca: %s', 'comideria' ), get_search_query() ),
		);
	} elseif ( is_404() ) {
		$trail[] = array(
			'url'  => '',
			'name' => __( 'Página não encontrada', 'comideria' ),
		);
	} else {
		$trail[] = array(
			'url'  => '',
			'name' => __( 'Arquivo', 'comideria' ),
		);
	}

	echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Trilha', 'comideria' ) . '">';
	echo '<ol' . ( $has_seo_plugin ? '' : ' itemscope itemtype="https://schema.org/BreadcrumbList"' ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	foreach ( $trail as $i => $crumb ) {
		$is_last  = ( $i === count( $trail ) - 1 );
		$itemprop = $has_seo_plugin ? '' : ' itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"';

		echo '<li' . $itemprop . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( $is_last || empty( $crumb['url'] ) ) {
			echo '<span' . ( $has_seo_plugin ? '' : ' itemprop="name"' ) . '>' . esc_html( $crumb['name'] ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			echo '<a href="' . esc_url( $crumb['url'] ) . '"' . ( $has_seo_plugin ? '' : ' itemprop="item"' ) . '><span' . ( $has_seo_plugin ? '' : ' itemprop="name"' ) . '>' . esc_html( $crumb['name'] ) . '</span></a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( ! $has_seo_plugin ) {
			echo '<meta itemprop="position" content="' . esc_attr( $i + 1 ) . '" />';
		}

		echo '</li>';
	}

	echo '</ol></nav>';
}

/**
 * Lista as subcategorias diretas de uma categoria, como "chips" de navegação.
 * Usada nas páginas de arquivo de categorias-pai (ex: Review, Receitas,
 * Brasileira) para tornar a hierarquia histórica navegável.
 */
function comideria_category_chips( WP_Term $term ) {
	$children = get_categories(
		array(
			'parent'     => $term->term_id,
			'hide_empty' => true,
			'orderby'    => 'count',
			'order'      => 'DESC',
		)
	);

	if ( empty( $children ) ) {
		return;
	}

	echo '<nav class="category-chips" aria-label="' . esc_attr__( 'Explorar subcategorias', 'comideria' ) . '">';
	foreach ( $children as $child ) {
		printf(
			'<a href="%1$s">%2$s <span class="chip-count">%3$d</span></a>',
			esc_url( get_category_link( $child ) ),
			esc_html( $child->name ),
			(int) $child->count
		);
	}
	echo '</nav>';
}

/**
 * Loop cronológico padrão (grid de cards + paginação), usado por index.php
 * e por front-page.php nas páginas 2+ — a home "editorial" com destaque só
 * existe na página 1; a partir da página 2 o site continua funcionando como
 * o arquivo cronológico que os leitores/mecanismos de busca já conhecem.
 */
function comideria_blog_loop() {
	if ( ! have_posts() ) {
		get_template_part( 'template-parts/content', 'none' );
		return;
	}
	?>
	<div class="post-grid">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'card' );
		}
		?>
	</div>
	<?php
	comideria_pagination();
}

/**
 * Paginação acessível para arquivos (usa a função nativa paginate_links()).
 */
function comideria_pagination() {
	$links = paginate_links(
		array(
			'mid_size'  => 1,
			'prev_text' => __( '← Mais recentes', 'comideria' ),
			'next_text' => __( 'Mais antigas →', 'comideria' ),
			'type'      => 'array',
		)
	);

	if ( empty( $links ) ) {
		return;
	}

	echo '<nav class="pagination" aria-label="' . esc_attr__( 'Paginação', 'comideria' ) . '"><ul style="display:flex;gap:1rem;list-style:none;padding:0;margin:0;">';
	foreach ( $links as $link ) {
		echo '<li>' . wp_kses_post( $link ) . '</li>';
	}
	echo '</ul></nav>';
}
