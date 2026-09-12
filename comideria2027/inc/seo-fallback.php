<?php
/**
 * SEO técnico: o tema não gera meta description, Open Graph, Twitter Cards
 * ou JSON-LD quando um plugin de SEO (Rank Math, Yoast SEO, etc.) já está
 * ativo — o site atual já usa um desses plugins e produz essas marcações.
 * As funções abaixo só entram em ação como rede de segurança, caso o site
 * seja executado sem nenhum plugin de SEO instalado.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

/**
 * Detecta se algum plugin de SEO conhecido está ativo.
 */
function comideria_has_seo_plugin() {
	return defined( 'RANK_MATH_VERSION' )
		|| defined( 'WPSEO_VERSION' )
		|| defined( 'AIOSEO_VERSION' )
		|| class_exists( 'SEOPress' );
}

/**
 * Meta description de reserva, baseada no excerpt — só é usada se
 * nenhum plugin de SEO estiver ativo.
 */
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

/**
 * Canonical de reserva — só é usado se nenhum plugin de SEO estiver ativo
 * (o WordPress core já imprime rel=canonical por padrão via wp_head, então
 * esta função apenas documenta a decisão de não duplicar nada aqui).
 */
