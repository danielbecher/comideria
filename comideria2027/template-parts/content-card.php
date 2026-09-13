<?php
/**
 * Card de post, usado nos grids da home, arquivos e busca.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<a class="card-media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php comideria_the_post_media( 'comideria-card' ); ?>
	</a>

	<?php comideria_the_kicker(); ?>

	<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<p class="card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></p>
</article>
