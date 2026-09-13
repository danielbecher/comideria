<?php
/**
 * Funções auxiliares usadas pelos templates.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

/**
 * Ícone decorativo (prato + talher) usado no placeholder de imagem, em SVG
 * inline — não depende de fonte de ícones nem de arquivo externo.
 */
function comideria_placeholder_icon() {
	return '<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true" focusable="false"><circle cx="34" cy="32" r="15"/><circle cx="34" cy="32" r="8.5"/><line x1="12" y1="16" x2="12" y2="34"/><line x1="9" y1="16" x2="9" y2="26"/><line x1="15" y1="16" x2="15" y2="26"/><line x1="12" y1="26" x2="12" y2="48"/></svg>';
}

/**
 * ID da imagem que representa um post: a imagem destacada quando existir;
 * senão, a primeira foto real encontrada no corpo do post (o WordPress marca
 * imagens inseridas pela Biblioteca de Mídia com a classe "wp-image-{ID}",
 * então não precisamos adivinhar — é a própria imagem que o autor usou).
 * Cai para 0 só quando o post realmente não tem nenhuma imagem própria; quem
 * chama esta função decide o que mostrar nesse caso (ver comideria_card_media()).
 *
 * Este é o único lugar do tema que resolve "qual imagem representa este
 * post" — todo template (card, destaque da home, post único) passa por
 * aqui, então o comportamento é sempre o mesmo em qualquer lugar do site.
 */
function comideria_get_thumbnail_id( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();

	static $cache = array();
	if ( isset( $cache[ $post_id ] ) ) {
		return $cache[ $post_id ];
	}

	$thumb_id = get_post_thumbnail_id( $post_id );

	if ( ! $thumb_id ) {
		$content = get_post_field( 'post_content', $post_id );
		if ( $content && preg_match( '/wp-image-(\d+)/', $content, $matches ) ) {
			$thumb_id = (int) $matches[1];
		}
	}

	$cache[ $post_id ] = (int) $thumb_id;

	return $cache[ $post_id ];
}

/**
 * Imprime a imagem de um post (card, destaque, post único) de forma
 * consistente: imagem destacada → primeira imagem do conteúdo → placeholder
 * decorativo. É o padrão único de "imagem ausente" do tema — nenhum
 * template deve chamar the_post_thumbnail() diretamente.
 *
 * @param string $size     Tamanho de imagem registrado (ex: 'comideria-card').
 * @param array  $img_args Atributos extras para wp_get_attachment_image().
 */
