<?php
/**
 * Limpeza de performance: remove apenas o que o tema não usa.
 *
 * Nada aqui desliga funcionalidades do WordPress ou de plugins — apenas
 * marcações no <head> que este tema não consome (emoji script, RSD,
 * wlwmanifest, shortlink, feeds de comentário quando fechados).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove o script/estilo de emoji do WordPress (raramente necessário hoje em
 * dia nos navegadores suportados) e outras tags de <head> sem uso pelo tema.
 */
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

/**
 * Desativa o carregamento preguiçoso (lazy loading) apenas para a primeira
 * imagem "grande" da página (a que normalmente é o LCP), evitando o filtro
 * padrão do WordPress adicionar `loading="lazy"` nela. As chamadas de
 * `the_post_thumbnail()` para o hero já passam `loading => eager` de forma
 * explícita nos templates; este filtro é uma rede de segurança para imagens
 * que vêm do conteúdo do editor.
 */
function comideria_skip_lazy_on_first_content_image( $default, $image, $context ) {
	static $count = 0;

	if ( 'the_content' === $context ) {
		$count++;
		if ( 1 === $count && is_singular() ) {
			return false;
		}
	}

	return $default;
}
add_filter( 'wp_lazy_loading_enabled', 'comideria_skip_lazy_on_first_content_image', 10, 3 );
