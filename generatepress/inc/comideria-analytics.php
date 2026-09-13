<?php
/**
 * Google tag (gtag.js) — Google Analytics do Comideria.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'COMIDERIA_GA_MEASUREMENT_ID', 'G-80QNBXXW39' );

if ( ! function_exists( 'comideria_ga_enqueue' ) ) {
	add_action( 'wp_enqueue_scripts', 'comideria_ga_enqueue' );
	/**
	 * Carrega o Google tag (gtag.js) em todo o site, fora do admin.
	 */
	function comideria_ga_enqueue() {
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
}
