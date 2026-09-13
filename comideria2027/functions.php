<?php
/**
 * Comideria 2027 — configuração do tema.
 *
 * Tema editorial enxuto: sem framework CSS, sem jQuery e sem JavaScript
 * customizado (o menu mobile e a busca usam <details>/<summary> nativos).
 * Toda decisão de performance está documentada nos comentários abaixo.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

/*
 * Usa a data de modificação do style.css como versão dos assets, em vez de
 * um número fixo — assim, toda vez que o CSS for editado, o navegador (e
 * qualquer cache de página, tipo LiteSpeed Cache) automaticamente busca a
 * versão nova em vez de servir uma cópia antiga em cache.
 */
define( 'COMIDERIA_VERSION', (string) filemtime( get_stylesheet_directory() . '/style.css' ) );

/**
 * Setup geral do tema.
 */
function comideria_setup() {
	load_theme_textdomain( 'comideria', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	// Sem add_theme_support( 'custom-logo' ) de propósito: a logo é fixa no
	// tema (assets/logo.png, ver comideria_site_logo()) — não queremos um
	// controle de upload no Personalizar que não faria nada.

	// Restringe a paleta e os tamanhos de fonte do editor de blocos à identidade do site.
	add_theme_support( 'editor-color-palette', array(
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
	) );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-gradients' );

	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'comideria' ),
		'footer'  => __( 'Menu do rodapé', 'comideria' ),
	) );

	// Tamanhos de imagem usados pelos cards e pela imagem de destaque (hero).
	// Mantidos ao mínimo necessário para não gerar arquivos extras sem uso.
	add_image_size( 'comideria-card', 640, 420, true );
	add_image_size( 'comideria-card-2x', 1280, 840, true );
	add_image_size( 'comideria-hero', 1920, 1080, true );
}
add_action( 'after_setup_theme', 'comideria_setup' );

/**
 * Enfileira o único stylesheet do tema.
 *
 * Não há JavaScript customizado: o menu mobile e a busca usam <details>/<summary>
 * nativos do HTML, então nenhum script é registrado por padrão.
 */
function comideria_assets() {
	wp_enqueue_style( 'comideria-style', get_stylesheet_uri(), array(), COMIDERIA_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'comideria_assets' );

/**
 * Larguras usadas pelo atributo `sizes` das imagens responsivas.
 * Evita que o navegador baixe uma imagem maior do que o espaço realmente ocupado.
 */
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

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/seo-fallback.php';
require get_template_directory() . '/inc/analytics.php';
