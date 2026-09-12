<?php
/**
 * Estado vazio: nenhum post encontrado (busca ou arquivo sem conteúdo).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="no-results">
	<h1><?php esc_html_e( 'Nada por aqui', 'comideria' ); ?></h1>
	<p><?php esc_html_e( 'Não encontramos nenhum conteúdo para o que você procurou. Tente outra busca ou volte para a página inicial.', 'comideria' ); ?></p>
	<?php get_search_form(); ?>
</div>
