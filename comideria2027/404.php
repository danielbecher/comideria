<?php
/**
 * Página 404.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="section wrap">
	<div class="no-results">
		<h1><?php esc_html_e( '404: página não encontrada', 'comideria' ); ?></h1>
		<p><?php esc_html_e( 'O conteúdo que você procurava não existe mais ou mudou de endereço. Tente buscar abaixo.', 'comideria' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
<?php
get_footer();
