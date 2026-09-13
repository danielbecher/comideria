<?php
/**
 * Formulário de busca — sobrescreve o padrão do WordPress core (que usa
 * classes diferentes das que o tema estiliza e cai no texto em inglês
 * quando o locale do site não resolve a tradução do core).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

$unique_id = wp_unique_id( 'search-form-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Pesquisar por:', 'comideria' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $unique_id ); ?>"
		class="search-field"
		placeholder="<?php esc_attr_e( 'Pesquisar …', 'comideria' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		name="s"
	/>
	<button type="submit" class="search-submit">
		<?php esc_html_e( 'Pesquisar', 'comideria' ); ?>
	</button>
</form>
