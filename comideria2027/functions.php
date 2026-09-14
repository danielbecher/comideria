<?php

defined( 'ABSPATH' ) || exit;

define( 'COMIDERIA_VERSION', (string) filemtime( get_stylesheet_directory() . '/style.css' ) );

function comideria_setup() {
	load_theme_textdomain( 'comideria', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Tinta', 'comideria' ),
				'slug'  => 'ink',
				'color' => '#25221d',
			),
			array(
				'name'  => __( 'Terracota', 'comideria' ),
				'slug'  => 'accent',
				'color' => '#9a4a14',
			),
			array(
				'name'  => __( 'Fundo', 'comideria' ),
				'slug'  => 'background',
				'color' => '#fdfbf8',
			),
		)
	);
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-gradients' );

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'comideria' ),
			'footer'  => __( 'Menu do rodapé', 'comideria' ),
		)
	);

	add_image_size( 'comideria-card', 640, 420, true );
	add_image_size( 'comideria-card-2x', 1280, 840, true );

	add_image_size( 'comideria-hero-sm', 640, 360, true );
	add_image_size( 'comideria-hero-md', 960, 540, true );
	add_image_size( 'comideria-hero-lg', 1440, 810, true );
	add_image_size( 'comideria-hero', 1920, 1080, true );
}
add_action( 'after_setup_theme', 'comideria_setup' );

function comideria_assets() {
	wp_enqueue_style( 'comideria-style', get_stylesheet_uri(), array(), COMIDERIA_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'comideria_assets' );

function comideria_image_sizes_attr( $sizes, $size ) {
	if ( is_array( $size ) ) {
		return $sizes;
	}

	if ( 'comideria-card' === $size || 'comideria-card-2x' === $size ) {
		return '(max-width: 480px) 100vw, (max-width: 781px) 50vw, 380px';
	}

	if ( 'comideria-hero' === $size ) {
		return '(max-width: 781px) 100vw, 1100px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'comideria_image_sizes_attr', 10, 2 );

function comideria_head_cleanup() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'comideria_head_cleanup' );

function comideria_skip_lazy_on_first_content_image( $default, $image, $context ) {
	static $count = 0;

	if ( 'the_content' === $context ) {
		++$count;
		if ( 1 === $count && is_singular() ) {
			return false;
		}
	}

	return $default;
}
add_filter( 'wp_lazy_loading_enabled', 'comideria_skip_lazy_on_first_content_image', 10, 3 );

function comideria_has_seo_plugin() {
	return defined( 'RANK_MATH_VERSION' )
		|| defined( 'WPSEO_VERSION' )
		|| defined( 'AIOSEO_VERSION' )
		|| class_exists( 'SEOPress' );
}

function comideria_fallback_meta_description() {
	if ( comideria_has_seo_plugin() ) {
		return;
	}

	$description = '';

	if ( is_singular() ) {
		$description = wp_strip_all_tags( get_the_excerpt() );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$description = wp_strip_all_tags( term_description() );
	} elseif ( is_home() || is_front_page() ) {
		$description = get_bloginfo( 'description' );
	}

	$description = trim( $description );

	if ( '' === $description ) {
		return;
	}

	printf( '<meta name="description" content="%s" />' . "\n", esc_attr( wp_trim_words( $description, 40 ) ) );
}
add_action( 'wp_head', 'comideria_fallback_meta_description', 1 );

define( 'COMIDERIA_GA_MEASUREMENT_ID', 'G-80QNBXXW39' );
define( 'COMIDERIA_ADSENSE_CLIENT_ID', 'ca-pub-7447503001370119' );

function comideria_analytics_enqueue() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script(
		'comideria-gtag',
		'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode( COMIDERIA_GA_MEASUREMENT_ID ),
		array(),
		null,
		array( 'strategy' => 'async' )
	);

	wp_add_inline_script(
		'comideria-gtag',
		sprintf(
			'window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag("js", new Date()); gtag("config", %s);',
			wp_json_encode( COMIDERIA_GA_MEASUREMENT_ID )
		)
	);
}
add_action( 'wp_enqueue_scripts', 'comideria_analytics_enqueue' );

function comideria_adsense_enqueue() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script(
		'comideria-adsense',
		'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' . rawurlencode( COMIDERIA_ADSENSE_CLIENT_ID ),
		array(),
		null
	);
	wp_scripts()->add_data( 'comideria-adsense', 'async', true );
}
add_action( 'wp_enqueue_scripts', 'comideria_adsense_enqueue' );

