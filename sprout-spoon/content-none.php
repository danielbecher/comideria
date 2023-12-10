<article class="post">
					
	<div class="post-header">
	
			<h1><?php esc_html_e( 'Nenhum resultado!', 'sprout-spoon' ); ?></h1>
		
	</div>
	
	<div class="post-entry nothing">
	
		<?php if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Desculpe, mas não encontramos o que você procura. Tente novamente com outras palavras.', 'sprout-spoon' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'Não encontramos o que você estava procurando. Talvez uma nova pesquisa possa ajudar.', 'sprout-spoon' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		
	</div>
	
</article>