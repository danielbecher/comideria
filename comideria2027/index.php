<?php
/**
 * Fallback padrão: arquivo cronológico (usado quando nenhum template mais
 * específico se aplica).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="section wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<div class="section-heading">
			<h1><?php echo esc_html( get_the_title( (int) get_option( 'page_for_posts' ) ) ); ?></h1>
		</div>
	<?php endif; ?>

	<?php comideria_blog_loop(); ?>
</section>
<?php
get_footer();