function comideria_adsense_crossorigin_attr( $tag, $handle ) {
	if ( 'comideria-adsense' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src=', ' crossorigin="anonymous" src=', $tag );
}
add_filter( 'script_loader_tag', 'comideria_adsense_crossorigin_attr', 10, 2 );

function comideria_site_logo( $class = '' ) {
	$logo_path = get_template_directory() . '/assets/logo.png';
	$logo_uri  = get_template_directory_uri() . '/assets/logo.png';
	if ( file_exists( $logo_path ) ) {
		$logo_uri = add_query_arg( 'v', filemtime( $logo_path ), $logo_uri );
	}
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

function comideria_placeholder_icon() {
	return '<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true" focusable="false"><circle cx="34" cy="32" r="15"/><circle cx="34" cy="32" r="8.5"/><line x1="12" y1="16" x2="12" y2="34"/><line x1="9" y1="16" x2="9" y2="26"/><line x1="15" y1="16" x2="15" y2="26"/><line x1="12" y1="26" x2="12" y2="48"/></svg>';
}

function comideria_search_icon() {
	return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
}

function comideria_hamburger_icon() {
	return '<span class="hamburger" aria-hidden="true"><span></span><span></span><span></span></span>';
}

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

	foreach ( $cats as $cat ) {
		if ( $cat->parent > 0 ) {
			return $cat;
		}
	}

	return $cats[0];
}

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
		$time_html,
		esc_html_x( 'por', 'post author', 'comideria' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

function comideria_reading_time( $post_id = null ) {
	$post_id    = $post_id ? $post_id : get_the_ID();
	$content    = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	$minutes    = max( 1, (int) ceil( $word_count / 200 ) );

	return sprintf(
		_n( '%d min de leitura', '%d min de leitura', $minutes, 'comideria' ),
		$minutes
	);
}

function comideria_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$has_seo_plugin = comideria_has_seo_plugin();
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
	echo '<ol' . ( $has_seo_plugin ? '' : ' itemscope itemtype="https://schema.org/BreadcrumbList"' ) . '>';

	foreach ( $trail as $i => $crumb ) {
		$is_last  = ( $i === count( $trail ) - 1 );
		$itemprop = $has_seo_plugin ? '' : ' itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"';

		echo '<li' . $itemprop . '>';

		if ( $is_last || empty( $crumb['url'] ) ) {
			echo '<span' . ( $has_seo_plugin ? '' : ' itemprop="name"' ) . '>' . esc_html( $crumb['name'] ) . '</span>';
		} else {
			echo '<a href="' . esc_url( $crumb['url'] ) . '"' . ( $has_seo_plugin ? '' : ' itemprop="item"' ) . '><span' . ( $has_seo_plugin ? '' : ' itemprop="name"' ) . '>' . esc_html( $crumb['name'] ) . '</span></a>';
		}

		if ( ! $has_seo_plugin ) {
			echo '<meta itemprop="position" content="' . esc_attr( $i + 1 ) . '" />';
		}

		echo '</li>';
	}

	echo '</ol></nav>';
}

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
		echo wp_get_attachment_image( $thumb_id, $size, false, $img_args );
		return;
	}

	printf(
		'<span class="media-placeholder" aria-hidden="true">%s</span>',
		comideria_placeholder_icon()
	);
}

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

	$echo       = ! isset( $args['echo'] ) || $args['echo'];
	$items_wrap = isset( $args['items_wrap'] ) ? $args['items_wrap'] : '<ul id="%1$s" class="%2$s">%3$s</ul>';
	$output     = sprintf( $items_wrap, 'menu-fallback', 'menu', $items );

	if ( $echo ) {
		echo $output;
		return;
	}

	return $output;
}

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