function comideria_the_post_media( $size = 'comideria-card', $img_args = array() ) {
	$post_id  = get_the_ID();
	$thumb_id = comideria_get_thumbnail_id( $post_id );

	$defaults = array(
		'loading'  => 'lazy',
		'decoding' => 'async',
		'alt'      => the_title_attribute( array( 'echo' => false ) ),
	);
	$img_args = wp_parse_args( $img_args, $defaults );

	if ( $thumb_id ) {
		echo wp_get_attachment_image( $thumb_id, $size, false, $img_args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- já escapado pelo core.
		return;
	}

	printf(
		'<span class="media-placeholder" aria-hidden="true">%s</span>',
		comideria_placeholder_icon() // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}

/**
 * Marca do site: sempre a logo real do Comideria empacotada no próprio tema
 * (assets/logo.png — mesmo arquivo de onde a paleta do tema foi extraída),
 * de propósito ignorando qualquer logo configurada em Aparência →
 * Personalizar → Identidade do Site (essa configuração é salva no banco e
 * sobrevive trocas de tema — não queremos herdar uma logo antiga por
 * engano). Pra trocar a logo, o jeito é substituir o arquivo do tema.
 *
 * @param string $class Classe extra no wrapper (ex.: "footer-logo").
 */
function comideria_site_logo( $class = '' ) {
	$logo_uri = get_template_directory_uri() . '/assets/logo.png';
	printf(
		'<a class="site-logo-link %1$s" href="%2$s" rel="home">
			<img class="site-logo" src="%3$s" width="350" height="140" alt="%4$s" loading="eager" decoding="async">
		</a>',
		esc_attr( $class ),
		esc_url( home_url( '/' ) ),
		esc_url( $logo_uri ),
		esc_attr( get_bloginfo( 'name' ) . ' — ' . get_bloginfo( 'description' ) )
	);
}

/**
 * Fallback do menu principal: quando ninguém ainda montou um menu em
 * Aparência → Menus, mostra as categorias de topo reais do site (as mais
 * usadas primeiro) em vez de deixar o cabeçalho vazio. Assim que um menu for
 * atribuído ao local "primary", este fallback deixa de ser usado.
 */
function comideria_nav_menu_fallback( $args ) {
	$categories = get_categories(
		array(
			'parent'     => 0,
			'hide_empty' => true,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'number'     => 6,
			'exclude'    => get_option( 'default_category' ),
		)
	);

	if ( empty( $categories ) ) {
		return;
	}

	$items = '';
	foreach ( $categories as $cat ) {
		$items .= sprintf(
			'<li class="menu-item"><a href="%1$s">%2$s</a></li>',
			esc_url( get_category_link( $cat ) ),
			esc_html( $cat->name )
		);
	}

	// wp_nav_menu() chama o fallback_cb passando os argumentos como array.
	$echo       = ! isset( $args['echo'] ) || $args['echo'];
	$items_wrap = isset( $args['items_wrap'] ) ? $args['items_wrap'] : '<ul id="%1$s" class="%2$s">%3$s</ul>';
	$output     = sprintf( $items_wrap, 'menu-fallback', 'menu', $items );

	if ( $echo ) {
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return;
	}

	return $output;
}

/**
 * Ícone de busca em SVG inline (evita fonte de ícones externa).
 */
function comideria_search_icon() {
	return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
}

/**
 * Ícones de redes sociais em SVG inline, no mesmo traço fino do resto do
 * tema (sem fonte de ícones externa). Devolve string vazia pra uma rede
 * desconhecida, pra nunca quebrar o layout do rodapé.
 */
function comideria_social_icon( $network ) {
	$icons = array(
		'facebook'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M15 8.5h-2a2 2 0 0 0-2 2V13H8.5v3H11v6h3v-6h2.2l.5-3H14v-2c0-.4.3-.7.7-.7H15z"/></svg>',
		'twitter'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 6l12 12M18 6L6 18"/></svg>',
		'instagram' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true" focusable="false"><rect x="4.5" y="4.5" width="15" height="15" rx="4"/><circle cx="12" cy="12" r="3.8"/><circle cx="16.2" cy="7.8" r="0.9" fill="currentColor" stroke="none"/></svg>',
		'youtube'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="6" width="18" height="12" rx="3.5"/><path d="M10.5 9.5l5 2.5-5 2.5z" fill="currentColor" stroke="currentColor" stroke-width="1"/></svg>',
		'tiktok'    => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M14 4v10.2a3.3 3.3 0 1 1-3-3.28"/><path d="M14 4c.4 2.2 2 3.8 4 4.1"/></svg>',
	);

	return isset( $icons[ $network ] ) ? $icons[ $network ] : '';
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
 * A que "pilar" editorial uma categoria pertence: review, receitas, ou
 * nenhum dos dois (Geral, Eventos etc.). Usado só pra dar uma cor
 * consistente ao indicador de categoria — a cor carrega informação (em qual
 * das duas grandes seções do site aquele post está), não é decoração solta.
 */
function comideria_get_pillar( $category ) {
	if ( ! $category ) {
		return 'geral';
	}

	static $roots = null;
	if ( null === $roots ) {
		$review   = get_category_by_slug( 'review' );
		$receitas = get_category_by_slug( 'receitas' );
		$roots    = array(
			'review'   => $review ? $review->term_id : 0,
			'receitas' => $receitas ? $receitas->term_id : 0,
		);
	}

	foreach ( $roots as $pillar => $root_id ) {
		if ( ! $root_id ) {
			continue;
		}
		if ( (int) $category->term_id === $root_id || in_array( $root_id, get_ancestors( $category->term_id, 'category' ), true ) ) {
			return $pillar;
		}
	}

	return 'geral';
}

/**
 * Indicador de categoria: um traço colorido + o nome, em minúsculas normais
 * (sem versalete/letter-spacing) — a cor identifica o pilar editorial
 * (Review = terracota, Receitas = verde) em vez de um rótulo decorativo.
 */
function comideria_the_kicker( $post_id = null ) {
	$cat = comideria_get_primary_category( $post_id );

	if ( ! $cat ) {
		return;
	}

	$pillar = comideria_get_pillar( $cat );

	printf(
		'<a class="%1$s kicker kicker--%2$s" href="%3$s">%4$s</a>',
		is_singular() ? 'entry-kicker' : 'card-kicker',
		esc_attr( $pillar ),
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
