<?php
/**
 * Template de comentários — preserva os comentários históricos dos posts
 * antigos (visíveis hoje como "X Comentários" no site atual).
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			printf(
				/* translators: %d: número de comentários. */
				esc_html( _n( '%d comentário', '%d comentários', $comments_number, 'comideria' ) ),
				(int) $comments_number
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 44,
				)
			);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => __( '← Anteriores', 'comideria' ),
				'next_text' => __( 'Próximos →', 'comideria' ),
			)
		);
	endif;

	if ( ! comments_open() && get_comments_number() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Os comentários estão encerrados.', 'comideria' ); ?></p>
		<?php
	endif;

	comment_form(
		array(
			'class_submit' => 'btn',
			'title_reply'  => __( 'Deixe um comentário', 'comideria' ),
		)
	);
	?>
</div>
