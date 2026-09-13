<?php
/**
 * Google tag (gtag.js) — Google Analytics.
 *
 * Carregado via wp_enqueue_script com estratégia "async" (equivalente ao
 * `<script async src="...">` original), fora do admin, para não pesar o
 * TTFB nem bloquear o carregamento de mais nada. Se um dia o Site Kit for
 * ativado neste tema, desative este arquivo (comente o require em
 * functions.php) para não haver dois gtag rodando ao mesmo tempo.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

define( 'COMIDERIA_GA_MEASUREMENT_ID', 'G-80QNBXXW39' );

function comideria_analytics_enqueue() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script(
		'comideria-gtag',
		'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode( COMIDERIA_GA_MEASUREMENT_ID ),
		array(),
		null, // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- versionado pelo Google, não faz sentido cachear/versionar aqui.
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
